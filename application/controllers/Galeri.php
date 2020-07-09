<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Galeri extends CI_Controller {

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
		$data['css_to_load'] = [
			'https://unpkg.com/video.js@7/dist/video-js.min.css',
			'https://unpkg.com/@videojs/themes@1/dist/forest/index.css"'
		];
		$data['js_to_load'] = [
			'https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js',
			'https://vjs.zencdn.net/7.8.3/video.js'
		];

		$this->db->order_by('created_at', 'ASC');
		$main['gallery'] = $this->db->get('gallery')->result();

		$this->load->view('template/style', $data);
		$this->load->view('template/header', $data);
		$this->load->view('public/v_galeri', $main);
		$this->load->view('template/footer', $data);
		$this->load->view('template/script', $data);
	}
}
