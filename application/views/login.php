<?php
  if (!empty($_SESSION['user'])) {
    redirect('home/menu');
  }
  else{
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="<?=base_url('assets/images/').$general->logo?>" type="image/x-icon">
  <title><?=$general->nama?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?=base_url('assets/')?>plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img src="<?=base_url('assets/images/').$general->logo?>" alt="Logo" style="width:150px;height:150px" class="img-circle">
      <a href="#"><b><?=$general->nama?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Silahkan Masuk untuk memulai</p>
      <?=form_open('home/login')?>
        <div class="form-group has-feedback">
          <?php
            echo form_input(array(
              'id'=>'login-username',
              'name'=>'uname',
              'class'=>'form-control',
              'placeholder'=>'Masukan Username anda',
              'required'=>'enable'
            ));
          ?>
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <?php
            echo form_password(array(
              'id'=>'login-password',
              'name'=>'pword',
              'class'=>'form-control',
              'placeholder'=>'Masukan Kata sandi anda',
              'required'=>'enable'
            ));
          ?>
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <?php
          echo form_submit(array(
            'id'=>'login',
            'name'=>'login',
            'class'=>'btn btn-primary btn-block btn-flat',
            'value'=>'Login',
          ));
        ?>
      <?=form_close()?>
    </div>
      <!-- /.login-box-body -->
  </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?=base_url('assets/')?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?=base_url('assets/')?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?=base_url('assets/')?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' /* optional */
        });
      });
    </script>
  </body>
</html>
<?php
  }
?>
