<?php
class model_ujian extends CI_Model {
    private $table_ujian = 'tb_ujian';
    private $table_soal = 'tb_soal';
    private $table_jawaban_siswa = 'tb_jawaban_siswa';
	private $table_hasil_ujian = 'tb_hasil_ujian';

//menampilkan informasi tentang ujian

function prep_info_ujian_awal($id_ujian){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->where('id_ujian',$id_ujian);
$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}

function prep_info_ujian($id_ujian){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->where('id_ujian',$id_ujian);
$query = $this->db->get();
return $query->row();
/*$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }*/
    
}


//menampilkan ujian yang telah siap
/*function prep_ujian($kode_jurusan,$nis){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_detail_kelas', 'tb_detail_kelas.nis = 7364');
$this->db->where('kode_jurusan',$kode_jurusan);
$this->db->where('status','aktif');
$this->db->group_by('id_ujian'); 
$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    INNER JOIN tb_hasil_ujian ON tb_hasil_ujian.`id_ujian` = tb_ujian.`id_ujian`
}*/
function prep_ujian($nis, $kode_jurusan){
    $query = $this->db->query("SELECT *
            FROM tb_ujian
           INNER JOIN tb_detail_kelas ON tb_detail_kelas.`id_kelas` = tb_ujian.`id_kelas`
            INNER JOIN tb_kelas ON tb_kelas.`id_kelas` = tb_ujian.`id_kelas`
            INNER JOIN tb_mata_pelajaran ON tb_mata_pelajaran.`id_mata_pelajaran` = tb_ujian.`id_mp`
            INNER JOIN tb_guru ON tb_guru.`id_guru` = tb_mata_pelajaran.`id_guru`
            where status = 'aktif'
            and tb_kelas.`kode_jurusan` = '$kode_jurusan'
            AND tb_detail_kelas.`nis` = '$nis'
            and id_ujian NOT IN (select id_ujian from tb_hasil_ujian where id_siswa=$nis)
            GROUP BY id_ujian");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
//menampilkan semua ujian yang sudah dibuat oleh semua guru
function prep_monitor_ujian_admin(){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->limit(40);
    $this->db->order_by("id_ujian", "desc"); 
$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}

function filter_prep_monitor_ujian_admin($cari){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->like('id_ujian', $cari);
$this->db->or_like('kompetensi', $cari);
$this->db->or_like('kelas', $cari);
$this->db->or_like('jenis_ujian', $cari);
$this->db->or_like('tb_mata_pelajaran.kode_jurusan', $cari);
$this->db->or_like('tb_guru.nama_guru', $cari);
$this->db->or_like('tb_mata_pelajaran.pelajaran', $cari);
$this->db->order_by('tgl','DESC');
$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}

function prep_monitor_ujian_guru($id_guru){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->where('tb_guru.id_guru',$id_guru);
$this->db->order_by('tgl','DESC');
$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
function filter_prep_monitor_ujian_guru($id_guru,$cari){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->where('tb_guru.id_guru',$id_guru);
$this->db->where("(id_ujian LIKE '%".$cari."%' OR kelas LIKE '%".$cari."%' 
OR kompetensi LIKE '%".$cari."%' 
OR jenis_ujian LIKE '%".$cari."%' 
OR tb_mata_pelajaran.pelajaran LIKE '%".$cari."%' 
OR tb_mata_pelajaran.kode_jurusan LIKE '%".$cari."%'
OR tb_kelas.tahun LIKE '%".$cari."%'
    )");

$query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
//mengecek valid ujian
function prep_ujian2($kode_jurusan,$nis,$id_ujian){
    $query = $this->db->query("SELECT *
            FROM tb_ujian
            INNER JOIN tb_mata_pelajaran ON tb_mata_pelajaran.`id_mata_pelajaran` = tb_ujian.`id_mp`
            INNER JOIN tb_guru ON tb_guru.`id_guru` = tb_mata_pelajaran.`id_guru`
            INNER JOIN tb_detail_kelas ON tb_detail_kelas.`nis` = $nis
            INNER JOIN tb_kelas ON tb_kelas.`id_kelas` = tb_ujian.`id_kelas`
            where status = 'aktif' and id_ujian = $id_ujian");
    return $query->num_rows();
}

//menampilkan soal
function baca_soal($id_ujian,$posisi,$batas,$id_siswa){
	$a = (string)$id_siswa;
    $acak = substr($a, -1);
	switch ($acak) {
        case '0':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by pertanyaan desc limit $posisi,$batas");
            break;
        case '1':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by tingkat_kesulitan desc limit $posisi,$batas");
            break;
        case '2':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_a asc limit $posisi,$batas");
            break;
        case '3':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_b limit $posisi,$batas");
            break;
        case '4':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_e limit $posisi,$batas");
            break;
        case '5':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_d limit $posisi,$batas");
            break;
        case '6':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_c limit $posisi,$batas");
            break;
        case '7':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_d desc limit $posisi,$batas");
            break;
        case '8':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal_swap asc limit $posisi,$batas");
            break;
        case '9':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal_swap desc limit $posisi,$batas");
            break;   
        default:
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa FROM tb_soal WHERE id_ujian='".$id_ujian."' limit $posisi,$batas");
            break;
    }

    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
function baca_soal_2($id_ujian){
    $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal");
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
//membaca jawaban siswa
function baca_jawaban_siswa($id_siswa,$id_soal,$id_ujian){
	$query = $this->db->query("SELECT pilihan_jawaban FROM tb_jawaban_siswa where id_siswa='".$id_siswa."' and id_soal='".$id_soal."' and id_ujian='".$id_ujian."' ");
	 if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data = $row->pilihan_jawaban;
        }
        return $data;
    }
}

//melihat kunci jawaban
function baca_jawaban_soal($id_soal){
    $query = $this->db->query("SELECT jawaban FROM tb_soal where id_soal='".$id_soal."'");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data = $row->jawaban;
        }
        return $data;
    }
}

function update_jawaban_siswa($check,$keterangan,$id_siswa,$id_soal,$id_ujian){
	$this->db->query("UPDATE tb_jawaban_siswa SET pilihan_jawaban = '".$check."', keterangan = '".$keterangan."' where id_siswa='".$id_siswa."' and id_soal='".$id_soal."' and id_ujian='".$id_ujian."' ");
}
function update_waktu_jawaban_siswa($waktu_selesai,$id_siswa,$id_soal,$id_ujian){
    $this->db->query("UPDATE tb_jawaban_siswa SET waktu_selesai = '".$waktu_selesai."' where id_siswa='".$id_siswa."' and id_soal='".$id_soal."' and id_ujian='".$id_ujian."' ");
}
function insert_jawaban_siswa($check,$keterangan,$id_siswa,$id_soal,$id_ujian,$no){
    $this->db->query("insert into tb_jawaban_siswa(id_siswa,id_ujian,id_soal,pilihan_jawaban,keterangan,nomor) values('$id_siswa','$id_ujian','$id_soal','$check','$keterangan','$no')");
}

function lihat_junlah_soal($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_soal where id_ujian='".$id_ujian."'");
    return $query->num_rows();
}
function lihat_soal_sulit($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_soal where id_ujian='".$id_ujian."' and tingkat_kesulitan LIKE '%sulit%'");
    return $query->num_rows();
}
function lihat_soal_sedang($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_soal where id_ujian='".$id_ujian."' and tingkat_kesulitan LIKE '%sedang%'");
    return $query->num_rows();
}
function lihat_soal_mudah($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_soal where id_ujian='".$id_ujian."' and tingkat_kesulitan LIKE '%mudah%'");
    return $query->num_rows();
}
function lihat_soal_dijawab($id_siswa,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_siswa='".$id_siswa."' and id_ujian='".$id_ujian."' ");
    return $query->num_rows();
}

function dijawab_salah($id_siswa,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_siswa='".$id_siswa."' and id_ujian='".$id_ujian."' and keterangan='salah'");
    return $query->num_rows();
}

function dijawab_benar($id_siswa,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_siswa='".$id_siswa."' and id_ujian='".$id_ujian."' and keterangan='benar'");
    return $query->num_rows();
}

//melihat poin yang benar
function lihat_poin($id_siswa,$id_ujian){
    $query = $this->db->query("SELECT id_soal AS id_soal_swap,(SELECT poin FROM tb_soal WHERE id_soal=id_soal_swap) AS poin  FROM tb_jawaban_siswa WHERE id_siswa='".$id_siswa."' AND id_ujian='".$id_ujian."' AND keterangan='Benar'");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function standard_nilai($id_ujian){
    $query = $this->db->query("SELECT standard_nilai FROM tb_ujian where id_ujian='".$id_ujian."'");
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data = $row->standard_nilai;
        }
        return $data;
    }
}
function cek_telah_ujian($id_siswa,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_hasil_ujian where id_siswa='".$id_siswa."' and id_ujian='".$id_ujian."'");
    return $query->num_rows();
}

function insert_hasil_ujian($dijawab_benar,$dijawab_salah,$id_siswa,$id_ujian,$tidak_dijawab,$nilai,$ket,$jml_soal,$waktu){
    $this->db->query("insert into tb_hasil_ujian(id_siswa,id_ujian,benar,salah,kosong,skor,status,jml_soal,waktu) values('$id_siswa','$id_ujian','$dijawab_benar','$dijawab_salah','$tidak_dijawab','$nilai','$ket','$jml_soal','$waktu')");
}

function daftar_siswa_ikut_ujian($id_ujian){
        $query = $this->db->query("SELECT id_siswa FROM tb_jawaban_siswa where id_ujian='".$id_ujian."' ORDER BY id_siswa ASC");
        $i=1;
        $temp[0]="x";
        if($query->num_rows() > 0)
        {
        foreach ($query->result() as $row) {
            $id_siswa=$row->id_siswa;
            $temp[$i]=$row->id_siswa;      
            if ($id_siswa == $temp[$i-1]){
            }else {
            $data[] = $row;
            }
            $i++;
        }
        return $data;
    }
}
function daftar_siswa_ikut_ujian2($id_ujian){
        $query = $this->db->query("SELECT id_siswa FROM tb_jawaban_siswa where id_ujian='".$id_ujian."'  group by id_siswa ORDER BY id_siswa");
        return $query->num_rows();
    
}
function menjawab_benar($id_soal,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_soal='".$id_soal."' and id_ujian='".$id_ujian."' and keterangan='benar'");
    return $query->num_rows();
}
function menjawab_salah($id_soal,$id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_soal='".$id_soal."' and id_ujian='".$id_ujian."' and keterangan='salah'");
    return $query->num_rows();
}

function menjawab_a($id_soal,$id_ujian,$a){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_soal='".$id_soal."' and id_ujian='".$id_ujian."' and pilihan_jawaban='".$a."'");
    return $query->num_rows();
}
function jumlah_peserta_bagi_dua($id_ujian){
    $query = $this->db->query("SELECT id_ujian FROM tb_hasil_ujian where id_ujian='".$id_ujian."'");
    $peserta = $query->num_rows();
    $cekmod = $peserta % 2;
    if ($cekmod==1){$peserta--;}
    return $peserta/2;
}
function yang_benar_gol($id_ujian,$pos_a,$pos_b){
    $query = $this->db->query("SELECT id_siswa FROM tb_hasil_ujian where id_ujian='".$id_ujian."' order by skor desc limit $pos_a,$pos_b");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function insert_ujian($id_mata_pelajaran,$waktu,$standard_nilai,$id_kelas,$jenis_ujian,$kompetensi_dasar,$tanggal,$tipe_waktu){
         $this->db->query("insert into tb_ujian(id_mp,waktu,standard_nilai,id_kelas,status,jenis_ujian,kompetensi,tgl,tipe_waktu) values('$id_mata_pelajaran','$waktu','$standard_nilai','$id_kelas','tidak aktif','$jenis_ujian','$kompetensi_dasar','$tanggal','$tipe_waktu')");
}
function delete_ujian($id_ujian){
    $this->db->query("delete from tb_ujian where id_ujian='".$id_ujian."'");
}
function cek_siswa_yang_benar_gol($id_ujian,$id_siswa,$id_soal){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_siswa='".$id_siswa."' and id_ujian='".$id_ujian."' and  id_soal='".$id_soal."' and keterangan='benar'");
    return $query->num_rows();
}
function cek_ujian_hasil($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_hasil_ujian where id_ujian='".$id_ujian."'");
    return $query->num_rows();
}

function cek_ujian_jawaban($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_jawaban_siswa where id_ujian='".$id_ujian."'");
    return $query->num_rows();
}
function cek_ujian_mata_pelajaran($id_mp){
    $query = $this->db->query("SELECT * FROM tb_ujian where id_mp='".$id_mp."'");
    return $query->num_rows();
}
function cek_ujian_siswa($id_siswa){
    $query = $this->db->query("SELECT * FROM tb_hasil_ujian where id_siswa='".$id_siswa."'");
    return $query->num_rows();
}
function aktifkan($id_ujian){
    $this->db->query("UPDATE tb_ujian SET status = 'aktif' where id_ujian='".$id_ujian."'");
}
function nonaktifkan($id_ujian){
    $this->db->query("UPDATE tb_ujian SET status = 'tidak aktif' where id_ujian='".$id_ujian."'");
}

function info_ujian_real($id_ujian){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
$this->db->where('id_ujian',$id_ujian);
$query = $this->db->get();
return $query->row();   
}
function reset_ujian_siswa($id_ujian,$id_siswa){
    $this->db->query("delete from tb_hasil_ujian where id_ujian='".$id_ujian."' and id_siswa='".$id_siswa."'");
}
function reset_ujian_jawaban_siswa($id_ujian,$id_siswa){
    $this->db->query("delete from tb_jawaban_siswa where id_ujian='".$id_ujian."' and id_siswa='".$id_siswa."'");
}
function info_hasil_ujian($id_ujian,$id_siswa){
$this->db->select('*');
$this->db->from('tb_hasil_ujian');
$this->db->where('id_ujian',$id_ujian);
$this->db->where('id_siswa',$id_siswa);
$query = $this->db->get();
return $query->row();   
}
function info_waktu_hasil_ujian($id_ujian,$id_siswa){
$this->db->select('waktu');
$this->db->from('tb_hasil_ujian');
$this->db->where('id_ujian',$id_ujian);
$this->db->where('id_siswa',$id_siswa);
$query = $this->db->get();
return $query->row();   
}
function info_waktu_ujian($id_ujian){
$this->db->select('*');
$this->db->from('tb_ujian');
$this->db->where('id_ujian',$id_ujian);
$query = $this->db->get();
return $query->row();   
}

function cek_ujian_aktif($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_ujian where id_ujian='".$id_ujian."' and status='tidak aktif'");
    return $query->num_rows();
}
function info_ujian($id_ujian){
$this->db->select('*');
$this->db->from($this->table_ujian);
$this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
$this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
$this->db->where('id_ujian',$id_ujian);
$query = $this->db->get();
return $query->row(); 
}

function update_ujian($id_ujian,$waktu,$standard_nilai,$id_kelas,$id_mata_pelajaran,$jenis_ujian,$kompetensi_dasar,$tanggal){
        $this->db->query("UPDATE tb_ujian SET id_mp = '".$id_mata_pelajaran."',waktu = '".$waktu."',id_kelas = '".$id_kelas."', standard_nilai = '".$standard_nilai."', jenis_ujian = '".$jenis_ujian."', kompetensi = '".$kompetensi_dasar."', tgl = '".$tanggal."' where id_ujian='".$id_ujian."'");
}

function waktuujiansama($id_kelas,$tanggal){
    $tanggal = substr($tanggal, 0,13);
    $this->db->select('*');
    $this->db->from($this->table_ujian);
    $this->db->join('tb_mata_pelajaran', 'tb_mata_pelajaran.id_mata_pelajaran = tb_ujian.id_mp');
    $this->db->join('tb_guru', 'tb_guru.id_guru = tb_mata_pelajaran.id_guru');
    $this->db->join('tb_kelas', 'tb_kelas.id_kelas = tb_ujian.id_kelas');
    $this->db->where('tb_ujian.id_kelas',$id_kelas);
    $this->db->like('tb_ujian.tgl', $tanggal);
    $query = $this->db->get();
    if($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
}
function baca_soal_laporan($id_ujian,$id_siswa){
    $a = (string)$id_siswa;
    $acak = substr($a, -1);
    switch ($acak) {
        case '0':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by pertanyaan desc");
            break;
        case '1':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by tingkat_kesulitan desc");
            break;
        case '2':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_a asc");
            break;
        case '3':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_b");
            break;
        case '4':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_e");
            break;
        case '5':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_d");
            break;
        case '6':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_c");
            break;
        case '7':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by p_d desc");
            break;
        case '8':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal_swap asc");
            break;
        case '9':
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' order by id_soal_swap desc limit $posisi,$batas");
            break;   
        default:
            $query = $this->db->query("SELECT pertanyaan,p_a,p_b,p_c,p_d,p_e,tingkat_kesulitan,jawaban,id_soal AS id_soal_swap,(SELECT pilihan_jawaban FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') AS jawaban_siswa,(SELECT waktu_selesai FROM tb_jawaban_siswa WHERE id_soal=id_soal_swap AND id_siswa='".$id_siswa."' AND id_ujian = '".$id_ujian."') as waktu_selesai FROM tb_soal WHERE id_ujian='".$id_ujian."' limit $posisi,$batas");
            break;
    }

    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
    
}
function hasil_ujianskor($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_hasil_ujian inner join tb_siswa on tb_siswa.nis = tb_hasil_ujian.id_siswa where id_ujian='".$id_ujian."' order by skor desc");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function hasil_ujiannis($id_ujian){
    $query = $this->db->query("SELECT * FROM tb_hasil_ujian inner join tb_siswa on tb_siswa.nis = tb_hasil_ujian.id_siswa where id_ujian='".$id_ujian."' order by nis asc");
     if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function list_siswa_tidak_ujian($id_kelas, $id_ujian){
    //$query = $this->db->query("SELECT * FROM tb_siswa WHERE `kode_jurusan` = $kode_jurusan AND nis NOT IN (SELECT nis FROM `tb_detail_kelas` WHERE id_kelas=$id_kelas) AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    // $query = $this->db->query("SELECT * FROM tb_siswa WHERE kode_jurusan = '$kode_jurusan' AND nis NOT IN (SELECT nis FROM `tb_detail_kelas` WHERE id_kelas='$id_kelas') AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    //$query = $this->db->query("SELECT * FROM tb_siswa WHERE kode_jurusan = '$kode_jurusan' AND nis NOT IN (SELECT tb_detail_kelas.`nis` FROM tb_detail_kelas.`id_kelas`='$id_kelas' and `tb_detail_kelas` INNER JOIN tb_kelas ON tb_kelas.`id_kelas` = tb_detail_kelas.`id_kelas` WHERE tb_kelas.`kode_jurusan`='$kode_jurusan' and tb_kelas.`tahun`='$tahun_cek') AND (tb_siswa.`nis` like '%$cari%' or tb_siswa.`nama` like '%$cari%')");
    //$query = $this->db->query("SELECT * FROM tb_siswa order by nis asc");
    //// and tb_kelas.`tahun`='$tahun'
    $query = $this->db->query("SELECT * FROM tb_detail_kelas 
        INNER JOIN tb_siswa ON tb_siswa.`nis` = tb_detail_kelas.`nis`
        WHERE tb_detail_kelas.`id_kelas` = '$id_kelas'
        AND tb_detail_kelas.nis NOT IN (
                        SELECT tb_hasil_ujian.`id_siswa` FROM `tb_hasil_ujian` 
                        WHERE tb_hasil_ujian.`id_ujian`='$id_ujian'
                        ) 
       ");
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