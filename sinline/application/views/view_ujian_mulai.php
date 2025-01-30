<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
<title>Ujian Berlangsung</title>
<?php $this->load->view('import/head_css');?>
<script src="<?php echo base_url('bootstrap/js/jquery.autoSave.js') ?>"></script>
<script src="<?php echo base_url('bootstrap/js/jquery.countdown.js') ?>"></script>
</head>

<script type="text/javascript">

$(function() {
		$("#form1 input,#form1 select,#form1 textarea").autosave({
				url: "<?php echo site_url('ujian/simpan_pil'); ?>",
				method: "post",
				grouped: true,
				success: function(data) {
					$("#message").html("Data updated successfully").show();
					setTimeout('fadeMessage()',1500);
				},
				send: function(){
					$("#message").html("Sending data....");
				},
				dataType: "html"
			});
		$("#form2 input,#form2 select,#form2 textarea").autosave({
				url: "<?php echo site_url('ujian/simpan_pil'); ?>",
				method: "post",
				grouped: true,
				success: function(data) {
					$("#message").html("Data updated successfully").show();
					setTimeout('fadeMessage()',1500);
				},
				send: function(){
					$("#message").html("Sending data....");
				},
				dataType: "html"
			});
			
		$("#form3 input,#form3 select,#form3 textarea").autosave({
				url: "<?php echo site_url('ujian/simpan_pil'); ?>",
				method: "post",
				grouped: true,
				success: function(data) {
					$("#message").html("Data updated successfully").show();
					setTimeout('fadeMessage()',1500);
				},
				send: function(){
					$("#message").html("Sending data....");
				},
				dataType: "html"
			});		
				
	});
	
	function fadeMessage(){
		$('#message p').fadeOut('slow');
	}

</script>
<body>
	<div class="container">
    <div class="row">
    <div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		 <center><h3>Ujian <?php echo $info_ujian['pelajaran'];?></h3></center>
	</div>
	<!-- Timer utama -->

  

  <div class="panel-body">
	<div class="container">
<?php 
$this->load->view('view_header.php');
        view_header(1);
 ?>


</div>
    <blockquote class="pull-left ">
  <?php echo $info_ujian['jenis_ujian'];echo "<br>";?>
Kompetensi Dasar : <?php echo $info_ujian['kompetensi']; ?>
</blockquote><br>
<div id="message" align="right">...
  </div>
</div>

<table class="table">

