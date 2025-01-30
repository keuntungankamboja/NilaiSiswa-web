<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_soal extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('guru'));
       	$this->load->model(array('model_ujian','model_user','model_pelajaran','model_soal','model_waktu'));
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
		echo "null";
	}
	public function buatsoal(){
		$id_ujian = $this->uri->segment(3);
		$this->data['info_ujian'] = $this->model_ujian->info_ujian_real($id_ujian);
		if ($this->data['info_ujian']->tipe_waktu==1) {
					$this->data['page']          = 'pengaturan_soal';
		} else {
					$this->data['page']          = 'pengaturan_soal_manual';
					$setting_waktunya = $this->model_waktu->info_waktu($this->data['info_ujian']->id_mp);
					if (empty($setting_waktunya)) {
						echo "<script>alert('Waktu Tingkat Soal Belum Diatur');</script>";
						exit();
					}else {
					$this->data['setting_waktunya'] =	$setting_waktunya;
					}
		}
		$this->data['jml_soal']  = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$this->data['jml_poin'] = 0;
		$this->data['jml_poin']  = $this->model_soal->total_poin($id_ujian);
		 $jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		$this->data['jenissoal']  = $jenissoal;
		$this->load->view('view_pengaturan_soal',$this->data);
	}

	public function tambah_soal(){
		$id_ujian = $this->input->post('id_ujian',true);
		$tingkat_kesukaran = $this->input->post('tingkat_kesukaran',true);
		$jawaban = $this->input->post('jawaban',true);
		$poin = $this->input->post('poin',true);
		$soal = $this->input->post('soal');
		$A = $this->input->post('pilihan_a');
		$B = $this->input->post('pilihan_b');
		$C = $this->input->post('pilihan_c');
		$D = $this->input->post('pilihan_d');
		$E = $this->input->post('pilihan_e');
		if(empty($id_ujian) || empty($tingkat_kesukaran) || empty($jawaban) || empty($poin) || empty($soal) || empty($A)|| empty($B) || empty($C) || empty($D) || empty($E))
		{
			echo "<script>alert('Gagal ditambahkan, Data soal belum lengkap');</script>";
		}
		else
		{
					$this->model_soal->insert_soal($id_ujian,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesukaran,$poin);
					echo "<script>alert('Soal baru berhasil ditambah');</script>";
		}
		 
		$jml_soal = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$jml_poin = 0;
		$jml_poin = $this->model_soal->total_poin($id_ujian);
		$jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";
	}
		public function tambah_soal_manual(){
		$id_ujian = $this->input->post('id_ujian',true);
		$tingkat_kesukaran = $this->input->post('tingkat_kesukaran',true);
		$jawaban = $this->input->post('jawaban',true);
		$poin = $this->input->post('poin',true);
		$soal = $this->input->post('soal');
		$A = $this->input->post('pilihan_a');
		$B = $this->input->post('pilihan_b');
		$C = $this->input->post('pilihan_c');
		$D = $this->input->post('pilihan_d');
		$E = $this->input->post('pilihan_e');
		if(empty($id_ujian) || empty($tingkat_kesukaran) || empty($jawaban) || empty($poin) || empty($soal) || empty($A)|| empty($B) || empty($C) || empty($D) || empty($E))
		{
			echo "<script>alert('Gagal ditambahkan, Data soal belum lengkap');</script>";
		}
		else
		{			
					$this->data['info_ujian'] = $this->model_ujian->info_ujian_real($id_ujian);

					$setting_waktunya = $this->model_waktu->info_waktu($this->data['info_ujian']->id_mp);
					if (empty($setting_waktunya)) {
						echo "<script>alert('Waktu Tingkat Soal Belum Diatur');</script>";
					} else {
						$sulit = $setting_waktunya->sulit;
						$sedang = $setting_waktunya->sedang;
						$mudah = $setting_waktunya->mudah;
					if ($tingkat_kesukaran >= $sulit) {
						$ts = "sulit";
					} else if ($tingkat_kesukaran >= $sedang) {
						# code...
						$ts = "sedang";
					} else {
						$ts = "mudah";
					}
					//tipe dari inputan guru
					//$total_waktuawal = $this->model_waktu->total_waktu_manual($id_ujian);
					//$total_waktu = $total_waktuawal->total + $tingkat_kesukaran;

					//tipe dari db
					$total_waktuawal = $this->model_waktu->total_waktu_manual($id_ujian);
					$total_waktu = $total_waktuawal + $tingkat_kesukaran;

					$waktu_ujian = $this->data['info_ujian']->waktu * 60;
					if ($total_waktu > $waktu_ujian) {
						echo "<script>alert('TOTAL WAKTU Adalah $total_waktu. Waktu Soal Habis, Tidak Bisa Menambah Waktu');</script>";
					} else {
					$this->model_soal->insert_soal_manual($id_ujian,$soal,$A,$B,$C,$D,$E,$jawaban,$ts,$poin,$tingkat_kesukaran);
					echo "<script>alert('Soal baru berhasil ditambah');</script>";
					}
					}
		}
		 
		$jml_soal = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$jml_poin = 0;
		$jml_poin = $this->model_soal->total_poin($id_ujian);
		$jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";
	}
	public function hapus_soal(){
		$id_ujian = $this->uri->segment(3);
		$id_soal = $this->uri->segment(4);
		$this->model_soal->delete_soal($id_ujian,$id_soal);
		$link = 'pengaturan_soal/tampil_soal/'.$id_ujian;
		redirect($link);
	}
	public function tampil_soal(){
		$id_ujian = $this->uri->segment(3);
		$this->data['info_ujian'] = $this->model_ujian->info_ujian_real($id_ujian);
		
		if ($this->data['info_ujian']->tipe_waktu==1) {
					$this->data['page']          = 'tampil_soal';
		} else {
					$this->data['page']          = 'tampil_soal_manual';
					$this->data['setting_waktunya'] = $this->model_waktu->info_waktu($this->data['info_ujian']->id_mp);
		}


		$this->data['jml_soal']  = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$this->data['jml_poin'] = 0;
		$this->data['jml_poin']  = $this->model_soal->total_poin($id_ujian);

		$batas      = 10;
			$jml_soal   = $this->model_ujian->lihat_junlah_soal($id_ujian);
			$jmlhalaman = ceil($jml_soal/$batas);
			if ($this->uri->segment(4) === FALSE){	
				$posisi  =0;
				$halaman =1;

			} else {
				$halaman = $this->uri->segment(4);
				if (!is_numeric($halaman) || $halaman > $jmlhalaman ) {
					$posisi  =0;
					$halaman =1;

				}	else{
					$posisi  = ($halaman-1) * $batas;
				}
			}
			$this->data['soal'] = $this->model_soal->baca_soal($id_ujian,$posisi,$batas);
			$this->data['no']            = $posisi+1;
			$this->data['jmlhalaman']    = $jmlhalaman;
			$this->data['halaman']       = $halaman;
					 $jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		$this->data['jenissoal']  = $jenissoal;
		$this->load->view('view_pengaturan_soal',$this->data);
	}
