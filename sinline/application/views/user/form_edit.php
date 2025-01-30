<div class="panel panel-default">
  <div class="panel-heading"><h4>Informasi Pengguna <?php echo $this->session->userdata('user');  ?></h4></div>
  <div class="panel-body">

   <form class="form-horizontal" role="form">

  <div class="form-group ">
      <div class="col-sm-12 text-center">
      <img style="width:100px;" src="<?php echo base_url('bootstrap/nm.png');?>"/>
  </div>
  </div>
  	<div class="form-group ">
    <div class="col-sm-12 text-center">
      <!-- Button trigger modal -->
<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
  Upload Foto Baru
</button>












<div id="wrapper">
    <div id="content">

      <h1>Ajax File Upload Demo</h1>
      <p>Jquery File Upload Plugin  - upload your files with only one input field</p>
        <p>
        need any Web-based Information System?<br> Please <a href="http://www.phpletter.com/">Contact Us</a><br>
        We are specialized in <br>
        <ul>
          <li>Website Design</li>
          <li>Survey System Creation</li>
          <li>E-commerce Site Development</li>
        </ul>     
    <div id="loading" style="display:none;" ><img src="<?php echo base_url('bootstrap/js/load.gif');?>" /></div>
    <form name="form" action="" method="POST" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0" class="tableForm">

    <thead>
      <tr>
        <th>Please select a file and click Upload button</th>
      </tr>
    </thead>
    <tbody> 
      <tr>
        <td><input id="fileToUpload" type="file" size="45" name="fileToUpload" class="input"></td>      </tr>

    </tbody>
      <tfoot>
        <tr>
          <td><button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">Upload</button></td>
        </tr>
      </tfoot>
  
  </table>
    </form>     
    </div>































</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Upload Foto Baru</h4>
      </div>
      <div class="modal-body">
          <input type="file" name="userfile" size="20" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">keluar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="uploadfoto();">Upload</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
  </div>
  <div class="form-group ">
    <label class="col-sm-3 control-label">ID Pengguna</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" disabled value="<?php echo $this->session->userdata('id_user');  ?>">
    </div>
	</div>

  <div class="form-group ">
      <label class="col-sm-3 control-label">Nama Lengkap</label>
      <div class="col-sm-9">
        <input type="text" class="form-control input-sm" id="nm_pnggilan" placeholder="Nama Lengkap" value="as">
      </div>
  </div>

  <div class="form-group ">
	    <label class="col-sm-3 control-label">Tanggal Lahir</label>
	    <div class="col-sm-9">
	     <input type="text" class="form-control input-sm" id="datepicker" placeholder="Bulan / Tanggal / Tahun" >
	    </div>
	</div>

 	<div class="form-group ">
    <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
    <div class="col-sm-9">
      <input type="email" class="form-control input-sm" id="inputEmail3" placeholder="Email">
    </div>
	</div>

	<div class="form-group ">
    <label class="col-sm-3 control-label">No Telpon</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" id="no_telpon" placeholder="Nomor Telpon" value="as">
    </div>
	</div>

    <div class="form-group ">
    <label class="col-sm-3 control-label">Alamat</label>
    <div class="col-sm-9">
      <textarea class="form-control input-sm" rows="3"></textarea>
    </div>
	</div>

	<div class="form-group ">
    <label class="col-sm-3 control-label">Website</label>
    <div class="col-sm-9">
      <input type="text" class="form-control input-sm" id="url" placeholder="Website / url" value="as">
    </div>
	</div>

	<div class="form-group ">
    <label class="col-sm-3 control-label"></label>
    <div class="col-sm-4">
      <button type="submit" class="form-control btn btn-primary btn-sm">Simpan Perubahan</button>
    </div>
	</div>
<?php echo form_close();?>
  </div><!-- end panel body -->
  </div><!-- panel default -->
  <script src="<?php echo base_url('bootstrap/js/ui/ui/jquery.ui.core.js') ?>"></script>
  <script src="<?php echo base_url('bootstrap/js/ui/ui/jquery.ui.core.js') ?>"></script>
  <script src="<?php echo base_url('bootstrap/js/ui/ui/jquery.ui.widget.js') ?>"></script>
  <script src="<?php echo base_url('bootstrap/js/ui/ui/jquery.ui.datepicker.js') ?>"></script>
  <link href="<?php echo base_url('bootstrap/js/ui/themes/jquery.ui.base.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('bootstrap/js/ui/themes/jquery.ui.theme.css') ?>" rel="stylesheet">
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  function uploadfoto(){
    alert("asda");
  }
  </script>
 <script type="text/javascript">
  function ajaxFileUpload()
  {
    $("#loading")
    .ajaxStart(function(){
      $(this).show();
    })
    .ajaxComplete(function(){
      $(this).hide();
    });

    $.ajaxFileUpload
    (
      {
        url:"<?php echo site_url('user/uploadimage'); ?>",
        secureuri:false,
        fileElementId:'fileToUpload',
        dataType: 'json',
        data:{name:'logan', id:'id',<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>',},
        success: function (data, status)
        {
          if(typeof(data.error) != 'undefined')
          {
            if(data.error != '')
            {
              alert(data.error);
            }else
            {
              alert(data.msg);
            }
          }
        },
        error: function (data, status, e)
        {
          alert(e);
        }
      }
    )
    
    return false;

  }
  </script> 
    <script src="<?php echo base_url('bootstrap/js/ajaxfileupload.js') ?>"></script>
