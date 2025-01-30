<?php 
function view_header($header){
switch ($header) {
	case '1':
		?>
		<table class='text-center'>
			<tr>
				<td class="col-md-2"><img src='<?php echo base_url('bootstrap/images/logo2.jpg') ?>' height='140px' width='120px'/></td>
				<td class="col-md-8">
				  	<h4>PEMERINTAH KOTA PROBOLINGGO</h4>
					<h4>D I N A S&nbsp;&nbsp; P E N D I D I K A N</h4>
					<h4>SMK  NEGERI 1 KRAKSAAN</h4>
					<h5>Jl. Tenis 10 Telp/Fax. (0335) 841306 Kode Pos 67282</h5><p>
					<h5>Website : <a href='http://www.smkn1kraksaan.sch.id'>www.smkn1kraksaan.sch.id</a> / Email : <a href="mailto:admin@smkn1kraksaan.sch.id">admin@smkn1kraksaan.sch.id</a></h5>
					<h4>PROBOLINGGO</h4>
				</td>
				<td class="col-md-2"><img src='<?php echo base_url('bootstrap/images/logo.jpg') ?>' height='140px' width='120px'/></td>
			</tr>
		</table>
		<?php
		break;
	case '2':
		?>
		<p></p>
		  <div class="alert " role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>nilai</strong>
		</div>
		<?php
		break;
	case '3':
		?>
		<p></p>
		  <div class="alert text-center" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak Ada <strong>Ujian</strong> Yang Harus Diikuti
		</div>
		<?php
		break;
	default:
		# code...
		break;
}
}
?>
