<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Halaman login </title>
<?php $this->load->view('import/head_css');  ?>
</head>
<body style="margin-top: 30px" class="well">
<!--     <div class="wrapper">
   <img src="<?php echo base_url('bootstrap/banner.jpg');?>" class="img-responsive" alt="Responsive image">
    <div class="sol-sm-6">
    <h1 id="text">Hello World!</h1>
    </div>
 </div> -->
<div class="container">
    <div class="row">
    <div class="col-md-8">
          <p><a class="btn btn-primary btn-lg" role="button">Sinline </a></p>
  <h3>Hello, world!</h3>
  <p>...</p>


<div class="panel panel-default">
  <div class="panel-body">
    <blockquote class="pull-left">
  the one who have a a dream
</blockquote>

  </div>
</div>

</div>
 
    <div class="col-md-4">
<div class="panel panel-default ">
  <div class="panel-heading text-center"><h4>Halaman Login </h4></div>
  <div class="panel-body">

 
<?php $attributes = array('class' => 'form-horizontal','role'=>'form'); echo form_open('#',$attributes); ?>
    <div class="form-group ">
    <div class="col-sm-12">
<div class="input-group">
  <span class="input-group-addon glyphicon glyphicon-user"></span>
  <input type="text" class="form-control username" placeholder="Pengguna" size="100">
</div>
    </div>
  </div>

    <div class="form-group <?php if (set_value('nick')) echo "has-error"?>">
    <div class="col-sm-12">
<div class="input-group">
  <span class="input-group-addon glyphicon glyphicon-lock"></span>
  <input type="password" class="form-control password" placeholder="Passwword" size="100">
</div>
    </div>
  </div>
  <div class="form-group ">
         <label class="col-sm-2 control-label"></label>
    <div class="col-sm-10">
      <div id="captcha"><?php echo $image?></div>
    </div>
</div>
    <div class="form-group ">
    <label class="col-sm-8 control-label"></label>
    <div class="col-sm-4">
      <button type="submit" class="form-control btn btn-primary btn-sm" id="submit" name="submit">Masuk</button>
    </div>

  </div>
  <?php echo form_close();?>
  <div id="status-message"></div>
  </div><!-- end panel body -->
  </div><!-- panel default -->
    <div class="text-center">
      <a href=""><small>Tentang</small></a>
      <a href=""><small>Dokumentasi</small></a>
      <a href=""><small>Website Sekolah</small></a>
    </div>
</div><!-- col md 9 -->
</div><!-- end row -->
  <div class="row">
    <div class="col-md-8">
    </div>  
    <div class="col-md-4">  
</div>
</div>
      </div>
</div><!-- end container -->
<!-- <div class="wrapper">
    <img src="<?php echo base_url('bootstrap/nm.png');?>" class="img-responsive" alt="Responsive image">
     <h1>More info!</h1><div class="sol-sm-6">
    <h1 id="text">Hello World!</h1>
    </div>
  </div> -->
<script src="<?php echo base_url('bootstrap/js/sha512.js') ?>"></script>
<script type="application/javascript">
$(document).ready(function() {
  $('#submit').click(function() {
    auth();
    captcha();
    return false;
  });
});
function auth(){
  var form_data = {
    username : $('.username').val(),
    captcha : $('.captcha').val(),
    <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>',
    password : SHA512($('.password').val())};
    $.ajax({
    url: "<?php echo site_url('login/auth'); ?>",
    type: 'POST',
    async : false,
    data: form_data,
    success: function(msg) {
    $('#status-message').html(msg);
    }
    });
    return false;
}
function captcha(){
  var form_data = {
    <?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>'};
    $.ajax({
    url: "<?php echo site_url('login/captcha'); ?>",
    type: 'POST',
    async : false,
    data: form_data,
    success: function(msg) {
    $('#captcha').html(msg);
    }
    });
    return false;
}

function resets(){
  captcha();
    return false;
}
</script>

</body>
</html>
