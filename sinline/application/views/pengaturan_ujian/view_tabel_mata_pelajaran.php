<?php if (empty($mata_pelajaran)) {
	$this->load->view('error.php');
	pesan_error(6);
	exit();
}
 ?>
	<div class="row"> <p></p>          
	<table class="table table-hover">
	<tr class="danger">
  <th>Id Pelajaran</th>
	<th>Mata Pelajaran</th>
	<th>Guru</th>
	<th>Jurusan</th>
	<th>Tahun Ajaran</th>
	<th>#####</th>
	</tr>
	<?php
	foreach ( $mata_pelajaran as $row) {

					echo "<tr><td>$row->id_mata_pelajaran</td>";
          echo "<td>$row->pelajaran</td>";
					echo "<td>$row->nama_guru</td>";
					echo "<td>$row->kode_jurusan</td>";
					$thn = $row->tahun+1;
					echo "<td>$row->tahun/$thn</td>";
					echo "<td>
<a href='".site_url('pengaturan_pelajaran/edit/'.$row->id_mata_pelajaran)."'><span class='glyphicon glyphicon-edit  title='Edit Pelajaran'></span></a> | 
					
					<a href='".site_url('pengaturan_pelajaran/hapus/'.$row->id_mata_pelajaran)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Buat Soal'></span></a></td></tr>";
		}
	?>
	</table>
	</div> <!-- END ROW -->
	<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin Menghpus Mata Pelajaran Tersebut ? ");
      return confirmed;
	}
	</script>