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

	public function index()
	{			
		$this->load->view('admin/v_login');
	}

	public function aksiLogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password,
			'level' => 1
			);
		$cek = $this->Core_Model->getWhere("user", $where)->num_rows();
		
		if($cek > 0){

			$query = "SELECT * FROM user WHERE username = '$username'";
		
			$fullname = $this->db->query($query)->row()->fullname;
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
 
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function dashboard()
	{
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/v_dashboard');
		$this->load->view('admin/template/v_admin_footer');
		
		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function user()
	{
		$this->load->view('admin/template/v_admin_header');
		$this->load->view('admin/pages/v_user');
		$this->load->view('admin/template/v_admin_footer');

		// echo "
		// <script>
		//   $(function () {
		// 	$('#user-table').DataTable();
		//   })
		// </script>";

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

}
