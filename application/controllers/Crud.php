<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Core_Model');
		$this->load->helper('file');
		$this->load->library('user_agent');
	}

	public function insert_menu() {
		if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => html_escape($this->input->post('code')),
				'name' => html_escape($this->input->post('name')),
				'description' => html_escape($this->input->post('description')),
				'price' => html_escape($this->input->post('price')),
				'food_category_id' => html_escape($this->input->post('category')),
			);

			$data = $this->Core_Model->insert('menu', $data);

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Success!</strong> Berhasil tambah data
            </div>');

			$this->agent->redirect_back();
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = '|gif|jpeg|jpg|png';
			$config['max_size']             = 8192;

			if (!$this->Core_Model->upload_gambar('image', $config)) {
				$error = '';
				$data['error'] = array($this->upload->display_errors());
				foreach ($data['error'] as $error_msg) {
					$error .= $error_msg . '<br/>';
				}
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong>' . $error . '
                </div>');
				$this->agent->redirect_back();
			} else {
				$data = array(
					'code' => html_escape($this->input->post('code')),
					'name' => html_escape($this->input->post('name')),
					'description' => html_escape($this->input->post('description')),
					'price' => html_escape($this->input->post('price')),
					'image_path' => html_escape(base_url('uploads/' . $this->upload->data("file_name"))),
					'food_category_id' => html_escape($this->input->post('category')),
				);

				$data = $this->Core_Model->insert('menu', $data);

				$config['image_library'] = 'gd2';
				$config['source_image'] = html_escape($this->upload->data('full_path'));
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 600;
				$config['height']       = 600;

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Success!</strong> Berhasil tambah data
                </div>');

				$this->agent->redirect_back();
			}
		}
	}

	public function edit_profil() {
		$query = $this->db->get('profil');

		if ($query->num_rows() == 0) {

			$data = array(
				'name' => html_escape($this->input->post('name')),
				'email' => html_escape($this->input->post('email')),
				'phone' => html_escape($this->input->post('phone')),
				'alamat' => html_escape($this->input->post('alamat')),
				'tentang' => html_escape($this->input->post('tentang'))
			);

			$data = $this->Core_Model->insert('profil', $data);
			$this->agent->redirect_back();
		} else {
			$data = array(
				'name' => html_escape($this->input->post('name')),
				'email' => html_escape($this->input->post('email')),
				'phone' => html_escape($this->input->post('phone')),
				'alamat' => html_escape($this->input->post('alamat')),
				'tentang' => html_escape($this->input->post('tentang'))
			);

			$this->db->update('profil', $data, array('id' => 1));
			$this->agent->redirect_back();
		}
	}

	public function success() {
		$this->load->view('template/style');
		$this->load->view('template/header');
		$this->load->view('public/v_regsuccess');
		$this->load->view('template/footer');
	}

	public function hapus($id, $table) {
		$this->Core_Model->delete($table, array('id' => $id));

		$this->agent->redirect_back();
	}

	public function edit($id) {
		if ($_FILES['edit-image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => html_escape($this->input->post('code')),
				'name' => html_escape($this->input->post('name')),
				'description' => html_escape($this->input->post('description')),
				'price' => html_escape($this->input->post('price')),
				'food_category_id' => html_escape($this->input->post('category'))
			);

			$this->db->where('id', $id);
			$data = $this->db->update('menu', $data);

			$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
			<strong>Success!</strong> Berhasil edit data
			</div>');

			$this->agent->redirect_back();
		} else {
			$config['upload_path']          = './uploads/';
			$config['allowed_types']        = '|gif|jpeg|jpg|png';
			$config['max_size']             = 8192;
			$config['max_width']            = 2048;
			$config['max_height']           = 2048;

			if (!$this->Core_Model->upload_gambar('edit-image', $config, false)) {
				$error = '';
				$data['error'] = array($this->upload->display_errors());
				foreach ($data['error'] as $error_msg) {
					$error .= $error_msg . '<br/>';
				}
				$this->session->set_flashdata('success', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong>' . $error . '
                </div>');
				$this->agent->redirect_back();
			} else {
				$data = array(
					'code' => html_escape($this->input->post('code')),
					'name' => html_escape($this->input->post('name')),
					'description' => html_escape($this->input->post('description')),
					'price' => html_escape($this->input->post('price')),
					'image_path' => html_escape(base_url('uploads/' . $this->upload->data("file_name"))),
					'food_category_id' => html_escape($this->input->post('category'))
				);

				$this->db->where('id', $id);
				$data = $this->db->update('menu', $data);

				$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
				<strong>Success!</strong> Berhasil edit data
				</div>');

				$this->agent->redirect_back();
			}
		}
	}


	public function update_category() {
		$data = array(
			'category' => html_escape($this->input->post('c')),
			'description' => html_escape($this->input->post('d')),
		);

		$this->db->update('food_category', $data, array('id' => intval(html_escape($this->input->post('id')))));

		$data = $this->db->get('food_category');

		echo json_encode($data->result_array());
	}

	public function insert_category() {
		$data = array(
			'category' => html_escape($this->input->post('category')),
			'description' => html_escape($this->input->post('description')),
		);

		$data = $this->Core_Model->insert('food_category', $data);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
		<strong>Success!</strong> Berhasil tambah data
		</div>');

		$this->agent->redirect_back();
	}

	public function upload_logo() {

		$config['upload_path']          = './bakul/';
		$config['allowed_types']        = '|gif|jpeg|jpg|png';
		$config['file_name']			= 'logo';
		$config['overwrite']			= true;
		$config['max_size']             = 2048;
		$config['max_width']            = 2048;
		$config['max_height']           = 2048;

		if (!$this->Core_Model->upload_gambar('edit-logo', $config, false)) {

			$data['error'] = array($this->upload->display_errors());

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
			<strong>Gagal!</strong> Upload gagal.
			</div>');

			foreach ($data['error'] as $error_msg) {
				echo $error_msg;
			}

			$this->agent->redirect_back();
		} else {
			$data = array(
				'logo_path' => html_escape(base_url('bakul/' . $this->upload->data("file_name")))
			);

			$this->db->update('profil', $data, array('id' => 1));

			$config['image_library'] = 'gd2';
			$config['source_image'] = html_escape($this->upload->data('full_path'));
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['width']         = 120;
			$config['height']       = 120;

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
			<strong>Success!</strong> Berhasil upload
			</div>');

			$this->agent->redirect_back();
		}
	}

	public function add_testimonial() {
		$data = array(
			'name' => html_escape($this->input->get('n')),
			'testimonial' => html_escape($this->input->get('t')),
			'rating' => html_escape($this->input->get('r')),
			'ip_address' => html_escape($_SERVER['REMOTE_ADDR']),
			'submited_date' => html_escape(date("Y-m-d")),
			'submited_time' => html_escape(date("H:i:s")),
			'status' => 0
		);

		$this->Core_Model->insert('testimonials', $data);

		$this->agent->redirect_back();
	}

	public function update_status_testimoni() {
		$this->db->where('id', html_escape($this->input->get('id')));
		$this->db->update('testimonials', array('status' => intval(html_escape($this->input->get('s')))));

		$this->agent->redirect_back();
	}

	public function select_time() {
		$this->db->where('day', html_escape($this->input->get('d')));
		$data = $this->db->get('open_hours');

		echo json_encode($data->result_array());
	}

	public function update_jambuka() {
		$data = array(
			'open_hour' => html_escape($this->input->post('open_hour')),
			'close_hour' => html_escape($this->input->post('close_hour')),
			'flag' => html_escape($this->input->post('flag')),
		);

		$this->db->where('day', html_escape($this->input->post('day')));
		$data = $this->db->update('open_hours', $data);

		$this->session->set_flashdata('success', '<div class="alert alert-success alert-dismissable" role="alert">
		<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
		<strong>Success!</strong> Berhasil edit data
		</div>');

		$this->agent->redirect_back();
	}

	public function medsos() {
		$data = array(
			'name' => html_escape($this->input->get('type')),
			'link' => html_escape($this->input->get('link')),
		);

		$x = $this->db->get_where('socmed', array('name' => html_escape($this->input->get('type'))));

		if ($x->num_rows() == 0) {
			$this->Core_Model->insert('socmed', $data);
		} else {
			$this->Core_Model->update('socmed', array('link' => html_escape($this->input->get('link'))), array('name' => html_escape($this->input->get('type'))));
		}

		$data = $this->db->get('socmed');

		echo json_encode($data->result_array());
	}
	public function upload_galeri() {

		$config['upload_path']   = FCPATH . '/uploads/gallery';
		$config['allowed_types'] = 'gif|jpg|png|ico';

		if ($this->Core_Model->upload_gambar('userfile', $config, false)) {
			$data = array(
				'image_path' => html_escape($this->upload->data('file_name')),
			);
			$this->db->insert('gallery', $data);
		}
	}

	public function insert_promo() {
		if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal!</strong> Pilih file terlebih dahulu
            </div>');

			$this->agent->redirect_back();
		} else {
			$config['upload_path']          = './uploads/promo';
			$config['allowed_types']        = '|gif|jpeg|jpg|png';
			$config['max_size']             = 8192;

			if (!$this->Core_Model->upload_gambar('image', $config, false)) {
				$error = '';
				$data['error'] = array($this->upload->display_errors());
				foreach ($data['error'] as $error_msg) {
					$error .= $error_msg . '<br/>';
				}
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong>' . $error . '
                </div>');
				$this->agent->redirect_back();
			} else {
				$data = array(
					'code' => html_escape($this->input->post('code')),
					'name' => html_escape($this->input->post('name')),
					'image_path' => html_escape(base_url('uploads/promo/' . $this->upload->data("file_name"))),
				);

				$data = $this->Core_Model->insert('promo', $data);

				$config['image_library'] = 'gd2';
				$config['source_image'] = html_escape($this->upload->data('full_path'));
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 600;
				$config['height']       = 600;

				$this->load->library('image_lib', $config);

				$this->image_lib->resize();

				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Success!</strong> Berhasil tambah data
                </div>');

				$this->agent->redirect_back();
			}
		}
	}
	public function edit_promo($id = 0) {
		if ($_FILES['edit-image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => html_escape($this->input->post('code')),
				'name' => html_escape($this->input->post('name')),
			);

			$this->db->where('id', $id);
			$data = $this->db->update('promo', $data);

			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
			<strong>Success!</strong> Berhasil edit data
			</div>');

			$this->agent->redirect_back();
		} else {
			$config['upload_path']          = './uploads/promo';
			$config['allowed_types']        = '|gif|jpeg|jpg|png';
			$config['max_size']             = 8192;

			if (!$this->Core_Model->upload_gambar('edit-image', $config, false)) {
				$error = '';
				$data['error'] = array($this->upload->display_errors());
				foreach ($data['error'] as $error_msg) {
					$error .= $error_msg . '<br/>';
				}
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong>' . $error . '
                </div>');
				$this->agent->redirect_back();
			} else {
				$data = array(
					'code' => html_escape($this->input->post('code')),
					'name' => html_escape($this->input->post('name')),
					'image_path' => html_escape(base_url('uploads/promo/' . $this->upload->data("file_name"))),
				);

				$this->db->where('id', $id);
				$data = $this->db->update('promo', $data);

				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
				<strong>Success!</strong> Berhasil edit data
				</div>');

				$this->agent->redirect_back();
			}
		}
	}

	public function add_account() {
		$data = array(
			'username' => html_escape($this->input->post('username')),
			'password' => md5(html_escape($this->input->post('password'))),
			'nama' => html_escape($this->input->post('nama')),
			'email' => html_escape($this->input->post('email')),
		);

		$cek = $this->db->query('SELECT id FROM user WHERE username =\'' . $data['username'] . '\' OR email = \'' . $data['email'] . '\'');
		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal!</strong> Username atau email sudah ada
            </div>');
		} else {
			if ($this->Core_Model->insert('user', $data)) {
				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Sukses!</strong> Akun anda sudah dibuat
                </div>');
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong> Terjadi masalah 
                </div>');
			}
		}

		$this->agent->redirect_back();
	}

	public function edit_account() {
		$data = array(
			'nama' => html_escape($this->input->post('nama')),
			'email' => html_escape($this->input->post('email')),
		);
		$cek = $this->db->query('SELECT id FROM user WHERE email = \'' . $data['email'] . '\'');
		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal Edit!</strong> Email sudah terdaftar
            </div>');
		} else {
			if ($this->db->update('user', $data, array('id' => html_escape($this->input->post('id'))))) {
				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Success!</strong> Berhasil edit data
                </div>');
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong> Terjadi masalah
                </div>');
			}
		}

		$this->agent->redirect_back();
	}

	public function edit_username() {
		$level = $this->session->level;
		if ($level != NULL) {
			$cek = $this->db->query('SELECT id FROM user WHERE username = \'' . html_escape($this->input->post('username')) . '\'');
			if ($cek->num_rows() == 0) {
				$old_username = $this->db->query('SELECT username FROM user WHERE id=' . html_escape($this->session->id))->row()->username;
				$new_username = html_escape($this->input->post('username'));
				if ($new_username != $old_username) {
					if ($this->db->update('user', array('username' => $new_username), array('id' => html_escape($this->session->id)))) {
						$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                        <strong>Success!</strong> Username telah diganti dari ' . $old_username . ' ke ' . $new_username . '</div>');
					} else {
						$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                        <strong>Gagal!</strong> Terjadi masalah
                        </div>');
					}
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                    <strong>Gagal!</strong> Username sama dengan sebelumnya.
                    </div>');
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong> Username sudah ada.
                </div>');
			}
		}
		$this->agent->redirect_back();
	}

	public function edit_password() {
		$level = $this->session->level;
		if ($level != NULL) {
			$cek = $this->db->query('SELECT password FROM user WHERE id = \'' . html_escape($this->session->id) . '\'');
			if ($cek->row()->password == md5(html_escape($this->input->post('old_password')))) {
				$new_password = md5(html_escape($this->input->post('new_password')));
				if ($this->db->update('user', array('password' => $new_password), array('id' => html_escape($this->session->id)))) {
					$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                    <strong>Success!</strong> Password telah diganti </div>');
				} else {
					$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                    <strong>Gagal!</strong> Terjadi masalah
                    </div>');
				}
			} else {
				$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Gagal!</strong> Password lama salah
                </div>');
			}
		}
		$this->agent->redirect_back();
	}

	public function get_location() {
		$data = $this->db->query('SELECT Lat, Lng FROM profil WHERE id = 1');

		echo json_encode($data->result_array());
	}

	public function update_location() {
		$data = array(
			'Lat' => html_escape($this->input->post('lat')),
			'Lng' => html_escape($this->input->post('lng')),
		);

		if ($this->db->update('profil', $data, array('id' => 1))) {
			$data = array(
				'status' => 'Berhasil!',
				'status_msg' => 'Lokasi telah diubah'
			);
		} else {
			$data = array(
				'status' => 'Gagal!',
				'status_msg' => 'Terjad masalah'
			);
		}

		$data['location'] = $this->db->query('SELECT Lat, Lng FROM profil WHERE id = 1')->result_array();

		echo json_encode($data);
	}
}
