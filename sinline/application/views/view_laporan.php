<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | SMK N 1 KRAKSAAN</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12 col-sm-12 col-xs-12">
 
                	<?php 
			 switch ($page) {
			 	case 'detail_nilai':
			 		 $this->load->view('laporan/detail_nilai');
			 		break;
			 	case 'hasil_ujian':
			 		 $this->load->view('laporan/laporan_hasil_ujian');
			 		break;
			 	case 'analisis_soal':
			 		 $this->load->view('laporan/laporan_analisis_soal');
			 		break;
			 	case 'soal':
			 		 $this->load->view('laporan/laporan_soal');
			 		break;
			 	default:
			 		break;
			 }
			 ?>                           	 
			</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>