 <?php 
				  	if (empty($list_nilai)){
						echo "Tidak Ada Nilai";
					} else {
				  	?>
				  	<script type="text/javascript">
					function cari(){
								var cari = $('#cari').val();
								$(document).ready(function(){
								$.post('<?php echo site_url("nilai/filter_nilai");?>',{cari:cari},function(output){
													$('#load').html(output).show();
												});
											});
							}
					</script>
					<script type="text/javascript">
					function laporan_nilai(){
								var cari2 = $('#cari').val();
								$(document).ready(function(){
								$.post('<?php echo site_url("laporan/nilai");?>',{cari2:cari2},function(output){
													$('#load').html(output).show();
												});
											});
							}
					</script>
				  <div class="panel panel-default">
				  <div class="panel-body">
				  	<div class="row">
					  	<div class="col-sm-4">
					    <input class="form-control input-sm" type="text" id="cari" placeholder="cari" onchange="cari();">
					    </div>
						 <div class="col-sm-2">
						 <button type="button" class="btn btn-info" title="Filter Nilai Yang Muncul" onClick="cari();"><span class='glyphicon glyphicon-search'> </span> Cari Nilai</button>
					    </div>
					    <div class="col-sm-2">
<!-- 					    <a href="<?php echo site_url('laporan/nilai') ?>" type="button" class="btn btn-warning" title="Download Nilai"><span class='glyphicon glyphicon-download'> Download</a>
					   	<button type="button" class="btn btn-warning" onClick="laporan_nilai();"  class="btn btn-warning" title="Download Nilai"><span class='glyphicon glyphicon-download'> Download</button> -->
					   					  	 					    			  	 
					   	</div>
				  	</div> <!-- end row -->
					
					
				  	<div class="row"><p></p><p></p>
				  		<div id="load">
				  		<?php $this->load->view('nilai/tabel'); ?>
				  		</div>
				  	</div> <!-- end row -->
				  	
				  	<?php } ?>
				  </div> <!-- end panel body -->
				  </div>
                </div>
            </div>