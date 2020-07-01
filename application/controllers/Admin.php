<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form', 'security');
		$this->load->library('user_agent');
	}

	public function index() {
		if ($this->db->get('user')->num_rows() > 0) {
			redirect(base_url('admin/login'), 'location');
		} else {
			redirect(base_url('admin/register'), 'location');
		}
	}

	public function login() {
		$this->load->view('admin/v_login');
	}

	public function register() {
		$this->load->view('admin/v_register');
	}

	public function aksiLogin() {
		$username = html_escape($this->input->post('username'));
		$password = md5(html_escape($this->input->post('password')));
		$where = array(
			'username' => $username,
			'password' => $password,
		);
		$cek = $this->db->query('SELECT u.id, u.nama, u.level FROM user u WHERE (u.username = \'' . $username . '\' AND u.password = \'' . $password . '\' ) OR ( email = \'' . $username . '\' AND u.password = \'' . $password . '\' )');
		if (!$cek) {
			redirect(base_url('admin/index/error'));
		} else {
			if ($cek->num_rows() > 0) {


				$fullname = $cek->row()->nama;
				$data_session = array(
					'id' => $cek->row()->id,
					'nama' => $fullname,
					'status' => "online",
					'level' => $cek->row()->level
				);

				$this->session->set_userdata($data_session);

				redirect(base_url("admin/dashboard"));
			} else {

				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
				<strong>gagal!</strong> Username atau password salah
				</div>');

				$this->agent->redirect_back();
			}
		}
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function dashboard() {
		$data['js_to_load'] = array('admin/js/dashboard-page.js', 'admin/js/analytics.js');
		$data['css_to_load'] = '';
		$data['jumlah'] = array(
			'menu' => $this->db->get('menu')->num_rows(),
			'testimonials' => $this->db->get('testimonials')->num_rows(),
			'gallery' => $this->db->get('gallery')->num_rows(),
		);
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function testimoni() {
		$data['js_to_load'] = array('admin/js/testimoni-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_testimoni');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function menu() {
		$data['js_to_load'] = array('admin/js/menu-page.js');
		$data['css_to_load'] = '';
		$profil = $this->db->get('profil');
		$data['profil'] = $profil->result()[0];

		$this->db->select('m.*, mc.category');
		$this->db->from('menu m');
		$this->db->join('menu_category mc', 'm.menu_category_id = mc.id');
		$menu = $this->db->get();
		$data['menu'] = $menu->result();

		$category = $this->db->get('menu_category');
		$data['category'] = $category->result();

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_menu');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function kategori() {
		$data['js_to_load'] = array('admin/js/kategori-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$main['category'] = $this->db->get('menu_category')->result();

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_kategori', $main);
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function profil() {
		$query = $this->db->get('profil');
		$data['profil_count'] = $query->num_rows();
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'logo_path' => '',
				'name' => '',
				'email' => '',
				'phone' => '',
				'alamat' => '',
				'tentang' => '',
				'Lat' => '',
				'Lng' => '',
			];
		}
		$data['js_to_load'] = array('admin/js/profil-page.js', 'admin/js/map-profile.js');
		$data['css_to_load'] = array('admin/css/map.css');

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_profil', $data);
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function medsos() {
		$data['js_to_load'] = array('admin/js/medsos-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_medsos');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function tambah_gambar() {
		$data['js_to_load'] = array('vendor/dropzone/dist/dropzone.min.js', 'admin/js/tambah-gambar-page.js');
		$data['css_to_load'] = array('vendor/dropzone/dist/dropzone.min.css', 'vendor/dropzone/dist/basic.min.css');
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_tambah_gambar');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function jam_buka() {
		$data['js_to_load'] = array('admin/js/jambuka-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_jambuka');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function promo() {
		$data['js_to_load'] = array('admin/js/promo-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_promo');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function tambahpromo() {
		$data['js_to_load'] = array('admin/js/promo-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_tambah_promo');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}

	public function akun() {
		$data['js_to_load'] = array('admin/js/akun-page.js');
		$data['css_to_load'] = '';

		if ($this->session->level == 1) {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result()[0];

			$this->load->view('admin/template/v_admin_header', $data);
			$this->load->view('admin/pages/v_akun');
			$this->load->view('admin/template/v_admin_footer', $data);

			if ($this->session->userdata('status') != "online") {
				$query = $this->db->get('profil');
				$data['profil'] = $query->result();
				$data['body_id'] = array('single-page');
				$data['js_to_load'] = array('');
				$this->load->view('template/style', $data);
				$this->load->view('template/header', $data);
				$this->load->view('errors/html/error_404');
				$this->load->view('template/footer', $data);
				$this->load->view('template/script', $data);
			}
		} else {
			echo 'Maaf anda tidak memilik hak akses';
		}
	}

	public function tambahakun() {
		if ($this->session->level == 1) {
			$data['js_to_load'] = array('admin/js/akun-page.js');
			$data['css_to_load'] = '';
			$query = $this->db->get('profil');
			$data['profil'] = $query->result()[0];

			$this->load->view('admin/template/v_admin_header', $data);
			$this->load->view('admin/pages/v_tambah_akun');
			$this->load->view('admin/template/v_admin_footer', $data);

			if ($this->session->userdata('status') != "online") {
				$query = $this->db->get('profil');
				$data['profil'] = $query->result();
				$data['body_id'] = array('single-page');
				$data['js_to_load'] = array('');
				$this->load->view('template/style', $data);
				$this->load->view('template/header', $data);
				$this->load->view('errors/html/error_404');
				$this->load->view('template/footer', $data);
				$this->load->view('template/script', $data);
			}
		} else {
			echo 'Maaf anda tidak memilik hak akses';
		}
	}

	public function editakun() {
		$data['js_to_load'] = array('admin/js/akun-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		$data['profil'] = $query->result()[0];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_edit_akun');
		$this->load->view('admin/template/v_admin_footer', $data);

		if ($this->session->userdata('status') != "online") {
			$query = $this->db->get('profil');
			$data['profil'] = $query->result();
			$data['body_id'] = array('single-page');
			$data['js_to_load'] = array('');
			$this->load->view('template/style', $data);
			$this->load->view('template/header', $data);
			$this->load->view('errors/html/error_404');
			$this->load->view('template/footer', $data);
			$this->load->view('template/script', $data);
		}
	}
}
