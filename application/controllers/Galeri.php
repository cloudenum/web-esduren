<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function index() {
		$data['profil'] = $this->db->get('profil')->result()[0];
		$data['body_id'] = array('single-page');
		$data['js_to_load'] = array('');
		$data['map_js'] = [];

		$main['gallery'] = $this->db->get('gallery')->result();

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_galeri', $main);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
