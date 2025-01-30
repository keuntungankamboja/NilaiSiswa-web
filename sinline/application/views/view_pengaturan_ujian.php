<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | <?php echo $title;?></title>
<?php $this->load->view('import/head_css');  ?>
<link href="<?php echo base_url('bootstrap/js/datepicker/css/bootstrap-datetimepicker.min.css') ?>" rel="stylesheet" media="screen">
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
			 	case 'pengaturan_ujian':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_ujian');
			 		break;
			 		case 'pengaturan_ujian_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_ujian_edit');
			 		break;
			 	case 'pengaturan_pelajaran':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_pelajaran');
			 		break;
			 	case 'pengaturan_pelajaran_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_pelajaran_edit');
			 		break;
			 	case 'pengaturan_guru':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_guru');
			 		break;
			 	case 'pengaturan_guru_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_guru_edit');
			 		break;
			 	case 'pengaturan_siswa':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_siswa');
			 		break;
			 	case 'pengaturan_siswa_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_siswa_edit');
			 		break;
			 	case 'pengaturan_jurusan':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_jurusan');
			 		break;
			 	case 'pengaturan_jurusan_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_jurusan_edit');
			 		break;
			 	case 'pengaturan_kelas':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_kelas');
			 		break;
			 	case 'pengaturan_kelas_edit':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_kelas_edit');
			 		break;	
			 	case 'pengaturan_kelas_detail':
			 		 $this->load->view('pengaturan_ujian/view_pengaturan_kelas_detail');
			 		break;	
			 	case 'pengaturan_kelas_detail_guru':
			 		 $this->load->view('pengaturan_ujian/view_tabel_kelas_detail_guru');
			 		break;	
			 	default:
			 		 $this->load->view('pengaturan_ujian/view_pengaturan');
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