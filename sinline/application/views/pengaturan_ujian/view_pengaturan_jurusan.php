
<?php 
if (empty($jurusan)){
	echo "Tidak Ada Jurusan";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
    <div class="row">
                <script type="application/javascript">
                $(document).ready(function() {
                  $('#submit').click(function() {
                      var form_data = {
                    kode_jurusan : $('#kode_jurusan').val(),
                    jurusan : $('#jurusan').val(),
                    
                    };
                    $.ajax({
                      url: "<?php echo site_url('pengaturan_jurusan/simpan_jurusan'); ?>",
                      type: 'POST',
                      async : false,
                      data: form_data,
                      success: function(msg) {
                      $('#refreshjurusan').html(msg);
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
              <input class="form-control input-sm" type="text" placeholder="cari" disabled>
              </div>
             <div class="col-sm-1">
              <button type="button" class="btn btn-info" title="Filter Jurusan Yang Muncul">Filter</button>
              </div>
              <div class="col-sm-1">
              <button type="button" class="btn btn-danger" title="Tambah Jurusan Baru" data-toggle="modal" data-target="#myModal">Tambah Jurusan</button>
              </div>
  </div> <!-- end row -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Tambah Jurusan</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" role="form" action="#">
  <div class="form-group">
    <label class="col-sm-4 control-label">Kode Jurusan</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kode_jurusan" placeholder="kode jurusan">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Jurusan</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="jurusan" placeholder="nama jurusan">
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


  <div id="refreshjurusan">
      <?php $this->load->view('pengaturan_ujian/view_tabel_jurusan'); } ?>
  </div>
	</div>
	</div>
