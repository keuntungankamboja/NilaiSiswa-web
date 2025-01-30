<?php
	$jml_peserta = $this->model_ujian->daftar_siswa_ikut_ujian2($info_ujian->id_ujian);
	$jml_soal    = $this->model_ujian->lihat_junlah_soal($info_ujian->id_ujian);
	//tampilkan header smk
	$this->load->view('view_header.php');
	view_header(1);
?>

                	<table class="table table-striped" >
                		<tr>
                			<th colspan="3" class="text-center"><h4>LAPORAN HASIL ANALISIS SOAL</h4></th>
                		</tr>
                		<tr>
                			<td width="35%"></td>
                			<td class="text-left" width="15%">Kelas</td>
                			<td class="text-left"> : <?php echo $info_ujian->kelas; echo ' ('.$info_ujian->tahun.')'; ?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Id Ujian</td>
                			<td class="text-left"> : <?php  echo $info_ujian->id_ujian;?></td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jumlah Peserta</td>
                			<td class="text-left"> : <?php  echo $jml_peserta;?> Siswa</td>
                		</tr>
                		<tr>
                			<td></td>
                			<td>Jumlah Soal</td>
                			<td class="text-left"> : <?php  echo $jml_soal;?> Butir</td>
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

                	</table>
				<table class="table">
<?php
if (!empty($soal)) {
$no = 1;
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
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='A' <?php if ($row->jawaban=="A") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_a; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">B</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='B' <?php if ($row->jawaban=="B") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_b ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">C</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='C' <?php if ($row->jawaban=="C") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_c; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">D</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='D' <?php if ($row->jawaban=="D") echo "checked='checked'"; ?>></td>
        <td> <?php echo $row->p_d; ?></td>
      </tr>
      <tr valign='top'>
        <td><span class="label label-primary">E</span></td>
        <td><input type='radio' onclick='setnilai(this.value)' name='rb' value='E' <?php if ($row->jawaban=="E") echo "checked='checked'"; ?>></td>
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
								
		if ($i_kesukaran>=0.70){ $status_soal = "soal mudah";}
		else if ($i_kesukaran>=0.30){ $status_soal = "soal sedang";}
		else {$status_soal = "soal sukar";}
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
			if($persentasejawaban_A>=5){$aa="Pilihan Diterima";}
			else if($persentasejawaban_A>=1){$aa="Pilihan Diperbaiki";}
			else {$aa="Pilihan Dibuang";}
				$persentasejawaban_B = ($yng_menjawab_b/$jml_peserta)*100;
			if($persentasejawaban_B>=5){$bb="Pilihan Diterima";}
			else if($persentasejawaban_B>=1){$bb="Pilihan Diperbaiki";}
			else {$bb="Pilihan Dibuang";}
				$persentasejawaban_C = ($yng_menjawab_c/$jml_peserta)*100;
			if($persentasejawaban_C>=5){$cc="Pilihan Diterima";}
			else if($persentasejawaban_C>=1){$cc="Pilihan Diperbaiki";}
			else {$cc="Pilihan Dibuang";}
				$persentasejawaban_D = ($yng_menjawab_d/$jml_peserta)*100;
			if($persentasejawaban_D>=5){$dd="Pilihan Diterima";}
			else if($persentasejawaban_D>=1){$dd="Pilihan Diperbaiki";}
			else {$dd="Pilihan Dibuang";}
				$persentasejawaban_E = ($yng_menjawab_e/$jml_peserta)*100;
			if($persentasejawaban_E>=5){$ee="Pilihan Diterima";}
			else if($persentasejawaban_E>=1){$ee="Pilihan Diperbaiki";}
			else {$ee="Pilihan Dibuang";}
		echo "<table class='table table-bordered'>
									<tr ><th rowspan='2' width='25px'>K</th>
									<th rowspan='2' width='25px'>B</th>
									<th rowspan='2' width='25px'>S</th>
									<th rowspan='2' width='90px'>Taraf Kesukaran</th>
									<th rowspan='2' width='90px'>Daya Pembeda</th>
									<th colspan='5' >Pola jawaban soal</th>
									</tr>
									<tr>
										<th>A</th>
										<th>B</th>
										<th>C</th>
										<th>D</th>
										<th>E</th>
									</tr>
									<tr>
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
									</tr>
									</table></td></tr>";
		$no++;
		}		
	} else {
		$this->load->view('error.php');
        pesan_error(4);
	}
?>	
</table>