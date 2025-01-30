<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_ujian extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('guru'));
       	$this->load->model(array('model_ujian','model_user','model_pelajaran','model_soal','model_kelas','model_waktu'));

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
				$info_ujian                   = $this->model_ujian->prep_monitor_ujian_guru($this->session->userdata('id_user'));
				$this->data['mata_pelajaran'] = $this->model_pelajaran->list_pelajaran_guru($this->session->userdata('id_user'));
				break;
			case 'admin':
				$info_ujian                   = $this->model_ujian->prep_monitor_ujian_admin();
				$this->data['mata_pelajaran'] = $this->model_pelajaran->list_pelajaran();
				break;
			default:
				echo "terjadi kesalahan system";
				exit();
				break;
		}
		
		$this->data['kelas']      = $this->model_kelas->list_kelas();
		$this->data['info_ujian'] = $info_ujian;
		$this->data['page']       = 'pengaturan_ujian';
		$this->data['title']      = 'Pengaturan Ujian';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}

	public function tambah_ujian(){

		$tanggal           = $this->input->post('tanggal',true);
		$waktu             = $this->input->post('waktu',true);
		$id_mata_pelajaran = $this->input->post('id_mata_pelajaran',true);
		$standard_nilai    = $this->input->post('standard_nilai',true);
		$id_kelas          = $this->input->post('id_kelas',true);
		$jenis_ujian       = $this->input->post('jenis_ujian',true);
		$kompetensi_dasar  = $this->input->post('kompetensi_dasar',true);
		$tipe_waktu        = $this->input->post('ubah',true);
		$sulit             = $this->input->post('sulit',true);
		$sedang            = $this->input->post('sedang',true);
		$mudah             = $this->input->post('mudah',true);
		
		//echo "<script>alert('Data $tipe_waktu');</script>";
		if (cekinput(array($tanggal,$waktu,$standard_nilai,$id_kelas,$jenis_ujian,$id_mata_pelajaran))==false) {
			echo "<script>alert('Data Ujian Perlu Dilengkapi');</script>";
		} else
		{ 	 
			//jika 1 brarti otomatis
		if ($tipe_waktu==0) {
				if (empty($sulit) || empty($sedang) || empty($mudah)) {
					echo "<script>alert('Data Waktu Perlu Di Atur');</script>";
					exit();
				}
		}
			$periksa_tanggal = $this->model_ujian->waktuujiansama($id_kelas,$tanggal);
			if (empty($periksa_tanggal)) {
				if ($tipe_waktu==0) {
				$setting_waktunya = $this->model_waktu->cek_waktu($id_mata_pelajaran);
					if (empty($setting_waktunya)) {
							//do insert
							$this->model_waktu->insert_waktu($id_mata_pelajaran,$sulit, $sedang,$mudah);
						} else {
							//do update
							$this->model_waktu->update_waktu($id_mata_pelajaran, $sulit, $sedang,$mudah);
						}
				}

			 	$insert = $this->model_ujian->insert_ujian($id_mata_pelajaran,$waktu,$standard_nilai,$id_kelas,$jenis_ujian,$kompetensi_dasar,$tanggal,$tipe_waktu);
			 } 
			else {
			foreach ($periksa_tanggal as $value) {
				# code...
			 	$cekwaktulama = substr($value->tgl, 14,2) + $value->waktu;
			 	$cekwaktubaru = substr($tanggal, 14,2);
			 	if ($cekwaktubaru < $cekwaktulama) {
			 		echo "<script>alert('Ada Ujian di kelas $value->kelas pada tanggal $value->tgl selama $value->waktu menit');</script>";
			 	} else {
					if ($tipe_waktu==0) {
						$setting_waktunya = $this->model_waktu->cek_waktu($id_mata_pelajaran);
							if (empty($setting_waktunya)) {
									//do insert
									$this->model_waktu->insert_waktu($id_mata_pelajaran,$sulit, $sedang,$mudah);
								} else {
									//do update
									$this->model_waktu->update_waktu($id_mata_pelajaran, $sulit, $sedang,$mudah);
								}
					}
			 		$insert = $this->model_ujian->insert_ujian($id_mata_pelajaran,$waktu,$standard_nilai,$id_kelas,$jenis_ujian,$kompetensi_dasar,$tanggal,$tipe_waktu);
			 	}
			}

			}

		}
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
		$this->data['info_ujian']          = $info_ujian;
		$this->load->view('pengaturan_ujian/view_tabel_ujian',$this->data);	
	}
	public function hapus(){
		$id_ujian = $this->uri->segment(3);
		$hasil = $this->model_ujian->cek_ujian_hasil($id_ujian);
		$jawaban = $this->model_ujian->cek_ujian_jawaban($id_ujian);
		if ($hasil == 0 and $jawaban == 0) {
		$this->model_ujian->delete_ujian($id_ujian);
		$this->model_soal->delete_semua_soal($id_ujian);
		redirect("pengaturan_ujian");
		}else {	
		echo "<script>alert('Ujian Tidak Dapat Di Hapus Karena digunakan');</script>";
		echo '<script type="text/javascript">window.location.href="..";</script>';
		}
		
	}
	public function edit(){
		$id_ujian = $this->uri->segment(3);
		$this->data['ujian'] = $this->model_ujian->info_ujian($id_ujian);
		$this->data['kelas'] = $this->model_kelas->list_kelas();
		$this->data['mata_pelajaran'] = $this->model_pelajaran->list_pelajaran_guru($this->session->userdata('id_user'));
		$this->data['page']          = 'pengaturan_ujian_edit';
		$this->data['title']          = 'Edit Ujian';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function edit_act(){
		$id_ujian          = $this->input->post('id_ujian',true);
		$tanggal           = $this->input->post('tanggal',true);
		$waktu             = $this->input->post('waktu',true);
		$standard_nilai    = $this->input->post('standard_nilai',true);
		$id_kelas          = $this->input->post('id_kelas',true);
		$id_mata_pelajaran = $this->input->post('id_mata_pelajaran',true);
		$jenis_ujian       = $this->input->post('jenis_ujian',true);
		$kompetensi_dasar  = $this->input->post('kompetensi_dasar',true);
		if (cekinput(array($tanggal,$waktu,$standard_nilai,$id_kelas,$jenis_ujian))==false) {
			echo "<script>alert('Data Ujian Perlu Dilengkapi');</script>";
		}else
		{
		$this->model_ujian->update_ujian($id_ujian,$waktu,$standard_nilai,$id_kelas,$id_mata_pelajaran,$jenis_ujian,$kompetensi_dasar,$tanggal);
		}
		$link = "pengaturan_ujian/edit/".$id_ujian;
		redirect($link);
	}
	public function filter_ujian()
	{
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
		$this->load->view('pengaturan_ujian/view_tabel_ujian',$this->data);
	}
    function get_pengaturan_waktu(){
        $id_mata_pelajaran = $this->input->post('id_mata_pelajaran',true);
		$info_waktu = $this->model_waktu->info_waktu($id_mata_pelajaran);
		?> 
				<div class="form-group">
				<label class="col-sm-4 control-label">Tipe Waktu</label>
				<div class="col-sm-8">
				<INPUT type="checkbox" class='ubah' id='ubah' name='ubah'/> Automatic
				</div>
				</div>
				<script type="text/javascript">
          $(document).ready(function() {
            $('#ubah').click(function() {
              $("#showwaktu").toggle();
            });
          });
      </script>
				<div id="showwaktu">
				<div class="form-group">
				<label class="col-sm-4 control-label">Sulit</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="sulit" name="sulit" placeholder='dalam detik' value="<?php if (!empty($info_waktu))  {
					echo $info_waktu->sulit;
				} ?>">
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-4 control-label">Sedang</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="sedang" name="sedang" placeholder='dalam detik' value="<?php  if (!empty($info_waktu))  { echo $info_waktu->sedang; } ?>">
				</div>
				</div>

				<div class="form-group">
				<label class="col-sm-4 control-label">Mudah</label>
				<div class="col-sm-8">
				<input type="number" class="form-control" id="mudah" name="mudah" placeholder='dalam detik' value="<?php if (!empty($info_waktu))  { echo $info_waktu->mudah; } ?>">
				</div>
				</div>
				</div>

		<?php
    }
	function get_pelajaran(){
		$id_kelas = $this->input->post('id_kelas',true);
		$jurusan = $this->model_kelas->info_kelas($id_kelas);
		if (empty($jurusan)) {
			?> 
			<div class="form-group">
			    <label  class="col-sm-12 control-label text-danger">Silahkan Pilih Kelas</label>
			</div>
			<?php
			exit();
		}
		$tahun = $jurusan->tahun;
		$mata_pelajaran = $this->model_pelajaran->list_pelajaran_guru_perjurusan($this->session->userdata('id_user'),$jurusan->kode_jurusan,$tahun);
		if (empty($mata_pelajaran)) {
			?> 
			<div class="form-group">
			    <label  class="col-sm-12 control-label text-danger">Tidak Mengajar di jurusan tersebut</label>
			</div>
			<?php 
		} else {
		?>  <div class ="form-group">
			<label  class  ="col-sm-4 control-label">Mata Pelajaran</label>
			<div class     ="col-sm-8">
    	     <select class="form-control" id="id_mata_pelajaran" onchange="get_pengaturan_waktu();">
		     <option>...</option>
		     <?php foreach ($mata_pelajaran as $value) {
		        echo "<option value=$value->id_mata_pelajaran>$value->pelajaran ($value->kode_jurusan) | $value->nama_guru</option>"; 
		     }
		     ?>
			 </select>
	</div>
   </div>
    <div id="pengaturanwaktu">

  </div>
		<?php }
	}
	function get_pelajaran_edit(){
		$id_kelas = $this->input->post('id_kelas',true);
		$jurusan = $this->model_kelas->info_kelas($id_kelas);
		if (empty($jurusan)) {
			?> 
			<div class="form-group">
			    <label  class="col-sm-12 control-label text-danger">Silahkan Pilih Kelas</label>
			</div>
			<?php
			exit();
		}
		$mata_pelajaran = $this->model_pelajaran->list_pelajaran_guru_perjurusan($this->session->userdata('id_user'),$jurusan->kode_jurusan);
		if (empty($mata_pelajaran)) {
			?> 
			<div class="form-group">
			    <label  class="col-sm-12 control-label text-danger">Tidak Mengajar di jurusan tersebut</label>
			</div>
			<?php 
		} else {
		?>  <div class ="form-group">
			<label  class  ="col-sm-4 control-label">Mata Pelajaran</label>
			<div class     ="col-sm-8">
    	     <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran">
		     <?php foreach ($mata_pelajaran as $value) {
		        echo "<option value=$value->id_mata_pelajaran>$value->pelajaran ($value->kode_jurusan) | $value->nama_guru</option>"; 
		     }
		     ?>
			 </select>
	</div>
   </div>
		<?php }
	}
}
	function cekinput(array $input)
	{
		foreach ($input as $value) {
			if (empty($value)) { return false; }
		}
		return true;
	}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */