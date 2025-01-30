<?php 
class model_kelas extends CI_Model {

function list_kelas(){
	$this->db->select('*');
	$this->db->from('tb_kelas');
    $this->db->limit(40);
    $this->db->order_by("id_kelas", "desc"); 
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function list_kelas_detail($id_kelas){
    $this->db->select('*');
    $this->db->from('tb_detail_kelas');
    $this->db->join('tb_siswa', 'tb_siswa.nis = tb_detail_kelas.nis');
    $this->db->order_by("tb_detail_kelas.nis", "ASC");
    $this->db->where('id_kelas',$id_kelas); 
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}

function list_siswa($kode_jurusan, $id_kelas, $cari, $angkatan, $tahun_cek){
    //$query = $this->db->query("SELECT * FROM tb_siswa WHERE `kode_jurusan` = $kode_jurusan AND nis NOT IN (SELECT nis FROM `tb_detail_kelas` WHERE id_kelas=$id_kelas) AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    // $query = $this->db->query("SELECT * FROM tb_siswa WHERE kode_jurusan = '$kode_jurusan' AND nis NOT IN (SELECT nis FROM `tb_detail_kelas` WHERE id_kelas='$id_kelas') AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    //$query = $this->db->query("SELECT * FROM tb_siswa WHERE kode_jurusan = '$kode_jurusan' AND nis NOT IN (SELECT tb_detail_kelas.`nis` FROM tb_detail_kelas.`id_kelas`='$id_kelas' and `tb_detail_kelas` INNER JOIN tb_kelas ON tb_kelas.`id_kelas` = tb_detail_kelas.`id_kelas` WHERE tb_kelas.`kode_jurusan`='$kode_jurusan' and tb_kelas.`tahun`='$tahun_cek') AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    //$query = $this->db->query("SELECT * FROM tb_siswa order by nis asc");
    //// and tb_kelas.`tahun`='$tahun'
    $query = $this->db->query("SELECT * FROM tb_siswa 
        WHERE kode_jurusan = '$kode_jurusan'
        AND angkatan = '$angkatan'
        AND nis NOT IN (
                        SELECT tb_detail_kelas.`nis` FROM `tb_detail_kelas` 
                        INNER JOIN tb_kelas ON tb_kelas.`id_kelas` = tb_detail_kelas.`id_kelas` 
                        WHERE tb_kelas.`kode_jurusan`='$kode_jurusan' and tb_kelas.`tahun`='$tahun_cek'
                        ) 
        AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function filter_kelas($cari){
    $this->db->select('*');
    $this->db->from('tb_kelas');
    $this->db->like('kelas', $cari);
    $this->db->or_like('tahun', $cari);
    $this->db->or_like('kode_jurusan', $cari);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function info_kelas($id_kelas){
    $result = $this->db->get_where('tb_kelas', array(
            'id_kelas' => $id_kelas))->row();
        return $result;
}

function insert_kelas($kelas,$kode_jurusan,$tahun){
    $this->db->query("insert into tb_kelas(kelas,kode_jurusan,tahun) values('$kelas','$kode_jurusan','$tahun')");
}
function insert_siswa_kelas($id_kelas,$nis){
    $this->db->query("insert into tb_detail_kelas(id_kelas,nis) values('$id_kelas','$nis')");
}
function cek_kelas($id_kelas){
    $query = $this->db->query("SELECT * FROM tb_kelas INNER JOIN tb_ujian ON tb_ujian.`id_kelas` = tb_kelas.`id_kelas`  where tb_kelas.`id_kelas`='".$id_kelas."'");
    return $query->num_rows();
}
function delete_kelas($id_kelas){
    $this->db->query("delete from tb_kelas where id_kelas='".$id_kelas."'");
}
function delete_kelas2($id_kelas){
    $this->db->query("delete from tb_detail_kelas where id_kelas='".$id_kelas."'");
}
function delete_nis($id_kelas,$nis){
    $this->db->query("delete from tb_detail_kelas where id_kelas='".$id_kelas."' AND nis='".$nis."'");
}
function update_kelas($id_kelas, $kelas, $kode_jurusan, $tahun){
        $this->db->query("UPDATE tb_kelas SET kelas = '".$kelas."',kode_jurusan = '".$kode_jurusan."', tahun = '".$tahun."' where id_kelas='".$id_kelas."'");
}
function isi_kelas($id_kelas){
    $query = $this->db->query("SELECT * FROM tb_detail_kelas where id_kelas='".$id_kelas."'");
    return $query->num_rows();
}
}
?>