<?php
$f=1;
foreach ($soal as $row)
		{
			if ($no < $this->session->userdata('soalke')) { 
				$waktusisasoal[$f]=100;
				?>
				<script type="text/javascript">
				$(document).ready(function(){
				$("#form<?php echo $f; ?> :input").attr('disabled',true);
				$("#soalhide<?php echo $f; ?>" ).show();
				$("#waktusoal<?php echo $f; ?>" ).hide();
				});
      			</script>
			<?php 
			} else if ($no == $this->session->userdata('soalke')){ 
				$waktusisasoal[$f]=$telah_berlalu_soal;
				?>
			<script type="text/javascript">
				$(document).ready(function(){
				$("#soalhide<?php echo $f; ?>" ).show();
				$("#waktusoal<?php echo $f; ?>" ).show();
				waktuHabissoal<?php echo $f; ?>();
								});
				</script>
			<?php
			} else { $waktusisasoal[$f]=0;
				?>
			<script type="text/javascript">
				$(document).ready(function(){
				$("#soalhide<?php echo $f; ?>" ).hide();
				$("#waktusoal<?php echo $f; ?>" ).hide();
								});
				</script>
			<?php
			} 
			$tingkat_kesulitan = str_replace(" ", "", $row->tingkat_kesulitan);
			if ($tingkat_kesulitan=='mudah') {
				$waktusoal[$f]=$waktupersoal[2];
			} else if ($tingkat_kesulitan=='sedang') {
				$waktusoal[$f]=$waktupersoal[1];
			} else {
				$waktusoal[$f]=$waktupersoal[0];
			}
			?>

			<tr id="waktusoal<?php echo $f; ?>">
					<td colspan="2"> &nbsp<span class="glyphicon glyphicon-time"></span> <span id="timer_soal<?php echo $f; ?>">00 : 00 : 00</span>
					<span class="label label-default">Tipe : <?php echo $row->tingkat_kesulitan; ?>  &nbsp </span> <button type="button" class="btn btn-warning btn-xs" id="done<?php echo $f; ?>" title='Tampilkan Soal Selanjutnya' onclick='return waktuHabissoal<?php echo $f+1; ?>()'>  <span class="glyphicon glyphicon-arrow-right">Simpan</span></button>
					</td>
			</tr>
	<tr id="soalhide<?php echo $f; ?>"> 
		<td width='30px' valign='top'>
			<?php echo $no; echo "."; ?></td>
			<td>
			<?php echo $row->pertanyaan; ?>
			<?php $attributes = array('id'=>'form'.$f,'name'=>'form'.$f); echo form_open('ujian/simpan_pil',$attributes); ?>
			<table>
			<tr  valign='top'>
				<td><span class="label label-primary">A</span></td>
				<td><input type='radio' onclick='setnilai(this.value)' name='rb' id="rb" value='A' <?php if ($row->jawaban_siswa=="A") echo "checked='checked'"; ?>></td>
				<td> <?php echo $row->p_a; ?></td>
			</tr>
			<tr valign='top'>
				<td><span class="label label-primary">B</span></td>
				<td><input type='radio' onclick='setnilai(this.value)' name='rb' id="rb" value='B' <?php if ($row->jawaban_siswa=="B") echo "checked='checked'"; ?>></td>
				<td> <?php echo $row->p_b ?></td>
			</tr>
			<tr valign='top'>
				<td><span class="label label-primary">C</span></td>
				<td><input type='radio' onclick='setnilai(this.value)' name='rb' id="rb" value='C' <?php if ($row->jawaban_siswa=="C") echo "checked='checked'"; ?>></td>
				<td> <?php echo $row->p_c; ?></td>
			</tr>
			<tr valign='top'>
				<td><span class="label label-primary">D</span></td>
				<td><input type='radio' onclick='setnilai(this.value)' name='rb' id="rb" value='D' <?php if ($row->jawaban_siswa=="D") echo "checked='checked'"; ?>></td>
				<td> <?php echo $row->p_d; ?></td>
			</tr>
			<tr valign='top'>
				<td><span class="label label-primary">E</span></td>
				<td><input type='radio' onclick='setnilai(this.value)' name='rb' id="rb" value='E' <?php if ($row->jawaban_siswa=="E") echo "checked='checked'"; ?>></td>
				<td> <?php echo $row->p_e; ?> </td>
			</tr>
						  
			<input type="hidden" name="id_soal" id="id_soal<?php echo $f;?>" value="<?php echo $row->id_soal_swap; ?>" />
			<input type="hidden" name="id_siswa" value="<?php echo $id_siswa; ?>" />
			<input type="hidden" name="id_mp" value="<?php echo $info_ujian['id_mp']; ?>" />
			<input type="hidden" name="id_ujian" value="<?php echo $info_ujian['id_ujian']; ?>" />
			<input type="hidden" name="no" value="<?php echo $no; ?>" />				
			</table>
			</form>
		<br></td>
			
	</tr>
		<?php	
		$no++;
		$f++;
		}
		
?>
	
</table>
<center>
<ul class="pagination">
<div id="infomaho"><?php 		$jml_soal   = $this->model_ujian->lihat_junlah_soal($info_ujian['id_ujian']);
		$soalke = $this->session->userdata('soalke');
				if ($soalke>$jml_soal) {
			$soalke = $jml_soal;
		}
		echo "<span class='label label-info'><span class='glyphicon glyphicon-share-alt'></span> $soalke/$jml_soal Soal</span>";
?></div>
<?php
for($i=1;$i<=$jmlhalaman;$i++)
		if ($i != $halaman){
			$a = site_url('ujian/mulai/'.$i.'');
				echo "<li><a href='$a'>".$i."</a></li>";
					}
		 else{
				echo "<li class='active'><a href='#'>".$i."<span class='sr-only'>(current)</span></a></li>";
		}
		 ?> <ul> </center>

</div>
<?php echo "<p><a class='btn btn-info' href='".site_url('ujian/selesai/')."' title='Saya Telah selesai mengerjakan soal dan ingin melihat nilai saya' onclick='return confirmAction()'>Selesai</a>";?>
&nbsp<span class="label label-warning">Sisa Waktu | <span id="timer">00 : 00 : 00</span></span>
</div>
	<?php $this->load->view('import/foother.php'); ?>
</div>
</div> <!-- end container -->
<script type="text/javascript">
	$(document).ready(function() {
	$('#done1').click(function() {
              var form_data = {
              id_soal : $('#id_soal1').val(),
              waktupersoal: <?php if(isSet($waktusoal[1])) { echo $waktusoal[1]; } else { echo 0;} ?> 
              };
              $.ajax({
                url: "<?php echo site_url('ujian/newtime'); ?>",
                type: 'POST',
                async : true,
                data: form_data,
                success: function(msg) {
                $('#infomaho').html(msg);
                }
                });
                return true;
          });  });
		$(document).ready(function() {
	$('#done2').click(function() {
              var form_data = {
              id_soal : $('#id_soal2').val(),
               waktupersoal: <?php if(isSet($waktusoal[2])) { echo $waktusoal[2]; } else { echo 0;} ?> 
              };
              $.ajax({
                url: "<?php echo site_url('ujian/newtime'); ?>",
                type: 'POST',
                async : true,
                data: form_data,
                success: function(msg) {
                $('#infomaho').html(msg);
                }
                });
                return true;
          });  });
		$(document).ready(function() {
	$('#done3').click(function() {
              var form_data = {
              id_soal : $('#id_soal3').val(),
              waktupersoal: <?php if(isSet($waktusoal[3])) { echo $waktusoal[3]; } else { echo 0;} ?> 
              };
              $.ajax({
                url: "<?php echo site_url('ujian/newtime'); ?>",
                type: 'POST',
                async : true,
                data: form_data,
                success: function(msg) {
                $('#infomaho').html(msg);
                }
                });
                return true;
          });  });
