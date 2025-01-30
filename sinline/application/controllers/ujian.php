<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ujian extends CI_Controller {
function __construct() { 
       parent::__construct();

        $this->load->library(array('lib_login','lib_akses'));
       	if (!$this->lib_login->sessionlogin()) {redirect('login');}
        
        $this->lib_akses->akses(array('siswa'));
       	$this->load->model(array('model_ujian','model_user','model_waktu'));
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at httpp//.phpexample.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->data['info_siswa'] = $this->model_user->info_siswa2($this->session->userdata('id_user'));
		$this->data['info_ujian'] = $this->model_ujian->prep_ujian($this->session->userdata('id_user'), $this->data['info_siswa']->kode_jurusan);	
		$this->data['page'] = 'ujian';
		$this->load->view('view_ujian',$this->data);
	}
	public function mulai(){

		if ($this->session->userdata('id_ujian')) {
			$id_ujian   = $this->session->userdata('id_ujian');
		} else {
			redirect('ujian');
		}
		
		$id_siswa   = $this->session->userdata('id_user');
		
		//halaman
		$batas      = 3;
		$jml_soal   = $this->model_ujian->lihat_junlah_soal($id_ujian);
		$jmlhalaman = ceil($jml_soal/$batas);
		if ($this->uri->segment(3) === FALSE){	
			$posisi  =0;
			$halaman =1;

		} else {
			$halaman = $this->uri->segment(3);
			if (!is_numeric($halaman) || $halaman > $jmlhalaman ) {
				$posisi  =0;
				$halaman =1;

			}	else{
				$posisi  = ($halaman-1) * $batas;
			}
		}

		//cek info tentang ujian	
	    if ($query = $this->model_ujian->prep_info_ujian_awal($id_ujian)){
			foreach ($query as $row) {
				$info_ujian['lama_ujian']  = $row->waktu * 60;
				$info_ujian['pelajaran']   = $row->pelajaran;
				$info_ujian['id_mp']       = $row->id_mp;
				$info_ujian['kompetensi']  = $row->kompetensi;
				$info_ujian['jenis_ujian'] = $row->jenis_ujian;
				$info_ujian['tipe_waktu'] =  $row->tipe_waktu;
			}

		} else 	{
			echo "kode ujian tidak ditemukan/tidak aktif";
			redirect('monitor');
			exit();
		}

		//mengecek waktu
		if($this->session->userdata('mulai_waktu'))
		{
			$telah_berlalu = time() - $this->session->userdata('mulai_waktu');

		} else {
			$this->session->set_userdata('mulai_waktu', time());
			$telah_berlalu = 0;
		}
		//ceksisawaktu
		$x = $info_ujian['lama_ujian']-$telah_berlalu;	
		if ($x<0){
		echo '<script type="text/javascript">alert("Maaf, Waktu Mengerjakan Soal Telah Habis. \nSilahkan Lihat Nilai Anda,");window.open("'.site_url('ujian/selesai/').'","_self");</script>';
		exit();
		}

		//part2 soal
		//mengecek waktu
		if($this->session->userdata('waktusoal'))
		{
			$telah_berlalu_soal = time() - $this->session->userdata('waktusoal');
			#$this->session->set_userdata('soalke', 2);
		} else {
			$this->session->set_userdata('waktusoal', time());
			$telah_berlalu_soal = 0;
			$this->session->set_userdata('soalke', 1);
		}
		//cek ujian apakah otomatis
		if ($info_ujian['tipe_waktu']==1) {
		 	//pengaturan waktu soal
		$jenissoal[0]   = $this->model_ujian->lihat_soal_sulit($id_ujian);
		$jenissoal[1]   = $this->model_ujian->lihat_soal_sedang($id_ujian);
		$jenissoal[2]   = $this->model_ujian->lihat_soal_mudah($id_ujian);
		$total_waktu = $info_ujian['lama_ujian'];

		//waktu persoal
 		$waktupersoal = hitungwaktusoal($total_waktu, $jenissoal[0],$jenissoal[1],$jenissoal[2]);
 		$this->data['waktupersoal'] = $waktupersoal;
		} else {
			$info_waktu = $this->model_waktu->info_waktu($info_ujian['id_mp']);
			$waktux[0] = $info_waktu->sulit;
			$waktux[1] = $info_waktu->sedang;
			$waktux[2] = $info_waktu->mudah;
 			$this->data['waktupersoal'] = $waktux;
		}
		
		//variabel yang dikirim ke view
		$this->data['soal'] = $this->model_ujian->baca_soal($id_ujian,$posisi,$batas,$id_siswa);
		$dikerjakan         = $this->model_ujian->lihat_soal_dijawab($id_siswa,$id_ujian);
		$belum              = $jml_soal - $dikerjakan;
		if ($belum <=0){
				$this->data['kett'] = "Apa Anda Yakin Semua soal telah dikerjakan dengan baik ?";

		} else	{
				$this->data['kett'] = "Apa Anda Yakin Ingin Melanjutkan ? $belum Soal Belum Dikerjakan";
		}
		$info_ujian['id_ujian']      = $id_ujian;
		$this->data['jmlhalaman']    = $jmlhalaman;
		$this->data['halaman']       = $halaman;
		$this->data['info_ujian']    = $info_ujian;
		$this->data['no']            = $posisi+1;
		$this->data['id_siswa']      = $id_siswa;	
		$this->data['telah_berlalu'] = $telah_berlalu;
		$this->data['telah_berlalu_soal'] = $telah_berlalu_soal;
		
		//$this->data['telah_berlalu_soal'] = $telah_berlalu_soal;

		$this->load->view('view_ujian_mulai',$this->data);
	}

	public function selesai(){

		$id_siswa=$this->session->userdata('id_user');
		$id_ujian=$this->session->userdata('id_ujian');

		if (empty($id_siswa) || empty($id_ujian)) {
			redirect('ujian');
			exit();
		}
		if ($query = $this->model_ujian->prep_info_ujian_awal($id_ujian)){
			foreach ($query as $row) {
				$info_hasil['lama_ujian']  = $row->waktu;
			}
		}
		$sisa = (time() - $this->session->userdata('mulai_waktu'));
		if ($sisa>$info_hasil['lama_ujian']*60){
			$sisa = $info_hasil['lama_ujian']*60;
		}
		$sisamenit = number_format($sisa/60,0); 
		$sisadetik = ($sisa%60);
		$info_hasil['waktu_pengerjaan']  = $sisamenit.' Menit '.$sisadetik.' Detik';
		$info_hasil['jml_soal']       =$this->model_ujian->lihat_junlah_soal($id_ujian);
		$info_hasil['dijawab']        =$this->model_ujian->lihat_soal_dijawab($id_siswa,$id_ujian);
		$info_hasil['tidak_dijawab']  =$info_hasil['jml_soal']-$info_hasil['dijawab'];
		$info_hasil['dijawab_salah']  =$this->model_ujian->dijawab_salah($id_siswa,$id_ujian);
		$info_hasil['dijawab_benar']  =$this->model_ujian->dijawab_benar($id_siswa,$id_ujian);
		$info_hasil['standard_nilai'] =$this->model_ujian->standard_nilai($id_ujian);
		
		$telah_ujian                  =$this->model_ujian->cek_telah_ujian($id_siswa,$id_ujian);
		$poin                         =$this->model_ujian->lihat_poin($id_siswa,$id_ujian);
		$nilai = 0;
		if (isset($poin)){
			foreach ($poin as $value) {
			$nilai=$nilai+$value->poin;
			}
		}

		if ($nilai>100){$nilai=100;}
		$info_hasil['poin'] = $nilai;

		if ($info_hasil['poin']<$info_hasil['standard_nilai']){
			$info_hasil['ket']  = "Tidak Lulus";
			$info_hasil['pes']  = "<img src='../bootstrap/images/confused-smiley-emoticon.gif' height='120px' width='100px' class='text-center'/><h2 class='text-center' >MAAF ANDA TIDAK LULUS</h2><br>";
			$info_hasil['pes2'] = "<br><br><h4>belajar yang lebih giat lagi ya...<br>";
		}
		else {
			$info_hasil['ket']  = "Lulus";
			$info_hasil['pes']  = "<img src='../bootstrap/images/jumping-for-joy-smiley-emoticon-2.gif' height='120px' width='100px' class='text-center'/><h2 class='text-center' >SELAMAT ANDA LULUS</h2><br>";
			$info_hasil['pes2'] = "<br><br><h4>tingkatkan semangat belajarmu..</h4><br>";
			//echo "<br> Status : $ket <br>";
		}
	
		if ($telah_ujian==0 and $info_hasil['jml_soal']!=$info_hasil['tidak_dijawab']){
			$this->model_ujian->insert_hasil_ujian($info_hasil['dijawab_benar'],$info_hasil['dijawab_salah'],$id_siswa,$id_ujian,$info_hasil['tidak_dijawab'],$nilai,$info_hasil['ket'],$info_hasil['jml_soal'],$info_hasil['waktu_pengerjaan']);
		}

		$this->session->unset_userdata('id_ujian');
		$this->session->unset_userdata('mulai_waktu');
		$this->session->unset_userdata('waktusoal');
		$this->session->unset_userdata('soalke');


		$this->data['page']          = 'hasil';
		$this->data['info_hasil']    = $info_hasil;

		$this->load->view('view_ujian',$this->data);
	}
	public function simpan_pil(){

		ob_start();
		$check    = $_POST['rb'];
		$id_soal  = $_POST['id_soal'];
		$id_siswa = $_POST['id_siswa'];
		$id_mp    = $_POST['id_mp'];
		$id_ujian = $_POST['id_ujian'];
		$no       = $_POST['no'];
		
		$id       = $this->model_ujian->baca_jawaban_siswa($id_siswa,$id_soal,$id_ujian);
		$jawab    = $this->model_ujian->baca_jawaban_soal($id_soal);

		if ($jawab==$check) {
			$keterangan="Benar"; 
		} else {
			$keterangan="Salah";
		}
		if($id){
			$this->model_ujian->update_jawaban_siswa($check,$keterangan,$id_siswa,$id_soal,$id_ujian);
		}	else {
			$this->model_ujian->insert_jawaban_siswa($check,$keterangan,$id_siswa,$id_soal,$id_ujian,$no);
		}
		ob_end_flush();
	}
	public function u(){
		if ($this->session->userdata('id_ujian')) {
			redirect('ujian/mulai');
		} else { //1
			$id_ujian    =$this->uri->segment(3);
			$info_siswa  = $this->model_user->info_siswa($this->session->userdata('id_user'));
			$info_ujian  = $this->model_ujian->prep_ujian2($info_siswa->kode_jurusan, $this->session->userdata('id_user'),$id_ujian);
			if ($info_ujian) {
				$telah_ujian =$this->model_ujian->cek_telah_ujian($this->session->userdata('id_user'),$id_ujian);
				if ($telah_ujian==0) {
					$this->session->set_userdata('id_ujian', $id_ujian);
					redirect('ujian/mulai');
				} else {
					echo '<script type="text/javascript">alert("Maaf, Anda Telah Mengikuti Ujian, \nSilahkan Lihat Nilai Anda");window.location.href="..";</script>';
				}
				
			} else {
				redirect('ujian');
			}
		}//end 1
		
		
	}
	public function monitor_setting(){
		$this->data['page']          = 'monitor';
		$this->load->view('view_ujian',$this->data);
	}
/*	public function bersih()
	{
		# code...
		$this->session->unset_userdata('waktusoal');
		$this->session->unset_userdata('soalke');
	}*/
	public function newtime(){
		$id_soal = $_POST['id_soal'];
		$id_siswa=$this->session->userdata('id_user');
		$id_ujian=$this->session->userdata('id_ujian');
		$waktupersoal = $_POST['waktupersoal'];
		$sisa = (time() - $this->session->userdata('waktusoal'));
		if ($sisa>$waktupersoal){
			$sisa = $waktupersoal ;
		}
		$sisamenit = number_format($sisa/60,0); 
		$sisadetik = ($sisa%60);
		$info_hasil['waktu_pengerjaan']  = $sisamenit.' Menit '.$sisadetik.' Detik';
/*		echo $id_soal;
		echo "<br>";
		echo $waktupersoal;
		echo "<br>";
		echo $info_hasil['waktu_pengerjaan'];*/


		$jml_soal   = $this->model_ujian->lihat_junlah_soal($id_ujian);

		$this->model_ujian->update_waktu_jawaban_siswa($info_hasil['waktu_pengerjaan'],$id_siswa,$id_soal,$id_ujian);
		$soalke = $this->session->userdata('soalke') + 1;
		$this->session->set_userdata('soalke',$soalke);
		$this->session->unset_userdata('waktusoal');
		$this->session->set_userdata('waktusoal', time());
		if ($soalke>$jml_soal) {
			$soalke = $jml_soal;
		}
		echo "<span class='label label-info'><span class='glyphicon glyphicon-share-alt'></span> $soalke/$jml_soal Soal</span>";
	}
/*	public function status(){
		echo $this->session->userdata('soalke');
		echo "<br>";
		$telah_berlalu_soal = time() - $this->session->userdata('waktusoal');
		echo $telah_berlalu_soal;
	}*/
public function soal(){
	$this->load->view('view_soal');
}
public function soalact(){
		$total_waktu = $_POST['waktu'];
		$waktu = $total_waktu/60;
		$sulit = $_POST['sulit'];
		$sedang = $_POST['sedang'];
		$mudah = $_POST['mudah'];
		$jml_soal = $sulit + $sedang + $mudah;
		echo "<h2>Hasil Analisis Waktu Persoal</h2>";
		echo "<table class='table'>";
		echo "<tr><th colspan='2' class='text-center'>Informasi Soal</th></tr>";
		echo "<tr><td>Lama Ujian</td><td>$waktu Menit</td></tr>";
		echo "<tr><td>Jumlah Soal</td><td>$jml_soal</td></tr></table>";
		$persentasesoal[0]=($sulit/$jml_soal)*100;
		$persentasesoal[1]=($sedang/$jml_soal)*100;
		$persentasesoal[2]=($mudah/$jml_soal)*100;

		echo "<h2>Persentase Soal</h2>";
		echo "<table class='table'>";
		echo "<tr><th colspan='3' class='text-center'>Informasi Persentase Soal</th></tr>";
		echo "<tr><th> Tingkat Kesukaran</th><th> Soal</th><th> Persentase</th></tr>";
		echo "<tr><td> Sulit</td><td> $sulit</td><td> $persentasesoal[0] </td></tr>";
		echo "<tr><td> Sedang</td><td> $sedang</td><td> $persentasesoal[1]</td></tr>";
		echo "<tr><td> Mudah</td><td> $mudah</td><td> $persentasesoal[2]</td></tr>";
		echo "</table>";

		$nilai['sulit']=($persentasesoal[0]/100)*$total_waktu;
		$nilai['sedang']=($persentasesoal[1]/100)*$total_waktu;
		$nilai['mudah']=($persentasesoal[2]/100)*$total_waktu;

		//nilai per soal
		$waktusoal['sulit']=$nilai['sulit']/$sulit;
		$waktusoal['sedang']=$nilai['sedang']/$sedang;
		$waktusoal['mudah']=$nilai['mudah']/$mudah;

		echo "<h2>Nilai Soal</h2>";
		echo "<table class='table'>";
		echo "<tr><th colspan='3' class='text-center'>Informasi Nilai Soal</th></tr>";
		echo "<tr><th> Tingkat Kesukaran</th><th> Soal</th><th> Nilai</th><th> Waktu Persoal</th></tr>";
		echo "<tr><td> Sulit</td><td> $sulit</td><td> $nilai[sulit] </td><td> $waktusoal[sulit] </td></tr>";
		echo "<tr><td> Sedang</td><td> $sedang</td><td> $nilai[sedang]</td><td> $waktusoal[sedang] </td></tr>";
		echo "<tr><td> Mudah</td><td> $mudah</td><td> $nilai[mudah]</td><td> $waktusoal[mudah] </td></tr>";
		echo "</table>";

		//mengambil 40% dari waktu persoal
		$ambilwaktu['sulit'] = (0/100)*$waktusoal['sulit'];
		$ambilwaktu['sedang'] = (10/100)*$waktusoal['sedang'];
		$ambilwaktu['mudah'] = (20/100)*$waktusoal['mudah'];

		//menghitung sisa waktu persoal
		$waktupersoal['sulit'] = (100/100)*$waktusoal['sulit'];
		$waktupersoal['sedang'] = (90/100)*$waktusoal['sedang'];
		$waktupersoal['mudah'] = (80/100)*$waktusoal['mudah'];

		//menghitung total waktu yang diambil persoal
		$waktutambahan['sulit'] = $ambilwaktu['sulit'] * $sulit;
		$waktutambahan['sedang'] = $ambilwaktu['sedang'] * $sedang;
		$waktutambahan['mudah'] = $ambilwaktu['mudah'] * $mudah;

		echo "waktu yang diambil sulit = $waktutambahan[sulit]";
		echo " | waktu yang diambil sedang = $waktutambahan[sedang]";
		echo " | waktu yang diambil mudah = $waktutambahan[mudah]";

		echo "<br>perhitungan akhir sementara";
		$totalwaktu = ($waktupersoal['sedang'] * $sedang) + ($waktupersoal['sulit'] * $sulit) + ($waktupersoal['mudah'] * $mudah) + $waktutambahan['sulit']+$waktutambahan['sedang']+$waktutambahan['mudah'];
		echo $total_waktu;
		//echo "$ambilwaktu";
		
		echo "<br>";
		#---------------------------------------------------------------------------------
			//start kepengurusan pengalihan waktu
			//mengambil waktu yang diambil mudah dan sedang
			$waktubaru['sulit'] = ($waktutambahan['sedang'] + $waktutambahan['mudah']) / $sulit;
			//waktu persoal sulit setelah dibagi
			$waktupersoalbaru['sulit'] = $waktubaru['sulit'];
			//end
			
			//menghitung waktu persoal asli yang baru
			$waktupersoal['sulit'] = $waktupersoal['sulit'] + $waktupersoalbaru['sulit'];

		#---------------------------------------------------------------------------------
		
		echo "<br>perhitungan akhir valid";
		$totalwaktu = ($waktupersoal['sedang'] * $sedang) + ($waktupersoal['sulit'] * $sulit) + ($waktupersoal['mudah'] * $mudah) + $waktutambahan['sulit']+$waktutambahan['sedang']+$waktutambahan['mudah'];
		echo $total_waktu;
		$nilai['sulit']= $waktupersoal['sulit'] * $sulit;
		$nilai['sedang']=$waktupersoal['sedang'] * $sedang;
		$nilai['mudah']=$waktupersoal['mudah'] * $mudah;
		echo "<h2>Nilai Soal</h2>";
		echo "<table class='table'>";
		echo "<tr><th colspan='3' class='text-center'>Informasi Nilai Soal</th></tr>";
		echo "<tr><th> Tingkat Kesukaran</th><th> Soal</th><th> Nilai</th><th> Waktu Persoal</th></tr>";
		echo "<tr><td> Sulit</td><td> $sulit</td><td> $nilai[sulit] </td><td> $waktupersoal[sulit] </td></tr>";
		echo "<tr><td> Sedang</td><td> $sedang</td><td> $nilai[sedang]</td><td> $waktupersoal[sedang] </td></tr>";
		echo "<tr><td> Mudah</td><td> $mudah</td><td> $nilai[mudah]</td><td> $waktupersoal[mudah] </td></tr>";
		echo "</table>";
		$totalwaktu = $nilai['sulit']+$nilai['sedang']+$nilai['mudah'];
		echo "Total Waktu Adalah $totalwaktu";

/*		$total_waktu = 3600;

		$jml_soal = 10;
		//jenis soal 0 sulit ada 5 soal dan sedang ada 7 soal
		$jenissoal[0] = 2;
		$jenissoal[1] = 7;
		$jenissoal[2] = 1;
		//soal harus terdiri dari 20 persen sulit 70% sedang dan 10%mudah
		$sulit = 23;
		$sedang = 70;
		$mudah = 7;
		$persentasesoal[0]=(30/$sulit)*100;
		$persentasesoal[1]=(30/$sedang)*100;
		$persentasesoal[2]=(30/$mudah)*100;
		//persentase soal
		$persentasesoal[0]=($jenissoal[0]/30)*100;
		$persentasesoal[1]=($jenissoal[1]/30)*100;
		$persentasesoal[2]=($jenissoal[2]/30)*100;
			$nilaitingkat[0] = $sulit;
			$nilaitingkat[1] = $sedang;
			$nilaitingkat[2] = $mudah;

		echo $persentasesoal[0];
		echo "<br>";echo $persentasesoal[1];
		echo "<br>";echo $persentasesoal[2];
		echo "<br>";

		

		//persentase tingkat kesulitan
		//nilaitingkat 0 = 40%

		//total waktu semua soal
		$totalwaktusoal[0] = ($total_waktu/100)*$nilaitingkat[0];
		$totalwaktusoal[1] = ($total_waktu/100)*$nilaitingkat[1];
		$totalwaktusoal[2] = ($total_waktu/100)*$nilaitingkat[2];
		//waktu persoal
		$waktupersoal[0] = $totalwaktusoal[0] / $jenissoal[0];
		$waktupersoal[1] = $totalwaktusoal[1] / $jenissoal[1];
		$waktupersoal[2] = $totalwaktusoal[2] / $jenissoal[2];

		echo "Sulit ".$waktupersoal[0]/60;
		echo "<br>";
		echo "Sedang ".$waktupersoal[1]/60;
		echo "<br>";
		echo "mudah ".$waktupersoal[2]/60;
		echo "<br>Total Waktu <br>";
		echo $totalwaktusoal[2]+$totalwaktusoal[1]+$totalwaktusoal[0];*/
	}
}

