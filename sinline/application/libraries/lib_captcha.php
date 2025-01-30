<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lib_captcha {
function __construct() { 
 		$this->CI=& get_instance();
        $this->CI->load->helper('captcha');
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
	function createcaptcha(){
		$vals = array(
	                'img_path'   => './captcha/',
	                'img_url'    => base_url().'captcha/',
	                'img_width'  => 150,
                	'img_height' => 40,
	                'border' => 1,
	                'expiration' => 5
	            );
		return create_captcha($vals);
	}
}