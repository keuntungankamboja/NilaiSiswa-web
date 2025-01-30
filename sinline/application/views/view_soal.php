<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Sinline | Monitoring ujian</title>
<?php $this->load->view('import/head_css');  ?>
</head>
<script type="application/javascript">
          $(document).ready(function() {
            $('#submit').click(function() {
                var form_data = {
              waktu : $('#waktu').val(),
              sulit : $('#sulit').val(),
              sedang : $('#sedang').val(),
              mudah : $('#mudah').val(),
              };
              $.ajax({
                url: "<?php echo site_url('ujian/soalact'); ?>",
                type: 'POST',
                async : false,
                data: form_data,
                success: function(msg) {
                $('#refreshhasil').html(msg);
                }
                });
                return false;
            });

          });
          </script>
<body>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row ">
                <div class="col-md-12 col-md-offset-0 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0">
<form class="form-horizontal" role="form" action="#">
  <div class="form-group">
    <label class="col-sm-4 control-label">Waktu</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="waktu" value="3600" placeholder="waktu">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Sulit</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="sulit" value="5">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Sedang</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="sedang" value="10">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Mudah</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="mudah" value="15">
    </div>
  </div>
 <div class="form-group">
  <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
 	<button type="button" id="submit" class="btn btn-danger">Periksa</button>
    </div>
  </div>
</form>
				<div id="refreshhasil"></div>
				</div>
            </div>
        </div>
    </div>
</div>
</body>
</html>