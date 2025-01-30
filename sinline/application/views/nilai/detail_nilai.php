<?php 
if ( $info_hasil['info']->status=="Tidak Lulus"){
			$info_hasil['ket']  = "Tidak Lulus";
			$info_hasil['pes']  = "<img src='../../bootstrap/images/confused-smiley-emoticon.gif' height='120px' width='100px' class='text-center'/><h2 class='text-center' >MAAF ANDA TIDAK LULUS</h2><br>";
}
		else {
			$info_hasil['ket']  = "Lulus";
			$info_hasil['pes']  = "<img src='../../bootstrap/images/jumping-for-joy-smiley-emoticon-2.gif' height='120px' width='100px' class='text-center'/><h2 class='text-center' >SELAMAT ANDA LULUS</h2><br>";
			//echo "<br> Status : $ket <br>";
		}
?>
			<table class="table table-hover table-striped table-bordered">
						<tr class="active">
				<th colspan='3' class="text-center"><h3>Tabel Detail Nilai</h3><br>	<?php
		echo $info_hasil['pes'];
	?><br></th>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Id Ujian</td>
				<td><?php echo $info_hasil['info2']->id_ujian;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Mata Pelajaran</td>
				<td><?php echo $info_hasil['info2']->pelajaran;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Kelas</td>
				<td><?php echo $info_hasil['info2']->kelas; echo " (".$info_siswa->jurusan.")"; //echo ' ('.$info_siswa->angkatan.')';?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Nama Guru</td>
				<td><?php echo $info_hasil['info2']->nama_guru;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Kompetensi</td>
				<td><?php echo $info_hasil['info2']->kompetensi;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Jenis Ujian</td>
				<td><?php echo $info_hasil['info2']->jenis_ujian;?></td>
			</tr>
			<tr>
                			<td></td>
                			<td>Tanggal Ujian</td>
                			<td class="text-left"> <?php echo substr($info_hasil['info2']->tgl,0,16); ?></td>
                		</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Jumlah Soal</td>
				<td><?php echo $info_hasil['info']->jml_soal;?> Soal</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Lama Ujian</td>
				<td><?php echo $info_hasil['info2']->waktu;?> Menit</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Waktu Pengerjaan</td>
				<td><?php echo $info_hasil['info']->waktu;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Benar</td>
				<td><?php echo $info_hasil['info']->benar;?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Salah</td>
				<td><?php echo $info_hasil['info']->salah;?></td>
			</tr>
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Belum Dikerjakan</td>
				<td><?php echo $info_hasil['info']->kosong;?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Nilai</td>
				<td><?php
				$format_float = "%.2f"; //2 angka dibelakang koma
				printf($format_float,$info_hasil['info']->skor);
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
				<td><?php echo $info_hasil['info']->status; ?></td>
			</tr>
			<tr>
				<td colspan='3' class="text-center"><br><A class="btn btn-warning" HREF="..">  <span class="glyphicon glyphicon-arrow-left"></span> Kembali</a><br></td>
			</tr>
			</table>