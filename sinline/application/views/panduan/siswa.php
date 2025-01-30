<div class="row">

  <div class="col-md-2 " id="nav">
  <div class="nav list-group affix">
      <a class="list-group-item list-group-item-success" href="#g1">Login</a>
      <a class="list-group-item list-group-item-info" href="#g2">Mengikuti Ujian</a>
      <a class="list-group-item list-group-item-warning" href="#g3">Melihat Nilai</a>
      <a class="list-group-item list-group-item-success" href="#g4">Ganti Password</a>
      <a class="list-group-item list-group-item-success" href="#g5">Logout</a>
    </div>
  </div>
  <div class="col-md-10">

<div class="panel panel-info" id="g1">
	  <div class="panel-heading">
	    <h3 class="panel-title">Login</h3>
	  </div>
	  <div class="panel-body">
	   <ol>
  		<li>Masuk ke alamat sinline</li>
  		<li>Masukkan No identitas dan password<blockquote>
  <p><small>no identitas = nomor induk siswa</small></p>
  <p><small>password = kata sandi</small></p>
</blockquote><p class="text-center"><img src="<?php echo base_url('bootstrap/panduan/1.login.png') ?>" alt=""></p></li>
		<li>Klik masuk<blockquote>
  <p><strong>Catatan</strong></p>
  <p><small>Jika No identitias dan password salah maka akan muncul pesan kesalahan seperti berikut</small></p></blockquote>
<p class="text-center"><img src="<?php echo base_url('bootstrap/panduan/2.error.png') ?>" alt=""></p></li>
		</ol>
	   </div>
	</div>
	<div class="panel panel-info" id="g2">
	  <div class="panel-heading">
	    <h3 class="panel-title">Mengikuti Ujian</h3>
	  </div>
	  <div class="panel-body ">
	    <ol>
  		<li>Masuk ke sistem sinline</li>
		<li>Klik menu ujian</li>
		<li>Klik Mulai<p>
		<p class="text-center"><img src="<?php echo base_url('bootstrap/panduan/3.ujian.png') ?>" alt=""></p><blockquote>
  <p><strong>Catatan</strong></p>
  <p><small>Jika tidak ada ujian yang sedang berlangsung maka akan muncul pesan<p>Tidak ada ujian</small></p></blockquote>
		</li>
		<li>Akan muncul halaman ujian dimana terdapat soal yang siap dikerjakan <p class="text-center">
  <img src="<?php echo base_url('bootstrap/panduan/4.ujian.png') ?>" alt=""></p>
<blockquote>
  <p><strong>Catatan</strong></p>
  <p><small>untuk menjawab klik pada radio buttom pilihan</small></p>
  <p><small>untuk melanjutkan soal berikutnya, selesai, jika ingin melanjutkan ke halaman berikutnya klik angka pada halaman</small></p>
  <p><small>jika selesai mengerjakan klik selesai</small></p>
  </blockquote>
		
		</li>
		<li>ujian telah selesai <p class="text-center">
		<img src="<?php echo base_url('bootstrap/panduan/5.selesai.png') ?>" alt=""></p>
		</li>
		</ol>

	    </div>
	</div>
	<div class="panel panel-info" id="g3">
	  <div class="panel-heading">
	    <h3 class="panel-title">Melihat Nilai</h3>
	  </div>
	  <div class="panel-body">
	    <ol>
  		<li>Masuk ke sistem sinline</li>
		<li>Klik menu Nilai <p class="text-center">
		<img src="<?php echo base_url('bootstrap/panduan/6.laporan siswa.png') ?>" alt=""></p><p>
			<blockquote>
  <p><strong>Catatan</strong></p>
		</p>
		<ul>
  		<li>klik icon <span class="glyphicon glyphicon-zoom-in"></span> Untuk melihat Detail nilai</li>
  		<li>klik icon <span class="glyphicon glyphicon-th"></span> Untuk melihat Soal</li>
		</ul>
		</blockquote>
		</ol>

	    </div>
	</div>
	<div class="panel panel-info" id="g4">
	  <div class="panel-heading">
	    <h3 class="panel-title">Ganti Password</h3>
	  </div>
	  <div class="panel-body">
	    <ol>
	    <li>Masuk ke sistem sinline</li>
		<li>Klik Menu seperti gambar dibawah <p class="text-center">
		<img src="<?php echo base_url('bootstrap/panduan/7.ganti password.png') ?>" alt=""></p><p>
		</p>
		<li>Pilih menu Ganti Password</li>
		<li>Isi password lama dan password baru, lalu klik tombol ganti password <p class="text-center">
		<img src="<?php echo base_url('bootstrap/panduan/7.ganti password 2.png') ?>" alt=""></p><p>
		</p>

		</li>

	    </ol>

	    </div>
	</div>
	<div class="panel panel-info" id="g5">
	  <div class="panel-heading">
	    <h3 class="panel-title">Keluar</h3>
	  </div>
	  <div class="panel-body">
	   <ol>
	    <li>Masuk ke sistem sinline</li>
		<li>Klik Menu seperti gambar dibawah <p class="text-center">
		<img src="<?php echo base_url('bootstrap/panduan/7.ganti password.png') ?>" alt=""></p></li>
		<li>Pilih Menu Keluar</li>

	    </ol>

	   </div>
	</div>

  </div>
</div>
<script>
	$(document).ready(function() {
  // plugin is applied to a scrollable element, targeting my navigation element
  $('body').scrollspy({ 'target': '#nav', 'offset': 10 });

  // listen for scrollspy events on the navigation element itself
  $('#nav').on('activate.bs.scrollspy', function() {
    console.log('scroll spy!!')
  });
});
</script>	