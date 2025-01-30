<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>TSOTF | Just Test</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>
<?php $this->load->view('import/menu_utama');?>
<div class="container">
    <div class="row">
  		<div class="col-md-3">
			 <?php $this->load->view('user/menu_user');  ?>
		</div> <!-- end col md 3 -->
    <div class="col-md-9">
      <?php 

switch ($act) {
  case 'identitas':
    $this->load->view('user/form_edit');  
    break;
  case 'password':
    $this->load->view('user/form_ganti_password');  
    break;
      case 'nick':
    $this->load->view('user/form_nick');  
    break;
  default:
    # code...
    break;
}
      ?>
</div><!-- col md 9 -->
</div><!-- end row -->
<?php $this->load->view('import/foother.php'); ?>
</div><!-- end container -->

</body>
</html>