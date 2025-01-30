<div class="panel panel-default">
  <div class="panel-heading"><h4>Ganti Nama Profil</h4></div>
  <div class="panel-body">

 
<?php $attributes = array('class' => 'form-horizontal','role'=>'form'); echo form_open('user/actnick',$attributes); ?>
  	
 
      <?php if (validation_errors()) {
        ?><div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
      <div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo validation_errors(); ?></div></div></div>
      <?php }; ?>

    <div class="form-group ">
    <label class="col-sm-3 control-label">Nama Profil</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" disabled value="<?php echo $this->session->userdata('user');  ?>">
    </div>
	</div>

    <div class="form-group <?php if (set_value('nick')) echo "has-error"?>">
    <label class="col-sm-3 control-label">Nama Profil <span class="label label-info">Baru</span></label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" name="nick" value="<?php echo set_value('nick'); ?>">
    </div>
  </div>

	<div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-4">
      <button type="submit" class="form-control btn btn-primary btn-sm">Simpan</button>
    </div>

  </div>
<?php echo form_close();?>
  </div><!-- end panel body -->
  
  </div><!-- panel default -->