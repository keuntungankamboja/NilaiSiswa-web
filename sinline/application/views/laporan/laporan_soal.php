<?php 	$this->load->view('view_header.php');
	view_header(1); ?>
		<table class="table">
						<tr class="active">
				<th colspan='4' class="text-center"><h3>Laporan Pengerjaan Soal Ujian</h3><br>
		</th>
			</tr>
			<tr>
                			<td class="text-left">Nis</td>
                			<td class="text-left"> : <?php echo $info_siswa->nis;?></td>
                			<td>Nama</td>
                			<td class="text-left"> : <?php echo $info_siswa->nama; ?></td>
                		</tr>
			<tr>
				<td>Mata Pelajaran</td>
				<td>: <?php echo $info_hasil['info2']->pelajaran;?></td>
				<td>Lama Ujian</td>
				<td>: <?php echo $info_hasil['info2']->waktu;?> Menit</td>
			</tr>
			<tr>
				<td>Nama Guru</td>
				<td>: <?php echo $info_hasil['info2']->nama_guru;?></td>
				<td>Jumlah Soal</td>
				<td>: <?php echo $info_hasil['info']->jml_soal;?></td>
			</tr>
			<tr>
				<td>Kompetensi</td>
				<td>: <?php echo $info_hasil['info2']->kompetensi;?></td>
				<td>Tanggal Ujian</td>
				<td>: <?php echo  substr($info_hasil['info2']->tgl,0,16); ?></td>
			</tr>
			<tr>
				<td>Jenis Ujian</td>
				<td colspan="3">: <?php echo $info_hasil['info2']->jenis_ujian;?></td>
			</tr>
			<tr>
				<td colspan="4"></td>
			</tr>
			</table>
<table class="table">
<?php
$f=1;
$no=1;
foreach ($soal as $row)
		{
			?>
	<form><tr >
    <td width='30px' valign='top'><?php echo $no; echo ".";?></td>
      <td>
      <?php echo $row->pertanyaan; ?><p></p> 
      <table>
      <tr  width='30px' valign='top'>
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
      <tr>
      	<td></td><td></td>
		<td><span class="label label-warning">Kunci Jawaban :</span> <span class="label label-info"><?php echo $row->jawaban; ?></span> <span class="label label-warning">Dijawab Dalam Waktu :</span> <span class="label label-info"><?php echo $row->waktu_selesai; ?></span></td>
	  </tr>
      </table>                
      </td> 
  </tr>
  </form><?php $no++;}?>
</table>