<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user extends CI_Controller {
function __construct() { 
       parent::__construct();
        $this->load->library(array('lib_login'));
       	if ($this->lib_login->ceksession()==0) {redirect('login');}
        //$this->load->helper(array('url', 'form'));
       	$this->load->model(array('model_user'));
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
	}
	public function identitas()
	{
		
		$this->data['act'] = "identitas";
		$this->load->view('view_user',$this->data);
	}
	public function password()
	{
		$this->data['act'] = "password";
		$this->load->view('view_user',$this->data);
	}
	public function actpassword(){
		$this->form_validation->set_rules('passwordlama', 'Password Lama', 'trim|required|callback_password_check');
		$this->form_validation->set_rules('passwordbaru', 'Password Baru', 'trim|required');
		if ($this->form_validation->run() == FALSE) { 
                $this->data['act'] = "password";
                $this->load->view('view_user', $this->data);	
        	}
        	else {
        		$id_user = $this->session->userdata('id_user');
        		$passwordbaru  = $this->input->post('passwordbaru',true);
        		$passwordbaru = sha1($passwordbaru);
        		$this->model_user->change_password($id_user,$passwordbaru);
        		$this->session->set_flashdata('flash', 'success');
        		redirect('user/password');
    		}
	}
	public function nick()
	{
		$this->data['act'] = "nick";
		$this->load->view('view_user',$this->data);
	}
	public function actnick(){
		$this->form_validation->set_rules('nick', 'Nama Profil', 'trim|required|min_length[4]|max_length[12]|alpha_dash|callback_username_check');
			if ($this->form_validation->run() == FALSE) { 
                $this->data['act'] = "nick";
                $this->load->view('view_user', $this->data);	
        	}
        	else {
        		$user_login  = $this->input->post('nick',true);
        		$id_user = $this->session->userdata('id_user');
        		$this->model_user->name_change($id_user,$user_login);
        		$this->session->set_userdata('user',$user_login);
        		redirect('user/nick');
    		}
    	}
	public function username_check($username)
			{
				$name_check = $this->model_user->name_check($username);
				if (!empty($name_check))
				{
					$this->form_validation->set_message('username_check', '%s  "'.$username.'" Telah Digunakan Pengguna Lain.');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
	public function password_check($password)
			{
				$id_user = $this->session->userdata('id_user');
				$password = sha1($password);
				$password_check = $this->model_user->password_check($id_user,$password);
				if (empty($password_check))
				{
					$this->form_validation->set_message('password_check', '%s  Salah');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
	public function uploadimage(){
		$error = "";
	$msg = "";
	$fileElementName = 'fileToUpload';
	if(!empty($_FILES[$fileElementName]['error']))
	{
		switch($_FILES[$fileElementName]['error'])
		{

			case '1':
				$error = 'The uploaded file exceeds the upload_max_filesize directive in php.ini';
				break;
			case '2':
				$error = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form';
				break;
			case '3':
				$error = 'The uploaded file was only partially uploaded';
				break;
			case '4':
				$error = 'No file was uploaded.';
				break;

			case '6':
				$error = 'Missing a temporary folder';
				break;
			case '7':
				$error = 'Failed to write file to disk';
				break;
			case '8':
				$error = 'File upload stopped by extension';
				break;
			case '999':
			default:
				$error = 'No error code avaiable';
		}
	}elseif(empty($_FILES['fileToUpload']['tmp_name']) || $_FILES['fileToUpload']['tmp_name'] == 'none')
	{
		$error = 'No file was uploaded..';
	}else 
	{
			$msg .= " File Name: " . $_FILES['fileToUpload']['name'] . ", ";
			$msg .= " File Size: " . @filesize($_FILES['fileToUpload']['tmp_name']);
			//for security reason, we force to remove all uploaded file
			@unlink($_FILES['fileToUpload']);		
	}		
	echo "{";
	echo				"error: '" . $error . "',\n";
	echo				"msg: '" . $msg . "'\n";
	echo "}";

}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */