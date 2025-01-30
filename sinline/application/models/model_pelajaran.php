<?php 
class model_pelajaran extends CI_Model {

function list_pelajaran(){
	$this->db->select('*');
	$this->db->from('tb_mata_pelajaran');
	$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function list_pelajaran_guru($id_guru){
    $this->db->select('*');
    $this->db->from('tb_mata_pelajaran');
    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
    $this->db->where('tb_guru.id_guru', $id_guru);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
//pelajaran yang diajar guru berdasarkan jurusan
function list_pelajaran_guru_perjurusan($id_guru,$kode_jurusan,$tahun){
    $this->db->select('*');
    $this->db->from('tb_mata_pelajaran');
    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
    $this->db->where('tb_guru.id_guru', $id_guru);
    $this->db->where('tb_mata_pelajaran.kode_jurusan', $kode_jurusan);
    $this->db->where('tb_mata_pelajaran.tahun', $tahun);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function list_pelajaran_add(){
	$this->db->select('*');
	$this->db->from('tb_mata_pelajaran');
	$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
	$this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_mata_pelajaran.kode_jurusan');
    $this->db->limit(40);
    $this->db->order_by("id_mata_pelajaran", "desc"); 
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function filter_pelajaran($cari){
    $this->db->select('*');
    $this->db->from('tb_mata_pelajaran');
    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
    $this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_mata_pelajaran.kode_jurusan');
    $this->db->like('pelajaran', $cari);
    $this->db->or_like('tahun', $cari);
    $this->db->or_like('tb_jurusan.kode_jurusan', $cari);
    $this->db->or_like('tb_guru.nama_guru', $cari); 
    $this->db->or_like('tb_jurusan.kode_jurusan', $cari); 
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function insert_pelajaran($mata_pelajaran,$id_guru,$kode_jurusan,$tahun){
         $this->db->query("insert into tb_mata_pelajaran(pelajaran,id_guru,kode_jurusan,tahun) values('$mata_pelajaran','$id_guru','$kode_jurusan','$tahun')");
}
function delete_pelajaran($id_mp){
    $this->db->query("delete from tb_mata_pelajaran where id_mata_pelajaran='".$id_mp."'");
}
function cek_guru($id_guru){
    $query = $this->db->query("SELECT * FROM tb_mata_pelajaran where id_guru='".$id_guru."'");
    return $query->num_rows();
}
function info_pelajaran($id_mp)
{
    $this->db->select('*');
    $this->db->from('tb_mata_pelajaran');
    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
    $this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_mata_pelajaran.kode_jurusan');
    $this->db->where('id_mata_pelajaran',$id_mp);
    $query = $this->db->get();
    return $query->row();
}

function update_pelajaran($id_mp, $mata_pelajaran, $kode_jurusan, $id_guru,$tahun){
        $this->db->query("UPDATE tb_mata_pelajaran SET pelajaran = '".$mata_pelajaran."',kode_jurusan = '".$kode_jurusan."',id_guru = '".$id_guru."',tahun = '".$tahun."' where id_mata_pelajaran='".$id_mp."'");
}
}
?>
