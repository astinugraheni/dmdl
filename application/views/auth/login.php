<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Project Child Indonesia Management Volunteer Dashboard">
  <meta name="keywords" content="Project Child, PCI, staff, Volunteer">
  <meta name="author" content="Asti Nugraheni">
  <meta name="robots" content="NOINDEX, NOFOLLOW">

  <title>Login - Dreamdelion</title>

  <!-- Icon -->
  <link rel="shortcut icon" href="<?php echo base_url().'assets/img/icon.jpg'?>">

  <!-- Style goes here -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-blue.min.css'); ?>">

  <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">

  <!-- Self made CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css')?>">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

</head>
<body class="hold-transition">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?php echo base_url() ;?>"><b>Dreamdelion System</b></a>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h3><b>LOGIN</b></h3>
      </div>
      <div class="panel-body">
        <div class="login-box-body">
          <p class="login-box-msg">
            Enter Email and Password
          </p>
          <form action="<?php echo base_url() ?>user_authentication/user_login_process" method="post">
          <?php if($this->session->flashdata('auth')){ ?>
            <div class="alert alert-danger alert-dismissible">
              <p><?php echo $this->session->flashdata('auth') ;?></p>
            </div>
          <?php } ?>
            <div class="form-group has-feedback">
              <input type="email" name="email" class="form-control" placeholder="Email" required />
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
              <input type="password" name="password" class="form-control" placeholder="Password" required />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="form-group text-center">
              <input type="submit" class="btn btn-default btn-default-login" value="Login"/>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  

  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js') ;?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/app.js') ;?>"></script>
</body>
</html>