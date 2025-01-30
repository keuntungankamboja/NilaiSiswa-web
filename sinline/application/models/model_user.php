<?php
class model_user extends CI_Model {
    private $table_siswa = 'tb_siswa';
    private $table_guru = 'tb_guru';
	private $table_admin = 'tb_admin';
 
function login_check_siswa($username,$password){
	$result = $this->db->get_where($this->table_siswa, array(
        	'nis' => $username, 'password' => $password))->row();
        return $result;
}

function login_check_guru($username,$password){
    $result = $this->db->get_where($this->table_guru, array(
            'id_guru' => $username, 'password' => $password))->row();
        return $result;
}

function login_check_admin($username,$password){
    $result = $this->db->get_where($this->table_admin, array(
            'nama' => $username, 'password' => $password))->row();
        return $result;
}

function info_siswa($nis){
    $result = $this->db->get_where($this->table_siswa, array(
            'nis' => $nis))->row();
        return $result;
}

function info_siswa2($nis)
{
    $this->db->select('*');
    $this->db->from($this->table_siswa);
    $this->db->join('tb_jurusan', 'tb_jurusan.kode_jurusan = tb_siswa.kode_jurusan');
    $this->db->where('nis',$nis);
    $query = $this->db->get();
    return $query->row();

}
function info_admin($id_user)
{
    $this->db->select('*');
    $this->db->from('tb_admin');
    $this->db->where('id',$id_user);
    $query = $this->db->get();
    return $query->row();

}
function info_guru($id_user)
{
    $this->db->select('*');
    $this->db->from('tb_guru');
    $this->db->where('id_guru',$id_user);
    $query = $this->db->get();
    return $query->row();

}
function change_password_admin($id_user,$password){
    $data = array(
            'password'=>$password);
    $this->db->where('id', $id_user);
    $this->db->update('tb_admin', $data);
}
function password_check_admin($id_user,$password){
    $result = $this->db->get_where('tb_admin', array(
            'id' => $id_user, 'password' => $password))->row();
        return $result;
}
}
?>