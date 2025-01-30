<?php
if (empty($info_ujian)){
	echo "Tidak Ada Ujian";
}else {
	?>
		<div class="well">
                	<table class="table table-striped" >
                		<tr>
                			<th colspan="3" class="text-center"><h4>MONITORING UJIAN</h4></th>
                		</tr>
                		<tr>
                			<td width="35%"></td>
                			<td class="text-left" width="15%">Pelajaran</td>
                			<td class="text-left"> : <?php echo $info_ujian->pelajaran;?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Kelas</td>
                			<td class="text-left"> : <?php $thn = $info_ujian->tahun+1; echo $info_ujian->kelas; echo ' 	('.$info_ujian->tahun.'/'.$thn.')';?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jumlah Siswa</td>
                			<td class="text-left"> : <?php echo $jml_siswa_dalam_kelas; ?> Siswa</td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Nama Guru</td>
                			<td class="text-left"> : <?php echo $info_ujian->nama_guru; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jenis Ujian</td>
                			<td class="text-left"> : <?php echo $info_ujian->jenis_ujian; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Kompetensi</td>
                			<td class="text-left"> : <?php echo $info_ujian->kompetensi; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jumlah Soal</td>
                			<td class="text-left"> : <?php //lihat jumlah soal
					$jml_soal = $this->model_ujian->lihat_junlah_soal($info_ujian->id_ujian); echo $jml_soal; ?> Soal</td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Standard Nilai</td>
                			<td class="text-left"> : <?php echo $info_ujian->standard_nilai; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Waktu</td>
                			<td class="text-left"> : <?php echo $info_ujian->waktu; ?> Menit</td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Tanggal Ujian</td>
                			<td class="text-left"> : <?php echo substr($info_ujian->tgl,0,16); ?></td>
                		</tr>
                		<tr>
                      <td colspan="3" class="text-center">
                      <?php echo "<a class='btn btn-primary' target='blank' href='".site_url('laporan/hasil_ujian/'.$info_ujian->id_ujian)."'><span class='glyphicon glyphicon-list-alt'></span> Laporan Nilai</a>";?>
                      <?php echo "<a class='btn btn-primary' target='blank' href='".site_url('laporan/Analisis_soal/'.$info_ujian->id_ujian)."'><span class='glyphicon glyphicon-list-alt'></span> Laporan Analisis Soal</a>";?>
                      </td>
                      </tr>
                	</table>

                </div>
    <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	<?php $daftar_siswa = $this->model_ujian->hasil_ujianskor($info_ujian->id_ujian);
				if (!empty($daftar_siswa)) { ?>
				<table class="table table-hover">
				<tr>
					<th colspan="10" class="text-center"><h4>Hasil Ujian</h4></th>
				</tr>
				<tr class="danger">
				<th>No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Benar</th>
						<th>Salah</th>
						<th>Belum Dikerjakan</th>
						<th>Nilai</th>
						<th><center>Status</center></th>
						<th><center>Monitor</center></th>
						<th><center>Reset</center></th>
				</tr>
				<?php 
				$no=1;
				foreach ($daftar_siswa as $value) {
					echo"<tr>
										<td>$no.</td>
										<td>$value->id_siswa</td>
										<td>$value->nama</td>
										<td><center>$value->benar</center></td>
										<td><center>$value->salah</center></td>
										<td><center>$value->kosong</center></td>
										<td><center>$value->skor</center></td>
										<td><center>$value->status</center></td>
										<td><center><a href='".site_url('monitor/monitor_ujian_siswa/'.$info_ujian->id_ujian.'/'.$value->id_siswa)."'>Monitor Siswa</a></center></td>
										<td><center><a href='".site_url('monitor/reset/'.$info_ujian->id_ujian.'/'.$value->id_siswa)."' >Reset</a></center></td>
										</tr>";
									$no++;
				} $no--; echo "<tr><td colspan=10 class='text-right'>Mengikuti Ujian = $no Siswa</td></tr></table>"; 
				if (empty($siswa_tdk_ujian)) {
					echo "Semua Siswa Mengikuti Ujian";
				} else {
				echo "<table class='table'>				<tr>
					<th colspan='4' class='text-center'><h4>Siswa Yang Tidak mengikuti Ujian</h4></th>
				</tr><tr  class='danger'><th>No.</th><th>NIS</th>
				<th>Nama</th><td>kontak</td></tr>";
				$no = 1;
				foreach ($siswa_tdk_ujian as $value) {
						echo "<tr><td>$no.</td>";
						echo "<td>$value->nis</td>";
						echo "<td>$value->nama</td>";
						echo "<td>$value->kontak</td></tr>";
						$no++;
				}$no--;
                                echo "<tr><td colspan=4 class='text-right'>Tidak Mengikuti Ujian = $no Siswa</td></tr></table>"; 
				}
				} else {
					$this->load->view('error.php');
					pesan_error(4);
					echo "</table>";
					}
				?>
				
	</div> <!-- end row -->
	
	</div>
	</div></div>
















	<!-- <?php $daftar_siswa = $this->model_ujian->daftar_siswa_ikut_ujian($info_ujian->id_ujian);
				if (!empty($daftar_siswa)) { ?>
				<table class="table table-hover">
				<tr class="danger">
				<th>No</th>
						<th>NIS</th>
						<th>Nama</th>
						<th>Benar</th>
						<th>Salah</th>
						<th>Belum Dikerjakan</th>
						<th>Nilai</th>
						<th><center>Status</center></th>
						<th><center>Monitor</center></th>
						<th><center>Reset</center></th>
				</tr>
				<?php 
				$no=1;
				foreach ($daftar_siswa as $value) {
					//nama siswa
					$nama_siswa = $this->model_user->info_siswa($value->id_siswa);
					
					//yang benar
					$yng_benar = $this->model_ujian->dijawab_benar($value->id_siswa,$info_ujian->id_ujian);
					//yang salah
					$yng_salah = $this->model_ujian->dijawab_salah($value->id_siswa,$info_ujian->id_ujian);
					//soal yang dikerjakan
					$yng_dikerjakan = $this->model_ujian->lihat_soal_dijawab($value->id_siswa,$info_ujian->id_ujian);
					//soal tdk dikerjakan
					$yng_tdkdikerjakan = $jml_soal - $yng_dikerjakan;
					//point siswa
					$poin =$this->model_ujian->lihat_poin($value->id_siswa,$info_ujian->id_ujian);
					$nilai = 0;
					if (isset($poin)){
						foreach ($poin as $value2) {
						$nilai=$nilai+$value2->poin;
						}
					}
					//keterangan
					if ($nilai>100){$nilai=100;}
					if ($nilai>=$info_ujian->standard_nilai) $ket="lulus";
					else $ket = "tidak lulus";
					echo"<tr>
										<td>$no.</td>
										<td>$value->id_siswa</td>
										<td>$nama_siswa->nama</td>
										<td><center>$yng_benar</center></td>
										<td><center>$yng_salah</center></td>
										<td><center>$yng_tdkdikerjakan</center></td>
										<td><center>$nilai</center></td>
										<td><center>$ket</center></td>
										<td><center><a href='".site_url('monitor/monitor_ujian_siswa/'.$info_ujian->id_ujian.'/'.$value->id_siswa)."'>Monitor Siswa</a></center></td>
										<td><center><a href='".site_url('monitor/reset/'.$info_ujian->id_ujian.'/'.$value->id_siswa)."' >Reset</a></center></td>
										</tr>";
									$no++;
				} $no--; echo "<tr><td colspan=9></td><td>Jumlah Peserta = $no</td></tr>"; 
	
				} else {
					echo "Belum ada siswa yang mengikuti ujian";
					}
				?>
				</table>
	</div> end row
	
	</div>
	</div></div> -->
	<?php } ?>