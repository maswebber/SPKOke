<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->general->nama ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" href="<?=base_url('assets/images/').$this->general->logo ?>" type="image/x-icon">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/skins/_all-skins.min.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/morris.js/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script type="text/javascript">
        var baseurl = '<?= base_url() ?>';
    </script>
    <script type="text/css">
        @media print {
            body * {
                visibility: hidden;
            }

            #printpa,
            #printpa * {
                visibility: visible;
            }

            #printpa {
                width: 21cm;
                height: 29.7cm;
                margin: 30mm 45mm 30mm 45mm;
            }

            .borderless tr td {
                border: none !important;
                padding: 0px !important;
            }
        }
    </script>
    <!-- <script type="text/javascript" src="assets/js/up.js"></script> -->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url() ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b><?= $this->general->nama ?></b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b><?= $this->general->nama ?></b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img src="<?= base_url("assets/images/".$this->session->foto) ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $this->session->user ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <a href="<?= base_url('home/logout') ?>">Sign out</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar" style="height:auto">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url('assets/images/').$this->session->foto?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->session->user ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree" id="listmenu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php
                                  if ($_SESSION['role'] == 'OPERATOR') {
                                    echo base_url('User/menu');
                                  } else {
                                    echo base_url('Admin/menu');
                                  }
                                  ?>" id="utama">
                            <i class="fa fa-dashboard"></i> <span>Home</span>
                        </a>
                    </li>
                    <?php
                    if ($_SESSION['role'] != 'PIMPINAN') {
                      ?>
                    <li>
                        <a href="<?= base_url('Periode') ?>" id="periode">
                            <i class="fa fa-files-o"></i>
                            <span>Periode</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Kriteria') ?>" id="kriteria">
                            <i class="fa fa-th"></i> <span>Data Kriteria</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Alternatif') ?>" id="alternatif">
                            <i class="fa fa-pie-chart"></i>
                            <span>Data Alternatif</span>
                        </a>
                    </li>
                    <?php

                  }
                  if ($_SESSION['role'] != 'OPERATOR') {
                    ?>
                    <li>
                        <a href="<?= base_url('Admin/Hasil') ?>" id="seleksi">
                            <i class="fa fa-laptop"></i>
                            <span>Perhitungan</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('Admin/Hasilhitung') ?>">
                            <i class="fa fa-edit"></i> <span>Hasil Ranking</span>
                        </a>
                    </li>
                    <?php

                  }

                  if ($_SESSION['role'] == "ADMIN") {
                    ?>
                    <li>
                        <a href="<?= base_url('users') ?>">
                            <i class="fa fa-users"></i> <span>Pengaturan User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('setting') ?>">
                            <i class="fa fa-cog"></i> <span>Pengaturan Sistem</span>
                        </a>
                    </li>
                    <?php

                  }
                  ?>

                    <li>
                        <a href="<?php
                                  if ($_SESSION['role'] == 'OPERATOR') {
                                    echo base_url('User/ubahpwd');
                                  } else {
                                    echo base_url('Admin/ubahpwd');
                                  }
                                  ?>" id="cpass">
                            <i class="fa fa-key"></i> <span>Ubah Password</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= base_url('home/logout') ?>">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"> 