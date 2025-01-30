
<?php 
if (empty($ujian)){
	echo "Tidak Ada Ujian";
}else {
	?>

    <div class="panel panel-default">
	<div class="panel-body">
	
<form class="form-horizontal" role="form" method='Post' action="<?php echo site_url('pengaturan_ujian/edit_act'); ?>">
      <div class="form-group">
    <label class="col-sm-4 control-label">Id Ujian</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="id_ujian" name="id_ujian" value="<?php echo $ujian->id_ujian; ?>" readonly="true">
    </div>
  </div>
<div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-8">
    <div class="input-append date form_datetime">
      <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $ujian->tgl; ?>" readonly> <span class="add-on"><i class="icon-th"></i></span>
      </div>
    </div>
  </div>
      <div class="form-group">
    <label class="col-sm-4 control-label">Waktu</label>
    <div class="col-sm-8">
      <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="waktu" name="waktu"  placeholder="dalam menit" value="<?php echo $ujian->waktu; ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Standard Nilai</label>
    <div class="col-sm-8">
      <input type="number" onkeypress="return isNumberKey(event)" class="form-control" id="standard_nilai" name="standard_nilai" value="<?php echo $ujian->standard_nilai; ?>">
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Kelas</label>
    <div class="col-sm-8">
 <select class="form-control" id="id_kelas" name="id_kelas" onchange="get_pelajaran();">
     <?php foreach ($kelas as $value) {
        if ($value->id_kelas == $ujian->id_kelas) {
      echo "<option value=$value->id_kelas selected>$value->kelas ($value->kode_jurusan) | Tahun $value->tahun</option>"; 
    } else {
      echo "<option value=$value->id_kelas>$value->kelas ($value->kode_jurusan) | Tahun $value->tahun</option>"; 
    }
        
     }
     ?>   
  </select>
  </div>
  </div>
  <div id="isipelajaran">
  <div class="form-group">
    <label  class="col-sm-4 control-label">Mata Pelajaran</label>
    <div class="col-sm-8">
     <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran" >
     <?php foreach ($mata_pelajaran as $value) {
        if ($value->id_mata_pelajaran == $ujian->id_mp) {
      echo "<option value=$value->id_mata_pelajaran selected>$value->pelajaran ($value->kode_jurusan) | $value->nama_guru</option>"; 
    } else {
      echo "<option value=$value->id_mata_pelajaran>$value->pelajaran ($value->kode_jurusan) | $value->nama_guru</option>"; 
    }
        
     }
     ?>   
  </select>
    </div>
  </div>
</div>
     <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Ujian</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="jenis_ujian" name="jenis_ujian" value="<?php echo $ujian->jenis_ujian; ?>">
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">Kompetensi Dasar</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="kompetensi_dasar" name="kompetensi_dasar" value="<?php echo $ujian->kompetensi; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
    <button type="submit" id="submit" class="btn btn-danger">Edit</button>
    <a href='<?php echo site_url('pengaturan_ujian'); ?>' class='btn btn-info btn-md' role='button'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
    </div>
  </div>
      </form>
      <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
      <div id="refreshsiswa"></div>
     </div>
  </div>
    </div>
	</div>
    <script src="<?php echo base_url('bootstrap/js/datepicker/js/bootstrap-datepicker.js') ?>"></script>
  <script src="<?php echo base_url('bootstrap/js/datepicker/js/bootstrap-datetimepicker.id.js') ?>"></script>

 <script type="text/javascript">
          function get_pelajaran(){
                var id_kelas = $('#id_kelas').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("pengaturan_ujian/get_pelajaran_edit");?>',{id_kelas:id_kelas},function(output){
                          $('#isipelajaran').html(output).show();
                        });
                      });
              }
 </script>
<script type="text/javascript">
    $(".form_datetime").datetimepicker({
        language:  'id',
        format: "yyyy-mm-dd hh:ii",
        autoclose: true,
        todayBtn: true,

    });
</script>          
  <?php } ?>