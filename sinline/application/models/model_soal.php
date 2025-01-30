<?php 
class model_soal extends CI_Model {

function insert_soal($id_ujian,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesulitan,$poin){
    $this->db->query("insert into tb_soal (id_ujian,pertanyaan,p_a,p_b,p_c,p_d,p_e,jawaban,tingkat_kesulitan,poin) values('$id_ujian','$soal','$A','$B','$C','$D','$E','$jawaban',' $tingkat_kesulitan','$poin')");
}
function insert_soal_manual($id_ujian,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesulitan,$poin,$waktu_soal){
    $this->db->query("insert into tb_soal (id_ujian,pertanyaan,p_a,p_b,p_c,p_d,p_e,jawaban,tingkat_kesulitan,poin,waktu_soal) values('$id_ujian','$soal','$A','$B','$C','$D','$E','$jawaban',' $tingkat_kesulitan','$poin','$waktu_soal')");
}
function delete_soal($id_ujian,$id_soal){
    $this->db->query("delete from tb_soal where id_ujian='".$id_ujian."' and id_soal = '".$id_soal."'");
}
function update_soal($id_ujian,$id_soal,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesukaran,$poin){
        $this->db->query("UPDATE tb_soal SET pertanyaan = '".$soal."', p_a = '".$A."', p_b = '".$B."', p_c = '".$C."', p_d = '".$D."', p_e = '".$E."', jawaban = '".$jawaban."', tingkat_kesulitan = '".$tingkat_kesukaran."', poin = '".$poin."' where id_soal='".$id_soal."' and id_ujian='".$id_ujian."'");
}
function update_soal_manual($id_ujian,$id_soal,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesukaran,$poin,$waktu_soal){
        $this->db->query("UPDATE tb_soal SET pertanyaan = '".$soal."', p_a = '".$A."', p_b = '".$B."', p_c = '".$C."', p_d = '".$D."', p_e = '".$E."', jawaban = '".$jawaban."', tingkat_kesulitan = '".$tingkat_kesukaran."', poin = '".$poin."', waktu_soal = '".$waktu_soal."' where id_soal='".$id_soal."' and id_ujian='".$id_ujian."'");
}
function total_poin($id_ujian){
    $query = $this->db->query("SELECT poin FROM tb_soal where id_ujian='".$id_ujian."'");
    $data = 0;
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data += $row->poin;
        }
        return $data;
    }
}

function delete_semua_soal($id_ujian){
    $this->db->query("delete from tb_soal where id_ujian='".$id_ujian."'");
}
function baca_soal($id_ujian,$posisi,$batas){
    $query = $this->db->query("SELECT poin,pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal,waktu_soal FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal limit $posisi,$batas");
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
function info_soal($id_ujian,$id_soal){
  $this->db->select('*');
$this->db->from('tb_soal');
$this->db->where('id_ujian',$id_ujian);
$this->db->where('id_soal',$id_soal);
$query = $this->db->get();
return $query->row(); 
}
}
?>