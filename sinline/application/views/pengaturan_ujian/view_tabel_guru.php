<?php if (empty($guru)) {
	$this->load->view('error.php');
	pesan_error(7);
	exit();
}
 ?>
<div class="row"> <p></p>          
	<table class="table table-hover">
	<tr class="danger">
  <th>Id Guru</th>
	<th>Nama Guru</th>
	<th>Kontak</th>
	<th>#####</th>
	</tr>
	<?php
	foreach ( $guru as $row) {
					echo "<tr><td>$row->id_guru</td>";
					echo "<td>$row->nama_guru</td>";
					echo "<td>$row->kontak</td>";
					echo "<td>
					<a href='".site_url('pengaturan_guru/edit/'.$row->id_guru)."'><span class='glyphicon glyphicon-edit  title='Edit Guru'></span></a> | 
					<a href='".site_url('pengaturan_guru/hapus/'.$row->id_guru)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Buat Soal'></span></a></td></tr>";
		}
	?>
	</table>
	</div> <!-- END ROW -->
			<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin menghapus Data Guru ? ");
      return confirmed;
	}	
</script>