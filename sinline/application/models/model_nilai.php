<?php 
class model_nilai extends CI_Model {

function list_nilai($nis){
	$query = $this->db->query("SELECT tb_hasil_ujian.`id_ujian`,tb_ujian.`jenis_ujian`,tb_hasil_ujian.skor,tb_hasil_ujian.status,tb_hasil_ujian.waktu,
			tb_mata_pelajaran.`pelajaran`,tb_guru.`nama_guru`
			FROM tb_hasil_ujian
			INNER JOIN tb_ujian ON tb_ujian.`id_ujian` = tb_hasil_ujian.`id_ujian` 
			INNER JOIN tb_mata_pelajaran ON tb_mata_pelajaran.`id_mata_pelajaran` = tb_ujian.`id_mp`
			INNER JOIN tb_guru ON tb_guru.`id_guru` = tb_mata_pelajaran.`id_guru`
			WHERE tb_hasil_ujian.`id_siswa`=$nis");
	 if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function filter_nilai($nis,$cari){
	$query = $this->db->query("SELECT tb_hasil_ujian.`id_ujian`,tb_ujian.`jenis_ujian`,tb_hasil_ujian.skor,tb_hasil_ujian.status,tb_hasil_ujian.waktu,
			tb_mata_pelajaran.`pelajaran`,tb_guru.`nama_guru`
			FROM tb_hasil_ujian
			INNER JOIN tb_ujian ON tb_ujian.`id_ujian` = tb_hasil_ujian.`id_ujian` 
			INNER JOIN tb_mata_pelajaran ON tb_mata_pelajaran.`id_mata_pelajaran` = tb_ujian.`id_mp`
			INNER JOIN tb_guru ON tb_guru.`id_guru` = tb_mata_pelajaran.`id_guru`
			WHERE tb_hasil_ujian.`id_siswa`=$nis and 
			(tb_hasil_ujian.`status` like '%$cari%'
			or tb_hasil_ujian.`id_ujian` like '%$cari%'
			or tb_hasil_ujian.`skor` like '%$cari%'
			or tb_guru.`nama_guru` like '%$cari%'
			or tb_mata_pelajaran.`pelajaran` like '%$cari%'
			or tb_ujian.`jenis_ujian` like '%$cari%'
			) order by tb_hasil_ujian.`id_ujian`");
	 if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
}
?>
