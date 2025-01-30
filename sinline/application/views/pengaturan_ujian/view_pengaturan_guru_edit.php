
<?php 
if (empty($guru)){
	echo "Tidak Ada Guru";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
	
<form class="form-horizontal" role="form" method='Post' action="<?php echo site_url('pengaturan_guru/edit_act'); ?>">
  <div class="form-group">
    <label class="col-sm-4 control-label">ID Guru</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="id_guru" name="id_guru" placeholder="id guru" readonly="true" value="<?php echo $guru->id_guru; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="nama guru" value="<?php echo $guru->nama_guru; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Kontak</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kontak" name="kontak" placeholder="kontak yang dapat dihubungi" value="<?php echo $guru->kontak; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
    <button type="submit" id="submit" class="btn btn-danger">Edit</button>
    <button type="button" id="reset_guru" class="btn btn-danger"><span class='glyphicon glyphicon-repeat'></span> Reset</button>
    <a href='<?php echo site_url('pengaturan_guru'); ?>' class='btn btn-info btn-md' role='button'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
    </div>
  </div>
      </form>
      <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
      <div id="refreshguru"></div>
     </div>
  </div>
 
    </div>
	</div>

  <?php } ?>
  <script src="<?php echo base_url('bootstrap/js/sha512.js') ?>"></script>
  <script type="application/javascript">
$(document).ready(function() {
  $('#reset_guru').click(function() {
      var form_data = {
    id_guru : $('#id_guru').val(),
    password : SHA512($('#id_guru').val()),
    };
    $.ajax({
      url: "<?php echo site_url('pengaturan_guru/reset_guru'); ?>",
      type: 'POST',
      async : false,
      data: form_data,
      success: function(msg) {
      $('#refreshguru').html(msg);
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