function newtime(){
	$(document).ready(function() {
              var form_data = {
              id_soal : 12
              };
              $.ajax({
                url: "<?php echo site_url('ujian/newtime'); ?>",
                type: 'POST',
                async : true,
                data: form_data,
                success: function(msg) {
                }
                });
                return true;
          });
}
function waktuHabis(){
	window.open("<?php  echo site_url('ujian/selesai/'); ?>","_self")
	}		
function hampirHabis(periods){
	if($.countdown.periodsToSeconds(periods) <= 300){
		$(this).css({color:"red"});
		}
	}
function hampirHabissoal(periods){
	if($.countdown.periodsToSeconds(periods) <= 20){
		$(this).css({color:"red"});
		}
	}
$(function(){
	var waktu = <?php echo  $info_ujian['lama_ujian']; ?>; // 3 menit
	var sisa_waktu = waktu - <?php echo $telah_berlalu; ?>; //3594;
	var longWayOff = sisa_waktu;
	$("#timer").countdown({
		until: longWayOff,
		compact:true,
		onExpiry:waktuHabis,
		onTick: hampirHabis
		});	
	})
function confirmAction(){
      var confirmed = confirm("<?php echo $kett; ?>");
      return confirmed;
	}	


//soal pertama
function waktuHabissoal1(){
	$(function(){
	var waktu = <?php if(isSet($waktusoal[1])) { echo $waktusoal[1]; } else { echo 0;} ?>; // 3 menit
	var sisa_waktu = waktu - <?php if(isSet($waktusisasoal[1])) { echo $waktusisasoal[1]; } else { echo 0;} ?>; //3594;
	var longWayOff = sisa_waktu;
	$("#timer_soal1").countdown({
		until: longWayOff,
		compact:true,
		onExpiry:nonaktifkan1,
		onTick: hampirHabissoal
		});
	if (sisa_waktu<1){
		nonaktifkan1();
	}
	})
}
function waktuHabissoal2(){
	$("#form1 :input").attr('disabled',true);
	$( "#waktusoal1" ).hide(1500);

	//soal kedua
	$( "#soalhide2" ).show(1000);
	$( "#waktusoal2" ).show();

	$(function(){
	var waktu = <?php if(isSet($waktusoal[2])) { echo $waktusoal[2]; } else { echo 0;} ?>; // 3 menit
	var sisa_waktu = waktu - <?php  if(isSet($waktusisasoal[2])) { echo $waktusisasoal[2]; } else { echo 0;} ?>; //3594;
	var longWayOff = sisa_waktu;
	$("#timer_soal2").countdown({
		until: longWayOff,
		compact:true,
		onExpiry:nonaktifkan2,
		onTick: hampirHabissoal
		});
	if (sisa_waktu<1){
		nonaktifkan2();
	}
	})
	}
function waktuHabissoal3(){
	$("#form2 :input").attr('disabled',true);
    $( "#waktusoal2" ).hide(1500);
	//soal ketiga
	$( "#soalhide3" ).show(1000);
	$( "#waktusoal3" ).show();
	$(function(){
	var waktu = <?php if(isSet($waktusoal[3])) { echo $waktusoal[3]; } else { echo 0;} ?>; // 3 menit
	var sisa_waktu = waktu - <?php  if(isSet($waktusisasoal[3])) { echo $waktusisasoal[3]; } else { echo 0;}  ?>; //3594;
	var longWayOff = sisa_waktu;
	$("#timer_soal3").countdown({
		until: longWayOff,
		compact:true,
		onExpiry:nonaktifkan3,
		onTick: hampirHabissoal
		});
	if (sisa_waktu<1){
		nonaktifkan3();
	}
	})
	}
function waktuHabissoal4(){
	//alert("selesai dikerjakan soal3......");
	$("#form3 :input").attr('disabled',true);
	$( "#waktusoal3" ).hide(1500);
}

function nonaktifkan1(){
	$("#form1 :input").attr('disabled',true);
}
function nonaktifkan2(){
	$("#form2 :input").attr('disabled',true);
}
function nonaktifkan3(){
	$("#form3 :input").attr('disabled',true);
}
</script>
<?php
?>
</body>
</html>