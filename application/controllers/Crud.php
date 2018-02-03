<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Core_Model');
    }
    
    public function register()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'fullname' => $this->input->post('fullname'),
            'password' => $this->input->post('password'),
            'level' => 2 
            );
        $data = $this->Core_Model->register('user', $data);
        redirect(base_url("crud/success"),'refresh');
    }

	public function success()
	{			
		$this->load->view('template/style');
		$this->load->view('template/header');
		$this->load->view('public/v_regsuccess');
		$this->load->view('template/footer');
    }
    
    public function hapusUser($id)
    {   
        $this->Core_Model->delete('user', array( 'userid' => $id));
        redirect(base_url('admin/user'), 'refresh');
    }
}
