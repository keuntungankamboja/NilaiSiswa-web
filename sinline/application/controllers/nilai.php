<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class nilai extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        
        $this->lib_akses->akses(array('siswa'));
       	$this->load->model(array('model_nilai','model_ujian','model_user'));
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
	{	$id_siswa = $this->session->userdata('id_user');
		$this->data['list_nilai'] = $this->model_nilai->list_nilai($id_siswa);
		$this->data['page'] = 'nilai';
		$this->load->view('view_nilai',$this->data);
	}
	public function filter_nilai()
	{
		$id_siswa = $this->session->userdata('id_user');
		$cari  = $this->input->post('cari',true);
		$this->data['list_nilai'] = $this->model_nilai->filter_nilai($id_siswa,$cari);
		$this->load->view('nilai/tabel',$this->data);
	}
	public function detail_nilai(){
		$id_ujian = $this->uri->segment(3);
		$id_siswa = $this->session->userdata('id_user');
		$info_hasil['standard_nilai'] = $this->model_ujian->standard_nilai($id_ujian);
		$info_hasil['info'] = $this->model_ujian->info_hasil_ujian($id_ujian,$id_siswa);
		$info_hasil['info2'] = $this->model_ujian->info_ujian_real($id_ujian);

		$this->data['info_siswa']  = $this->model_user->info_siswa2($id_siswa);
		$this->data['page'] = 'detail_nilai';
		$this->data['info_hasil'] = $info_hasil;
		$this->load->view('view_nilai',$this->data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */