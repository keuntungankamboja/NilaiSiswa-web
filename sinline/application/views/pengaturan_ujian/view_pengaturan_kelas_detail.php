
<?php 
if (empty($kelas)){
	echo "Tidak Ada Kelas";
}else {
	?>
    <div class="panel panel-default">
	<div class="panel-body">
	 <div class="col-sm-12">
      <div class="row">
      <div class="well">
                  <table class="table table-striped" >
                    <tr>
                      <th colspan="3" class="text-center"><h4>INFORMASI DATA KELAS</h4></th>
                    </tr>
                    <tr>
                      <td width="35%"></td>
                      <td class="text-left" width="15%">Kelas</td>
                      <td class="text-left"> : <?php echo $kelas->kelas; //echo " ".$kelas->kode_jurusan;?></td>
                    </tr>

                    <tr>
                      <td></td>
                      <td>Tahun Ajaran</td>
                      <td class="text-left"> : <?php $thn = $kelas->tahun+1; echo "$kelas->tahun/".$thn.""; ?></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td>Jumlah Siswa</td>
                      <td class="text-left"> : <?php echo $isi_kelas; ?></td>
                    </tr>
                  </table>

                </div>
                <script type="application/javascript">
                $(document).ready(function() {
                  $('#cari_siswa').click(function() {
                      var form_data = {
                    angkatan : $('#angkatan').val(),
                    cari : $('#cari').val(),
                    kode_jurusan : $('#kode_jurusan').val(),
                    id_kelas : $('#id_kelas').val(),
                    tahun_cek : $('#tahun_cek').val(),
                    
                    };
                    $.ajax({
                      url: "<?php echo site_url('pengaturan_kelas/load_siswa'); ?>",
                      type: 'POST',
                      async : false,
                      data: form_data,
                      success: function(msg) {
                      $('#refreshsiswa').html(msg);
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

              <div class="col-sm-12 text-center">
              <a href="<?php echo site_url('pengaturan_kelas') ?>" class="btn btn-primary"><span class='glyphicon glyphicon-arrow-left'></span> Kembali</a>
              <button type="button" class="btn btn-danger" title="Tambah Siswa" data-toggle="modal" data-target="#myModal">Tambah Siswa</button>
              </div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Masukkan Siswa</h4>
      </div>
      <div class="modal-body">
           <div class="form-group">
            <div class="col-sm-5">
              <input class="form-control input-sm" type="text" placeholder="cari" id="cari" onchange="cari();">
             </div>

              <div class="col-sm-2">
              <label class="input-sm">Angkatan</label>
              </div>
             <div class="col-sm-3">
                <input type="number" class="form-control" id="angkatan" placeholder="angkatan" value="<?php echo date("Y"); ?>">
              </div>
              <div class="col-sm-2">
                 <button type="button" id="cari_siswa" class="btn btn-info" title="Filter Siswa Yang Muncul">Cari</button>
             </div>
            </div>
            <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('pengaturan_kelas/siswa_act'); ?>">
              <input class="form-control input-sm" type="hidden" id="kode_jurusan" name="kode_jurusan"  value="<?php echo $kelas->kode_jurusan; ?>">
              <input class="form-control input-sm" type="hidden" id="id_kelas" name="id_kelas" value="<?php echo $kelas->id_kelas; ?>">
              <input class="form-control input-sm" type="hidden" id="tahun_cek" name="tahun_cek" value="<?php echo $kelas->tahun; ?>">

              <div id="refreshsiswa"></div>

      </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                  <button type="submit" id="submit" class="btn btn-danger">Tambah</button>
                </div>
        </form>
    </div>
  </div>
</div>

  </div> <!-- end row -->
     </div>
    <div class="col-sm-8 col-md-offset-2">
      <div id="refreshkelas"><?php $this->load->view('pengaturan_ujian/view_tabel_kelas_detail'); ?></div>
     </div>
  </div>
    </div>
  <?php } ?>