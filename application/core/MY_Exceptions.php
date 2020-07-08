<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * General Error Page (modified)
	 *
	 * Takes an error message as input (either as a string or an array)
	 * and displays it using the specified template.
	 *
	 * @param	string		$heading	Page heading
	 * @param	string|string[]	$message	Error message
	 * @param	string		$template	Template name
	 * @param 	int		$status_code	(default: 500)
	 *
	 * @return	string	Error page output
	 */
	public function show_error($heading, $message, $template = 'error_general', $status_code = 500) {
		$templates_path = config_item('error_views_path');
		if (empty($templates_path)) {
			$templates_path = VIEWPATH . 'errors' . DIRECTORY_SEPARATOR;
		}

		if (is_cli()) {
			$message = "\t" . (is_array($message) ? implode("\n\t", $message) : $message);
			$template = 'cli' . DIRECTORY_SEPARATOR . $template;
		} else {
			set_status_header($status_code);
			$message = '<p>' . (is_array($message) ? implode('</p><p>', $message) : $message) . '</p>';
			$template = 'html' . DIRECTORY_SEPARATOR . $template;
		}

		if (ob_get_level() > $this->ob_level + 1) {
			ob_end_flush();
		}

		$profil = $this->db_query('SELECT * FROM profil');

		if (!$profil) {
			$this->show_exception(new Exception('WEIRD!!!'));
			return;
		}

		$profil = $profil[0];
		$open_hours = $this->db_query('SELECT * FROM open_hours');
		$socmed = $this->db_query('SELECT * FROM socmed');
		$body_id = array('single-page');

		ob_start();
		include(VIEWPATH . 'template' . DIRECTORY_SEPARATOR . 'style.php');
		include(VIEWPATH . 'template' . DIRECTORY_SEPARATOR . 'header.php');
		include($templates_path . $template . '.php');
		include(VIEWPATH . 'template' . DIRECTORY_SEPARATOR . 'footer.php');
		include(VIEWPATH . 'template' . DIRECTORY_SEPARATOR . 'script.php');
		$buffer = ob_get_contents();
		ob_end_clean();
		return $buffer;
	}

	private function db_query(string $query) {
		if (
			!file_exists($file_path = APPPATH . 'config/' . ENVIRONMENT . '/database.php')
			&& !file_exists($file_path = APPPATH . 'config/database.php')
		) {
			$this->show_exception(new Exception('The configuration file database.php does not exist.'));
			exit(EXIT_CONFIG);
		}

		include($file_path);
		$params = $db[$active_group];
		$db_conn = new mysqli($params['hostname'], $params['username'], $params['password'], $params['database']);
		$db_query = $db_conn->query($query);

		if (!$db_query) {
			$db_conn->close();
			exit(EXIT_DATABASE);
		}

		$result = [];
		while ($obj = $db_query->fetch_object()) {
			array_push($result, $obj);
		}

		$db_query->close();
		$db_conn->close();

		return $result;
	}

	/**
	 * 404 Error Handler (modified)
	 *
	 * @uses	CI_Exceptions::show_error()
	 *
	 * @param	string	$page		Page URI
	 * @param 	bool	$log_error	Whether to log the error
	 * @return	void
	 */
	public function show_404($page = '', $log_error = TRUE) {
		if (is_cli()) {
			$heading = 'Not Found';
			$message = 'The controller/method pair you requested was not found.';
		} else {
			$heading = '404';
			$message = 'Halaman yang anda cari tidak ada';
		}

		// By default we log this, but allow a dev to skip it
		if ($log_error) {
			log_message('error', $heading . ': ' . $page);
		}

		echo $this->show_error($heading, $message, 'error_general', 404);
		exit(4); // EXIT_UNKNOWN_FILE
	}
}
