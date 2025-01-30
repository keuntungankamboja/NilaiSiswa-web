
	<div class="well">
                        <table class="table table-striped" >
                            <tr>
                                <th colspan="3" class="text-center"><h4>IDENTITAS</h4></th>
                            </tr>
                            <tr>
                                <td width="35%"></td>
                                <td class="text-left" width="15%">Nis</td>
                                <td class="text-left"> : <?php echo $info_siswa->nis;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Nama</td>
                                <td class="text-left"> : <?php echo $info_siswa->nama; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Jurusan</td>
                                <td class="text-left"> : <?php echo $info_siswa->jurusan; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Angkatan</td>
                                <td class="text-left"> : <?php echo $info_siswa->angkatan; ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Kontak</td>
                                <td class="text-left"> : <?php echo $info_siswa->kontak; ?></td>
                            </tr>
                        </table>
    
                    </div>
    <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
    <?php 
if (empty($info_ujian)){
    $this->load->view('error.php');
    pesan_error(3);
}else {
    ?>         
	<table class="table">
	<tr class="danger">
    <th>Id Ujian</th>
    <th>Mata Pelajaran</th>
	<th>Kelas</th>
	<th>Guru</th>
	<th>Waktu</th>
	<th>Jenis Ujian</th>
	<th>#####</th>
	</tr>
	<?php
	foreach ( $info_ujian as $row) {
					echo "<tr><td>$row->id_ujian</td>";
                    echo "<td>$row->pelajaran</td>";
                    echo "<td>$row->kelas</td>";
					echo "<td>$row->nama_guru</td>";
					echo "<td>$row->waktu Menit</td>";
					echo "<td>$row->jenis_ujian</td>";
					echo "<td><a href='".site_url('ujian/u/'.$row->id_ujian)."'><span class='glyphicon glyphicon-edit'  title='Mulai Ujian'> Mulai</span></a></tr>";
		}
	}
	?>
	</table>
	</div> <!-- END ROW -->

	</div>
	</div>