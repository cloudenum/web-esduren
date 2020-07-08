<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_config {
	protected $_CI;
	private static $_instance = null;
	protected $_configStore;
	protected $_filePath;

	public function __construct() {
		$this->_CI = &get_instance();
		$this->_CI->load->helper('json_helper');
		$this->_filePath = './site-settings.json';
		$this->createSettingsFile();

		$this->_configStore = read_json_file($this->_filePath);
		if (!$this->_configStore) {
			echo 'Can\'t read site-settings.json. Please make sure the file exists.';
			exit(EXIT_ERROR);
		}
	}

	/**
	 * Returns true on success creating file and false otherwise
	 * 
	 * This function use create_json_file() 
	 * to create site-settings.json in this project's root folder
	 * with empty default properties
	 * 
	 * @return bool
	 */
	private function createSettingsFile() {
		$data = (object) [
			"gtag" => "",
			"gmap" => "",
			"sendgrid_api" => "",
			"pages" => (object) [
				"home" => (object) [
					"slides" => [],
					"backgroundTestimoni" => ''
				],
				"menu" => (object) [
					"headerImage" => ""
				],
				"gallery" => (object) [
					"headerImage" => ""
				],
				"contact" => (object) [
					"headerImage" => ""
				]
			]
		];

		return create_json_file($this->_filePath, $data);
	}

	public static function getInstance() {
		if (self::$_instance === null) {
			self::$_instance = new Site_config();
		}

		return self::$_instance;
	}

	/**
	 * BROKEN!!! 
	 * DO NOT USE THIS!!!
	 */
	public function changeSetting($what = '', $data) {
		if ($what === '') {
			return $this->updateSettings();
		}

		$settingProperty = explode('.', $what);
		if (is_object($this->_configStore->$settingProperty[0])) {
			$this->_configStore->$settingProperty[0]->$settingProperty[1] = $data->$settingProperty[0]->$settingProperty[1];
		}
	}

	public function updateSettings($changedData = NULL) {
		if ($changedData === NULL) $changedData = $this->_configStore;
		$jsonData = read_json_file($this->_filePath);

		if (!is_array($changedData)) $changedData = (array) $changedData;

		if ($jsonData && is_array($changedData)) {
			$jsonData = (object) array_merge((array) $jsonData, $changedData);
			return write_json_file($this->_filePath, $jsonData, JSON_PRETTY_PRINT);
		}

		return false;
	}

	public function setBackgroundTestimoni(string $image_path) {
		$this->_configStore->pages->home->backgroundTestimoni = $image_path;
		return $this->updateSettings();
	}

	public function changeSlideImage($image_path, $pos = 0) {
		$slideData = (object) [
			'image_path' => $image_path
		];

		if (!is_object($slideData)) return false;

		$this->_configStore->pages->home->slides[$pos] = $slideData;
		return $this->updateSettings();
	}

	public function getSettings() {
		return $this->_configStore;
	}
}
