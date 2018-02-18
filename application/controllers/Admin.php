<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('Core_Model');
		$this->load->helper('form');
		// if($this->session->userdata('status') == "online"){
		// 	redirect(base_url("admin/dashboard"));
		// }
	}

	public function index()
	{			
		$this->load->view('admin/v_login');
	}

	public function aksiLogin(){
		$username = html_escape($this->input->post('username'));
		$password = html_escape($this->input->post('password'));
		$where = array(
			'username' => $username,
			'password' => $password,
			);
		$cek = $this->Core_Model->getWhere("user", $where);
		if (!$cek){
			redirect(base_url('admin/index/error'));
		}else{
			if($cek->num_rows() > 0){

				// $query = "SELECT * FROM user WHERE username = '$username'";
			
				$fullname = $cek->row()->nama;
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
		$data['js_to_load']= array('admin/js/dashboard-page.js');
		$data['css_to_load'] = '';
		$data['jumlah']= array(
			'menu' => $this->db->query('SELECT count(id) as hasil FROM menu')->result(),
			'testimonials' => $this->db->query('SELECT count(id) as hasil FROM testimonials')->result(),
			'gallery' => $this->db->query('SELECT count(id) as hasil FROM gallery')->result(),
		);

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('admin/template/v_admin_footer', $data);
		
		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function testimoni()
	{
		$data['js_to_load']= array('admin/js/testimoni-page.js');
		$data['css_to_load'] = '';

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_testimoni');
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function varian()
	{
		$data['js_to_load']= array('admin/js/varian-page.js');
		$data['css_to_load'] = '';

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_varian');
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function profil()
	{
		$query = $this->db->get('profil');

		$data['profil'] = $query->result();
		
		$data['js_to_load']= array('admin/js/profil-page.js');
		$data['css_to_load'] = '';

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_profil', $data);
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function medsos()
	{
		$data['js_to_load']= array('admin/js/medsos-page.js');
		$data['css_to_load'] = '';

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_medsos');
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function tambah_gambar()
	{							
		$data['js_to_load']= array('vendor/dropzone/dist/dropzone.min.js', 'admin/js/tambah-gambar-page.js');
		$data['css_to_load'] = array('vendor/dropzone/dist/dropzone.min.css', 'vendor/dropzone/dist/basic.min.css');

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_tambah_gambar');
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}

	public function jam_buka()
	{							
		$data['js_to_load']= array('admin/js/jambuka-page.js');
		$data['css_to_load'] = '';

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_jambuka');
		$this->load->view('admin/template/v_admin_footer', $data);

		if($this->session->userdata('status') != "online"){
			redirect(base_url("page404"), 'refresh');
		}
	}
}
