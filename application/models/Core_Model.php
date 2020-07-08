<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Core_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->helper('security');
	}

	public function countAllRows($table, $where = NULL, $limit = NULL, $offset = NULL) {
		$res = $this->db->get_where($table, $where, $limit, $offset);
		return $res->num_rows();
	}

	public function getData($table, $limit = NULL, $offset = NULL) {
		$res = $this->db->get($table, $limit, $offset); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
		return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
	}

	public function getWhere($table, $where, $limit = NULL, $offset = NULL) {
		$res = $this->db->get_where($table, $where, $limit, $offset); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
		return $res;
	}

	public function insert($table, $data, $useGUID = TRUE) {
		if ($useGUID) $data['id'] = GUIDv4();
		$res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
		return $res; // Kode ini digunakan untuk mengembalikan hasil $res
	}

	public function update($table, $data, $where = NULL, $limit = NULL) {
		$res = $this->db->update($table, $data, $where, $limit); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
		return $res;
	}

	public function delete($table, $where = '', $limit = NULL, $reset_data = TRUE) {
		$res = $this->db->delete($table, $where, $limit, $reset_data); // Kode ini digunakan untuk menghapus record yang sudah ada
		return $res;
	}

	public function softDelete($table, $where = '') {
		$res = $this->db->update($table, array('deleted_at' => date_format(date_create(), 'Y-m-d H:i:s.u'), $where));
		return $res;
	}

	public function upload_gambar($name_attr, $config, $random_name = true) {

		if ($random_name === true) {
			$this->load->helper('string');
			$config['file_name'] = random_string('alnum', 8);
		}

		$this->load->library('upload', $config);

		return $this->upload->do_upload($name_attr);
	}
}
