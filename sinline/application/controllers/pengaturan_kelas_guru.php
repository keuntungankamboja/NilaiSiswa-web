<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pengaturan_kelas_guru extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');} 
        $this->lib_akses->akses(array('admin','guru'));
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
	
	public function detail(){
		$id_kelas = $this->uri->segment(3);
		$this->data['page']          = 'pengaturan_kelas_detail_guru';
		$this->data['kelas'] = $this->model_kelas->info_kelas($id_kelas);
		$this->data['isi_kelas'] = $this->model_kelas->isi_kelas($id_kelas);
		$this->data['detail_kelas'] = $this->model_kelas->list_kelas_detail($id_kelas);
		$this->data['title']          = 'Detail Kelas';
		$this->load->view('view_pengaturan_ujian',$this->data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */