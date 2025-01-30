<?php   $this->load->view('view_header.php');
        view_header(1); ?>
                	<table class="table table-striped" >
                		<tr>
                			<th colspan="3" class="text-center"><h4>LAPORAN HASIL UJIAN</h4></th>
                		</tr>
                		<tr>
                			<td width="35%"></td>
                			<td class="text-left" width="15%">Pelajaran</td>
                			<td class="text-left"> : <?php echo $info_ujian->pelajaran;?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Kelas</td>
                			<td class="text-left"> : <?php echo $info_ujian->kelas; echo ' ('.$info_ujian->tahun.')';?></td>
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
                	</table>
                        <?php 
                        $daftar_siswa = $this->model_ujian->hasil_ujianskor($info_ujian->id_ujian);
                        if (!empty($daftar_siswa)) {
                         ?>
				<table class="table table-stripped table-bordered">
				<tr>
				<th>No</th>
						<th><center>NIS</center></th>
						<th><center>Nama</center></th>
						<th><center>Benar</center></th>
						<th><center>Salah</center></th>
						<th><center>Belum <p>Dikerjakan</center></th>
						<th><center>Nilai</th>
						<th><center>Status</center></th>
						<th><center>Waktu</center></th>
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
										<td><center>$value->waktu</center></td>
										</tr>";
									$no++;
				} $no--;echo "<tr><td colspan=10 class='text-right'>Mengikuti Ujian = $no Siswa</td></tr></table>"; 
                               
                                if (empty($siswa_tdk_ujian)) {
                                        echo "Semua Siswa Mengikuti Ujian";
                                } else {
                                echo "<table class='table'>                             <tr>
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
                        }