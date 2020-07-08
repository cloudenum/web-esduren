<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('send_to_owner_email')) {
	function send_to_owner_email(string $from, string $senderName, string $subject, string $message) {
		$CI = &get_instance();
		$CI->load->library('siteconfig');
		$settings = $CI->siteconfig->getSettings();

		if (isset($settings->sendgrid_api) && $settings->sendgrid_api) {
			try {
				$profile = $CI->db->get('profil')->row();
				$email = new \SendGrid\Mail\Mail();
				$email->setFrom($from, $senderName);
				$email->setSubject("WEB - " . $profile->name . ": " . $subject);
				$email->addTo($profile->email, $profile->name);
				$email->addContent("text/plain", $message);

				$sendgrid = new \SendGrid($settings->sendgrid_api);
				$response = $sendgrid->send($email);
				log_message('debug', 'Sendgrid response code: ' . $response->statusCode());

				return $response;
			} catch (Exception $e) {
				log_message('debug', $e->getMessage());
			}
		}

		return false;
	}
}