function hitungwaktusoal($total_waktu, $sulit,$sedang,$mudah){
/*$total_waktu = $_POST['waktu'];
		$sulit = $_POST['sulit'];
		$sedang = $_POST['sedang'];
		$mudah = $_POST['mudah'];*/
		$jml_soal = $sulit + $sedang + $mudah;

		$persentasesoal[0]=($sulit/$jml_soal)*100;
		$persentasesoal[1]=($sedang/$jml_soal)*100;
		$persentasesoal[2]=($mudah/$jml_soal)*100;

		$nilai['sulit']=($persentasesoal[0]/100)*$total_waktu;
		$nilai['sedang']=($persentasesoal[1]/100)*$total_waktu;
		$nilai['mudah']=($persentasesoal[2]/100)*$total_waktu;

		//nilai per soal
		$waktusoal['sulit']=$nilai['sulit']/$sulit;
		$waktusoal['sedang']=$nilai['sedang']/$sedang;
		$waktusoal['mudah']=$nilai['mudah']/$mudah;

		//mengambil 40% dari waktu persoal
		$ambilwaktu['sulit'] = (0/100)*$waktusoal['sulit'];
		$ambilwaktu['sedang'] = (10/100)*$waktusoal['sedang'];
		$ambilwaktu['mudah'] = (20/100)*$waktusoal['mudah'];

		//menghitung sisa waktu persoal
		$waktupersoal['sulit'] = (100/100)*$waktusoal['sulit'];
		$waktupersoal['sedang'] = (90/100)*$waktusoal['sedang'];
		$waktupersoal['mudah'] = (80/100)*$waktusoal['mudah'];

		//menghitung total waktu yang diambil persoal
		$waktutambahan['sulit'] = $ambilwaktu['sulit'] * $sulit;
		$waktutambahan['sedang'] = $ambilwaktu['sedang'] * $sedang;
		$waktutambahan['mudah'] = $ambilwaktu['mudah'] * $mudah;


		#---------------------------------------------------------------------------------
			//start kepengurusan pengalihan waktu
			//mengambil waktu yang diambil mudah dan sedang
			$waktubaru['sulit'] = ($waktutambahan['sedang'] + $waktutambahan['mudah']) / $sulit;
			//waktu persoal sulit setelah dibagi
			$waktupersoalbaru['sulit'] = $waktubaru['sulit'];
			//end
			//menghitung waktu persoal asli yang baru
			$waktupersoal['sulit'] = $waktupersoal['sulit'] + $waktupersoalbaru['sulit'];

		#---------------------------------------------------------------------------------
		$waktux[0] = $waktupersoal['sulit'];
		$waktux[1] = $waktupersoal['sedang'];
		$waktux[2] = $waktupersoal['mudah'];
		return $waktux;
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */