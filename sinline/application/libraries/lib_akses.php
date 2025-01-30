<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_akses {
function __construct() { 
 		$this->CI=& get_instance();
        $this->CI->load->library('session');
    	}

	function akses($pengguna){
		 if (!in_array($this->CI->session->userdata('type'), $pengguna)){
        	Echo "Anda Tidak Dapat Mengakses Halaman Ini";
        	exit();
        }
	}
}