<?php 
if (empty($detail_kelas)) {
	echo "Tidak Ada Siswa dalam kelas ini";
	exit();
}
?>

<div class="row"> <p></p>       
	<table class="table table-hover table-bordered ">
	<tr class="danger">
  <th>No</th>
  <th>Nis</th>
  <th>Nama</th>
	<th>Kontak</th>
	<th>#####</th>
	</tr>
	<?php
	$no = 1;
	foreach ( $detail_kelas as $row) {
					echo "<td>$no</td>";
					echo "<td>$row->nis</td>";
					echo "<td>$row->nama</td>";
					echo "<td>$row->kontak</td>";
					echo "<td>
					<a href='".site_url('pengaturan_kelas/hapus_nis/'.$kelas->id_kelas.'/'.$row->nis)."' onclick='return confirmAction()'><span class='glyphicon glyphicon-trash  title='Hapus kelas'></span></a>
					</td></tr>";
					$no++;
		}
	?>
	</table>
	</div> <!-- END ROW -->
	<script type="text/javascript">
function confirmAction(){
      var confirmed = confirm("Apakah Anda Yakin Ingin menghapus siswa dari kelas ? ");
      return confirmed;
	}	
</script>