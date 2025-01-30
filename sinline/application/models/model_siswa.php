<?php 
class model_siswa extends CI_Model {

function list_siswa(){
	$this->db->select('*');
	$this->db->from('tb_siswa');
	$this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_siswa.kode_jurusan');
    $this->db->limit(40);
    $this->db->order_by("nis", "desc"); 
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function filter_siswa($cari){
    $this->db->select('*');
    $this->db->from('tb_siswa');
    $this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_siswa.kode_jurusan');
    $this->db->like('nis', $cari);
    $this->db->or_like('nama', $cari);
    $this->db->or_like('angkatan', $cari); 
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
public function insert_siswa($nis,$nama_siswa,$password,$kode_jurusan,$angkatan,$kontak){
         $this->db->query("insert into tb_siswa (nis,nama,password,kode_jurusan,angkatan,kontak) values('$nis','$nama_siswa','$password','$kode_jurusan','$angkatan','$kontak')");
}
public function delete_siswa($nis){
    $this->db->query("delete from tb_siswa where nis='".$nis."'");
}
public function cek_siswa($nis){
    $query = $this->db->query("SELECT * FROM tb_siswa where nis='".$nis."'");
    return $query->num_rows();
}
function change_password_siswa($id_user,$password){
    $data = array(
            'password'=>$password);
    $this->db->where('nis', $id_user);
    $this->db->update('tb_siswa', $data);
}
function password_check_siswa($id_user,$password){
    $result = $this->db->get_where('tb_siswa', array(
            'nis' => $id_user, 'password' => $password))->row();
        return $result;
}

function update_siswa($nis, $nama_siswa, $kode_jurusan, $angkatan, $kontak){
        $this->db->query("UPDATE tb_siswa SET nama = '".$nama_siswa."',kode_jurusan = '".$kode_jurusan."',angkatan = '".$angkatan."', kontak = '".$kontak."' where nis='".$nis."'");
}
function reset_siswa($nis, $password){
        $this->db->query("UPDATE tb_siswa SET password = '".$password."' where nis='".$nis."'");
}
}
?>