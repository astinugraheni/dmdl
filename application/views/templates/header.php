<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
  <meta name="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Dreamdelion Database System">
  <meta name="keywords" content="Dreamdelion">
  <meta name="author" content="Asti Nugraheni">
  <meta name="robots" content="NOINDEX, NOFOLLOW">

  <title>Dreamdelion</title>


  <link rel="shortcut icon" href="<?php echo base_url('assets/img/icon.jpg')?>">


  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.min.css'); ?>">


  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">


  <link rel="stylesheet" href="<?php echo base_url('plugins/iCheck/flat/_all.css') ;?>">  
  <link rel="stylesheet" href="<?php echo base_url('plugins/datatables/dataTables.bootstrap.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ;?>">
  <link rel="stylesheet" href="<?php echo base_url('plugins/select2/select2.min.css') ;?>">

  <!--Select2 -->
  <link  rel="stylesheet" href="<?php echo base_url('assets/css/select2.min.css') ;?>">

<!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ;?>"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

  <header class="main-header">

      <a href="<?php echo base_url();?>" class="logo">
        <span class="logo-mini"><b>Dreamdelion</b></span>
        <span class="logo-lg"><b>Dream</b>delion</span>
      </a>

      <nav class="navbar bavbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle Navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url('assets/img/icon.jpg') ;?>" alt="User Image" class="user-image" />
                <span class="hidden-xs"><?php echo $this->session->userdata('logged_in')['name'] ;?></span>
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li class="user-header">
                  <img src="<?php echo base_url('assets/img/icon.jpg') ;?>" alt="User Image" class="img-circle" />
                  <p>
                    <?php echo $this->session->userdata('logged_in')['name'] ;?>
                    <small><?php echo $this->session->userdata('logged_in')['user_role'] ;?></small>
                  </p>
                </li>
                <li class="user-footer">
                 <!--  <div class="pull-left"><a href="<?php echo base_url('/user/profile/'.$this->session->userdata('logged_in')['id_user']) ;?>" class="btn btn-default btn-flat">Profile</a></div> -->
                  <div class="pull-right"><a href="<?php echo base_url('/user_authentication/logout');?>" class="btn btn-default btn-flat">Log Out</a></div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img id="sidebar-avatar" src="<?php echo base_url('assets/img/icon.jpg') ;?>" alt="User Image" class="img-circle" />
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('logged_in')['name']?></p>
          <a href="#"><?php echo $this->session->userdata('logged_in')['user_role'] ;?></a>
        </div>
      </div>

      <form action="" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" id="search" class="form-control" placeholder="Search..."/>
          <span class="input-group-btn">
            <button type="submit" id="search-btn" class="btn btn-flat">
              <i class="fa fa-search"></i>
            </button>
          </span>
        </div>
      </form>

      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">NAVIGATION</li>
        <?php
          $this->load->view('templates/sidebar-component') ;
        ?>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content">