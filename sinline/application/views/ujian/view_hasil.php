
			<table class="table table-hover table-striped table-bordered">
						<tr class="active">
				<td colspan='3' class="text-center"><br>	<?php
		echo $info_hasil['pes'];
	?><br></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Jumlah Soal</td>
				<td><?php echo $info_hasil['jml_soal'];?> Soal</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Lama Ujian</td>
				<td><?php echo $info_hasil['lama_ujian'];?> Menit</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Waktu Pengerjaan</td>
				<td><?php echo $info_hasil['waktu_pengerjaan'];?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Benar</td>
				<td><?php echo $info_hasil['dijawab_benar'];?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Salah</td>
				<td><?php echo $info_hasil['dijawab_salah'];?></td>
			</tr>
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Belum Dikerjakan</td>
				<td><?php echo$info_hasil['tidak_dijawab'];?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Nilai</td>
				<td><?php
				$format_float = "%.2f"; //2 angka dibelakang koma
				printf($format_float,$info_hasil['poin']);
				?>
				</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Standard Nilai</td>
				<td><?php echo $info_hasil['standard_nilai']; ?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Status</td>
				<td><?php echo $info_hasil['ket'];?></td>
			</tr><tr>
				<td colspan='3' class="text-center"><?php  echo $info_hasil['pes2'];?></td>
			</tr>
			<tr>
				<td colspan='3' class="text-center"><br><A class="btn btn-warning btn-lg" HREF="<?php echo site_url('ujian') ?>">  <span class="glyphicon glyphicon-home"></span> KEMBALI</a><br></td>
			</tr>
			</table>