
<?php 
if (empty($jurusan)){
	echo "Tidak Ada Jurusan";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
	
<form class="form-horizontal" role="form" method='Post' action="<?php echo site_url('pengaturan_jurusan/edit_act'); ?>">
  <div class="form-group">
    <label class="col-sm-4 control-label">Kode Jurusan</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" readonly='true' id="kode_jurusan" name="kode_jurusan" placeholder="kode jurusan" value="<?php echo $jurusan->kode_jurusan?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Jurusan</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="nama jurusan" value="<?php echo $jurusan->jurusan?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
    <button type="submit" id="submit" class="btn btn-danger">Edit</button>
    <a href='<?php echo site_url('pengaturan_jurusan'); ?>' class='btn btn-info btn-md' role='button'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
    </div>
  </div>
      </form>
    </div>
	</div>
  <?php } ?>