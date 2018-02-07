<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function index()
	{	
		$data['body_id'] = array('single-page');
		$data['js_to_load'] = array('');

		$this->load->view('template/style');
		$this->load->view('template/header', $data);
		$this->load->view('public/v_galeri');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		
	}
}