<div class="panel panel-default">
  <div class="panel-heading"><h4>Ganti Password <?php echo $this->session->userdata('user');  ?></h4></div>
  <div class="panel-body">
   <?php $attributes = array('class' => 'form-horizontal','role'=>'form','onSubmit'=>'return hash();','id'=>'gantipassword','name'=>'gantipassword'); echo form_open('password/actgantipasswordsiswa',$attributes); ?>
<?php if (validation_errors()) {
        ?><div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
      <div class="alert alert-danger alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo validation_errors(); ?></div></div></div>
      <?php }; ?>

  	<div class="form-group ">
    <label class="col-sm-3 control-label">ID Pengguna</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" disabled value="<?php echo $this->session->userdata('id_user');  ?>">
    </div>
	</div>
    <input type="hidden" name="passwordlama" id="passwordlama" value=""/>
    <input type="hidden" name="passwordbaru" id="passwordbaru" value=""/>

       <div class="form-group <?php if (set_value('passwordlama')) echo "has-error"?>">
    <label class="col-sm-3 control-label">Password <span class="label label-default">Lama</span></label>
    <div class="col-sm-9">
      <input type="password" class="form-control input-sm" id="passworda" name="passworda" placeholder="Password Lama" >
    </div>
  </div>


    <div class="form-group <?php if (set_value('passwordbaru')) echo "has-error"?>">
    <label class="col-sm-3 control-label">Password <span class="label label-danger">Baru</span></label>
    <div class="col-sm-9">
      <input type="password" class="form-control input-sm " id="passwordb" name="passwordb" placeholder="Password Baru" >
    </div>
  </div>

	<div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-4">
      <button type="submit" class="form-control btn btn-primary btn-sm">Ganti Password</button>
    </div>
	</div>
  <?php if ($this->session->flashdata('flash')=='success') { ?>
  <div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-9">
      <div class="alert alert-success alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Password Berhasil Diperbaharui
</div>

    </div>
  </div>
  <?php } ?>

<?php echo form_close();?>

  </div><!-- end panel body -->
  
  </div><!-- panel default -->

<script src="<?php echo base_url('bootstrap/js/sha512.js') ?>"></script>
<script language="javascript">
function hash()
{
var strpasshash = document.gantipassword.passworda.value;
var strpasshash = SHA512(strpasshash);

var strpasshashnew = document.gantipassword.passwordb.value;
var strpasshashnew = SHA512(strpasshashnew);

document.gantipassword.passwordlama.value=strpasshash;
document.gantipassword.passwordbaru.value=strpasshashnew;
document.gantipassword.passworda.value="admin";
document.gantipassword.passwordb.value="sayalupa";

return true;
}
</script>