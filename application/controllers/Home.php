<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$query = $this->db->get('profil');

		$data['profil'] = $query->result();
		$data['body_id'] = array('home-page');
		$data['js_to_load'] = array('rating.js', 'home.js');

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_home');
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
		
	}
}
