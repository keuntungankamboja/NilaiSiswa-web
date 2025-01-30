 <?php 
if (empty($info_ujian)){
	echo "Tidak Ada Ujian";
}else {
	
  ?>

  <div class="well">
                  <table class="table table-striped" >
                    <tr>
                      <th colspan="3" class="text-center"><h4>PEMBUATAN SOAL</h4></th>
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
                      <td></td>
                      <td>Waktu Ujian</td>
                      <td class="text-left"> : <?php echo $info_ujian->waktu; ?> Menit</td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Standard Nilai</td>
                      <td class="text-left"> : <?php echo $info_ujian->standard_nilai; ?> Poin</td>
                    </tr>
                    <tr>
                      <td colspan="3" class="text-center"><div id="info_input_soal"><?php echo "<span class='glyphicon glyphicon-plus-sign'></span> Jumlah Soal <span class='label label-success'>$jml_soal</span> | <span class='glyphicon glyphicon-plus-sign'></span> Jumlah Poin <span class='label label-success'>$jml_poin</span>"; echo " | <span class='glyphicon glyphicon-cog'></span> Sulit  <span class='label label-success'> $jenissoal[0] Soal</span> | <span class='glyphicon glyphicon-cog'></span> Sedang <span class='label label-success'> $jenissoal[1] Soal</span> | <span class='glyphicon glyphicon-cog'></span> Mudah : <span class='label label-success'> $jenissoal[2] Soal </span>";
?>
                     </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="3" class="text-center"><a href="<?php echo site_url('pengaturan_ujian') ?>" class="btn btn-primary"><span class='glyphicon glyphicon-home'></span> Halaman Utama</a>
                      <a target="_blank"  href="<?php $site = 'pengaturan_soal/tampil_soal/'.$info_ujian->id_ujian; echo site_url($site) ?>" class="btn btn-primary"><span class='glyphicon glyphicon-list-alt'></span> Lihat Semua Soal</a></td>
                    </tr>
                  </table>

                </div>
    <div class="panel panel-default">
	<div class="panel-body">
<div class="row">
<form class="form-horizontal" role="form" action="#">
  <div class="form-group">
    <label class="col-sm-3 control-label">Tingkat Kesukaran</label>
    <div class="col-sm-2">
          <select class="form-control" id="tingkat_kesukaran">
            <option value="sulit">sulit</option> 
            <option value="sedang">sedang</option> 
            <option value="mudah">mudah</option>
          </select>
    </div>
    <div class="col-sm-1">
    <label class="control-label">Jawaban</label>
    </div>
    <div class="col-sm-2">
       <select class="form-control" id="jawaban">
          <option value="A">A</option> 
          <option value="B">B</option> 
          <option value="C">C</option> 
          <option value="D">D</option> 
          <option value="E">E</option>
          </select>
    </div>
    
    <div class="col-sm-2">
      <input type="text" onkeypress="return isNumberKey(event)" class="form-control" id="poin" placeholder="poin soal">
      <input type="hidden" class="form-control" id="id_ujian" value="<?php echo $info_ujian->id_ujian; ?>">
    </div>
    <div class="col-sm-1">
      <button type="button" id="submit" class="btn btn-danger">Tambah</button>
    </div>

  </div>
    <div class="form-group">
    <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
    <textarea class="form-control ckeditor" id="soal" name="editor1" rows="4"></textarea>
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
    <textarea class="form-control ckeditor" id="pilihan_a" rows="2"></textarea>
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
    <textarea class="form-control ckeditor" id="pilihan_b" ></textarea>
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
    <textarea class="form-control ckeditor" id="pilihan_c" rows="2"></textarea>
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
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-2 control-label">Pilihan D</label>
    <div class="col-sm-8">
    <textarea class="form-control ckeditor" id="pilihan_d" rows="2"></textarea>
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
    <textarea class="form-control ckeditor" id="pilihan_e" rows="2"></textarea>
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
          [ 'list', 'indent', 'blocks', 'align', 'bidi' ],
          [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar','Source' ],
        ]
      })
    </script>
    </div>
  </div>
    
	</div>
</form>
</div>

  <div id="refressoal">
      <?php //$this->load->view('pengaturan_ujian/view_tabel_ujian'); 
      }?>
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