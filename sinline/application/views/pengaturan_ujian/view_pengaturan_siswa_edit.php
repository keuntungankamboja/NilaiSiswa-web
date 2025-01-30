
<?php 
if (empty($siswa)){
	echo "Tidak Ada Siswa";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
	
<form class="form-horizontal" role="form" method='Post' action="<?php echo site_url('pengaturan_siswa/edit_act'); ?>">
  <div class="form-group">
    <label class="col-sm-4 control-label">NIS</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  name='nis' readonly='true' id="nis" placeholder="nomor induk siswa" value="<?php echo $siswa->nis; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="nama lengkap siswa" value="<?php echo $siswa->nama; ?>">
    </div>
  </div>
    <div class="form-group">
    <label  class="col-sm-4 control-label">Jurusan</label>
    <div class="col-sm-8">
     <select class="form-control" id="kode_jurusan" name="kode_jurusan">
  <?php foreach ($jurusan as $value) {
    if ($value->kode_jurusan == $siswa->kode_jurusan) {
      echo "<option value=$value->kode_jurusan selected>$value->jurusan</option>"; 
    } else {
      echo "<option value=$value->kode_jurusan>$value->jurusan</option>"; 
    }
}
     ?>   
  </select>
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Angkatan</label>
    <div class="col-sm-8">
      <input type="text" class="form-control"  onkeypress="return isNumberKey(event)" id="angkatan" name="angkatan" value="<?php echo $siswa->angkatan; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Kontak</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kontak" name="kontak" placeholder="kontak yang dapat dihubungi" value="<?php echo $siswa->kontak; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
    <button type="submit" id="submit" class="btn btn-danger">Edit</button>
    <button type="button" id="reset_siswa" class="btn btn-danger"><span class='glyphicon glyphicon-repeat'></span> Reset</button>
    <a href='<?php echo site_url('pengaturan_siswa'); ?>' class='btn btn-info btn-md' role='button'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
    </div>
  </div>
      </form>
      <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
      <div id="refreshsiswa"></div>
     </div>
  </div>
 
    </div>
	</div>

  <?php } ?>
  <script src="<?php echo base_url('bootstrap/js/sha512.js') ?>"></script>
  <script type="application/javascript">
$(document).ready(function() {
  $('#reset_siswa').click(function() {
      var form_data = {
    nis : $('#nis').val(),
    password : SHA512($('#nis').val()),
    };
    $.ajax({
      url: "<?php echo site_url('pengaturan_siswa/reset_siswa'); ?>",
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
      $('#refreshsiswa').html(msg);
      }
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