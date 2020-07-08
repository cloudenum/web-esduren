<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Core_Model');
	}

	public function index() {
		$profile = $this->db->get('profil');
		if ($this->Core_Model->countAllRows('user') < 1 || $profile->num_rows() < 1) {
			return redirect(base_url('admin'), 'location');
		}


		$data['profil'] = $profile->result()[0];
		$data['open_hours'] = $this->db->get('open_hours')->result();
		$data['socmed'] = $this->db->get('socmed')->result();
		$data['body_id'] = array('home-page');
		$data['js_to_load'] = array('rating.js', 'home.js');
		$data['promo'] = $this->db->get('promo')->result();

		$this->db->select('m.*, mc.category');
		$this->db->from('menu m');
		$this->db->join('menu_category mc', 'm.menu_category_id = mc.id');
		$data['menu'] = $this->db->get()->result();
		$data['home_settings'] = $this->siteconfig->getSettings()->pages->home;

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_home', $data);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
