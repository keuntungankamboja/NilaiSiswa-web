<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
	parent::__construct();
	$this->load->model(array('model_user'));
	$this->load->library(array('lib_login','lib_captcha'));
	}
	public function index()
	{
		if ($this->lib_login->sessionlogin()) {redirect('home');}
		$try = $this->session->userdata('try');
		if ($try>=7){
			$captcha = $this->lib_captcha->createcaptcha();
			    $this->session->set_userdata('captchalogin', $captcha['word']);
	            $data['image'] = $captcha['image'].' <button onclick="resets();" type="button" class="btn btn-default btn-sm">
  <span class="glyphicon glyphicon-refresh"></span>
</button><p><p>Tulis...
              <input type="text" name="captcha" class="captcha" title="Masukkan Text Disinei"/>';	
	     }
	     else {$data['image'] = '';}
		 $this->load->view('view_login',$data);
	}
	public function auth(){
		if ($this->lib_login->sessionlogin()) {exit();}
		$username = $this->input->post('username',true);
		$password = sha1($this->input->post('password',true));
		$userchaptcha = $this->input->post('captcha',true);
		$realchaptcha = $this->session->userdata('captchalogin');
			if (!empty($realchaptcha)) {
					if ($realchaptcha!=$userchaptcha){
						echo '<p class="text-danger">captcha Salah</p>';
						exit();
					}
				}	
			$try = $this->session->userdata('try'); //variabel untuk pengecekan percobaan login
			$login_check_siswa = $this->model_user->login_check_siswa($username,$password);
			$login_check_guru = $this->model_user->login_check_guru($username,$password);
			$login_check_admin = $this->model_user->login_check_admin($username,$password);

			if (!empty($login_check_siswa)) {
				
				$this->session->set_userdata(array('user'=>$login_check_siswa->nama,'password'=>md5($password+'authsiswa'+$username),'id_user'=>$login_check_siswa->nis,'type'=>'siswa'));
				//remove login captcha
				$this->session->unset_userdata('try');
				$this->session->unset_userdata('captchalogin');
				echo '<script>window.location.href="ujian";</script>';
			} else if (!empty($login_check_guru)) {
				$this->session->set_userdata(array('user'=>$login_check_guru->nama_guru,'password'=>md5($password+'authguru'+$username),'id_user'=>$login_check_guru->id_guru,'type'=>'guru'));
				//remove login captcha
				$this->session->unset_userdata('try');
				$this->session->unset_userdata('captchalogin');
				echo '<script>window.location.href="monitor";</script>';
				
			} else if (!empty($login_check_admin)) {
				$this->session->set_userdata(array('user'=>$login_check_admin->nama,'password'=>md5($password+'authadmin'+$username),'id_user'=>$login_check_admin->id,'type'=>'admin'));
				//remove login captcha
				$this->session->unset_userdata('try');
				$this->session->unset_userdata('captchalogin');
				echo '<script>window.location.href="monitor";</script>';
			} else {
				$try = $this->session->userdata('try');
				if (!empty($try)) {
					$this->session->set_userdata('try',$try+1);
		            
					}
				else {$this->session->set_userdata('try',1);} //end try
				echo '<p class="text-danger">Username Atau Password Salah</p>';
			}
	}
	public function captcha(){
		if ($this->lib_login->sessionlogin()) {exit();}
		$text = $this->input->post('text',true);
		
		$try = $this->session->userdata('try');
		if ($try>=4){
	            $captcha = $this->lib_captcha->createcaptcha();
	            $this->session->set_userdata('captchalogin', $captcha['word']);
	            echo $captcha['image'].' <button type="button" onclick="resets();" class="btn btn-default btn-sm">
  <span class="glyphicon glyphicon-refresh"></span>
</button><p><p>Tulis...
              <input type="text" name="captcha" class="captcha" title="Masukkan Text Disinei"/>';
	     }
	    }
	
	public function logout(){
		$this->lib_login->logout();
		redirect('');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */