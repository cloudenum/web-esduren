<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('create_json_file')) {
	/**
	 * Returns true on success creating file and false otherwise
	 * 
	 * First, it checks if the file is exists or not
	 * if the file exists then this function returns false
	 * 
	 * @param string $path
	 * @param mixed $data
	 * @return bool
	 */
	function create_json_file(string $path, $data, $options = 0, $depth = 512) {
		if (!file_exists($path)) {
			if (file_put_contents($path, json_encode($data, $options, $depth))) return true;
		}

		return false;
	}
}

if (!function_exists('read_json_file')) {
	/**
	 * Returns decoded value in appropiate PHP data type using json_decode()
	 * 
	 * This function check whether the file exists or not 
	 * and if the file can be read. if both checks failed 
	 * then this function returns false
	 * 
	 * @param string $path
	 * @return object|bool
	 */
	function read_json_file(string $path, $assoc = false, $depth = 512, $options = 0) {
		if (file_exists($path)) {
			$raw =  file_get_contents($path);
			if ($raw) {
				return json_decode($raw, $assoc, $depth, $options);
			}
		}

		return false;
	}
}

if (!function_exists('write_json_file')) {
	function write_json_file(string $file_path, $data, $options = 0, $depth = 512) {
		if (file_exists($file_path)) {
			if (file_put_contents($file_path, json_encode($data, $options, $depth))) return true;
		}

		return false;
	}
}
