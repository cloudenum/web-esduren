<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Core_Model');
	}
	
	public function insertVarian()
	{

		$this->load->helper('string');

		$config['upload_path']          = './uploads/';
		$config['file_name']			= random_string('alnum', 8);
		$config['allowed_types']        = '|gif|jpeg|jpg|png';
		$config['max_size']             = 2048;
		$config['max_width']            = 1024;
		$config['max_height']           = 768;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{
			$data['error'] = array($this->upload->display_errors());

			foreach ($data['error'] as $error_msg) {
				echo $error_msg;
			}
			//varian($data);
			// $this->load->view('admin/varian', $data);
		}
		else
		{
			
			$data = array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => intval($this->input->post('price')),
				'image_path' => base_url('uploads/'.$this->upload->data("file_name")),
				);
			$data = $this->Core_Model->insert('menu', $data);

			$data = array('upload_data' => $this->upload->data());
			
			foreach ($data['upload_data'] as $upload) {
				echo $upload;
			}
			// $this->load->view('admin/varian', $data);
		}
	}
	
	public function success()
	{			
		$this->load->view('template/style');
		$this->load->view('template/header');
		$this->load->view('public/v_regsuccess');
		$this->load->view('template/footer');
	}

	public function edit($id)
	{
	   $data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'fullname' => $this->input->post('fullname'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'gender' => $this->input->post('gender')
			// 'level' => $level 
			);

		$this->db->where('id', $id);
		$data = $this->db->update('user', $data);
		//$this->Core_Model->update('user', $data, array('id'=>$id));

		redirect(base_url("admin/user"),'refresh');
	}
	
	public function hapusUser($id)
	{   
		$this->Core_Model->delete('user', array( 'id' => $id));
		redirect(base_url('admin/user'), 'refresh');
	}
}
