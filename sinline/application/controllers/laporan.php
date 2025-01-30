<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        $this->load->helper('url');
        $this->lib_akses->akses(array('siswa','guru','admin'));
       	$this->load->model(array('model_nilai','model_ujian','model_user','model_kelas'));
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
		echo "string";
	}
	public function nilai(){
		 $cari2  = $this->input->post('cari2',true);
		 $this->session->set_userdata('cari2',$cari2);
		 redirect('laporan/nilai_act');

	}
	public function nilai_act(){
		 $this->data['list_nilai2'] = $this->model_nilai->filter_nilai($this->session->userdata('id_user'),$this->session->userdata('cari2'));
		 $this->data['info_siswa']  = $this->model_user->info_siswa2($this->session->userdata('id_user'));
		 $this->pdf->load_view('laporan/laporan_nilai_siswa',$this->data);
		 $this->pdf->render();
		 $file_laporan = $this->session->userdata('id_user')." nilai ".date("Y-m-d");		 
		 $this->pdf->stream($file_laporan." .pdf");
		 $this->session->unset_userdata('cari2');
	}
	public function detail_nilai(){
		$id_ujian = $this->uri->segment(3);
		$id_siswa = $this->session->userdata('id_user');

		$info_hasil['info'] = $this->model_ujian->info_hasil_ujian($id_ujian,$id_siswa);
		$info_hasil['info2'] = $this->model_ujian->info_ujian_real($id_ujian);
		$this->data['info_siswa']  = $this->model_user->info_siswa2($this->session->userdata('id_user'));
		$this->data['page'] = 'detail_nilai';
		$this->data['info_hasil'] = $info_hasil;
		
		$this->load->view('view_laporan',$this->data);
	}
	public function soal(){
		$id_ujian = $this->uri->segment(3);
		$id_siswa = $this->session->userdata('id_user');
		$cek_ujian_aktif=$this->model_ujian->cek_ujian_aktif($id_ujian);
		if (empty($cek_ujian_aktif)) {
			echo "Anda Tidak Memiliki Hak Untuk mengakses Halaman Ini<br>silahkan hubungi administrator";
			exit();
		}
		$this->data['soal'] = $this->model_ujian->baca_soal_laporan($id_ujian,$id_siswa);
		$info_hasil['info'] = $this->model_ujian->info_hasil_ujian($id_ujian,$id_siswa);
		$info_hasil['info2'] = $this->model_ujian->info_ujian_real($id_ujian);
		$this->data['info_siswa']  = $this->model_user->info_siswa2($this->session->userdata('id_user'));//
		$this->data['page'] = 'soal';
		$this->data['info_hasil'] = $info_hasil;
		$this->load->view('view_laporan',$this->data);

	}

	public function hasil_ujian(){
		$id_monitor_ujian = $this->uri->segment(3);
		$this->data['page'] = 'hasil_ujian';
		$this->data['info_ujian'] = $this->model_ujian->prep_info_ujian($id_monitor_ujian);
			$this->data['siswa_tdk_ujian'] = $this->model_ujian->list_siswa_tidak_ujian($this->data['info_ujian']->id_kelas, $id_monitor_ujian);
			$this->data['jml_siswa_dalam_kelas']          = $this->model_kelas->isi_kelas($this->data['info_ujian']->id_kelas);
		$this->load->view('view_laporan',$this->data);
	}
	public function analisis_soal(){
		$id_monitor_ujian = $this->uri->segment(3);
		if (!empty($id_monitor_ujian)) {
			$this->data['soal'] = $this->model_ujian->baca_soal_2($id_monitor_ujian);
			//tampilkan ke view
			$this->data['page']          = 'analisis_soal';
			$this->data['info_ujian']          = $this->model_ujian->prep_info_ujian($id_monitor_ujian);
			$this->load->view('view_laporan',$this->data);
		}else{
			echo "tidak ditemukan/tidak aktif";
			//redirect('ujian');
			exit();
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */