<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_jurusan extends CI_Controller {
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
		$this->data['jurusan'] = $this->model_jurusan->list_jurusan();
		$this->data['page']          = 'pengaturan_jurusan';
		$this->data['title'] = 'Pengaturan Jurusan';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function simpan_jurusan(){
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$jurusan = $this->input->post('jurusan',true);
		$cek_jurusan = $this->model_jurusan->cek_jurusan($kode_jurusan);
		if ($cek_jurusan == 0){
				$this->model_jurusan->insert_jurusan($kode_jurusan,$jurusan);
		}else {
				echo "<script>alert('kode jurusan sudah digunakan, silahkan ganti dengan yang lain');</script>";
		
		}

		
		$this->data['jurusan'] = $this->model_jurusan->list_jurusan();
		$this->load->view('pengaturan_ujian/view_tabel_jurusan',$this->data);
	}
	public function hapus(){
		$kode_jurusan = $this->uri->segment(3);
		$cek_jurusan_siswa = $this->model_jurusan->cek_jurusan_siswa($kode_jurusan);
		$cek_jurusan_mata_pelajaran = $this->model_jurusan->cek_jurusan_mata_pelajaran($kode_jurusan);
		if ($cek_jurusan_siswa == 0 and $cek_jurusan_mata_pelajaran == 0)
		{
			$this->model_jurusan->delete_jurusan($kode_jurusan);
			redirect("pengaturan_jurusan");
		} else {
			echo "<script>alert('Jurusan Tidak Dapat Di Hapus Karena digunakan');</script>";
			echo '<script type="text/javascript">window.location.href="..";</script>';
		}
	}
	public function edit(){
		$kode_jurusan = $this->uri->segment(3);
		$this->data['page']          = 'pengaturan_jurusan_edit';
		$this->data['title'] = 'Edit Jurusan';
		$this->data['jurusan'] = $this->model_jurusan->info_jurusan($kode_jurusan);
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function edit_act(){
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$jurusan = $this->input->post('jurusan',true);
		$this->model_jurusan->update_jurusan($kode_jurusan,$jurusan);
		$link = "pengaturan_jurusan/edit/".$kode_jurusan;
		redirect($link);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */