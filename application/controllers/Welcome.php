<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('administrasi_model', 'administrasi');
		$this->load->helper('text');
	}

	//http://localhost/rumah-sakit
	public function index()
	{
		$kw = $this->input->get('search');
		$data = array();
		$limit_per_page = 3;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = $this->administrasi->get_total();
		if (!empty($kw)) {
			$total_records = $this->administrasi->get_total_search($kw);
		}
		if ($total_records > 0) {
			//get current page records
			$data["records"] = $this->administrasi->pagination($limit_per_page, $start_index);
			if (!empty($kw)) {
				$data["records"] = $this->administrasi->search($kw, $limit_per_page, $start_index);
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
		$this->load->view('welcome_message', $data);
	}
}
