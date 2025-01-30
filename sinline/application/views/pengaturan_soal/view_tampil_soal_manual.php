
<?php 
if (empty($info_ujian)){
	echo "Tidak Ada ID Ujian";
}else {
	
  ?>

  <div class="well">
                  <table class="table table-striped" >
                    <tr>
                      <th colspan="3" class="text-center"><h4>DETAIL SEMUA SOAL</h4></th>
                    </tr>
                     <tr>
                      <td width="35%"></td>
                      <td class="text-left" width="15%">ID Ujian</td>
                      <td class="text-left"> : <?php echo $info_ujian->id_ujian;?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Mata Pelajaran</td>
                      <td class="text-left"> : <?php echo $info_ujian->pelajaran; ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Guru</td>
                      <td class="text-left"> : <?php echo $info_ujian->nama_guru; ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Kelas</td>
                      <td class="text-left"> : <?php echo $info_ujian->kelas; echo " ($info_ujian->kode_jurusan)";?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Kontak</td>
                      <td class="text-left"> : <?php echo $info_ujian->kontak; ?></td>
                    </tr>                 
                    <tr>
                      <td colspan="3" class="text-center"><div id="info_input_soal"><?php echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";  
?>
                     </div>
                      </td>
                    </tr>
<!--                     <tr>
  <td colspan="3" class="text-center"><a href="<?php $site = 'pengaturan_soal/buatsoal/'.$info_ujian->id_ujian; echo site_url($site) ?>" class="btn btn-primary"><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a></td>
</tr> -->
                  </table>

<table class="table">
<?php
if (!empty($soal)){
foreach ($soal as $row)
    {
      ?>
  <form><tr >
    <td width='30px' valign='top'><?php echo $no; echo ".";?></td>
    <td>
<div class="alert alert-info">
    <span class='glyphicon glyphicon-upload'></span> Jawaban <span class='label label-default'><?php echo $row->jawaban; ?></span> | <span class='glyphicon glyphicon-upload'></span> Tingkat Kesulitan <span class='label label-default'><?php echo $row->tingkat_kesulitan; ?></span> | Waktu soal <span class='label label-default'><?php echo $row->waktu_soal; ?> Detik</span> | <span class='glyphicon glyphicon-upload'></span> Poin <span class='label label-default'><?php echo $row->poin; ?></span> |
    <a href="<?php $site = 'pengaturan_soal/edit_soal/'.$info_ujian->id_ujian.'/'.$row->id_soal; echo site_url($site) ?>" class="btn btn-info"><span class='glyphicon glyphicon-edit'></span> Edit</a>
    <a href="<?php $site = 'pengaturan_soal/hapus_soal/'.$info_ujian->id_ujian.'/'.$row->id_soal; echo site_url($site) ?>" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></span> Hapus</a>
</div>   
    <br><p></p>
      <?php echo $row->pertanyaan; ?><p></p>
      <!-- <input type='radio' name='rb' value='A' <?php if ($row->jawaban=="A") echo "checked='checked'"; ?>> <?php echo $row->p_a; ?>
                           <p></p>
                           
                           <input type='radio' name='rb' value='B' <?php if ($row->jawaban=="B") echo "checked='checked'"; ?>> <?php echo $row->p_b ?>
                           <p></p>
                           
                           <input type='radio' name='rb' value='C' <?php if ($row->jawaban=="C") echo "checked='checked'"; ?>> <?php echo $row->p_c; ?>
                           <p></p>
                           
                           <input type='radio' name='rb' value='D' <?php if ($row->jawaban=="D") echo "checked='checked'"; ?>> <?php echo $row->p_d; ?>
                           <p></p>
                           
                           <input type='radio' name='rb' value='E' <?php if ($row->jawaban=="E") echo "checked='checked'"; ?>> <?php echo $row->p_e; ?>
                           
                           <br>  -->     
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
  </tr>
  </form><?php $no++; } } else {
        echo "Tidak Ada Soal";

        } ?>
</table>
<center>
<ul class="pagination">
<?php
for($i=1;$i<=$jmlhalaman;$i++)
    if ($i != $halaman){
      $a = site_url('pengaturan_soal/tampil_soal/'.$info_ujian->id_ujian.'/'.$i);
        echo "<li><a href='$a'>".$i."</a></li>";
          }
     else{
        echo "<li class='active'><a href='#'>".$i."<span class='sr-only'>(current)</span></a></li>";
    }
     ?>
<ul>
</center>
   </div>
  <div id="refressoal">
      <?php //$this->load->view('pengaturan_ujian/view_tabel_ujian'); 
      } ?>
  </div>
	</div>
	</div>
  <script type="application/javascript">
$(document).ready(function() {
  $('#submit').click(function() {
      var form_data = {
    id_ujian : $('#id_ujian').val(),
    tingkat_kesukaran : $('#tingkat_kesukaran').val(),
    jawaban : $('#jawaban').val(),
    poin : $('#poin').val(),
    soal : CKEDITOR.instances.soal.getData(),
    pilihan_a : CKEDITOR.instances.pilihan_a.getData(),
    pilihan_b : CKEDITOR.instances.pilihan_b.getData(),
    pilihan_c : CKEDITOR.instances.pilihan_c.getData(),
    pilihan_d : CKEDITOR.instances.pilihan_d.getData(),
    pilihan_e : CKEDITOR.instances.pilihan_e.getData(),
    };
    $.ajax({
      url: "<?php echo site_url('pengaturan_soal/tambah_soal'); ?>",
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
      $('#info_input_soal').html(msg);
      },

      });
      return false;
  });

});
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

