<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | ujian</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>

<?php $this->load->view('import/menu_utama');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                	<?php 
			 switch ($page) {
			 	case 'ujian':
			 		 $this->load->view('ujian/view_ujian');
			 		break;
			 	case 'hasil':
			 		 $this->load->view('ujian/view_hasil');
			 		break;
			 	case 'nilai':
			 		 $this->load->view('ujian/view_nilai');
			 		break;
			 	default:
			 		 $this->load->view('ujian/view_ujian');
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