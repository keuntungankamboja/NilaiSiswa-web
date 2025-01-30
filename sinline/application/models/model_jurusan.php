<?php 
class model_jurusan extends CI_Model {

function list_jurusan(){
	$this->db->select('*');
	$this->db->from('tb_jurusan');
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function insert_jurusan($kode_jurusan,$jurusan){
         $this->db->query("insert into tb_jurusan (kode_jurusan,jurusan) values('$kode_jurusan','$jurusan')");
}
function delete_jurusan($kode_jurusan){
    $this->db->query("delete from tb_jurusan where kode_jurusan='".$kode_jurusan."'");
}
function cek_jurusan($kode_jurusan){
    $query = $this->db->query("SELECT * FROM tb_jurusan where kode_jurusan='".$kode_jurusan."'");
    return $query->num_rows();
}
function cek_jurusan_siswa($kode_jurusan){
    $query = $this->db->query("SELECT * FROM tb_siswa where kode_jurusan='".$kode_jurusan."'");
    return $query->num_rows();
}
function cek_jurusan_mata_pelajaran($kode_jurusan){
    $query = $this->db->query("SELECT * FROM tb_mata_pelajaran where kode_jurusan='".$kode_jurusan."'");
    return $query->num_rows();
}
function info_jurusan($kode_jurusan)
{
    $this->db->select('*');
    $this->db->from('tb_jurusan');
    $this->db->where('kode_jurusan',$kode_jurusan);
    $query = $this->db->get();
    return $query->row();
}
function update_jurusan($kode_jurusan, $jurusan){
        $this->db->query("UPDATE tb_jurusan SET jurusan = '".$jurusan."' where kode_jurusan='".$kode_jurusan."'");
}
}
?>