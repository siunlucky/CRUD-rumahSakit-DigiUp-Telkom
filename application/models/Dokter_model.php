<?php
require_once 'Base_model.php';

class Dokter_model extends Base_Model
{
    var $table = "tbl_dokter";

    public function find_all()
    {
        return $this->db->query("SELECT tbl_dokter.* FROM tbl_dokter")->result_array();
    }
    public function find_by_id($id)
    {
        return $this->db->query("SELECT tbl_dokter.* FROM tbl_dokter WHERE tbl_dokter.id='$id'")->row_array();
    }
    public function pagination($limit, $start)
    {
        return $this->db->query("SELECT tbl_dokter.* FROM tbl_dokter LIMIT $start,$limit")->result_array();
    }
    public function search($kw, $limit, $start)
    {
        if ($kw != '') {
            return $this->db->query("SELECT tbl_dokter.* FROM tbl_dokter WHERE tbl_dokter.nama LIKE '%$kw%' LIMIT $start,$limit")->result_array();
        }
        return $this->pagination($limit, $start);
    }
    public function get_total_search($kw)
    {
        $rows = $this->db->query("SELECT tbl_dokter.* FROM tbl_dokter WHERE tbl_dokter.nama LIKE '%$kw%'")->result_array();
        return count($rows);
    }
}
