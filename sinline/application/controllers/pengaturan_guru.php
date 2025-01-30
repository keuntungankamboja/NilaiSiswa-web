<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_guru extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('admin','guru'));
       	$this->load->model(array('model_ujian','model_user','model_pelajaran','model_guru','model_jurusan'));
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at httpp//.phpexample.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['guru']  = $this->model_guru->list_guru();
		$this->data['page']  = 'pengaturan_guru';
		$this->data['title'] = 'Pengaturan Guru';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function simpan_guru(){
		$id_guru      = $this->input->post('id_guru',true);
		$nama_guru    = $this->input->post('nama_guru',true);
		$kontak       = $this->input->post('kontak',true);
		$password     = sha1($this->input->post('password',true));
		$cek_guru     = $this->model_guru->cek_guru($id_guru);
		if ($cek_guru == 0 ) {
			$this->model_guru->insert_guru($id_guru,$nama_guru,$password,$kontak);
		} else {
			echo "<script>alert('ID Guru sudah digunakan, silahkan ganti dengan id yang lain');</script>";
		}
		$this->data['guru'] = $this->model_guru->list_guru();
		$this->load->view('pengaturan_ujian/view_tabel_guru',$this->data);
	}
	public function hapus(){
		$id_guru      = $this->uri->segment(3);
		$cek_guru     = $this->model_pelajaran->cek_guru($id_guru);
		if ($cek_guru == 0 )
		{
			$this->model_guru->delete_guru($id_guru);
			redirect("pengaturan_guru");
		} else {
			echo "<script>alert('Guru Tidak Dapat Di Hapus Karena digunakan');</script>";
			echo '<script type="text/javascript">window.location.href="..";</script>';
		}
	}
	public function edit(){
		$nis                 = $this->uri->segment(3);
		$this->data['guru']  = $this->model_user->info_guru($nis);
		$this->data['page']  = 'pengaturan_guru_edit';
		$this->data['title'] = 'Edit Guru';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function edit_act(){
		$id_guru   = $this->input->post('id_guru',true);
		$nama_guru = $this->input->post('nama_guru',true);
		$kontak    = $this->input->post('kontak',true);
		$this->model_guru->update_guru($id_guru, $nama_guru, $kontak);
		$link      = "pengaturan_guru/edit/".$id_guru;
		redirect($link);
	}

	public function filter_guru(){
		$cari = $this->input->post('cari',true);
		$this->data['guru'] = $this->model_guru->filter_guru($cari);
		$this->load->view('pengaturan_ujian/view_tabel_guru',$this->data);
	}

	public function reset_guru(){
		$id_guru  = $this->input->post('id_guru',true);
		$password = sha1($this->input->post('password',true));
		$this->model_guru->reset_guru($id_guru, $password);
		?>
		<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Password Guru Berhasil Di Reset
		</div>
		<?php
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */