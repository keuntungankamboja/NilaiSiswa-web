<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_kelas extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('admin'));
       	$this->load->model(array('model_ujian','model_user','model_pelajaran','model_guru','model_jurusan','model_kelas'));
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
		$this->data['kelas'] = $this->model_kelas->list_kelas();
		$this->data['jurusan']        = $this->model_jurusan->list_jurusan();
		$this->data['page']          = 'pengaturan_kelas';
		$this->data['title']          = 'Pengaturan Kelas';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function simpan_kelas(){
		$kelas = $this->input->post('kelas',true);
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$tahun = $this->input->post('tahun',true);
		$this->model_kelas->insert_kelas($kelas,$kode_jurusan,$tahun);
		$this->data['kelas'] = $this->model_kelas->list_kelas();
		$this->load->view('pengaturan_ujian/view_tabel_kelas',$this->data);
	}
	
	public function hapus(){
		$id_kelas = $this->uri->segment(3);
		$cek_kelas = $this->model_kelas->cek_kelas($id_kelas);
		if ($cek_kelas == 0 )
		{
			$this->model_kelas->delete_kelas($id_kelas);
			$this->model_kelas->delete_kelas2($id_kelas);
			redirect("pengaturan_kelas");
		} else {
			echo "<script>alert('Kelas Tidak Dapat Di Hapus Karena digunakan');</script>";
			echo '<script type="text/javascript">window.location.href="..";</script>';
		}
	}
	
	public function edit(){
		$id_kelas = $this->uri->segment(3);
		$this->data['page']          = 'pengaturan_kelas_edit';
		$this->data['jurusan']        = $this->model_jurusan->list_jurusan();
		$this->data['kelas'] = $this->model_kelas->info_kelas($id_kelas);
		$this->data['title']          = 'Edit Kelas';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	
		public function edit_act(){

		$id_kelas = $this->input->post('id_kelas',true);
		$kelas = $this->input->post('kelas',true);
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$tahun = $this->input->post('tahun',true);
		$this->model_kelas->update_kelas($id_kelas, $kelas, $kode_jurusan, $tahun);
		$link = "pengaturan_kelas/edit/".$id_kelas;
		redirect($link);
	}

	public function detail(){
		$id_kelas = $this->uri->segment(3);
		$this->data['page']          = 'pengaturan_kelas_detail';
		$this->data['kelas'] = $this->model_kelas->info_kelas($id_kelas);
		$this->data['isi_kelas'] = $this->model_kelas->isi_kelas($id_kelas);
		$this->data['detail_kelas'] = $this->model_kelas->list_kelas_detail($id_kelas);
		$this->data['title']          = 'Detail Kelas';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function load_siswa(){
		$kode_jurusan = $this->input->post('kode_jurusan',true);
		$id_kelas = $this->input->post('id_kelas',true);
		$cari = $this->input->post('cari',true);
		$angkatan = $this->input->post('angkatan',true);
		$tahun_cek = $this->input->post('tahun_cek',true);
		//echo "$id_kelas";
		$this->data['list_siswa'] = $this->model_kelas->list_siswa($kode_jurusan, $id_kelas, $cari, $angkatan, $tahun_cek);
		$this->data['page']          = 'pengaturan_kelas_detail';
		$this->load->view('pengaturan_ujian/view_form_kelas',$this->data);
	}
	public function siswa_act(){
		$nis = $this->input->post('nis',true);
		$id_kelas = $this->input->post('id_kelas',true);
		if (!empty($nis)) {
			foreach ($nis as $key => $value) {
			$this->model_kelas->insert_siswa_kelas($id_kelas,$value);
			}
		}
		$link = "pengaturan_kelas/detail/".$id_kelas;
		redirect($link);
	}
	public function hapus_nis(){
		$id_kelas = $this->uri->segment(3);
		$nis = $this->uri->segment(4);
		$this->model_kelas->delete_nis($id_kelas,$nis);
		$link = "pengaturan_kelas/detail/".$id_kelas;
		redirect($link);
	}
	public function filter_kelas(){
		$cari = $this->input->post('cari',true);
		$this->data['kelas'] = $this->model_kelas->filter_kelas($cari);
		$this->load->view('pengaturan_ujian/view_tabel_kelas',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */