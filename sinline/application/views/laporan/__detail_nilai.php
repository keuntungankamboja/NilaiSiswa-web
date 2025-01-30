
$s="INSERT INTO pendaftaran (
no_pendaftaran ,nama_lengkap , nama_panggilan ,tempat_lahir ,tgl_lahir ,jenis_kelamin , alamat_lengkap ,agama ,email ,no_telepon ,no_hp ,nama_facebook ,link_facebook ,pin_bb ,aktifitas
) VALUES (
'$no_pendaftaran' ,'$nama_lengkap' ,'$nama_panggilan' ,'$tempat_lahir' ,'$tgl_lahir' ,'$jenis_kelamin' ,'$alamat_lengkap' ,'$agama' ,'$email' ,'$no_telepon' ,'$no_hp' ,'$nama_facebook' ,'$link_facebook' ,'$pin_bb' ,'$aktifitas'
)";
			<table>
			<tr>
				<td width="20%"><img src='<?php echo base_url('bootstrap/images/logo2.jpg') ?>' height='140px' width='120px'/></td>
				<td class='text-center' width="80%">
				  	<h4>PEMERINTAH KOTA PROBOLINGGO</h4>
<h4>D I N A S&nbsp;&nbsp; P E N D I D I K A N</h4>
<h4>SMK  NEGERI 1 KRAKSAAN</h4>
<h5>Jl. Tenis 10 Telp/Fax. (0335) 841306 Kode Pos 67282</h5><p>
<h5>Website : <a href='http://www.smkn1kraksaan.sch.id'>www.smkn1kraksaan.sch.id</a> / Email : <a href="mailto:admin@smkn1kraksaan.sch.id">admin@smkn1kraksaan.sch.id</a></h5>
<h4>PROBOLINGGO</h4>
				</td>
				<td width="20%"><img src='<?php echo base_url('bootstrap/images/logo.jpg') ?>' height='140px' width='120px'/></td>
			</tr>
	</table>
		<table class="table table-striped">
						<tr class="active">
				<th colspan='3' class="text-center"><h3>Laporan Hasil Ujian</h3><br>
		</th>
			</tr>
			                		<tr>
                			<td width="15%"></td>
                			<td class="text-left" width="25%">Nis</td>
                			<td class="text-left"> : <?php echo $info_siswa->nis;?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Nama</td>
                			<td class="text-left"> : <?php echo $info_siswa->nama; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Kelas</td>
                			<td class="text-left"> : <?php echo $info_hasil['info2']->kelas; echo " "; echo "(".$info_siswa->jurusan.")"; //echo ' ('.$info_siswa->angkatan.')';?></td>
                		</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Id Ujian</td>
				<td>: <?php echo $info_hasil['info2']->id_ujian;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Mata Pelajaran</td>
				<td>: <?php echo $info_hasil['info2']->pelajaran;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Nama Guru</td>
				<td>: <?php echo $info_hasil['info2']->nama_guru;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Kompetensi</td>
				<td>: <?php echo $info_hasil['info2']->kompetensi;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Jenis Ujian</td>
				<td>: <?php echo $info_hasil['info2']->jenis_ujian;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Jumlah Soal</td>
				<td>: <?php echo $info_hasil['info']->jml_soal;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Lama Ujian</td>
				<td>: <?php echo $info_hasil['info2']->waktu;?> Menit</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Waktu Pengerjaan</td>
				<td>: <?php echo $info_hasil['info']->waktu;?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Benar</td>
				<td>: <?php echo $info_hasil['info']->benar;?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Salah</td>
				<td>: <?php echo $info_hasil['info']->salah;?></td>
			</tr>
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Belum Dikerjakan</td>
				<td>: <?php echo $info_hasil['info']->kosong;?></td>
			</tr>
			
			
			<tr>
				<td width='30%'></td>
				<td width='20%'>Nilai</td>
				<td>: <?php
				$format_float = "%.2f"; //2 angka dibelakang koma
				printf($format_float,$info_hasil['info']->skor);
				?>
				</td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Standard Nilai</td>
				<td>: <?php  echo $info_hasil['info2']->standard_nilai; ?></td>
			</tr>
			<tr>
				<td width='30%'></td>
				<td width='20%'>Status</td>
				<td>: <?php echo $info_hasil['info']->status; ?></td>
			</tr>
			</table>