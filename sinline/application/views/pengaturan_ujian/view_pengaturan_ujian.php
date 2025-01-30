   <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
        <script type="text/javascript">
          function cari(){
                var cari = $('#cari').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_ujian/filter_ujian");?>',{cari:cari},function(output){
                          $('#refreshujian').html(output).show();
                        });
                      });
              }
          function get_pelajaran(){
                var id_kelas = $('#id_kelas').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_ujian/get_pelajaran");?>',{id_kelas:id_kelas},function(output){
                          $('#isipelajaran').html(output).show();
                        });
                      });
              }
        function get_pengaturan_waktu(){
                var id_mata_pelajaran = $('#id_mata_pelajaran').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_ujian/get_pengaturan_waktu");?>',                                           {id_mata_pelajaran:id_mata_pelajaran},function(output){
                          $('#pengaturanwaktu').html(output).show();
                        });
                      });
              }
          </script>
            <script type="application/javascript">
            $(document).ready(function() {
              $('#submit').click(function() {
                var elemen = document.getElementsByClassName('ubah');
                if (elemen[0].checked){
                  inf = 1;
                } else {inf = 0;}

                  var form_data = {
                tanggal : $('#tanggal').val(),
                waktu : $('#waktu').val(),
                standard_nilai : $('#standard_nilai').val(),
                id_kelas : $('#id_kelas').val(),
                id_mata_pelajaran : $('#id_mata_pelajaran').val(),
                jenis_ujian : $('#jenis_ujian').val(),
                kompetensi_dasar : $('#kompetensi_dasar').val(),
                sulit : $('#sulit').val(),
                sedang : $('#sedang').val(),
                mudah : $('#mudah').val(),
                ubah : inf,
                };
                $.ajax({
                  url: "<?php echo site_url('pengaturan_ujian/tambah_ujian'); ?>",
                  type: 'POST',
                  async : false,
                  data: form_data,
                  success: function(msg) {
                  $('#refreshujian').html(msg);
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
					    <button type="button" class="btn btn-info" title="Filter Ujian Yang Muncul" onclick="" ="cari();">Filter</button>
					    </div>
					    <div class="col-sm-1">
					    <button type="button" class="btn btn-danger" title="Tambah Ujian Baru" data-toggle="modal" data-target="#myModal">Tambah Ujian</button>
					    </div>
	</div> <!-- end row -->

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Tambah Ujian</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" role="form" action="#">

  <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-8">
    <div class="input-append date form_datetime">
      <input type="text" class="form-control" id="tanggal" value="" readonly> <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Lama Ujian</label>
    <div class="col-sm-8">
      <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="waktu" placeholder="dalam menit">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Standard Nilai</label>
    <div class="col-sm-8">
      <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="standard_nilai">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Kelas</label>
    <div class="col-sm-8">
      <select class="form-control" id="id_kelas" onchange="get_pelajaran();">
      <option>...</option>
     <?php foreach ($kelas as $value) {
        $thn = $value->tahun + 1;
        //($value->kode_jurusan)
        echo "<option value=$value->id_kelas>$value->kelas  | tahun ajaran $value->tahun/$thn</option>"; 
     }
     ?>   
  </select>
    </div>
  </div>
  <div id="isipelajaran"> <!-- start pelajaran -->

  </div> <!-- end pelajaran -->
     <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Ujian</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="jenis_ujian">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Kompetensi Dasar</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kompetensi_dasar">
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
  <div id="refreshujian">
      <?php $this->load->view('pengaturan_ujian/view_tabel_ujian');  ?>
  </div>
	</div>
	</div>
  <script src="<?php echo base_url('bootstrap/js/datepicker/js/bootstrap-datepicker.js') ?>"></script>
  <script src="<?php echo base_url('bootstrap/js/datepicker/js/bootstrap-datetimepicker.id.js') ?>"></script>
 
<script type="text/javascript">
          $(document).ready(function() {
            $('#ubah').click(function() {
              $("#showwaktu").toggle();
            });
          });
    $(".form_datetime").datetimepicker({
        language:  'id',
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        todayBtn: true,

    });
</script>             