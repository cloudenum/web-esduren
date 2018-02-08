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
	
		if ( ! $this->Core_Model->upload_gambar('image') )
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
				'price' => $this->input->post('price'),
				'image_path' => base_url('uploads/'.$this->upload->data("file_name")),
				);
			$data = $this->Core_Model->insert('menu', $data);

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Berhasil tambah data
		</div>');			

			//$data = array('upload_data' => $this->upload->data());
			redirect(base_url('admin/varian'));

			
			// foreach ($data['upload_data'] as $upload) {
			// 	echo $upload;
			// }
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
		if ($_FILES['edit-image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				);

			$this->db->where('id', $id);
			$data = $this->db->update('menu', $data);
			//$this->Core_Model->update('user', $data, array('id'=>$id));

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Berhasil edit data
		</div>');			

			//$data = array('upload_data' => $this->upload->data());
			redirect(base_url('admin/varian'), 'refresh');
		}
		else
		{
			if (! $this->Core_Model->upload_gambar('edit-image')){
				$data['error'] = array($this->upload->display_errors());

				foreach ($data['error'] as $error_msg) {
					echo $error_msg;
				}
			}
			else 
			{
				$data = array(
					'code' => $this->input->post('code'),
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'price' => $this->input->post('price'),
					'image_path' => base_url('uploads/'.$this->upload->data("file_name")),
					);

				$this->db->where('id', $id);
				$data = $this->db->update('menu', $data);
				//$this->Core_Model->update('user', $data, array('id'=>$id));

				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Berhasil edit data
				</div>');			
				redirect(base_url("admin/varian"),'refresh');
			}
		}
	}
	
	public function hapus($id)
	{   
		$this->Core_Model->delete('menu', array( 'id' => $id));
		redirect(base_url('admin/varian'), 'refresh');
	}

	
}
