<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
  <?php 
  switch ($this->session->userdata('type')) {
      case 'siswa':
      ?>
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url('ujian') ?>">Sinline</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href ="<?php echo site_url('ujian') ?>"><span class="glyphicon glyphicon-tasks"></span> Ujian</a></li>
              <li><a href ="<?php echo site_url('nilai') ?>"><span class="glyphicon glyphicon-bookmark"></span> Lihat Nilai</a></li>
              <li><a href ="<?php echo site_url('panduan') ?>"><span class="glyphicon glyphicon-question-sign"></span> Panduan</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->userdata('user'); ?><b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-tasks"></span> Profil</a></li>                
                  <li><a href="<?php echo site_url('password') ?>"><span class="glyphicon glyphicon-lock"></span> Ganti Sandi</a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>
                </ul>
              </li>

            </ul>
     <?php
      break;
      case 'guru':
      ?>
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo site_url('monitor') ?>">Sinline</a>
          </div>
        <div class="navbar-collapse collapse">
             <ul class="nav navbar-nav">
             <li title="Monitoring Ujian"><a href="<?php echo site_url('monitor') ?>"><span class="glyphicon glyphicon-facetime-video"></span> Monitoring</a></li>
             <li title="Pengaturan Ujian"><a href="<?php echo site_url('pengaturan_ujian') ?>"><span class="glyphicon glyphicon-cog"></span> Ujian</a></li>
             <li><a href="<?php echo site_url('panduan') ?>"><span class="glyphicon glyphicon-question-sign"></span> Panduan</a></li>
             <!-- <li title="Laporan"><a href="<?php echo site_url('ujian/pengaturan') ?>"><span class="glyphicon glyphicon-list-alt"> Laporan</a></li>
              --></ul>
             
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                  <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->userdata('user'); ?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-tasks"></span> Profil</a></li>                
                    <li><a href="<?php echo site_url('password') ?>"><span class="glyphicon glyphicon-lock"></span> Ganti Sandi</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>
                  </ul>
                </li>

            </ul>
      <?php
      break;
    case 'admin':
      ?> 
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="<?php echo site_url('monitor') ?>">Sinline</a>
        </div>
        <div class="navbar-collapse collapse">
            <!-- <ul class="nav navbar-nav">
                  <li title="Monitoring Ujian"><a href="<?php echo site_url('monitor') ?>"><span class="glyphicon glyphicon-facetime-video"></span> Monitoring</a></li>
                  <li title="Pengaturan Ujian"><a href="<?php echo site_url('pengaturan_ujian') ?>"><span class="glyphicon glyphicon-cog"></span> Ujian</a></li>
                  <li title="Pengaturan Kelas"><a href="<?php echo site_url('pengaturan_kelas') ?>">Kelas</a></li>
                  <li title="Pengaturan Mata Pelajaran"><a href="<?php echo site_url('pengaturan_pelajaran') ?>">Mata Pelajaran</a></li>
                  <li title="Pengaturan Guru"><a href="<?php echo site_url('pengaturan_guru') ?>">Guru</a></li>
                  <li title="Pengaturan Siswa"><a href="<?php echo site_url('pengaturan_siswa') ?>">Siswa</a></li>
                  <li title="Pengaturan Siswa"><a href="<?php echo site_url('pengaturan_jurusan') ?>">Jurusan</a></li>
                  <li><a href="<?php echo site_url('panduan') ?>">Panduan</a></li>
            <li title="Laporan"><a href="<?php echo site_url('ujian/pengaturan') ?>"><span class="glyphicon glyphicon-list-alt"> Laporan</a></li>            </ul> -->
<ul class="nav navbar-nav">
                  <li title="Monitoring Ujian"><a href="<?php echo site_url('monitor') ?>"><span class="glyphicon glyphicon-facetime-video"></span> Monitoring</a></li>
                     <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-wrench"></span>  Pengaturan<b class="caret"></b></a>
                    <ul class="dropdown-menu">
      
                  <li title="Pengaturan Kelas"><a href="<?php echo site_url('pengaturan_kelas') ?>">Kelas</a></li>
                  <li title="Pengaturan Mata Pelajaran"><a href="<?php echo site_url('pengaturan_pelajaran') ?>">Mata Pelajaran</a></li>
                  <li title="Pengaturan Guru"><a href="<?php echo site_url('pengaturan_guru') ?>">Guru</a></li>
                  <li title="Pengaturan Siswa"><a href="<?php echo site_url('pengaturan_siswa') ?>">Siswa</a></li>
                  <li title="Pengaturan Siswa"><a href="<?php echo site_url('pengaturan_jurusan') ?>">Jurusan</a></li>
                    </ul>
                  <li><a href="<?php echo site_url('panduan') ?>"><span class="glyphicon glyphicon-question-sign"></span> Panduan</a></li>
                  </li>    
 </ul>
            <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>  <?php echo $this->session->userdata('user'); ?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo site_url('home') ?>"><span class="glyphicon glyphicon-tasks"></span> Profil</a></li>                
                      <li><a href="<?php echo site_url('password') ?>"><span class="glyphicon glyphicon-lock"></span> Ganti Sandi</a></li>
                      <li class="divider"></li>
                      <li><a href="<?php echo site_url('login/logout'); ?>"><span class="glyphicon glyphicon-off"></span> Keluar</a></li>
                    </ul>
                  </li>
            </ul>
    <?php
    break;
    default:
    # code...
    break;
    }
    
    ?>
         </div><!--/.nav-collapse -->
      </div>
    </div> <!--  end navbar -->
    <div style="margin-top: 60px"></div>
