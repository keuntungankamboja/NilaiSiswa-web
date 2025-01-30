<?php 
	if (empty($info_ujian)) {
		$this->load->view('error.php');
		pesan_error(1);
		exit();
	}
switch ($this->session->userdata('type')) {
			case 'guru':
 ?>
	<div class="row"> <p></p>          
	<table class="table table-hover">
	<tr class="active">
	<th>Monitor Ujian</th>
	<th>Tanggal</th>
	<th>Mata Pelajaran</th>
	<th>Kelas</th>
	<th>Jenis Ujian</th>
	<th>Aksi</th>
	</tr>
	<?php
	foreach ( $info_ujian as $row) {
					if ($row->tipe_waktu==1) {
						$ket = "Waktu Soal Otomatis";
						$warna = "";
					} else {
						$ket = "Waktu Soal Manual";
						$warna = "class='warning'";
					}
					if ($row->status=='aktif'){
						$link = "<a href='".site_url('monitor/nonaktifkan/'.$row->id_ujian)."' title='Nonaktifkan ujian'><span class='glyphicon glyphicon-stop'></span> Nonaktifkan</a>";
					}else{
						$link = "<a href='".site_url('monitor/aktifkan/'.$row->id_ujian)."' title='Aktifkan ujian'><span class='glyphicon glyphicon-play'></span> Aktifkan</a>";
					}
					echo "<tr $warna><td align='center'><a href='".site_url('monitor/monitor_ujian/'.$row->id_ujian)."' title='".$ket."'><span class='glyphicon glyphicon-th-large'  title='Monitor Ujian'> Monitor</span></a></td>";
					echo "<td>$row->tgl</td>";
					$tanggal = substr($row->tgl, 0,13);
					$tanggal2 = substr($row->tgl, 14,2);
					echo "<td>$row->pelajaran</td>";
					$thn = $row->tahun+1;
					$link2 = "<a target='blank' href='".site_url('pengaturan_kelas_guru/detail/'.$row->id_kelas)."'><span class='glyphicon glyphicon-list-alt  title='Lihat semua siswa'></span> ".$row->kelas." (".$row->tahun."/".$thn.")</a>";
					echo "<td>".$link2."</td>";
					echo "<td>$row->jenis_ujian</td>";
					echo "<td>".$link."</td></tr>";
		}
	?>

	</table>
	</div> <!-- END ROW -->
		<?php 
		break;
	case 'admin':
	?>
		<div class="row"> <p></p>          
	<table class="table table-hover">
	<tr class="active">
	<th>Monitor Ujian</th>
	<th>Tanggal</th>
	<th>Mata Pelajaran</th>
	<th>Guru</th>
	<th>Kelas</th>
	<th>Aksi</th>
	</tr>
	<?php
	foreach ( $info_ujian as $row) {
					if ($row->tipe_waktu==1) {
						$ket = "Waktu Soal Otomatis";
						$warna = "";
					} else {
						$ket = "Waktu Soal Manual";
						$warna = "class='warning'";
					}
					if ($row->status=='aktif'){
						$link = "<a href='".site_url('monitor/nonaktifkan/'.$row->id_ujian)."' title='Nonaktifkan ujian'><span class='glyphicon glyphicon-stop'  > </span> Nonaktifkan</a>";
					}else{
						$link = "<a href='".site_url('monitor/aktifkan/'.$row->id_ujian)."' title='Aktifkan ujian'><span class='glyphicon glyphicon-play' > </span> Aktifkan</a>";
					}
					echo "<tr $warna><td align='center'><a href='".site_url('monitor/monitor_ujian/'.$row->id_ujian)."' title='".$ket."'><span class='glyphicon glyphicon-th-large'  title='Monitor Ujian'> Monitor</span></a></td>";
					echo "<td>$row->tgl</td>";
					echo "<td>$row->pelajaran</td>";
					echo "<td>$row->nama_guru</td>";
					$thn = $row->tahun+1;
					$link2 = "<a target='blank' href='".site_url('pengaturan_kelas_guru/detail/'.$row->id_kelas)."'  title='Lihat Semua Siswa'><span class='glyphicon glyphicon-list-alt' > </span> ".$row->kelas." (".$row->tahun."/".$thn.")</a>";
					echo "<td>".$link2."</td>";
					echo "<td>".$link."</td></tr>";
		}
	
	?>
	</table>
	</div> <!-- END ROW -->
	<?php break; } ?>