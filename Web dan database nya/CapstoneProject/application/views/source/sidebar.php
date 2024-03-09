<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pengelolaan Data Asesor</title>
  <!-- Custom fonts for this template-->
  <link
    href=" <?php echo base_url('Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css') ?>">
  <link
    href="<?php echo base_url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i'); ?>"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('Assets/css/sb-admin-2.min.css" rel="stylesheet'); ?>">
  <link href="<?php echo base_url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'); ?>"
    rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
    crossorigin="anonymous">
  <link href="<?php echo base_url('Assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet') ?>">
</head>

<body id="page-top">
  <div id="result-container">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <br>
        <center><img src="<?php echo base_url('Assets/img/logolsp.png') ?>" alt="Logo" style="width:100px"></center> <a
          class="sidebar-brand d-flex align-items-center justify-content-center"
          href="<?php echo site_url('Admin'); ?>">
          <div class="sidebar-brand-icon rotate-n-15">
          </div>
          <div class="sidebar-brand-text mx-3">Pengelolaan Data Asesor</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('Admin'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Fitur Pengelolaan
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url('asesor_control/dataAsesor'); ?>">
            <i class="fa fa-users" aria-hidden="true"></i>
            <span>Data Asesor</span>
          </a>
        </li>


        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url('sertifikat'); ?>">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>Sertifikat Asesor</span>
          </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url('suratTugas/SuratTugas'); ?>">
            <i class="fa fa-envelope" aria-hidden="true"></i>
            <span>Surat Tugas</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url('jadwal/jadwal'); ?>">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>Jadwal Assesment</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link collapsed" href="<?php echo site_url('skema/skema'); ?>">
            <i class="fa fa-table" aria-hidden="true"></i>
            <span>Skema Asesor</span>
          </a>
        </li>


        <!-- Nav Item - Charts -->
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('Admin/portofolio') ?>">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Portofolio Asesor </span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('login/logoutAdmin'); ?>">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span>Log Out</span></a>
        </li>


        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>




      </ul>
      <!-- End of Sidebar -->