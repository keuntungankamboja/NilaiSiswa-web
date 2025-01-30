<?php if (empty($siswa)) {
	$this->load->view('error.php');
	pesan_error(8);
	exit();
}
 ?>
<div class="row"> <p></p>          
	<table class="table table-hover">
	<tr class="danger">
  <th>NO</th>
  <th>NIS</th>
	<th>Nama siswa</th>
	<th>Jurusan</th>
	<th>Angkatan</th>
	<th>Kontak</th>
	<th>#####</th>
	</tr>
	<?php
	$no = 1;
	foreach ( $siswa as $row) {
					echo "<tr><td>$no</td>";
					echo "<td>$row->nis</td>";
					echo "<td>$row->nama</td>";
					echo "<td>$row->kode_jurusan</td>";
					echo "<td>$row->angkatan</td>";
					echo "<td>$row->kontak</td>";
					echo "<td>
					<a href='".site_url('pengaturan_siswa/edit/'.$row->nis)."'><span class='glyphicon glyphicon-edit  title='Edit Jurusan'></span></a> | 
					<a href='".site_url('pengaturan_siswa/hapus/'.$row->nis)."'  onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Hapus Siswa'></span></a></td></tr>";
		$no++;
		}
	?>
	</table>
	</div> <!-- END ROW -->
<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin menghapus Data Siswa ? ");
      return confirmed;
	}	
</script>
