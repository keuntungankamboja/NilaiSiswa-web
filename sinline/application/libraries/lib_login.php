<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_login {
function __construct() { 
 		$this->CI=& get_instance();
        $this->CI->load->helper(array('url', 'form'));
        $this->CI->load->library('session');
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
	function sessionlogin(){
		$a = $this->CI->session->userdata('id_user');
        $b = $this->CI->session->userdata('user');
        $c = $this->CI->session->userdata('password');
        if (empty($a) || empty($c) || empty($b)){
        	return FALSE;
        }
        else {return TRUE;} 
	}
	function logout(){
		$this->CI->session->unset_userdata('id_user');
		$this->CI->session->unset_userdata('user');
		$this->CI->session->unset_userdata('password');
		$this->CI->session->unset_userdata('type');

		//$this->CI->session->unset_userdata('id_ujian');
		//$this->CI->session->unset_userdata('mulai_waktu');
	}
}