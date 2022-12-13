<?php
require_once 'Base_model.php';
class Administrasi_model extends Base_Model
{

	//nama tabel
	var $table = "tbl_administrasi";
	public function find_all()
	{
		return $this->db->query("SELECT tbl_administrasi.*,tbl_dokter.nama_dokter as nama_dokter, tbl_departemen.nama_departemen as nama_departemen
			FROM tbl_administrasi 
			INNER JOIN tbl_dokter ON tbl_dokter.id = tbl_administrasi.id_dokter 
			INNER JOIN tbl_departemen ON tbl_departemen.id = tbl_administrasi.id_departemen")->result_array();
	}
	public function find_by_id($id)
	{
		return $this->db->query("SELECT tbl_administrasi.*,tbl_dokter.nama_dokter as nama_dokter, tbl_departemen.nama_departemen as nama_departemen
			FROM tbl_administrasi 
			INNER JOIN tbl_dokter ON tbl_dokter.id = tbl_administrasi.id_dokter 
			INNER JOIN tbl_departemen ON tbl_departemen.id = tbl_administrasi.id_departemen WHERE tbl_administrasi.id='$id'")->row_array();
	}
	public function pagination($limit, $start)
	{
		return $this->db->query("SELECT tbl_administrasi.*,tbl_dokter.nama_dokter as nama_dokter, tbl_departemen.nama_departemen as nama_departemen
			FROM tbl_administrasi 
			INNER JOIN tbl_dokter ON tbl_dokter.id = tbl_administrasi.id_dokter 
			INNER JOIN tbl_departemen ON tbl_departemen.id = tbl_administrasi.id_departemen  LIMIT $start,$limit")->result_array();
	}
	public function search($kw, $limit, $start)
	{
		if ($kw != '') {
			return $this->db->query("SELECT tbl_administrasi.*,tbl_dokter.nama_dokter as nama_dokter, tbl_departemen.nama_departemen as nama_departemen
			FROM tbl_administrasi 
			INNER JOIN tbl_dokter ON tbl_dokter.id = tbl_administrasi.id_dokter 
			INNER JOIN tbl_departemen ON tbl_departemen.id = tbl_administrasi.id_departemen WHERE tbl_administrasi.nama LIKE '%$kw%' LIMIT $start,$limit")->result_array();
		}
		return $this->pagination($limit, $start);
	}
	public function get_total_search($kw)
	{
		$rows = $this->db->query("SELECT tbl_administrasi.*,tbl_dokter.nama_dokter as nama_dokter, tbl_departemen.nama_departemen as nama_departemen
			FROM tbl_administrasi 
			INNER JOIN tbl_dokter ON tbl_dokter.id = tbl_administrasi.id_dokter 
			INNER JOIN tbl_departemen ON tbl_departemen.id = tbl_administrasi.id_departemen WHERE tbl_administrasi.nama LIKE '%$kw%'")->result_array();
		return count($rows);
	}
}
