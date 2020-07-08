<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Core_Model');
		$this->load->helper(['file', 'json_helper', 'email_helper']);
		$this->load->library(array('user_agent', 'password_hash'));
	}

	public function insert_menu() {
		if ($_FILES['image']['error'] == UPLOAD_ERR_NO_FILE) {
			$data = array(
				'code' => html_escape($this->input->post('code')),
				'name' => html_escape($this->input->post('name')),
				'description' => html_escape($this->input->post('description')),
				'price' => html_escape($this->input->post('price')),
				'menu_category_id' => html_escape($this->input->post('category')),
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
					'menu_category_id' => html_escape($this->input->post('category')),
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
		$this->db->select('id');
		$query = $this->db->get('profil');
		$data = array(
			'name' => html_escape($this->input->post('name')),
			'email' => html_escape($this->input->post('email')),
			'phone' => html_escape($this->input->post('phone')),
			'alamat' => html_escape($this->input->post('alamat')),
			'tentang' => html_escape($this->input->post('tentang')),
		);

		if ($_FILES['resto_image']['error'] !== UPLOAD_ERR_NO_FILE) {
			$config['upload_path']          = './uploads/';
			$config['file_name']			= 'resto_image';
			$config['allowed_types']        = '|gif|jpeg|jpg|png';
			$config['max_size']             = 8192;
			$config['max_width']            = 4096;
			$config['max_height']           = 4096;

			if ($this->Core_Model->upload_gambar('resto_image', $config, false)) {
				$data['resto_image_path'] = base_url('uploads/') . $this->upload->data('file_name');
			} else {
				$error = '';
				$data['error'] = array($this->upload->display_errors());
				foreach ($data['error'] as $error_msg) {
					$error .= $error_msg . '<br/>';
				}
				$this->session->set_flashdata('alert', '<div class="alert alert-warning alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
				<strong>Failed!</strong>' . $error . '
				</div>');
				return 0;
			}
		}

		if ($query->num_rows() === 0) {
			$this->Core_Model->insert('profil', $data);
			$this->agent->redirect_back();
		} else {
			$this->Core_Model->update('profil', $data, array('id' => 1));
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
				'menu_category_id' => html_escape($this->input->post('category'))
			);

			$data = $this->Core_Model->update('menu', $data, array('id' => $id));

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
					'menu_category_id' => html_escape($this->input->post('category'))
				);

				$data = $this->Core_Model->update('menu', $data, array('id' => $id));

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

		$this->Core_Model->update('menu_category', $data, array('id' => intval(html_escape($this->input->post('id')))));

		$data = $this->db->get('menu_category');

		echo json_encode($data->result_array());
	}

	public function insert_category() {
		$data = array(
			'category' => html_escape($this->input->post('category')),
			'description' => html_escape($this->input->post('description')),
		);

		$data = $this->Core_Model->insert('menu_category', $data);

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
			$error = '';
			$data['error'] = array($this->upload->display_errors());
			foreach ($data['error'] as $error_msg) {
				$error .= $error_msg . '<br/>';
			}
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
			<strong>Gagal!</strong> ' . $error . '.
			</div>');

			$this->agent->redirect_back();
		} else {
			$data = array(
				'logo_path' => html_escape(base_url('bakul/' . $this->upload->data("file_name")))
			);

			$this->Core_Model->update('profil', $data, array('id' => 1));

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

	public function add_testimonial($type = 'standard') {
		$data = array(
			'name' => html_escape($this->input->get('name')),
			'testimonial' => html_escape($this->input->get('testimonial')),
			'rating' => html_escape($this->input->get('rating')),
			'ip_address' => html_escape($_SERVER['REMOTE_ADDR']),
			'submited_date' => html_escape(date("Y-m-d")),
			'submited_time' => html_escape(date("H:i:s")),
			'status' => 0
		);

		$this->Core_Model->insert('testimonials', $data);
		if ($type === 'standard') {
			$this->agent->redirect_back();
		} else {
			http_response_code(200);
			echo 'Success';
		}
	}

	public function update_status_testimoni() {
		$this->Core_Model->update(
			'testimonials',
			array('status' => intval(html_escape($this->input->get('s')))),
			array('id' => $this->input->get('id'))
		);

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

		$this->db->select('id');
		$this->db->where('day', $this->input->post('day'));
		$cek = $this->db->get('open_hours')->num_rows();

		if ($cek > 0) {
			$data = $this->Core_Model->update('open_hours', $data, array('day' => $this->input->post('day')));
		} else {
			$data['day'] = $this->input->post('day');
			$this->Core_Model->insert('open_hours', $data);
		}

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
			$this->Core_Model->insert('gallery', $data);
		}
	}

	public function upload_slide() {
		$success = false;
		$errors = NULL;
		$config['upload_path']   = FCPATH . '/uploads';
		$config['allowed_types'] = 'gif|jpg|png|ico';

		if ($_FILES['slidefile1']['error'] !== UPLOAD_ERR_NO_FILE) {
			$config['file_name'] = 'slide1';
			if ($this->Core_Model->upload_gambar('slidefile1', $config, false)) {
				$width = $this->upload->data('image_width');
				$height = $this->upload->data('image_height');

				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= html_escape($this->upload->data('full_path'));
				$config['x_axis']         	= $width - ($width % 9);
				$config['y_axis']       	= $height - ($height % 16);

				$this->load->library('image_lib', $config);
				$this->image_lib->crop();

				$this->site_config->changeSlideImage(
					base_url('uploads/') . $this->upload->data('file_name')
				);
				$success = true;
			} else {
				$errors = $this->upload->display_errors();
			}
		}

		if ($_FILES['slidefile2']['error'] !== UPLOAD_ERR_NO_FILE) {
			$config['file_name'] = 'slide2';
			if ($this->Core_Model->upload_gambar('slidefile2', $config, false)) {
				$width = $this->upload->data('image_width');
				$height = $this->upload->data('image_height');

				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= html_escape($this->upload->data('full_path'));
				$config['x_axis']         	= $width - ($width % 9);
				$config['y_axis']       	= $height - ($height % 16);

				$this->load->library('image_lib', $config);
				$this->image_lib->crop();

				$this->site_config->changeSlideImage(
					base_url('uploads/') . $this->upload->data('file_name'),
					1
				);
				$success = true;
			} else {
				$errors = $this->upload->display_errors();
			}
		}

		if ($success) {
			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Success!</strong> Berhasil ubah slide
                </div>');
		} else {
			$error = '';
			$data['error'] = array($errors);
			foreach ($data['error'] as $error_msg) {
				$error .= $error_msg . '<br/>';
			}

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal!</strong> ' . $error . '
            </div>');
		}

		$this->agent->redirect_back();
	}

	public function upload_background_testimoni() {
		$success = false;
		$errors = NULL;
		$config['upload_path']   = FCPATH . '/uploads';
		$config['allowed_types'] = 'gif|jpg|png|ico';

		if ($_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
			$config['file_name'] = 'slide1';
			if ($this->Core_Model->upload_gambar('image', $config, false)) {
				$width = $this->upload->data('image_width');
				$height = $this->upload->data('image_height');

				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= html_escape($this->upload->data('full_path'));
				$config['x_axis']         	= $width - ($width % 9);
				$config['y_axis']       	= $height - ($height % 16);

				$this->load->library('image_lib', $config);
				$this->image_lib->crop();

				$this->site_config->setBackgroundTestimoni(base_url('uploads/' . $this->upload->data('file_name')));
				$success = true;
			} else {
				$errors = $this->upload->display_errors();
			}
		}

		if ($success) {
			$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
                <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
                <strong>Success!</strong> Berhasil ubah setting
                </div>');
		} else {
			$error = '';
			$data['error'] = array($errors);
			foreach ($data['error'] as $error_msg) {
				$error .= $error_msg . '<br/>';
			}

			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal!</strong> ' . $error . '
            </div>');
		}

		$this->agent->redirect_back();
	}

	public function set_advanced_settings() {
		$data = array(
			'gtag' => html_escape($this->input->post('gtag')),
			'gmap' => html_escape($this->input->post('gmap')),
			'sendgrid_api' => html_escape($this->input->post('sendgrid')),
		);

		$resData = (object) [
			'message' => 'Failed'
		];

		if ($this->site_config->updateSettings($data)) {
			$resData->message = 'Settings updated';
			http_response_code(200);
		} else {
			http_response_code(400);
		}

		echo json_encode($resData);
	}

	public function get_site_settings() {
		$resData = (object) [
			'message' => 'Failed'
		];

		if ($resData->data = $this->site_config->getSettings()) {
			$resData->message = 'Success';
			http_response_code(200);
		} else {
			http_response_code(500);
		}

		echo json_encode($resData);
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
					'description' => html_escape($this->input->post('description')),
					'image_path' => html_escape(base_url('uploads/promo/' . $this->upload->data("file_name"))),
				);

				$data = $this->Core_Model->insert('promo', $data);
				$width = $this->upload->data('image_width');
				$height = $this->upload->data('image_height');

				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= html_escape($this->upload->data('full_path'));
				$config['x_axis']         	= $width - ($width % 9);
				$config['y_axis']       	= $height - ($height % 16);

				$this->load->library('image_lib', $config);

				$this->image_lib->crop();

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
				'description' => html_escape($this->input->post('description')),
			);

			$data = $this->Core_Model->update('promo', $data, array('id' => $id));

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
					'description' => html_escape($this->input->post('description')),
					'image_path' => html_escape(base_url('uploads/promo/' . $this->upload->data("file_name"))),
				);

				$data = $this->Core_Model->update('promo', $data, array('id' => $id));
				$width = $this->upload->data('image_width');
				$height = $this->upload->data('image_height');

				$config['image_library'] 	= 'gd2';
				$config['source_image'] 	= html_escape($this->upload->data('full_path'));
				$config['x_axis']         	= $width - ($width % 9);
				$config['y_axis']       	= $height - ($height % 16);

				$this->load->library('image_lib', $config);

				$this->image_lib->crop();

				$this->session->set_flashdata('alert', '<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
				<strong>Success!</strong> Berhasil edit data
				</div>');

				$this->agent->redirect_back();
			}
		}
	}

	public function add_account() {
		$numRows = $this->Core_Model->countAllRows('user');
		$data = array(
			'username' => html_escape($this->input->post('username')),
			'password' => $this->password_hash->hash(html_escape($this->input->post('password'))),
			'nama' => html_escape($this->input->post('nama')),
			'email' => html_escape($this->input->post('email')),
			'level' => $numRows === 0 ? 1 : 0
		);

		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('username', $data['username']);
		$this->db->or_where('email', $data['email']);
		$this->db->limit(1);
		$cek = $this->db->get();

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

		$this->db->select('id');
		$this->db->from('user');
		$this->db->where('email', $data['email']);
		$this->db->limit(1);
		$cek = $this->db->get();

		if ($cek->num_rows() > 0) {
			$this->session->set_flashdata('alert', '<div class="alert alert-danger alert-dismissable" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times" ></i></a>
            <strong>Gagal Edit!</strong> Email sudah terdaftar
            </div>');
		} else {
			if ($this->Core_Model->update('user', $data, array('id' => html_escape($this->input->post('id'))))) {
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
			$new_username = html_escape($this->input->post('username'));

			$this->db->select('id');
			$this->db->from('user');
			$this->db->where('username', $new_username);
			$this->db->limit(1);
			$cek = $this->db->get();

			if ($cek->num_rows() === 0) {
				$this->db->select('username');
				$this->db->from('user');
				$this->db->where('id', html_escape($this->session->id));
				$this->db->limit(1);
				$old_username = $this->db->get();
				if ($old_username) {
					$old_username = $old_username->row()->username;
					if ($new_username !== $old_username) {
						if ($this->Core_Model->update('user', array('username' => $new_username), array('id' => html_escape($this->session->id)))) {
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
			$this->db->select('password');
			$this->db->from('user');
			$this->db->where('id', html_escape($this->session->id));
			$this->db->limit(1);
			$cek = $this->db->get();

			if ($cek) {
				if ($cek->num_rows() > 0) {
					$old_password = html_escape($this->input->post('old_password'));
					$new_password = html_escape($this->input->post('new_password'));
					if ($this->password_hash->verify($old_password, $cek->row()->password)) {
						$new_password = $this->password_hash->hash($new_password);

						if ($this->Core_Model->update('user', array('password' => $new_password), array('id' => html_escape($this->session->id)))) {
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
			} else {
				log_message('debug', 'somehow the driver failed to get the user data');
			}
		}

		$this->agent->redirect_back();
	}

	public function get_location($type = 'latlng') {
		$data = [];
		if (strtolower($type) === 'placeid') {
			$this->db->select('maps_place_id');
			$this->db->where('id', 1);
			$data = $this->db->get('profil');
			if ($data->num_rows() > 0) {
				$data = $data->result()[0];
			} else {
				http_response_code(403);
			}
		} else {
			$this->db->select('Lat, Lng');
			$this->db->from('profil');
			$this->db->where('id', 1);
			$data = $this->db->get();
			if ($data->num_rows() > 0) {
				$data = $data->result_array();
				http_response_code(200);
			} else {
				http_response_code(403);
			}
		}

		echo json_encode($data);
	}

	public function update_location($type = 'latlng') {
		if (strtolower($type) === 'placeid') {
			$data = [
				'maps_place_id' => 'place_id:' . html_escape($this->input->post('maps_place_id'))
			];
		} else {
			$data = array(
				'Lat' => html_escape($this->input->post('lat')),
				'Lng' => html_escape($this->input->post('lng')),
			);
		}

		if ($this->Core_Model->update('profil', $data, array('id' => 1))) {
			$data = array(
				'status' => 'Berhasil!',
				'status_msg' => 'Lokasi telah diubah'
			);
			http_response_code(200);
		} else {
			$data = array(
				'status' => 'Gagal!',
				'status_msg' => 'Terjadi masalah'
			);
			http_response_code(400);
		}

		if (strtolower($type) === 'placeid') {
			$this->db->select('maps_place_id');
			$this->db->where('id', 1);
			$data['location'] = $this->db->get('profil')->result()[0];
		} else {
			$data['location'] = $this->db->query('SELECT Lat, Lng FROM profil WHERE id = 1')->result_array();
		}

		echo json_encode($data);
	}
}
