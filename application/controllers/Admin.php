<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('form', 'security', 'json_helper'));
		$this->load->library(array('user_agent', 'password_hash'));
	}

	public function index() {
		if ($this->db->get('user')->num_rows() > 0) {
			redirect(base_url('admin/login'), 'location');
		} else {
			redirect(base_url('admin/register'), 'location');
		}
	}

	private function check_online() {
		if ($this->session->userdata('status') !== "online") {
			$this->session->sess_destroy();
			// show_error('Silahkan login kembali', 403, '403');
			show_404();
			exit(EXIT_SUCCESS);
		}

		return true;
	}

	public function login() {
		$this->session->sess_destroy();
		$query = $this->db->get('profil');
		$data['profil'] = $query->result();
		if (!$data['profil']) {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		} else {
			$data['profil'] = $data['profil'][0];
		}

		$this->load->view('admin/v_login', $data);
	}

	public function register() {
		$query = $this->db->get('profil');
		$data['profil'] = $query->result();
		if (!$data['profil']) {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		} else {
			$data['profil'] = $data['profil'][0];
		}

		$this->load->view('admin/v_register', $data);
	}

	public function aksiLogin() {
		$username = html_escape($this->input->post('username'));
		$password = html_escape($this->input->post('password'));

		$this->db->select('u.id, u.nama, u.level, u.password');
		$this->db->from('user u');
		$this->db->where('u.username', $username);
		$this->db->or_where('u.email', $username);
		$this->db->limit(1);
		$cek = $this->db->get();

		if ($cek) {
			if ($cek->num_rows() > 0) {
				if ($this->password_hash->verify($password, $cek->row()->password)) {
					$fullname = $cek->row()->nama;
					$data_session = array(
						'id' => $cek->row()->id,
						'nama' => $fullname,
						'status' => "online",
						'level' => $cek->row()->level
					);

					$this->session->set_userdata($data_session);
					$profile = $this->db->get('profil');
					if ($profile->num_rows() > 0) {
						return redirect("admin/dashboard");
					} else {
						return redirect('admin/profil');
					}
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
				<strong>gagal!</strong> Username atau password salah
				</div>');
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times"></i></a>
		<strong>gagal!</strong> Username atau password salah
		</div>');
			}
		}

		$this->agent->redirect_back();
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

	public function dashboard() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/dashboard-page.js', 'admin/js/analytics.js');
		$data['css_to_load'] = '';
		$data['jumlah'] = array(
			'menu' => $this->db->get('menu')->num_rows(),
			'testimonials' => $this->db->get('testimonials')->num_rows(),
			'gallery' => $this->db->get('gallery')->num_rows(),
		);
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function testimoni() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/testimoni-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_testimoni');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function menu() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/menu-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

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
	}

	public function kategori() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/kategori-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$main['category'] = $this->db->get('menu_category')->result();

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_kategori', $main);
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function profil() {
		$this->check_online();

		$this->db->limit(1);
		$query = $this->db->get('profil');
		$data['profil_count'] = $query->num_rows();
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->row();
		} else {
			$data['profil'] = (object) [
				'logo_path' => '',
				'name' => 'WEB-RESTO',
				'email' => '',
				'phone' => '',
				'alamat' => '',
				'tentang' => '',
				'Lat' => '',
				'Lng' => '',
				'resto_image_path' => ''
			];
		}
		$data['js_to_load'] = array('admin/js/profil-page.js', 'admin/js/map-profile.js');
		$data['css_to_load'] = array('admin/css/map.css');
		$gmap_key = $this->site_config->getSettings()->gmap;
		if ($gmap_key) {
			$data['gmap_key'] = $gmap_key;
			$data['map_js'] = 'https://maps.googleapis.com/maps/api/js?key=' . $gmap_key . '&callback=initMap&libraries=places&v=weekly';
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_profil', $data);
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function medsos() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/medsos-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_medsos');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function tambah_gambar() {
		redirect('admin/tambah_gallery');
	}

	public function tambah_gallery() {
		$this->check_online();

		$data['js_to_load'] = array(
			'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js',
			'https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js',
			'https://vjs.zencdn.net/7.8.3/video.js',
			'admin/js/tambah-gambar-page.js',
		);
		$data['css_to_load'] = array(
			'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css',
			'https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/basic.min.css',
			'https://unpkg.com/video.js@7/dist/video-js.min.css',
			'https://unpkg.com/@videojs/themes@1/dist/forest/index.css"'
		);
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->db->order_by('created_at', 'ASC');
		$gallery = $this->db->get('gallery');
		$main['gallery'] = $gallery->result();

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_tambah_gambar', $main);
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function setting() {
		$this->check_online();

		$data['js_to_load'] = array(
			'admin/js/settings-page.js'
		);
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}
		$main['settings'] = (object) [
			"gtag" => "",
			"gmap" => "",
			"pages" => (object) [
				"home" => (object) [
					"slides" => [],
					"backgroundTestimoni" => ''
				],
				"menu" => (object) [
					"headerImage" => ""
				],
				"gallery" => (object) [
					"headerImage" => ""
				],
				"contact" => (object) [
					"headerImage" => ""
				]
			]
		];

		$settings =  $this->site_config->getSettings();
		$main['settings'] = $settings ? $settings : $main['settings'];

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_setting', $main);
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function jam_buka() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/jambuka-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_jambuka');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function promo() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/promo-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}
		$data['promo'] = $this->db->get('promo')->result();

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_promo');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function tambahpromo() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/promo-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_tambah_promo');
		$this->load->view('admin/template/v_admin_footer', $data);
	}

	public function akun() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/akun-page.js');
		$data['css_to_load'] = '';

		if ($this->session->level == 1) {
			$query = $this->db->get('profil');
			if ($query->num_rows() > 0) {
				$data['profil'] = $query->result()[0];
			} else {
				$data['profil'] = (object) [
					'name' => 'WEB-RESTO',
					'email' => '',
					'tentang' => '',
					'phone' => '',
				];
			}

			$this->load->view('admin/template/v_admin_header', $data);
			$this->load->view('admin/pages/v_akun');
			$this->load->view('admin/template/v_admin_footer', $data);

			if ($this->session->userdata('status') != "online") {
				show_404();
			}
		} else {
			echo 'Maaf anda tidak memilik hak akses';
		}
	}

	public function tambahakun() {
		$this->check_online();

		if ($this->session->level == 1) {
			$data['js_to_load'] = array('admin/js/akun-page.js');
			$data['css_to_load'] = '';
			$query = $this->db->get('profil');
			if ($query->num_rows() > 0) {
				$data['profil'] = $query->result()[0];
			} else {
				$data['profil'] = (object) [
					'name' => 'WEB-RESTO',
					'email' => '',
					'tentang' => '',
					'phone' => '',
				];
			}

			$this->load->view('admin/template/v_admin_header', $data);
			$this->load->view('admin/pages/v_tambah_akun');
			$this->load->view('admin/template/v_admin_footer', $data);

			if ($this->session->userdata('status') !== "online") {
				show_404();
			}
		} else {
			echo 'Maaf anda tidak memilik hak akses';
		}
	}

	public function editakun() {
		$this->check_online();

		$data['js_to_load'] = array('admin/js/akun-page.js');
		$data['css_to_load'] = '';
		$query = $this->db->get('profil');
		if ($query->num_rows() > 0) {
			$data['profil'] = $query->result()[0];
		} else {
			$data['profil'] = (object) [
				'name' => 'WEB-RESTO',
				'email' => '',
				'tentang' => '',
				'phone' => '',
			];
		}

		$this->load->view('admin/template/v_admin_header', $data);
		$this->load->view('admin/pages/v_edit_akun');
		$this->load->view('admin/template/v_admin_footer', $data);
	}
}
