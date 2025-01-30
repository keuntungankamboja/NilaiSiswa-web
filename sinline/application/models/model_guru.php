<?php 
class model_guru extends CI_Model {

function list_guru(){
	$this->db->select('*');
	$this->db->from('tb_guru');
    $this->db->limit(40);
    $this->db->order_by("id_guru", "desc"); 
	$query = $this->db->get();
	if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function filter_guru($cari){
    $this->db->select('*');
    $this->db->from('tb_guru');
    $this->db->like('id_guru', $cari);
    $this->db->or_like('nama_guru', $cari);
    $query = $this->db->get();
    if($query->num_rows() > 0)
    {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }
        return $data;
    }
}
function insert_guru($id_guru,$nama_guru,$password,$kontak){
    $this->db->query("insert into tb_guru(id_guru,nama_guru,password,kontak) values('$id_guru','$nama_guru','$password','$kontak')");
}
function cek_guru($id_guru){
    $query = $this->db->query("SELECT * FROM tb_guru where id_guru='".$id_guru."'");
    return $query->num_rows();
}
function delete_guru($id_guru){
    $this->db->query("delete from tb_guru where id_guru='".$id_guru."'");
}

function change_password_guru($id_user,$password){
    $data = array(
            'password'=>$password);
    $this->db->where('id_guru', $id_user);
    $this->db->update('tb_guru', $data);
}
function password_check_guru($id_user,$password){
    $result = $this->db->get_where('tb_guru', array(
            'id_guru' => $id_user, 'password' => $password))->row();
        return $result;
}
function update_guru($id_guru, $nama_guru, $kontak){
        $this->db->query("UPDATE tb_guru SET nama_guru = '".$nama_guru."',kontak = '".$kontak."' where id_guru='".$id_guru."'");
}
function reset_guru($id_guru, $password){
        $this->db->query("UPDATE tb_guru SET password = '".$password."' where id_guru='".$id_guru."'");
}
}
?>