public function edit_soal(){
		$id_ujian = $this->uri->segment(3);
		$id_soal = $this->uri->segment(4);
		$this->data['page']          = 'edit_soal';
		$this->data['info_ujian'] = $this->model_ujian->info_ujian_real($id_ujian);
		if ($this->data['info_ujian']->tipe_waktu==1) {
					$this->data['page']          = 'edit_soal';
		} else {
					$this->data['page']          = 'edit_soal_manual';
					$setting_waktunya = $this->model_waktu->info_waktu($this->data['info_ujian']->id_mp);
					if (empty($setting_waktunya)) {
						echo "<script>alert('Waktu Tingkat Soal Belum Diatur');</script>";
						exit();
					}else {
					$this->data['setting_waktunya'] =	$setting_waktunya;
					}
		}


		$this->data['info_soal'] = $this->model_soal->info_soal($id_ujian,$id_soal);
		$this->data['jml_soal']  = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$this->data['jml_poin'] = 0;
		$this->data['jml_poin']  = $this->model_soal->total_poin($id_ujian);
		 $jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		$this->data['jenissoal']  = $jenissoal;
		$this->load->view('view_pengaturan_soal',$this->data);
}
public function act_edit_soal(){
		$id_ujian = $this->input->post('id_ujian',true);
		$id_soal = $this->input->post('id_soal',true);
		$tingkat_kesukaran = $this->input->post('tingkat_kesukaran',true);
		$jawaban = $this->input->post('jawaban',true);
		$poin = $this->input->post('poin',true);
		$soal = $this->input->post('soal');
		$A = $this->input->post('pilihan_a');
		$B = $this->input->post('pilihan_b');
		$C = $this->input->post('pilihan_c');
		$D = $this->input->post('pilihan_d');
		$E = $this->input->post('pilihan_e');

		$this->model_soal->update_soal($id_ujian,$id_soal,$soal,$A,$B,$C,$D,$E,$jawaban,$tingkat_kesukaran,$poin);
		$jml_soal = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$jml_poin = 0;
		$jml_poin = $this->model_soal->total_poin($id_ujian);
		$jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		 $jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		 $jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";
		echo "<script>alert('Soal baru berhasil Di Perbaharui');</script>";
}
public function act_edit_soal_manual(){
		$id_ujian = $this->input->post('id_ujian',true);
		$id_soal = $this->input->post('id_soal',true);
		$tingkat_kesukaran = $this->input->post('tingkat_kesukaran',true);
		$jawaban = $this->input->post('jawaban',true);
		$poin = $this->input->post('poin',true);
		$soal = $this->input->post('soal');
		$A = $this->input->post('pilihan_a');
		$B = $this->input->post('pilihan_b');
		$C = $this->input->post('pilihan_c');
		$D = $this->input->post('pilihan_d');
		$E = $this->input->post('pilihan_e');
		if(empty($id_ujian) || empty($tingkat_kesukaran) || empty($jawaban) || empty($poin) || empty($soal) || empty($A)|| empty($B) || empty($C) || empty($D) || empty($E))
		{
			echo "<script>alert('Gagal ditambahkan, Data soal belum lengkap');</script>";
		}
		else
		{
					$this->data['info_ujian'] = $this->model_ujian->info_ujian_real($id_ujian);

					$setting_waktunya = $this->model_waktu->info_waktu($this->data['info_ujian']->id_mp);
					if (empty($setting_waktunya)) {
						echo "<script>alert('Waktu Tingkat Soal Belum Diatur');</script>";
						exit();
					} else {
						$sulit = $setting_waktunya->sulit;
						$sedang = $setting_waktunya->sedang;
						$mudah = $setting_waktunya->mudah;
					if ($tingkat_kesukaran >= $sulit) {
						$ts = "sulit";
					} else if ($tingkat_kesukaran >= $sedang) {
						# code...
						$ts = "sedang";
					} else {
						$ts = "mudah";
					}
					$total_waktu = $this->model_waktu->total_waktu($id_ujian);
					$total_waktu = $total_waktu->total + $tingkat_kesukaran;

					$waktu_ujian = $this->data['info_ujian']->waktu * 60;
					if ($total_waktu > $waktu_ujian) {
						echo "<script>alert('Waktu Soal Habis, Tidak Bisa Menambah Waktu');</script>";
					} else {
					$this->model_soal->update_soal_manual($id_ujian,$id_soal,$soal,$A,$B,$C,$D,$E,$jawaban,$ts,$poin,$tingkat_kesukaran);
					echo "<script>alert('Soal baru berhasil Di Perbaharui');</script>";
					}
					}
		}

		$jml_soal = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$jml_poin = 0;
		$jml_poin = $this->model_soal->total_poin($id_ujian);
		$jenissoal[0]=$this->model_ujian->lihat_soal_sulit($id_ujian);
		$jenissoal[1]=$this->model_ujian->lihat_soal_sedang($id_ujian);
		$jenissoal[2]=$this->model_ujian->lihat_soal_mudah($id_ujian);
		echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";
}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */