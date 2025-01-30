<?php if (empty($list_nilai)) {
	$this->load->view('error.php');
	pesan_error(2);
	exit();
	}
	?>

<table class="table">
				  			<tr class="warning">
				  				<th>Id Ujian</th>
				  				<th>Mata Pelajaran</th>
				  				<th>Guru</th>
				  				<th>Jenis Ujian</th>
				  				<th>Hasil</th>
				  				<th>Status</th>
				  				<th colspan="2">#####</th>
				  			</tr>
							<?php 
							foreach ($list_nilai as $value) {
								?>
								<tr>
									<td><?php echo $value->id_ujian; ?></td>
									<td><?php echo $value->pelajaran; ?></td>
									<td><?php echo $value->nama_guru; ?></td>
									<td><?php echo $value->jenis_ujian; ?></td>
									<td><?php echo $value->skor; ?> Poin</td>
									<td><?php echo $value->status; ?></td>
									<?php echo "<td><a href='".site_url('nilai/detail_nilai/'.$value->id_ujian)."'><span class='glyphicon glyphicon-zoom-in'  title='Detail Hasil Ujian'></span></a>";
									//<a target='blank'href='".site_url('laporan/detail_nilai/'.$value->id_ujian)."'><span class='glyphicon glyphicon-print' title='Print Laporan Ujian'></span></a>";
									$periksa = $this->model_ujian->cek_ujian_aktif($value->id_ujian);
									if (!empty($periksa)) {
										echo " | <a target='blank'href='".site_url('laporan/soal/'.$value->id_ujian)."'><span class='glyphicon glyphicon-th' title='Laporan Soal'></span></a>";
									}
									echo "</td></tr>"; ?>
								</tr>
								<?php
							}
							?>
				  		</table>