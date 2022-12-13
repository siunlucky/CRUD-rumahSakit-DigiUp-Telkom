<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Administrasi extends Base_Controller
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
	var $data = [
		'no_rm' => '',
		'nama_pasien' => '',
		'alamat' => '',
		'jenis_kelamin' => '',
		'tgl_lahir' => '',
		'id_dokter' => '',
		'id_departemen' => '',
		'diagnosa' => '',
		'no_ruangan' => '',
	];

	//nama model
	var $context = 'administrasi';

	public function form()
	{
		$id = $this->uri->segment(3);
		if ($id) {
			$this->data = $this->administrasi->find_by_id($id);
		}
		$this->data['departemens'] = $this->departemen->find_all();
		$this->data['dokters'] = $this->dokter->find_all();
		$this->data['administrasi'] = $this->administrasi->find_all();

		$this->load->view('administrasi/form', $this->data);
	}

	function save()
	{
		$id = $this->input->post('id');
		$this->form_validation->set_rules('no_rm', 'no_rm', 'required');
		$this->form_validation->set_rules('nama_pasien', 'nama_pasien', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('tgl_lahir', 'tgl_lahir', 'required');
		$this->form_validation->set_rules('id_dokter', 'id_dokter', 'required');
		$this->form_validation->set_rules('id_departemen', 'id_departemen', 'required');
		$this->form_validation->set_rules('diagnosa', 'diagnosa', 'required');
		$this->form_validation->set_rules('no_ruangan', 'no_ruangan', 'required');

		$this->data = [
			'no_rm' => $this->input->post('no_rm'),
			'nama_pasien' => $this->input->post('nama_pasien'),
			'alamat' => $this->input->post('alamat'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'id_dokter' => $this->input->post('id_dokter'),
			'id_departemen' => $this->input->post('id_departemen'),
			'diagnosa' => $this->input->post('diagnosa'),
			'no_ruangan' => $this->input->post('no_ruangan'),
		];

		// Debugging
		// echo print_r($_FILES);
		// echo "<br><hr>";
		// echo print_r($_FILES['gambar']['name']);


		if ($this->form_validation->run() == FALSE) {
			$this->form();
		} else {
			if ($id == '') {
				$this->administrasi->insert($this->data);
			} else {
				$this->administrasi->update($id, $this->data);
			}
			redirect(base_url('welcome'));
		}
	}
	public function index()
	{
		$data['records'] = $this->{$this->context}->find_all();
		$this->load->view("welcome_message", $data);
	}
}
