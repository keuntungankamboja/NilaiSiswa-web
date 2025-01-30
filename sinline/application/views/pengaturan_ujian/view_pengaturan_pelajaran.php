<div class="panel panel-default">
<div class="panel-body">
<div class="row">
          <script type="text/javascript">
          function cari(){
                var cari = $('#cari').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_pelajaran/filter_pelajaran");?>',{cari:cari},function(output){
                          $('#refreshpelajaran').html(output).show();
                        });
                      });
              }
          </script>
          <script type="application/javascript">
          $(document).ready(function() {
            $('#submit').click(function() {
                var form_data = {
              mata_pelajaran : $('#mata_pelajaran').val(),
              id_guru : $('#id_guru').val(),
              kode_jurusan : $('#kode_jurusan').val(),
              tahun : $('#tahun').val(),
              };
              $.ajax({
                url: "<?php echo site_url('pengaturan_pelajaran/simpan_pelajaran'); ?>",
                type: 'POST',
                async : false,
                data: form_data,
                success: function(msg) {
                $('#refreshpelajaran').html(msg);
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
            <input class="form-control input-sm" type="text" id="cari" placeholder="cari" onchange="cari();">
            </div>
            <div class="col-sm-1">
            <button type="button" class="btn btn-info" title="Filter Mata Pelajaran Yang Muncul" onClick="cari();">Filter</button>
            </div>
            <div class="col-sm-1">
            <button type="button" class="btn btn-danger" title="Tambah Mata Pelajaran Baru" data-toggle="modal" data-target="#myModal">Tambah Mata Pelajaran</button>
            </div>
	</div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Tambah Mata Pelajaran</h4>
      </div>
      <div class="modal-body">
          <form class="form-horizontal" role="form" action="#">
            <div class="form-group">
              <label class="col-sm-4 control-label">Mata Pelajaran</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="mata_pelajaran" placeholder="nama mata pelajaran">
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-4 control-label">Guru</label>
               <div class="col-sm-8">
               <select class="form-control" id="id_guru">
               <?php foreach ($guru as $value) {
               echo "<option value=$value->id_guru>$value->nama_guru</option>"; 
               }
               ?>	  
               </select>
               </div>
            </div>

            <div class="form-group">
              <label  class="col-sm-4 control-label">Jurusan</label>
                <div class="col-sm-8">
                <select class="form-control" id="kode_jurusan">
                <?php foreach ($jurusan as $value) {
                echo "<option value=$value->kode_jurusan>$value->jurusan</option>"; 
                }
                ?>   
                </select>
                </div>
            </div>
                         <div class="form-group">
              <label class="col-sm-4 control-label">Tahun Ajaran</label>
              <div class="col-sm-8">
                <select class="form-control" id="tahun">
                <?php 
                $tahun = date("Y")+1;
                for ($i = 2010; $i <= $tahun; $i++) { 
                  # code...
                $thn = $i+1;
                if ($tahun-1 == $i) {
                echo '<option value='.$i.' selected>'.$i.'/'.$thn.'</option>';
                  # code...
                } else {
                echo '<option value='.$i.'>'.$i.'/'.$thn.'</option>';
                }
                }
                ?>   
                </select>
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

  <div id="refreshpelajaran">
      <?php $this->load->view('pengaturan_ujian/view_tabel_mata_pelajaran'); ?>
  </div>
	</div>
	</div>
