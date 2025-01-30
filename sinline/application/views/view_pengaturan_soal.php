<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Soal</title>
<?php $this->load->view('import/head_css');  ?>
<script src="<?php echo base_url('bootstrap/js/ckeditor/ckeditor.js') ?>"></script>
<body>

<?php //$this->load->view('import/menu_utama');?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
                	<?php 
			 switch ($page) {
			 	case 'pengaturan_soal':
			 		 $this->load->view('pengaturan_soal/view_pengaturan_soal');
			 		break;
			 	case 'pengaturan_soal_manual':
			 		 $this->load->view('pengaturan_soal/view_pengaturan_soal_manual');
			 		break;
			 	case 'tampil_soal':
			 		 $this->load->view('pengaturan_soal/view_tampil_soal');
			 		break;
			 	case 'tampil_soal_manual':
			 		 $this->load->view('pengaturan_soal/view_tampil_soal_manual');
			 		break;
			 	case 'edit_soal':
			 		 $this->load->view('pengaturan_soal/view_edit_soal');
			 		break;
			 	case 'edit_soal_manual':
			 		 $this->load->view('pengaturan_soal/view_edit_soal_manual');
			 		break;
			 	default:
			 		 $this->load->view('pengaturan_soal/view_pengaturan_soal');
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