<?php 
if (empty($jurusan)) {
	$this->load->view('error.php');
	pesan_error(9);
	exit();
}
?>
<div class="row"> <p></p>       
	<table class="table table-hover">
	<tr class="danger">
  <th>Kode Jurusan</th>
	<th>Nama Jurusan</th>
	<th>#####</th>
	</tr>
	<?php
	foreach ( $jurusan as $row) {
					echo "<tr><td>$row->kode_jurusan</td>";
					echo "<td>$row->jurusan</td>";
					echo "<td>
					<a href='".site_url('pengaturan_jurusan/edit/'.$row->kode_jurusan)."'><span class='glyphicon glyphicon-edit  title='Edit Jurusan'></span></a> | 
					<a href='".site_url('pengaturan_jurusan/hapus/'.$row->kode_jurusan)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Hapus Jurusan'></span></a>
					</td></tr>";
		}
	?>
	</table>
	</div> <!-- END ROW -->
	<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin menghapus Data Jurusan ? ");
      return confirmed;
	}	
</script>






	