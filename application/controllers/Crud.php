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
				'food_category_id' => $this->input->post('category'),
				);

			$data = $this->Core_Model->insert('menu', $data);

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Berhasil tambah data
		</div>');			

			//$data = array('upload_data' => $this->upload->data());
			$this->redirect_back();

			
			// foreach ($data['upload_data'] as $upload) {
			// 	echo $upload;
			// }
			// $this->load->view('admin/varian', $data);
		}
	}
	
	public function edit_profil()
	{
		$query = $this->db->get('profil');

		if ($query->num_rows() == 0){

			$data = array(
				'name'=> html_escape($this->input->post('name')),
				'email'=> html_escape($this->input->post('email')),
				'phone'=> html_escape($this->input->post('phone')),
				'alamat'=> html_escape($this->input->post('alamat')),
				'tentang'=> html_escape($this->input->post('tentang'))
			);

			$data = $this->Core_Model->insert('profil', $data);
			$this->redirect_back();
		}
		else
		{
			$data = array(
				'name'=> html_escape($this->input->post('name')),
				'email'=> html_escape($this->input->post('email')),
				'phone'=> html_escape($this->input->post('phone')),
				'alamat'=> html_escape($this->input->post('alamat')),
				'tentang'=> html_escape($this->input->post('tentang'))
			);

			$this->db->update('profil', $data, array('id' => 1));
			$this->redirect_back();
		}
	}

	public function success()
	{			
		$this->load->view('template/style');
		$this->load->view('template/header');
		$this->load->view('public/v_regsuccess');
		$this->load->view('template/footer');
	}

	public function hapus($id, $table)
	{   
		$this->Core_Model->delete($table, array( 'id' => $id));
		
		$this->redirect_back();
	}

	public function edit($id)
	{
		if ($_FILES['edit-image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => $this->input->post('code'),
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'food_category_id' => $this->input->post('category')
				);

			$this->db->where('id', $id);
			$data = $this->db->update('menu', $data);
			//$this->Core_Model->update('user', $data, array('id'=>$id));

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Berhasil edit data
			</div>');			

			//$data = array('upload_data' => $this->upload->data());
			
			$this->redirect_back();
		}
		else
		{
			if (! $this->Core_Model->upload_gambar('edit-image', 'uploads')){
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
					'food_category_id' => $this->input->post('category')
					);

				$this->db->where('id', $id);
				$data = $this->db->update('menu', $data);
				//$this->Core_Model->update('user', $data, array('id'=>$id));

				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Berhasil edit data
				</div>');					
				
				$this->redirect_back();
			}
		}
	}

	public function upload_logo()
	{
			
		$config['upload_path']          = './bakul/';
		$config['allowed_types']        = '|gif|jpeg|jpg|png';
		$config['file_name']			= 'logo';
		$config['overwrite']			= true;
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;
		
		if (! $this->Core_Model->upload_gambar('edit-logo', $config, false)){
		
			$data['error'] = array($this->upload->display_errors());
			
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Gagal!</strong> Upload gagal.
			</div>');
			
			foreach ($data['error'] as $error_msg) {
				echo $error_msg;
			}

			$this->redirect_back();
		}
		else 
		{
			$config['image_library'] = 'gd2';
			$config['source_image'] = $this->upload->data('full_path');
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 120;
			$config['height']       = 120;
			
			$this->load->library('image_lib', $config);
			
			$this->image_lib->resize();
			//$this->Core_Model->update('user', $data, array('id'=>$id));

			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Success!</strong> Berhasil upload
			</div>');					
			
			$this->redirect_back();
		}
	}

	public function add_testimonial()
	{
		$data = array(
			'name'=> html_escape($this->input->post('name')),
			'testimonial'=> html_escape($this->input->post('testimonial')),
			'rating'=> html_escape($this->input->post('rating')),
			'ip_address'=> html_escape($_SERVER['REMOTE_ADDR']),
			'submited_date'=> html_escape(date("Y-m-d")),
			'submited_time'=> html_escape(date("H:i:s"))
		);

		if (! $this->Core_Model->insert('testimonials', $data))
		{
			$data['error'] = array($this->db->display_errors());

			foreach ($data['error'] as $error_msg) {
				echo $error_msg;
			}
		}
		else
		{
			$this->redirect_back();
		}
		
	}

	public function select_time()
	{
		$this->db->where('day', html_escape($this->input->get('d')));
		$data = $this->db->get('open_hours');

		echo json_encode($data->result_array());
	}

	public function update_jambuka()
	{
		$data = array(
			'open_hour' => html_escape($this->input->post('open_hour')),
			'close_hour' => html_escape($this->input->post('close_hour')),
			'flag' => html_escape($this->input->post('flag')),
			);

		$this->db->where('day', html_escape($this->input->post('day')));
		$data = $this->db->update('open_hours', $data);
		//$this->Core_Model->update('user', $data, array('id'=>$id));

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Success!</strong> Berhasil edit data
		</div>');					
		
		$this->redirect_back();
	}

	public function redirect_back()
	{
		$this->load->library('user_agent');
		$referrer_url = $this->agent->referrer();
		redirect($referrer_url, 'refresh');
	}
}
