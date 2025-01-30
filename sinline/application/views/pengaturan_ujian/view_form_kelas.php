<div class="form-group">
<div class="col-sm-8">
  <?php 
if (!empty($list_siswa)) {

  ?>
  <label>
<INPUT type="checkbox" onchange="toggle(this)"/> Pilih Semua
</label>
  <?php
  foreach ($list_siswa as $value) {
    ?>
<div class="checkbox">
    
    <label>
    <input type="checkbox" value="<?php echo $value->nis; ?>" name="nis[]" class="nis"><?php echo $value->nis; echo ' | '.$value->nama; ?>
    </label>
</div>
    <?php
  	}
  }
else {
	echo "tidak ditemukan";
	}
  ?>
</div>
</div>
<script type="text/javascript">
function toggle(source) {
  checkboxes = document.getElementsByClassName('nis');
  for(var i=0, n=checkboxes.length;i<n;i++) {
    checkboxes[i].checked = source.checked;
  }
}
</script>
