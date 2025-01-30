<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Lihat Nilai</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>
<?php $this->load->view('import/menu_utama');?>

<div class="container">
    <div class="row">
  		<div class="col-md-12">
 			<div class="row ">

                <div class="col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
	             <?php 
			 switch ($page) {
			 	case 'nilai':
			 		 $this->load->view('nilai/nilai');
			 		break;
			 	case 'detail_nilai':
			 		 $this->load->view('nilai/detail_nilai');
			 		break;
			 	default:
			 		break;
			 }
			 ?>  
				</div> <!-- end col md 12 -->
	</div>
	<?php $this->load->view('import/foother.php'); ?>
</div>
</body>
</html>