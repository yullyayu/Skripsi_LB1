<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SI LB1 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!-- <span class="logo-mini"><b>A</b>LT</span> -->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SI</b>LB1</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        <?php if (isset($notif)) { ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning" ><?= $notif?></span>
            </a>
            <ul class="dropdown-menu">
              <?php foreach ($data_notif as $dn) { ?>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <h5 style="margin-left: 10px;margin-right: 10px">
                      <?php if ($dn['status'] == 2 && $dn['id_jp'] == 1) {?>
                        Laporan bulanan(LB1) dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } elseif ($dn['status'] == 2 && $dn['id_jp'] == 2) { ?>
                        Laporan tribulan(LB1) dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } elseif ($dn['status'] == 2 && $dn['id_jp'] == 3) { ?>
                        Laporan tahunan(LB1) dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } elseif ($dn['status'] == 2 && $dn['id_jp'] == 4) { ?>
                        Laporan 15 Besar Penyakit Bulanan dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } elseif ($dn['status'] == 2 && $dn['id_jp'] == 5) { ?>
                        Laporan 15 Besar Penyakit Tribulan dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } elseif ($dn['status'] == 2 && $dn['id_jp'] == 6) { ?>
                        Laporan 15 Besar Penyakit Tahunan dari Puskesmas <?= $dn['nama_puskesmas'] ?>
                      <?php } ?>
                      </h5>
                  </li>
                  <li class="footer">
                  <?php if ($dn['status'] == 2 && $dn['id_jp'] == 1) { ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php }elseif ($dn['status'] == 2 && $dn['id_jp'] == 2) { ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php }elseif ($dn['status'] == 2 && $dn['id_jp'] == 3) { ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php }elseif ($dn['status'] == 2 && $dn['id_jp'] == 4) { ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php }elseif ($dn['status'] == 2 && $dn['id_jp'] == 5) { ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php }elseif ($dn['status'] == 2 && $dn['id_jp'] == 6){ ?>
                    <a href="<?=site_url('dinkes/laporanDinkes')?>" class="btn btn-default" style="float: right;width: 50%">Detail</a>
                  <?php } ?>
                  </li>
                </ul>
              </li>
              <br>
              <?php } ?>
            </ul>
          </li>
        <?php } ?>
          
          <!-- Tasks: style can be found in dropdown.less -->
           <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-fw fa-user"></i>
              <?php foreach ($user as $key) {
                if ($key->user_level == 4) { ?>
              <span class="hidden-xs"><?php echo $key->jabatan ?> <?php echo $key->instansi ?> </span>
              <?php }}?>
            </a>
            <ul class="dropdown-menu">
              <li class="user-footer">
                <div class="pull-right">
                  <a class = "btn btn-primary" href="<?php echo site_url('login/logout');?>">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()."assets/"; ?>/image/gambar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Dinas Kesehatan</p>
          <p>Kota Malang</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li >
          <a href="<?=site_url('dinkes/dashboard')?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li> 
            <a href="<?=site_url('dinkes/tampilPuskesmas')?>">
            <i class="fa fa-th"></i>
            <span>Data Puskesmas</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li>
          <a href="<?=site_url('dinkes/laporanDinkes')?>">
            <i class="fa fa-table"></i>
            <span>Laporan Masuk</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Laporan Bulanan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('dinkes/dt_laporan')?>"><i class="fa fa-table"></i> Laporan Bulanan(LB1)</a></li>
            <li><a href="<?=site_url('dinkes/data_penyakit')?>"><i class="fa fa-fw fa-print"></i> Data Penyakit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Penyakit Terbanyak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('data_penyakit/dataPeny_din')?>"><i class="fa fa-fw fa-table"></i> Tabel</a></li>
            <li><a href="<?=site_url('data_penyakit/dataPenyTri_din')?>"><i class="fa fa-fw fa-bar-chart"></i> Grafik</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=site_url('dinkes/monitoringLB1')?>">
            <i class="fa fa-laptop"></i>
            <span>Monitoring LB1</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Cetak</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=site_url('dinkes/viewCetakBln') ?>"><i class="fa fa-fw fa-file-excel-o"></i> Laporan Bulanan</a></li>
            <li><a href="<?=site_url('dinkes/viewCetakTribln') ?>"><i class="fa fa-fw fa-file-excel-o"></i> 15 Besar Penyakit</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
 