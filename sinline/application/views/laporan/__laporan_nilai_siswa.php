<?php if (empty($list_nilai2)) {
	 echo "Tidak Ditemukan";
	 exit();
	}
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
<style type="text/css">
*{
font-family: Arial;
margin:0px;
padding:0px;
}
@page {
 margin-left:3cm 2cm 2cm 2cm;
}
table.grid{
font-size: 10pt;
border-collapse:collapse;
}
table.grid th{
padding-top:1mm;
padding-bottom:1mm;
}
table.grid th{
background: #F0F0F0;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
text-align:left;
padding-left:0.2cm;
}
table.grid tr td{
padding-top:0.5mm;
padding-bottom:0.5mm;
padding-left:2mm;
border-bottom:0.2mm solid #000;
}
h2{
font-size: 16pt;
}
.header{
display: block;
width:15.6cm ;
margin-bottom: 0.3cm;
text-align: center;
}
.attr{
font-size:9pt;
width: 100%;
padding-top:2pt;
padding-bottom:2pt;
border-top: 0.2mm solid #000;
border-bottom: 0.2mm solid #000;
}
.pagebreak {
page-break-after: always;
}
.gambar{
padding-top:5px;
z-index:-1000;
position:absolute;
margin-left:40px;
}
</style>
</head>
<body><p><br><br>
<table  width='90%' align='center'>
					<tr>
                			<td class="text-left" width="25%">Nis</td>
                			<td class="text-left" colspan="5"> : <?php echo $info_siswa->nis;?></td>
                		</tr>
                		<tr>
                			<td>Nama</td>
                			<td class="text-left" colspan="5"> : <?php echo $info_siswa->nama; ?></td>
                		</tr>
                		<tr>
                			<td>Jurusan</td>
                			<td class="text-left" colspan="5"> : <?php echo $info_siswa->jurusan; echo ' ('.$info_siswa->angkatan.')';?></td>
                		</tr>
</table><br>
<table class='grid' width='90%' border='1' align='center'>
					<tr><td colspan="6"><center><b>Tabel Nilai</b></center></td></tr>
		  			<tr class="warning">
				  				<th>Id Ujian</th>
				  				<th>Mata Pelajaran</th>
				  				<th>Guru</th>
				  				<th>Jenis Ujian</th>
				  				<th>Hasil</th>
				  				<th>Status</th>
				  			</tr>
							<?php 
							foreach ($list_nilai2 as $value) {
								?>
								<tr>
									<td><?php echo $value->id_ujian; ?></td>
									<td><?php echo $value->pelajaran; ?></td>
									<td><?php echo $value->nama_guru; ?></td>
									<td><?php echo $value->jenis_ujian; ?></td>
									<td><?php echo $value->skor; ?> Poin</td>
									<td><?php echo $value->status; ?></td>
								</tr>
								<?php
							}
							?>
</table>	
</body>
</html>
