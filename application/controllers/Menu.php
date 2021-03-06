<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller {

	public function index() {
		$profile = $this->db->get('profil');
		if ($profile->num_rows() > 0) {
			$data['profil'] = $profile->result()[0];
		} else {
			redirect('admin');
		}
		$this->db->order_by('id', "ASC");
		$data['open_hours'] = $this->db->get('open_hours')->result();
		$data['socmed'] = $this->db->get('socmed')->result();
		$data['body_id'] = array('single-page');

		$this->db->select('mc.*');
		$this->db->from('menu_category mc');
		$this->db->join('menu m', 'm.menu_category_id = mc.id');
		$this->db->group_by('mc.category');
		$this->db->order_by('mc.category');
		$main['categorized_menu'] = $this->db->get()->result();
		$add_menu = function ($category) {
			$this->db->select('m.*');
			$this->db->from('menu m');
			$this->db->join('menu_category mc', 'm.menu_category_id = mc.id');
			$this->db->where('m.menu_category_id', $category->id);
			$category->menus = $this->db->get()->result();
			return $category;
		};

		$main['categorized_menu'] = array_map($add_menu, $main['categorized_menu']);
		// var_dump($this->db->last_query());
		// $query = $this->db->query('SELECT * FROM menu WHERE food_category_id = ' . $category->id . ' ORDER BY food_category_id ASC');

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_menu', $main);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
