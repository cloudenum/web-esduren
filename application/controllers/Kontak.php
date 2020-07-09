<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('email_helper');
	}

	public function index() {
		$profile = $this->db->get('profil');
		if ($profile->num_rows() > 0) {
			$data['profil'] = $profile->result()[0];
		} else {
			redirect('admin');
		}
		$this->db->order_by('id', "ASC");
		$data['open_hours'] = $this->db->get('open_hours')->result();
		$data['socmed'] = $this->db->get('socmed')->result();
		$data['body_id'] = array('single-page');
		$data['js_to_load'] = array('https://unpkg.com/sweetalert/dist/sweetalert.min.js', 'contact.js');
		$gmap_key = $this->site_config->getSettings()->gmap;
		if ($gmap_key) {
			$data['gmap_key'] = $gmap_key;
		}

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_kontak', $data);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}

	public function send() {
		$data = (object) [
			'message' => 'Not Allowed',
			'data' => (object) []
		];

		try {

			$senderName = html_escape($this->input->post('name'));
			$from = html_escape($this->input->post('email'));
			$message = html_escape($this->input->post('message'));
			$subject = html_escape($this->input->post('subject'));
			$res = send_to_owner_email($from, $senderName, $subject, $message);
			$data->data->senderName = $senderName;

			if (!$res) {
				throw new Exception("Failed to send email", 1);
			}

			$data->message = 'Success';
			$data->data->sendgrid = $res->statusCode();
			$this->output->set_status_header(200);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data));
		} catch (\Exception $e) {
			log_message('debug', $e->getMessage());

			$this->output->set_status_header(403);

			$this->output
				->set_content_type('application/json')
				->set_output(json_encode($data))
				->_display();
		} catch (\Throwable $th) {
			log_message('error', $th->getMessage());

			$this->output
				->set_status_header(403)
				->set_content_type('application/json')
				->set_output(json_encode($data))
				->_display();
		}
	}
}
