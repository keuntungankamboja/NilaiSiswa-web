    <div class="panel panel-default">
	<div class="panel-body">
	 <div class="col-sm-12">
      <div class="row">
      <div class="well">
                  <table class="table table-striped" >
                    <tr>
                      <th colspan="3" class="text-center"><h4>INFORMASI DATA KELAS</h4></th>
                    </tr>
                    <tr>
                      <td width="35%"></td>
                      <td class="text-left" width="15%">Kelas</td>
                      <td class="text-left"> : <?php echo $kelas->kelas; //echo " ".$kelas->kode_jurusan;?></td>
                    </tr>

                    <tr>
                      <td></td>
                      <td>Tahun Ajaran</td>
                      <td class="text-left"> : <?php $thn = $kelas->tahun+1; echo "$kelas->tahun/".$thn.""; ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Jumlah Siswa</td>
                      <td class="text-left"> : <?php echo $isi_kelas; ?></td>
                    </tr>
                  </table>

                </div>
               

  </div> <!-- end row -->
     </div>
    <div class="col-sm-8 col-md-offset-2">
			
<div class="row"> <p></p>       
	<table class="table table-hover table-bordered ">
	<tr class="danger">
  <th>No</th>
  <th>Nis</th>
  <th>Nama</th>
	<th>Kontak</th>
	</tr>
	<?php
	$no = 1;
	foreach ( $detail_kelas as $row) {
					echo "<td>$no</td>";
					echo "<td>$row->nis</td>";
					echo "<td>$row->nama</td>";
					echo "<td>$row->kontak</td>";
					echo "</tr>";
					$no++;
		}
	?>
	</table>
	</div> <!-- END ROW -->
    </div>
  </div>
    </div>

<?php 
if (empty($detail_kelas)) {
	echo "Tidak Ada Siswa dalam kelas ini";
	exit();
}
?>
