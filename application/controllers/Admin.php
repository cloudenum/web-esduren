<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Core_Model');
		
		// if($this->session->userdata('status') == "online"){
		// 	redirect(base_url("admin/dashboard"));
		// }
	}

	public function index($error)
	{			
		$this->load->view('admin/v_login', $error);
	}

	public function aksiLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			//'level' => 1
			);
		$cek = $this->Core_Model->getWhere("user", $where)->num_rows();
		if (!$cek){
			redirect(base_url('admin/index/error'));
		}else{
			if($cek > 0){

				// $query = "SELECT * FROM user WHERE username = '$username'";
			
				$fullname = $this->Core_Model->getWhere("user", $where)->row()->fullname;
				$data_session = array(
					'nama' => $fullname,
					'status' => "online"
					);
	
				$this->session->set_userdata($data_session);
	
				redirect(base_url("admin/dashboard"));
	
			}else{
				echo "Username dan password salah !";
			}
		}
	}
 
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function dashboard()
	{
		$data['js_to_load']= array('dashboard-page.js');
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/v_dashboard');
		$this->load->view('admin/template/v_admin_footer', $data);
		
		// if($this->session->userdata('status') != "online"){
		// 	redirect(base_url("page404"), 'refresh');
		// }
	}

	public function testimoni()
	{
		$data['js_to_load']= array('');
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/pages/v_testimoni');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function varian()
	{
		$this->load->helper('form');

		$data['js_to_load']= array('varian-page.js');
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/pages/v_varian');
		$this->load->view('admin/template/v_admin_footer', $data);

		// if($this->session->userdata('status') != "online"){
		// 	redirect(base_url("page404"), 'refresh');
		// }
	}

	public function profil()
	{
		$data['js_to_load']= array('profil-page.js');
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/pages/v_profil');
		$this->load->view('admin/template/v_admin_footer', $data);

		// if($this->session->userdata('status') != "online"){
		// 	redirect(base_url("page404"), 'refresh');
		// }
	}
}
