<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index() {
		$data['profil'] = $this->db->get('profil')->result()[0];
		$data['open_hours'] = $this->db->get('open_hours')->result();
		$data['socmed'] = $this->db->get('socmed')->result();
		$data['body_id'] = array('single-page');
		$gmap_key = $this->siteconfig->getSettings()->gmap;
		if ($gmap_key) {
			$data['gmap_key'] = $gmap_key;
		}

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_kontak', $data);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
