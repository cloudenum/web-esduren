<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{	
		$this->load->view('template/style');
		$this->load->view('template/header');
		$this->load->view('public/v_home');
		$this->load->view('template/footer');
		$this->load->view('template/script');
		
	}
}
