<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>LOGIN</title>


    

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/signin.css') ?>" rel="stylesheet">
  </head>
  <body class="text-center">
    <div class="container">
      <div class="col-md-12">
        <img src="<?= base_url("assets/logo-sps.png"); ?>"></img>
      <h1 class="h3 mb-3 fw-normal">Sistem Informasi Manajemen Pemantauan dan Pengadaan Stok Kendaraan</h1>
       
      </div>
      <div class="col-md-12"></div>
      <main class="form-signin">
    <form method="POST" action="<?= site_url('login/doLogin'); ?>">
        <?php 
            if($this->input->get('message')){
        ?>
            <div class="alert alert-success" role="alert">
            <?= $this->input->get('message'); ?>
            </div>
        <?php
            }
        ?>
        <div class="form-floating">
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">&copy; MU'ARIF FATHUL ANAM</p>
    </form>
    </main>
    </div>
  
  </body>
</html>
