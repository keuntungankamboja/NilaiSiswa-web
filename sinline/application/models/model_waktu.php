<?php 
class model_waktu extends CI_Model {

public function info_waktu($id_mata_pelajaran){
    $query = $this->db->query("SELECT * FROM tb_waktu where id_mata_pelajaran='".$id_mata_pelajaran."'");
    return $query->row();
}
public function cek_waktu($id_mata_pelajaran){
    $query = $this->db->query("SELECT * FROM tb_waktu where id_mata_pelajaran='".$id_mata_pelajaran."'");
    return $query->num_rows();
}
function update_waktu($id_mata_pelajaran, $sulit, $sedang,$mudah){
        $this->db->query("UPDATE tb_waktu SET sulit = '".$sulit."',sedang = '".$sedang."', mudah = '".$mudah."' where id_mata_pelajaran='".$id_mata_pelajaran."'");
}
function insert_waktu($id_mata_pelajaran,$sulit, $sedang,$mudah){
    $this->db->query("insert into tb_waktu(id_mata_pelajaran,sulit,sedang,mudah) values('$id_mata_pelajaran','$sulit','$sedang','$mudah')");
}
function total_waktu($id_ujian){
    $query = $this->db->query("SELECT sum(waktu_soal) as total from tb_soal where id_ujian='".$id_ujian."'");
    return $query->row();
}
function total_waktu_manual($id_ujian){
$this->db->select('*');
$this->db->from('tb_soal');
$this->db->join('tb_ujian', 'tb_ujian.id_ujian = tb_soal.id_ujian');
$this->db->join('tb_waktu', 'tb_waktu.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->where('tb_soal.id_ujian',$id_ujian);
$query = $this->db->get();
$total_w = 0;    
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
        	$tingkat = str_replace(" ", "", $row->tingkat_kesulitan);
            if ($tingkat=='sulit') {
            	$total_w = $total_w + $row->sulit;
            } else if ($tingkat=='sedang') {
            	$total_w = $total_w + $row->sedang;
            } else {
            	$total_w = $total_w + $row->mudah;
            } 
        }
    }
    return $total_w;
}
}
?>