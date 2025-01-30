<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Monitoring ujian</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>
<?php $this->load->view('import/menu_utama');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                	<?php 
			 switch ($page) {
			 	case 'monitor':
			 		 $this->load->view('monitor/view_monitor_list');
			 		break;
			 	case 'monitor_ujian':
			 		 $this->load->view('monitor/view_monitor_ujian');
			 		break;
			 	case 'monitor_ujian_siswa':
			 		 $this->load->view('monitor/view_monitor_ujian_siswa');
			 		break;
			 	default:
			 		 $this->load->view('monitor/view_monitor_list');
			 		break;
			 }
			 ?>                           	 
</div>
            </div>
        </div>
    </div>
	<?php $this->load->view('import/foother.php'); ?>
</div>
<div class="container">
    
</div>
</body>
</html>