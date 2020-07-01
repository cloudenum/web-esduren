<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index() {
		$data['profil'] = $this->db->get('profil')->result()[0];
		$data['body_id'] = array('single-page');
		$data['js_to_load'] = array('');
		$data['map_js'] = array('https://maps.googleapis.com/maps/api/js?key=AIzaSyADTzcHTc1GK8Aiy1nkfhToPKJ5IK9HrFc&callback=initMap');

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_kontak', $data);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
