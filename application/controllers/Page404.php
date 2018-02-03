<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page404 extends CI_Controller {

	public function index()
	{	
		$this->load->view('errors/html/error_404');
    }
    
}
