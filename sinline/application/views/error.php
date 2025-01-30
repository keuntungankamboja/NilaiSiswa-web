<?php 
function pesan_error($pesan_error){
switch ($pesan_error) {
	case '1':
		?>
		<p></p>
		  <div class="alert " role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>ujian</strong>
		</div>
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
	case '4':
		?>
		<p></p>
		  <div class="alert text-center" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak Ada <strong>Siswa</strong> Yang Mengikuti Ujian
		</div>
		<?php
		break;
	case '5':
		?>
		<p></p>
		  <div class="alert" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>kelas</strong>
		</div>
		<?php
		break;
	case '6':
	?>
		<p></p>
		  <div class="alert" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>Mata Pelajaran</strong>
		</div>
		<?php
		break;
	case '7':
		?>
		<p></p>
		  <div class="alert" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>Guru</strong>
		</div>
		<?php
		break;
	case '8':
		?>
		<p></p>
		  <div class="alert" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>Siswa</strong>
		</div>
		<?php
		break;
	case '9':
		?>
		<p></p>
		  <div class="alert" role="alert">
		  <strong class="text-primary">INFORMASI : </strong> Tidak ditemukan Hasil pencarian <strong>Jurusan</strong>
		</div>
		<?php
		break;
	default:
		# code...
		break;
}
}
?>
