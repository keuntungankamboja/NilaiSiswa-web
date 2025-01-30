    <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
    <script type="text/javascript">
          function cari(){
                var cari = $('#cari').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_guru/filter_guru");?>',{cari:cari},function(output){
                          $('#refreshguru').html(output).show();
                        });
                      });
              }
          </script>
            
          <script src="<?php echo base_url('bootstrap/js/sha512.js') ?>"></script>
          <script type="application/javascript">
          $(document).ready(function() {
            $('#submit').click(function() {
                var form_data = {
              id_guru : $('#id_guru').val(),
              password : SHA512($('#id_guru').val()),
              nama_guru : $('#nama_guru').val(),
              kontak : $('#kontak').val(),
              };
              $.ajax({
                url: "<?php echo site_url('pengaturan_guru/simpan_guru'); ?>",
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
					  	<div class="col-sm-4">
					    <input class="form-control input-sm" id="cari" type="text" placeholder="cari" onchange="cari();">
					    </div>
						 <div class="col-sm-1">
					    <button type="button" class="btn btn-info" title="Filter Guru Yang Muncul" onclick="cari();">Filter</button>
					    </div>
					    <div class="col-sm-1">
					    <button type="button" class="btn btn-danger" title="Tambah Guru Baru" data-toggle="modal" data-target="#myModal">Tambah Guru</button>
					    </div>
	</div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Tambah Guru Baru</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" role="form" action="#">
  <div class="form-group">
    <label class="col-sm-4 control-label">ID Guru</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="id_guru" placeholder="id guru">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Nama</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="nama_guru" placeholder="nama guru">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="password" placeholder="password" readonly value="sama dengan id guru">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Kontak</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kontak" placeholder="kontak yang dapat dihubungi">
    </div>
  </div>

  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
        <button type="button" id="submit" class="btn btn-danger">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>

  <div id="refreshguru">
      <?php $this->load->view('pengaturan_ujian/view_tabel_guru'); ?>
  </div>
	</div>
	</div>
