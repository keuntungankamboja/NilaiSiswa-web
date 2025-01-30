<?php 
if (empty($info_ujian)){
	$this->load->view('error.php');
	pesan_error(1);
} else {
switch ($this->session->userdata('type')) {
			case 'guru':
 ?>

<div class="row"> <p></p>          
	<table class="table table-hover ">
	<tr class="active">
	<th>Buat Soal</th>
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
					echo "<tr $warna><td align='center'><a href='".site_url('pengaturan_soal/buatsoal/'.$row->id_ujian)."'  title='".$ket."'><span class='glyphicon glyphicon-pencil'> <i>Soal</i> </span></a></td>";
					echo "<td>$row->tgl</td>";
					echo "<td>$row->pelajaran</td>";
					//echo "<td>$row->nama_guru</td>";
					$thn = $row->tahun+1;
					$link2 = "<a target='blank' href='".site_url('pengaturan_kelas_guru/detail/'.$row->id_kelas)."'><span class='glyphicon glyphicon-list-alt'  title='Lihat Kelas'> </span> ".$row->kelas." (".$row->tahun."/".$thn.")</a>";
					echo "<td>".$link2."</td>";
					echo "<td>$row->jenis_ujian</td>";
					//echo "<td>$row->waktu</td>";
					//echo "<td>$row->standard_nilai</td>";
					echo "<td>
<a href='".site_url('pengaturan_ujian/edit/'.$row->id_ujian)."'><span class='glyphicon glyphicon-edit'  title='Edit Ujian'></span></a> | 
					
					<a href='".site_url('pengaturan_ujian/hapus/'.$row->id_ujian)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash' title='Buat Soal'></span></a></td></tr>";
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
	<tr class="danger">
	<th>Buat Soal</th>
 	<th>Tanggal</th>
	<th>Mata Pelajaran</th>
	<th>Guru</th>
	<th>Kelas</th>
	<th>Jenis Ujian</th>
	<!-- <th>Waktu</th> -->
	<!-- <th>Standard Nilai</th> -->
	<th>#####</th>
	</tr>
	<?php
	foreach ( $info_ujian as $row) {
          			echo "<tr><td align='center'><a href='".site_url('pengaturan_soal/buatsoal/'.$row->id_ujian)."'><span class='glyphicon glyphicon-pencil  title='Buat Soal'> Soal</span></a></td>";
					echo "<td>$row->tgl</td>";
					echo "<td>$row->pelajaran</td>";
					echo "<td>$row->nama_guru</td>";
					$link2 = "<a target='blank' href='".site_url('pengaturan_kelas_guru/detail/'.$row->id_kelas)."'><span class='glyphicon glyphicon-change'  title='Aktifkan ujian'> ".$row->kelas." (".$row->tahun.")</span></a>";
					echo "<td>".$link2."</td>";
					echo "<td>$row->jenis_ujian</td>";
					//echo "<td>$row->waktu</td>";
					//echo "<td>$row->standard_nilai</td>";
					echo "<td>
<a href='".site_url('pengaturan_ujian/edit/'.$row->id_ujian)."'><span class='glyphicon glyphicon-edit  title='Edit Ujian'></span></a> | 
					
					<a href='".site_url('pengaturan_ujian/hapus/'.$row->id_ujian)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Buat Soal'></span></a></td></tr>";
		}
	?>
	</table>
	</div> <!-- END ROW -->
	<?php break; } ?>
	<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin Menghapus Ujian Tersebut ? ");
      return confirmed;
	}
	</script>
<?php } ?>