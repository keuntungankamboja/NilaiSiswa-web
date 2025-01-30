<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class password extends CI_Controller {
function __construct() { 
       parent::__construct();
       	$this->load->library('lib_login');
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        //$this->load->helper(array('url', 'form'));
        $this->load->model(array('model_test','model_user','model_siswa','model_guru'));

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
	//siswa
	public function index()
	{
		if ($this->session->userdata('type')=='siswa'){
			$this->data['page'] = 'siswa';
		} else if ($this->session->userdata('type')=='guru'){
			$this->data['page'] = 'guru';
		} else if ($this->session->userdata('type')=='admin'){
			$this->data['page'] = 'admin';
		}
		$this->load->view('view_ganti_password',$this->data);
	}
	public function actgantipasswordsiswa()
		{
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required|callback_password_check_siswa');
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
		if ($this->form_validation->run() == FALSE) { 
                $this->data['page'] = "siswa";
                $this->load->view('view_ganti_password', $this->data);	
        	}
        	else {
        		$id_user = $this->session->userdata('id_user');
        		$passwordbaru  = $this->input->post('passwordbaru',true);
        		$passwordbaru = sha1($passwordbaru);
        		$this->model_siswa->change_password_siswa($id_user,$passwordbaru);
        		$this->session->set_flashdata('flash', 'success');
        		redirect('password');
    		}
    	}
    public function actgantipasswordguru()
		{
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required|callback_password_check_guru');
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
		if ($this->form_validation->run() == FALSE) { 
                $this->data['page'] = "guru";
                $this->load->view('view_ganti_password', $this->data);	
        	}
        	else {
        		$id_user = $this->session->userdata('id_user');
        		$passwordbaru  = $this->input->post('passwordbaru',true);
        		$passwordbaru = sha1($passwordbaru);
        		$this->model_guru->change_password_guru($id_user,$passwordbaru);
        		$this->session->set_flashdata('flash', 'success');
        		redirect('password');
    		}
    	}
    public function actgantipasswordadmin()
		{
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required|callback_password_check_admin');
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
		if ($this->form_validation->run() == FALSE) { 
                $this->data['page'] = "admin";
                $this->load->view('view_ganti_password', $this->data);	
        	}
        	else {
        		$id_user = $this->session->userdata('id_user');
        		$passwordbaru  = $this->input->post('passwordbaru',true);
        		$passwordbaru = sha1($passwordbaru);
        		$this->model_user->change_password_admin($id_user,$passwordbaru);
        		$this->session->set_flashdata('flash', 'success');
        		redirect('password');
    		}
    	}
    function password_check_siswa($password)
		{
				$id_user = $this->session->userdata('id_user');
				$password = sha1($password);
				$password_check = $this->model_siswa->password_check_siswa($id_user,$password);
				if (empty($password_check))
				{
					$this->form_validation->set_message('password_check_siswa', '%s  Salah');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
		}
	function password_check_guru($password)
		{
				$id_user = $this->session->userdata('id_user');
				$password = sha1($password);
				$password_check = $this->model_guru->password_check_guru($id_user,$password);
				if (empty($password_check))
				{
					$this->form_validation->set_message('password_check_guru', '%s  Salah');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
		}
	function password_check_admin($password)
		{
				$id_user = $this->session->userdata('id_user');
				$password = sha1($password);
				$password_check = $this->model_user->password_check_admin($id_user,$password);
				if (empty($password_check))
				{
					$this->form_validation->set_message('password_check_admin', '%s  Salah');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */