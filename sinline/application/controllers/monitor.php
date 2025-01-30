<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class monitor extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        
        $this->lib_akses->akses(array('admin','guru'));
       	$this->load->model(array('model_ujian','model_user','model_kelas'));
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
		switch ($this->session->userdata('type')) {
			case 'guru':
				$info_ujian = $this->model_ujian->prep_monitor_ujian_guru($this->session->userdata('id_user'));
				break;
			case 'admin':
				$info_ujian = $this->model_ujian->prep_monitor_ujian_admin();
				break;
			default:
				echo "terjadi kesalahan system";
				exit();
				break;
		}
		$this->data['page']          = 'monitor';
		$this->data['info_ujian']          = $info_ujian;
		$this->load->view('view_monitor',$this->data);
	}

	public function monitor_ujian(){
		$id_monitor_ujian = $this->uri->segment(3);
		if (!empty($id_monitor_ujian)) {
			/*if ($query = $this->model_ujian->prep_info_ujian($id_monitor_ujian)){
				foreach ($query as $row) {
				$info_ujian['lama_ujian']  = $row->waktu;
				$info_ujian['id_monitor_ujian']  = $row->id_ujian;
				$info_ujian['pelajaran']   = $row->pelajaran;
				$info_ujian['nama_guru']= $row->nama_guru;
				$info_ujian['kompetensi']  = $row->kompetensi;
				$info_ujian['jenis_ujian'] = $row->jenis_ujian;
				$info_ujian['kelas'] = $row->kelas;
				$info_ujian['standard_nilai'] = $row->standard_nilai;
				$info_ujian['kode_jurusan'] = $row->kode_jurusan;
			}*/
			
			$this->data['page']          = 'monitor_ujian';
			$this->data['info_ujian']          = $this->model_ujian->prep_info_ujian($id_monitor_ujian);
			$this->data['siswa_tdk_ujian'] = $this->model_ujian->list_siswa_tidak_ujian($this->data['info_ujian']->id_kelas, $id_monitor_ujian);
			$this->data['jml_siswa_dalam_kelas']          = $this->model_kelas->isi_kelas($this->data['info_ujian']->id_kelas);
			$this->load->view('view_monitor',$this->data);
			}
			else{
				echo "kode ujian tidak ditemukan/tidak aktif";
				//redirect('ujian');
				exit();
				}
				
	}
	public function aktifkan(){
		$id_ujian = $this->uri->segment(3);
		$this->model_ujian->aktifkan($id_ujian);
		redirect('monitor');
	}

	public function nonaktifkan(){
		$id_ujian = $this->uri->segment(3);
		$this->model_ujian->nonaktifkan($id_ujian);
		redirect('monitor');
	}
	public function reset(){
		$id_monitor_ujian = $this->uri->segment(3);
		$id_monitor_siswa = $this->uri->segment(4);
		if (isset($id_monitor_ujian) and isset($id_monitor_siswa)) {
			$this->model_ujian->reset_ujian_jawaban_siswa($id_monitor_ujian,$id_monitor_siswa);
			$this->model_ujian->reset_ujian_siswa($id_monitor_ujian,$id_monitor_siswa);
		}
		$link = "monitor/monitor_ujian/".$id_monitor_ujian;
		redirect($link);
	
	}
	public function filter_monitor(){
		$cari = $this->input->post('cari',true);
		switch ($this->session->userdata('type')) {
			case 'guru':
				$info_ujian = $this->model_ujian->filter_prep_monitor_ujian_guru($this->session->userdata('id_user'),$cari);
				break;
			case 'admin':
				$info_ujian = $this->model_ujian->filter_prep_monitor_ujian_admin($cari);
				break;
			default:
				echo "terjadi kesalahan system";
				exit();
				break;
		}

		$this->data['info_ujian']          = $info_ujian;
		$this->load->view('monitor/view_tabel_monitor_list',$this->data);
	}
	public function monitor_ujian_siswa(){
		$id_monitor_ujian = $this->uri->segment(3);
		$id_monitor_siswa = $this->uri->segment(4);
		if (!empty($id_monitor_ujian) && !empty($id_monitor_siswa)) {
			
	
			//halaman
			$batas      = 3;
			$jml_soal   = $this->model_ujian->lihat_junlah_soal($id_monitor_ujian);
			$jmlhalaman = ceil($jml_soal/$batas);
			if ($this->uri->segment(5) === FALSE){	
				$posisi  =0;
				$halaman =1;

			} else {
				$halaman = $this->uri->segment(5);
				if (!is_numeric($halaman) || $halaman > $jmlhalaman ) {
					$posisi  =0;
					$halaman =1;

				}	else{
					$posisi  = ($halaman-1) * $batas;
				}
			}
			$this->data['soal'] = $this->model_ujian->baca_soal($id_monitor_ujian,$posisi,$batas,$id_monitor_siswa);
			$info_siswa = $this->model_user->info_siswa2($id_monitor_siswa);
			//tampilkan ke view
			$this->data['no']            = $posisi+1;
			$this->data['jmlhalaman']    = $jmlhalaman;
			$this->data['halaman']       = $halaman;
			$info_ujian['id_monitor_siswa']  = $id_monitor_siswa;
			$this->data['page']          = 'monitor_ujian_siswa';
			$this->data['info_ujian']          = $this->model_ujian->prep_info_ujian($id_monitor_ujian);
			$this->data['info_siswa']          = $info_siswa;
			$this->load->view('view_monitor',$this->data);
		}else{
			echo "tidak ditemukan/tidak aktif";
			//redirect('ujian');
			exit();
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */