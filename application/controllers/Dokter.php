<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once 'Base_Controller.php';

class Dokter extends Base_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('dokter_model', 'dokter');
        $this->load->library('form_validation');
    }

    //field tabel
    var $data = [
        'nama_dokter' => '',
    ];

    //nama model
    var $context = 'dokter';

    function form()
    {
        $id = $this->uri->segment(3);
        if ($id) {
            $this->data = $this->dokter->find_by_id($id);
        }
        $this->load->view('dokter/form', $this->data);
    }

    function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_dokter', 'nama_dokter', 'required');
        $this->data = [
            'nama_dokter' =>  $this->input->post('nama_dokter')

        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('dokter/form', $this->data);
        } else {
            if ($id == '') {
                $this->dokter->insert($this->data);
            } else {
                $this->dokter->update($id, $this->data);
            }
            redirect(base_url('dokter'));
        }
    }
}
