<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function error404() {
		$data['profil'] = $this->db->get('profil')->result()[0];
		$data['open_hours'] = $this->db->get('open_hours')->result();
		$data['socmed'] = $this->db->get('socmed')->result();
		$data['body_id'] = array('single-page');

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('errors/html/error_404');
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
