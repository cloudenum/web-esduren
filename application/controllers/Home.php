<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$data['body_id'] = array('home-page');
		$data['js_to_load'] = array('rating.js');

		$this->load->view('template/style');
		$this->load->view('template/header', $data);
		$this->load->view('public/v_home');
		$this->load->view('template/footer');
		$this->load->view('template/script', $data);
		
	}
}
