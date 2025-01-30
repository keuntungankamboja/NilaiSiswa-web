
<?php 
if (empty($kelas)){
	echo "Tidak Ada Kelas";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
	
<form class="form-horizontal" role="form" method='Post' action="<?php echo site_url('pengaturan_kelas/edit_act'); ?>">
       
       <div class="form-group">
        <label class="col-sm-4 control-label">Id Kelas</label>
        <div class="col-sm-8">
          <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"  value="<?php echo $kelas->id_kelas; ?>">
          <input type="text" class="form-control" id="kelas" name="kelas" value="<?php echo $kelas->kelas; ?>">
        </div>
      </div>
  
      <div class="form-group">
        <label  class="col-sm-4 control-label">Jurusan</label>
        <div class="col-sm-8">
      <select class="form-control" id="kode_jurusan" name="kode_jurusan">
  <?php foreach ($jurusan as $value) {
    if ($value->kode_jurusan == $kelas->kode_jurusan) {
      echo "<option value=$value->kode_jurusan selected>$value->jurusan</option>"; 
    } else {
      echo "<option value=$value->kode_jurusan>$value->jurusan</option>"; 
    }
}
     ?>   
  </select>
        </div>
      </div>
             <div class="form-group">
        <label class="col-sm-4 control-label">Tahun Ajaran</label>
        <div class="col-sm-8">
          <select class="form-control" id="tahun" name="tahun">
                <?php 
                $tahun = date("Y")+1;
                for ($i = 2010; $i <= $tahun; $i++) { 
                 $thn = $i+1;
                if ($i == $kelas->tahun) {
                  echo '<option value='.$i.' selected>'.$i.'/'.$thn.'</option>';
                } else {
                echo '<option value='.$i.'>'.$i.'/'.$thn.'</option>';
                }
                }
                ?>   
                </select>
                  </div>
      </div>
  <div class="form-group">
    <label class="col-sm-4 control-label"></label>
    <div class="col-sm-8">
    <button type="submit" id="submit" class="btn btn-danger">Edit</button>
    <a href='<?php echo site_url('pengaturan_kelas'); ?>' class='btn btn-info btn-md' role='button'><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
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
  <?php } ?>