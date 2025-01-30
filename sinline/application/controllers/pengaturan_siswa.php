<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_siswa extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('admin','guru'));
       	$this->load->model(array('model_ujian','model_user','model_pelajaran','model_guru','model_jurusan','model_siswa'));
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
		$this->data['siswa'] = $this->model_siswa->list_siswa();
		$this->data['jurusan'] = $this->model_jurusan->list_jurusan();
		$this->data['page']          = 'pengaturan_siswa';
		$this->data['title']          = 'Pengaturan Siswa';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function simpan_siswa(){
	$nis = $this->input->post('nis',true);
    $nama_siswa = $this->input->post('nama_siswa',true);
    $password = sha1($this->input->post('password',true));
    $kode_jurusan = $this->input->post('kode_jurusan',true);
    $angkatan = $this->input->post('angkatan',true);
    $kontak = $this->input->post('kontak',true);
    $cek_siswa = $this->model_siswa->cek_siswa($nis);
    if ($cek_siswa == 0 ) {
			$this->model_siswa->insert_siswa($nis,$nama_siswa,$password,$kode_jurusan,$angkatan,$kontak);
		} else {
			echo "<script>alert('NIS sudah digunakan, silahkan ganti dengan NIS yang lain');</script>";
		}
	$this->data['siswa'] = $this->model_siswa->list_siswa();
	$this->load->view('pengaturan_ujian/view_tabel_siswa',$this->data);

	}
	public function hapus(){
		$nis = $this->uri->segment(3);
		$cek_siswa = $this->model_ujian->cek_ujian_siswa($nis);
		if ($cek_siswa == 0 )
		{
			$this->model_siswa->delete_siswa($nis);
			redirect("pengaturan_siswa");
		} else {
			echo "<script>alert('Siswa Tidak Dapat Di Hapus Karena digunakan');</script>";
			echo '<script type="text/javascript">window.location.href="..";</script>';
		}
	}
	public function edit(){
		$nis = $this->uri->segment(3);
		$this->data['page']          = 'pengaturan_siswa_edit';
		$this->data['title']          = 'Edit Siswa';
		$this->data['jurusan'] = $this->model_jurusan->list_jurusan();
		$this->data['siswa'] = $this->model_user->info_siswa2($nis);
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function edit_act(){
		$nis = $this->input->post('nis',true);
		$nama_siswa = $this->input->post('nama_siswa',true);
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$angkatan = $this->input->post('angkatan',true);
		$kontak = $this->input->post('kontak',true);
		//echo $kode_jurusan;
		$this->model_siswa->update_siswa($nis, $nama_siswa, $kode_jurusan, $angkatan, $kontak);
		$link = "pengaturan_siswa/edit/".$nis;
		redirect($link);
	}
	public function reset_siswa(){
		$nis = $this->input->post('nis',true);
    	$password = sha1($this->input->post('password',true));
		$this->model_siswa->reset_siswa($nis, $password);
		?>
		      <div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Password Siswa Berhasil Di Reset
</div>
		<?php
	}
	public function filter_siswa(){
		$cari = $this->input->post('cari',true);
		$this->data['siswa'] = $this->model_siswa->filter_siswa($cari);
		//echo $cari;
		$this->load->view('pengaturan_ujian/view_tabel_siswa',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */