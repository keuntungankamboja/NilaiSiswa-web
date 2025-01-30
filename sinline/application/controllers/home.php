<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {
function __construct() { 
       parent::__construct();
       	$this->load->library('lib_login');
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        //$this->load->helper(array('url', 'form'));
        $this->load->model(array('model_test','model_user'));

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
			case 'siswa':
				$info_siswa = $this->model_user->info_siswa2($this->session->userdata('id_user'));
				$this->data['info'] = $info_siswa;
				$this->data['page'] = 'siswa';
				break;
			case 'guru':
				$info_guru = $this->model_user->info_guru($this->session->userdata('id_user'));
				$this->data['info'] = $info_guru;
				$this->data['page'] = 'guru';
				break;
			case 'admin':
				$info_admin = $this->model_user->info_admin($this->session->userdata('id_user'));
				$this->data['info'] = $info_admin;
				$this->data['page'] = 'admin';
				break;
			default:
				# code...
				break;
		}
		$this->load->view('view_home',$this->data);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */