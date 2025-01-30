
<?php 
if (empty($info_ujian) || empty($info_soal)){
	echo "Tidak Ada ID Ujian / ID Soal";
}else {
	
  ?>

  <div class="well">
                  <table class="table table-striped" >
                    <tr>
                      <th colspan="3" class="text-center"><h4>EDIT SOAL</h4></th>
                    </tr>
                   
                      <!-- <tr>
                      <td width="35%"></td>
                      <td class="text-left" width="15%">ID Soal</td>
                      <td class="text-left"> : <?php echo $info_soal->id_soal;?></td>
                                          </tr> -->
                    <tr>
                      <td colspan="3" class="text-center"><div id="refressoal"><?php echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0]</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1]</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2]</span>";  
 ?>
                    </div></td>
                    <tr>
                      <td colspan="3" class="text-center"><a href="<?php $site = 'pengaturan_soal/tampil_soal/'.$info_ujian->id_ujian; echo site_url($site) ?>" class="btn btn-primary"><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a></td>
                    </tr>
                  </table>
                </div>
    <div class="panel panel-default">
	<div class="panel-body">
<div class="row">
<form class="form-horizontal" role="form" action="#">
  <div class="form-group">
    <label class="col-sm-3 control-label">Lama Pengerjaan Soal</label>
    <div class="col-sm-2">
            <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="tingkat_kesukaran" placeholder="dalam detik" value="<?php echo $info_soal->waktu_soal; ?>">
    </div>
        <div class="col-sm-1">
    <label class="control-label">Jawaban</label>
    </div>
    <div class="col-sm-2">
       <select class="form-control" id="jawaban">
              <option <?php if ($info_soal->jawaban=="A") echo "selected"; ?> value="A">A</option>
              <option <?php if ($info_soal->jawaban=="B") echo "selected"; ?> value="B">B</option>
              <option <?php if ($info_soal->jawaban=="C") echo "selected"; ?> value="C">C</option>
              <option <?php if ($info_soal->jawaban=="D") echo "selected"; ?> value="D">D</option>
              <option <?php if ($info_soal->jawaban=="E") echo "selected"; ?> value="E">E</option>
       </select>
    </div>
    <div class="col-sm-2">
      <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="poin" placeholder="poin soal" value="<?php echo "$info_soal->poin"; ?>">
      <input type="hidden" class="form-control" id="id_ujian" value="<?php echo $info_ujian->id_ujian; ?>">
      <input type="hidden" class="form-control" id="id_soal" value="<?php echo $info_soal->id_soal; ?>">
    </div>
    <div class="col-sm-2">
      <button type="button" id="submit" class="btn btn-info"><span class='glyphicon glyphicon-save'></span> Simpan</button>
          <a href="<?php $site = 'pengaturan_soal/hapus_soal/'.$info_ujian->id_ujian.'/'.$info_soal->id_soal; echo site_url($site) ?>" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></span> Hapus</a>
    </div>

  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
    <textarea class="form-control ckeditor" id="soal" name="editor1" rows="4"><?php echo $info_soal->pertanyaan; ?></textarea>
     <script>
      CKEDITOR.replace( 'editor1', {
   filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
      } );
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan A</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_a" rows="2"><?php echo $info_soal->p_a; ?></textarea>
    <script>
      CKEDITOR.replace( 'pilihan_a', {
         filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
  
        uiColor: '#14B8C4',
        toolbar: [
          [ 'Bold', 'Italic', 'Strike','-', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Styles', 'Format','color'],
          [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan B</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_b" ><?php echo $info_soal->p_b; ?></textarea>
      <script>
      CKEDITOR.replace( 'pilihan_b', {
         filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
  
        uiColor: '#14B8C4',
        toolbar: [
          [ 'Bold', 'Italic', 'Strike','-', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Styles', 'Format','color'],
          [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan C</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_c" rows="2"><?php echo $info_soal->p_c; ?></textarea>
    <script>
      CKEDITOR.replace( 'pilihan_c', {
         filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
  
        uiColor: '#14B8C4',
        toolbar: [
          [ 'Bold', 'Italic', 'Strike','-', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Styles', 'Format','color'],
          [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar' ,'Source'],
        ]
      })
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan D</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_d" rows="2"><?php echo $info_soal->p_d; ?></textarea>
    <script>
      CKEDITOR.replace( 'pilihan_d', {
         filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
  
        uiColor: '#14B8C4',
        toolbar: [
          [ 'Bold', 'Italic', 'Strike','-', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Styles', 'Format','color'],
          [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan E</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_e" rows="2"><?php echo $info_soal->p_e; ?></textarea>
    <script>
      CKEDITOR.replace( 'pilihan_e', {
         filebrowserUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=files") ?>',
   filebrowserBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=files") ?>',
   filebrowserImageBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashBrowseUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/browse.php?opener=ckeditor&type=flash") ?>',
   filebrowserImageUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=images") ?>',
   filebrowserFlashUploadUrl : '<?php echo base_url("bootstrap/js/kcfinder-3.12/upload.php?opener=ckeditor&type=flash") ?>',
  
        uiColor: '#14B8C4',
        toolbar: [
          [ 'Bold', 'Italic', 'Strike','-', 'NumberedList', 'BulletedList', 'Link', 'Unlink' ],
          [ 'FontSize', 'TextColor', 'BGColor','Styles', 'Format','color'],
          [ 'list', 'indent', 'blocks', 'align', 'bidi'],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
    
	</div>
</form>
</div>


      <?php
      }?>
 
	</div>
	</div>
  <script type="application/javascript">
$(document).ready(function() {
  $('#submit').click(function() {
      var form_data = {
    id_ujian : $('#id_ujian').val(),
    id_soal : $('#id_soal').val(),
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
      url: "<?php echo site_url('pengaturan_soal/act_edit_soal_manual'); ?>",
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
      $('#refressoal').html(msg);
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