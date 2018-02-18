<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{	
		$query = $this->db->get('profil');

		$data['profil'] = $query->result();
		$data['body_id'] = array('single-page');
		$data['js_to_load'] = array('');

		// $body_id = '';
		$this->load->view('template/style');
		$this->load->view('template/header', $data);
		$this->load->view('public/v_tentang');
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
		
	}
}
