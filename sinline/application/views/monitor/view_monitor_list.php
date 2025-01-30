    <div class="panel panel-default">
	<div class="panel-body">
	<div class="row">
	    <script type="text/javascript">
          function cari(){
                var cari = $('#cari').val();
                $(document).ready(function(){
                $.post('<?php echo site_url("monitor/filter_monitor");?>',{cari:cari},function(output){
                          $('#refreshmonitor').html(output).show();
                        });
                      });
              }
          </script>
					  	<div class="col-sm-4">
					    <input class="form-control input-sm" id="cari" type="text" placeholder="cari" onchange="cari();">
					    </div>
						 <div class="col-sm-1">
					    <button type="button" class="btn btn-info" title="Filter Ujian Yang Muncul" onclick="cari();">Filter</button>
					    </div>
	</div> <!-- end row -->
  <div id="refreshmonitor">
      <?php $this->load->view('monitor/view_tabel_monitor_list'); ?>
  </div>

	</div>
	</div>