<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Panduan</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>
<?php $this->load->view('import/menu_utama');?>
<div class="container">
    <div class="row">
  		<div class="col-md-12">
  			<?php 
			 switch ($page) {
			 	case 'siswa':
			 		 $this->load->view('panduan/siswa');
			 		break;

			 	case 'guru':
			 		 $this->load->view('panduan/guru');
			 		break;
			 	
			 	case 'admin':
			 		 $this->load->view('panduan/admin');
			 		break;	
			 	default:
			 		 $this->load->view('ujian/view_ujian');
			 		break;
			 }
			 ?>	 
			 
		</div> <!-- end col md 12 -->
	</div>
	<?php $this->load->view('import/foother.php'); ?>
</div>

</body>
</html>