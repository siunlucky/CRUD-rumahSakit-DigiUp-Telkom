<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Departemen extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrasi_model', 'administrasi');
		$this->load->model('dokter_model', 'dokter');
		$this->load->model('departemen_model', 'departemen');
		$this->load->library('form_validation');
	}

	//field tabel
	// var $data = [
	// 	'nama' => '',
	// 	'harga' => '',
	// 	'gambar' => '',
	// 	'stok' => '',
	// 	'id_cafe' => '',
	// ];

	//nama model
	var $context = 'departemen';


	//http://localhost/rumah-sakit
	public function index()
	{
		$kw = $this->input->get('search');
		$data = array();
		$limit_per_page = 3;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->departemen->get_total();
		if (!empty($kw)) {
			$total_records = $this->departemen->get_total_search($kw);
		}
		if ($total_records > 0) {
			//get current page records
			$data["records"] = $this->departemen->pagination($limit_per_page, $start_index);
			if (!empty($kw)) {
				$data["records"] = $this->departemen->search($kw, $limit_per_page, $start_index);
			}
			$config['base_url'] = base_url() . "welcome/index"; //halaman tempat settingan url dari link pagination
			$config['total_rows'] = $total_records; //pengaturan jumlah dari seluruh record
			$config['per_page'] = $limit_per_page; //jumlah record yang ditampilkan perhalaman
			$config['uri_segment'] = 3;
			/*
			start 
			add boostrap class and styles
			*/
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['first_link'] = 'First';
			$config['last_link'] = 'Last';
			$config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['first_tag_close'] = '</span></li>';
			$config['prev_link'] = '&laquo';
			$config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['prev_tag_close'] = '</span></li>';
			$config['next_link'] = '&raquo';
			$config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['next_tag_close'] = '</span></li>';
			$config['last_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['last_tag_close'] = '</span></li>';
			$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close'] = '</span></li>';
			/*
			end 
			add boostrap class and styles
			*/
			$this->pagination->initialize($config);
			//build paging links
			$data["links"] = $this->pagination->create_links();
			$data['search'] = $kw;
		}
		$this->load->view('departemen/index', $data);
	}

	public function form()
	{
		$id = $this->uri->segment(3);
		if ($id) {
			$this->data = $this->departemen->find_by_id($id);
		}

		$this->load->view('departemen/form', $this->data);
	}

	function save()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('nama_departemen', 'nama_departemen', 'required');
		$this->data = [
			'nama_departemen' => $this->input->post('nama_departemen'),
		];

		if ($this->form_validation->run() == FALSE) {
			$this->form();
		} else {
			if ($id == '') {
				$this->departemen->insert($this->data);
			} else {
				$this->departemen->update($id, $this->data);
			}
			redirect(base_url('departemen'));
		}
	}
}
