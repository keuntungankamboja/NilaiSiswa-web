<?php
if (empty($info_ujian)){
	echo "Tidak Ada Ujian";
} else {
	//menghitung jumlah peserta
		$daftar_siswa = $this->model_ujian->daftar_siswa_ikut_ujian($info_ujian->id_ujian);		
		$jml_peserta=0;
		foreach ($daftar_siswa as $value)
		{
			$jml_peserta++;
		}
	?>
		<div class="well">
                	<table class="table table-striped" >
                		<tr>
                			<th colspan="3" class="text-center"><h4>MONITOR JAWABAN SISWA</h4></th>
                		</tr>
                		<tr>
                			<td width="35%"></td>
                			<td class="text-left" width="15%">NIS</td>
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
                			<td class="text-left"> : <?php $thn = $info_ujian->tahun+1; echo $info_ujian->kelas; echo ' 	('.$info_ujian->tahun.'/'.$thn.')';?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Kontak</td>
                			<td class="text-left"> : <?php echo $info_siswa->kontak; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Angkatan</td>
                			<td class="text-left"> : <?php echo $info_siswa->angkatan; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Id Ujian</td>
                			<td class="text-left"> : <?php  echo $info_ujian->id_ujian;?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Mata Pelajaran</td>
                			<td class="text-left"> : <?php echo $info_ujian->pelajaran; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Nama Guru</td>
                			<td class="text-left"> : <?php echo $info_ujian->nama_guru; ?> </td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Tanggal Ujian</td>
                			<td class="text-left"> : <?php echo substr($info_ujian->tgl,0,16); ?></td>
                		</tr>
					  <tr>
                      <td colspan="3" class="text-center">
                      <?php echo "<a class='btn btn-primary' href='".site_url('monitor/monitor_ujian/'.$info_ujian->id_ujian.'/'.$info_siswa->nis)."'><span class='glyphicon glyphicon-home'></span> Kembali</a>";?>
                      </td>
                      </tr>
                		<!-- <tr>
                			<td></td>
                			<td>Jumlah Soal</td>
                			<td class="text-left"> : <?php $jml_soal = $this->model_ujian->lihat_junlah_soal($info_ujian->id_monitor_ujian); echo $jml_soal;?> Soal</td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jumlah Peserta</td>
                			<td class="text-left"> : <?php echo $jml_peserta;?> Siswa</td>
                		</tr> -->
                	</table>

                </div>
    <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
				


<table class="table">
<?php
foreach ($soal as $row)
		{
			?>
	<form><tr>
		<td width='30px' valign='top'><?php echo $no; echo ".";?></td>
			<td>
			<?php echo $row->pertanyaan; ?>

			<table>
      <tr  valign='top'>
        <td><span class="label label-primary">A</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='A' <?php if ($row->jawaban_siswa=="A") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_a; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">B</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='B' <?php if ($row->jawaban_siswa=="B") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_b ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">C</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='C' <?php if ($row->jawaban_siswa=="C") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_c; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">D</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='D' <?php if ($row->jawaban_siswa=="D") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_d; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">E</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='E' <?php if ($row->jawaban_siswa=="E") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_e; ?></td>
      </tr>
      </table>  		  							
			</td>	
	</tr></form><tr class="primary"><td colspan="2">
		<?php
		//yang menjawab benar dan salah
		$yng_menjawabbenar = $this->model_ujian->menjawab_benar($row->id_soal_swap,$info_ujian->id_ujian);
		$yng_menjawabsalah = $this->model_ujian->menjawab_salah($row->id_soal_swap,$info_ujian->id_ujian);


		//menghitung indek kesukaran
		$i_kesukaran = $yng_menjawabbenar/$jml_peserta;
							/* 
								0,00 – 0,30 : soal sukar
								0,31 – 0,70 : soal sedang
								0,71 – 1,00 : soal mudah */
								
		if ($i_kesukaran>=0.70){ $status_soal = "mudah";}
		else if ($i_kesukaran>=0.30){ $status_soal = "sedang";}
		else {$status_soal = "sukar";}
		$format_float = "$status_soal (%.2f)"; //2 angka dibelakang koma
		
		//Daya Pembeda
		$bagi = $this->model_ujian->jumlah_peserta_bagi_dua($info_ujian->id_ujian);
		$pos_a = 0;
		$pos_b = $bagi;

		$swap1 = $this->model_ujian->yang_benar_gol($info_ujian->id_ujian,$pos_a,$bagi);
		$yng_benar_golonganatas=0;
		//echo "Golongan Atas<br>";
		foreach ($swap1 as $hasil) {
			//melihat benar atau salah jawaban siswa golongan bawah
			$swap2 = $this->model_ujian->cek_siswa_yang_benar_gol($info_ujian->id_ujian,$hasil->id_siswa,$row->id_soal_swap);
			$yng_benar_golonganatas = $yng_benar_golonganatas+$swap2;
			/*echo $hasil->id_siswa;
			echo " = ";
			echo $swap2;
			echo " | ";*/
		}
		$swap1 = $this->model_ujian->yang_benar_gol($info_ujian->id_ujian,$pos_b,$bagi);
		$yng_benar_golonganbawah=0;
		//echo "<br>Golongan Bawah<br>";
		foreach ($swap1 as $hasil) {
			//melihat benar atau salah jawaban siswa golongan bawah
			$swap2 = $this->model_ujian->cek_siswa_yang_benar_gol($info_ujian->id_ujian,$hasil->id_siswa,$row->id_soal_swap);
			$yng_benar_golonganbawah = $yng_benar_golonganbawah+$swap2;
			/*echo $hasil->id_siswa;
			echo " = ";
			echo $swap2;
			echo " | ";*/
		}
		if (($yng_benar_golonganatas==0) && (($yng_benar_golonganbawah!=0)))
			{
				$daya_pembeda = 0-($yng_benar_golonganbawah/$bagi);	
			}
		else if (($yng_benar_golonganatas!=0) && (($yng_benar_golonganbawah==0)))
			{
				$daya_pembeda = $yng_benar_golonganatas/$bagi;	
			}
		else if (($yng_benar_golonganatas==0) && (($yng_benar_golonganbawah==0)))
			{
				$daya_pembeda = 0;	
			}
		else 
			{ 
				$daya_pembeda = ($yng_benar_golonganatas/$bagi)-($yng_benar_golonganbawah/$bagi);
			}	
									
		if ($daya_pembeda>=0.70)
			{ 
				$status_daya = "Baik Sekali";
			}
		else if ($daya_pembeda>=0.40)
			{ 
				$status_daya = "Baik";
			}
		else if ($daya_pembeda>=0.20)
			{ 
				$status_daya = "Cukup";
			}
		else {
				$status_daya = "Jelek";
			}
		$format_float_pembeda = "$status_daya (%.2f)";


		//EFEKTIFITAS DISTRAKTOR
		$yng_menjawab_a = $this->model_ujian->menjawab_a($row->id_soal_swap,$info_ujian->id_ujian,'A');
		$yng_menjawab_b = $this->model_ujian->menjawab_a($row->id_soal_swap,$info_ujian->id_ujian,'b');
		$yng_menjawab_c = $this->model_ujian->menjawab_a($row->id_soal_swap,$info_ujian->id_ujian,'C');
		$yng_menjawab_d = $this->model_ujian->menjawab_a($row->id_soal_swap,$info_ujian->id_ujian,'D');
		$yng_menjawab_e = $this->model_ujian->menjawab_a($row->id_soal_swap,$info_ujian->id_ujian,'E');
		$format_float2 = " (%.2f ";
		$persentasejawaban_A = ($yng_menjawab_a/$jml_peserta)*100;
			if($persentasejawaban_A>=5){$aa="Diterima";}
			else if($persentasejawaban_A>=1){$aa="Diperbaiki";}
			else {$aa="Dibuang";}
				$persentasejawaban_B = ($yng_menjawab_b/$jml_peserta)*100;
			if($persentasejawaban_B>=5){$bb="Diterima";}
			else if($persentasejawaban_B>=1){$bb="Diperbaiki";}
			else {$bb="Dibuang";}
				$persentasejawaban_C = ($yng_menjawab_c/$jml_peserta)*100;
			if($persentasejawaban_C>=5){$cc="Diterima";}
			else if($persentasejawaban_C>=1){$cc="Diperbaiki";}
			else {$cc="Dibuang";}
				$persentasejawaban_D = ($yng_menjawab_d/$jml_peserta)*100;
			if($persentasejawaban_D>=5){$dd="Diterima";}
			else if($persentasejawaban_D>=1){$dd="Diperbaiki";}
			else {$dd="Dibuang";}
				$persentasejawaban_E = ($yng_menjawab_e/$jml_peserta)*100;
			if($persentasejawaban_E>=5){$ee="Diterima";}
			else if($persentasejawaban_E>=1){$ee="Diperbaiki";}
			else {$ee="Dibuang";}
		echo "<table class='table table-bordered'>
									<tr ><th rowspan='2' width='25px'>J</th>
									<th rowspan='2' width='25px'>K</th>
									<th rowspan='2' width='25px'>B</th>
									<th rowspan='2' width='25px'>S</th>
									<th rowspan='2' width='90px'>Taraf Kesukaran</th>
									<th rowspan='2' width='90px'>Daya Pembeda</th>
									<th colspan='5' >Pola Jawaban Soal</th>
									</tr>
									<tr>
										<th>A</th>
										<th>B</th>
										<th>C</th>
										<th>D</th>
										<th>E</th>
									</tr>
									<tr>
										<td>$row->jawaban_siswa</td>
										<td>$row->jawaban</td>
										<td>$yng_menjawabbenar</td>
										<td>$yng_menjawabsalah</td>
										<td>";
										printf($format_float,$i_kesukaran);
										echo "</td><td>";
										printf($format_float_pembeda,$daya_pembeda);
										echo "</td><td width='90px'>$aa<br>$yng_menjawab_a";
										printf($format_float2,$persentasejawaban_A);
										echo "%)</td><td width='90px'>$bb<br>$yng_menjawab_b";
										printf($format_float2,$persentasejawaban_B);
										echo "%)</td><td width='90px'>$cc<br>$yng_menjawab_c";
										printf($format_float2,$persentasejawaban_C);
										echo "%)</td><td width='90px'>$dd<br>$yng_menjawab_d";
										printf($format_float2,$persentasejawaban_D);
										echo "%)</td><td width='90px'>$ee<br>$yng_menjawab_e";
										printf($format_float2,$persentasejawaban_E);
										echo "%)</td>
									</tr></table></td></tr>";
		$no++;
		}		
?>	
</table>
<center>
<ul class="pagination">
<?php
for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman){
			$a = site_url('monitor/monitor_ujian_siswa/'.$info_ujian->id_ujian.'/'.$info_siswa->nis.'/'.$i);
				echo "<li><a href='$a'>".$i."</a></li>";
					}
		 else{
				echo "<li class='active'><a href='#'>".$i."<span class='sr-only'>(current)</span></a></li>";
		}
		 ?><ul></center>
	</div> <!-- end row -->

	</div>
	</div>	
</div>
	<?php } ?>