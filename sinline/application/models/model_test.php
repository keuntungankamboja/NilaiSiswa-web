<?php
class model_test extends CI_Model {
	private $tb_siswa = 'tb_siswa';
	function platform(){
	 	return $this->db->platform();
	}
	function version(){
	 	return $this->db->version();
	}
	function isitabelsiswa(){
		return $this->db->count_all($this->tb_siswa);
	}

	function lihatnis()
	{
		return $this->db->get('tb_siswa');
	}
}