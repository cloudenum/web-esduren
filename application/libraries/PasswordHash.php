<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Passwordhash {
	private CI_Controller $_CI;
	private CI_Encryption $_encryption;

	public function __construct() {
		$this->_CI = &get_instance();

		$this->_CI->load->library('encryption');
		$this->_CI->encryption->initialize(
			array(
				'cipher' => 'aes-256',
				'mode' => 'ctr'
			)
		);

		$this->_encryption = $this->_CI->encryption;
	}

	public function hash(string $password): string {
		return $this->_encryption->encrypt(password_hash($password, PASSWORD_ARGON2ID));
	}

	public function verify(string $userPassword, string $encryptedPassword): bool {
		$decryptedPass = $this->_encryption->decrypt($encryptedPassword);

		if (!$decryptedPass) {
			log_message('debug', 'decrypt returns false');
			return false;
		}

		return password_verify($userPassword, $decryptedPass);
	}
}
