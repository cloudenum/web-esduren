<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File_streamer {
	private $path 	= "";
	private $stream = "";
	private $buffer = 100000;
	private $start  = -1;
	private $end    = -1;
	private $size   = 0;

	function __construct($params) {
		if (!$params['file_path']) throw new Exception("Where's the file path?");
		$this->path = $params['file_path'];
	}

	/**
	 * Open stream
	 */
	private function open() {
		if (!is_file($this->path)) {
			throw new Exception("File not found or not a regular file");
		}

		if (!($this->stream = fopen($this->path, 'rb'))) {
			throw new Exception('Could not open stream for reading');
		}
	}

	/**
	 * Get the file mime type
	 */
	public function get_mime_type() {
		if (!is_file($this->path)) {
			throw new Exception("File not found or not a regular file");
		}

		$finfo = finfo_open(FILEINFO_MIME_TYPE);

		if (!$finfo) {
			if (!finfo_close($finfo)) throw new Exception("Failed to close finfo", 1);
			throw new Exception('Failed to open finfo');
		}

		$file_type = finfo_file($finfo, $this->path);

		if (!$file_type) {
			if (!finfo_close($finfo)) throw new Exception("Failed to close finfo", 1);
			throw new Exception('Failed to get file\'s mime type');
		}

		if (!finfo_close($finfo)) throw new Exception("Failed to close finfo", 1);

		return $file_type;
	}

	/**
	 * Set proper header to serve the file
	 */
	private function setHeader() {
		ob_get_clean();
		$mime_type = $this->get_mime_type();
		header("Content-Type: $mime_type");
		header("Cache-Control: max-age=2592000, public");
		header("Expires: " . gmdate('D, d M Y H:i:s', time() + 2592000) . ' GMT');
		header("Last-Modified: " . gmdate('D, d M Y H:i:s', @filemtime($this->path)) . ' GMT');
		$this->start = 0;
		$this->size  = filesize($this->path);
		$this->end   = $this->size - 1;
		header("Accept-Ranges: 0-" . $this->end);

		if (isset($_SERVER['HTTP_RANGE'])) {

			$c_start = $this->start;
			$c_end = $this->end;

			list(, $range) = explode('=', $_SERVER['HTTP_RANGE'], 2);
			if (strpos($range, ',') !== false) {
				header('HTTP/1.1 416 Requested Range Not Satisfiable');
				header("Content-Range: bytes $this->start-$this->end/$this->size");
				exit;
			}
			if ($range == '-') {
				$c_start = $this->size - substr($range, 1);
			} else {
				$range = explode('-', $range);
				$c_start = $range[0];

				$c_end = (isset($range[1]) && is_numeric($range[1])) ? $range[1] : $c_end;
			}
			$c_end = ($c_end > $this->end) ? $this->end : $c_end;
			if ($c_start > $c_end || $c_start > $this->size - 1 || $c_end >= $this->size) {
				header('HTTP/1.1 416 Requested Range Not Satisfiable');
				header("Content-Range: bytes $this->start-$this->end/$this->size");
				exit;
			}

			$this->start = $c_start;
			$this->end = $c_end;
			$length = $this->end - $this->start + 1;
			fseek($this->stream, $this->start);

			header('HTTP/1.1 206 Partial Content');
			header("Content-Length: " . $length);
			header("Content-Range: bytes $this->start-$this->end/" . $this->size);
		} else {
			header("Content-Length: " . $this->size);
		}
	}

	/**
	 * close curretly opened stream
	 */
	private function end() {
		fclose($this->stream);
	}

	/**
	 * perform the streaming of calculated range
	 */
	private function stream() {
		$i = $this->start;
		set_time_limit(0);
		while (!feof($this->stream) && $i <= $this->end) {
			$bytesToRead = $this->buffer;

			if (($i + $bytesToRead) > $this->end) {
				$bytesToRead = $this->end - $i + 1;
			}

			$data = fread($this->stream, $bytesToRead);
			echo $data;
			flush();
			$i += $bytesToRead;
		}
	}

	/**
	 * Start streaming file content
	 */
	function start() {
		$this->open();
		$this->setHeader();
		$this->stream();
		$this->end();
	}
}
