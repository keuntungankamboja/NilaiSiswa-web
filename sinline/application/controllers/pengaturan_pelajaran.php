<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_pelajaran extends CI_Controller {
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
		$this->data['mata_pelajaran'] = $this->model_pelajaran->list_pelajaran_add();
		$this->data['guru']           = $this->model_guru->list_guru();
		$this->data['jurusan']        = $this->model_jurusan->list_jurusan();
		$this->data['page']           = 'pengaturan_pelajaran';
		$this->data['title']          = 'Pengaturan Pelajaran';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function simpan_pelajaran(){
		$mata_pelajaran = $this->input->post('mata_pelajaran',true);
		$id_guru        = $this->input->post('id_guru',true);
		$kode_jurusan   = $this->input->post('kode_jurusan',true);
		$tahun          = $this->input->post('tahun',true);
		$this->model_pelajaran->insert_pelajaran($mata_pelajaran,$id_guru,$kode_jurusan,$tahun);
		$this->data['mata_pelajaran'] = $this->model_pelajaran->list_pelajaran_add();
		$this->load->view('pengaturan_ujian/view_tabel_mata_pelajaran',$this->data);
	}
	public function hapus(){
		$id_mp      = $this->uri->segment(3);
		$cek_mp     = $this->model_ujian->cek_ujian_mata_pelajaran($id_mp);
		if ($cek_mp == 0 )
		{
			$this->model_pelajaran->delete_pelajaran($id_mp);
			redirect("pengaturan_pelajaran");
		} else {
			echo "<script>alert('Pelajaran Tidak Dapat Di Hapus Karena digunakan');</script>";
			echo '<script type="text/javascript">window.location.href="..";</script>';
		}
	}
	public function edit(){
		$id_mp                        = $this->uri->segment(3);
		$this->data['page']           = 'pengaturan_pelajaran_edit';
		$this->data['title']          = 'Edit Pelajaran';
		$this->data['guru']           = $this->model_guru->list_guru();
		$this->data['jurusan']        = $this->model_jurusan->list_jurusan();
		$this->data['mata_pelajaran'] = $this->model_pelajaran->info_pelajaran($id_mp);
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
	public function edit_act(){
		$id_mp          = $this->input->post('id_mp',true);
		$mata_pelajaran = $this->input->post('mata_pelajaran',true);
		$kode_jurusan   = $this->input->post('kode_jurusan',true);
		$id_guru        = $this->input->post('id_guru',true);
		$tahun          = $this->input->post('tahun',true);

		$this->model_pelajaran->update_pelajaran($id_mp, $mata_pelajaran, $kode_jurusan, $id_guru,$tahun);
		$link           = "pengaturan_pelajaran/edit/".$id_mp;
		redirect($link);
	}
	public function filter_pelajaran(){
		$cari = $this->input->post('cari',true);
		$this->data['mata_pelajaran'] = $this->model_pelajaran->filter_pelajaran($cari);
		$this->load->view('pengaturan_ujian/view_tabel_mata_pelajaran',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */