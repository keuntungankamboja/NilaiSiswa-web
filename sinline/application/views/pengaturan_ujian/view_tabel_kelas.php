
<?php 
if (empty($kelas)) {
	$this->load->view('error.php');
	pesan_error(5);
	exit();
}
?>
<div class="row"> <p></p>       
	<table class="table table-hover">
	<tr class="danger">
  <th>Daftar Siswa</th>
  <th>kelas</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>Aksi</th>
	</tr>
	<?php
	foreach ( $kelas as $row) {
					echo "<tr><td><a href='".site_url('pengaturan_kelas/detail/'.$row->id_kelas)."'><span class='glyphicon glyphicon-list  title='detail kelas'></span></a></td>";
					echo "<td>$row->kelas</td>";
					echo "<td>$row->kode_jurusan</td>";
					$thn = $row->tahun + 1;
					echo "<td>$row->tahun / ".$thn."</td>";
					echo "<td>
					<a href='".site_url('pengaturan_kelas/edit/'.$row->id_kelas)."'><span class='glyphicon glyphicon-edit  title='Edit kelas'></span></a> | 
					<a href='".site_url('pengaturan_kelas/hapus/'.$row->id_kelas)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Hapus kelas'></span></a>
					</td></tr>";
		}
	?>
	</table>
	</div> <!-- END ROW -->
	<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin menghapus Data kelas ? ");
      return confirmed;
	}	
</script>






	