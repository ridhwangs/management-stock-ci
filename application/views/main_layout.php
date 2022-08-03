<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>PT. Suryaputra Sarana</title>


    

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/js/all.min.js" integrity="sha512-8pHNiqTlsrRjVD4A/3va++W1sMbUHwWxxRPWNyVlql3T+Hgfd81Qc6FC5WMXDC+tSauxxzp1tgiAvSKFu1qIlA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

     <script src="//code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
  
    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/dashboard.css') ?>" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">PT. SURYAPUTRA SARANA</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <form method="GET" action="<?= site_url('stock/cari'); ?>" class="w-100">
    <input class="form-control form-control-dark w-100" name="cari" type="text" placeholder="Search" aria-label="Search">
  </form>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="<?= site_url('login/doLogout') ?>">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= site_url('welcome'); ?>">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <?php if($this->session->is_marketing == FALSE): ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('pembelian'); ?>">
              <span data-feather="shopping-cart"></span>
              Pembelian
            </a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('stock'); ?>">
              <span data-feather="file"></span>
              Stok Kendaraan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('penjualan'); ?>">
              <span data-feather="shopping-cart"></span>
              Penjualan
            </a>
          </li>
        </ul>
        <?php if($this->session->is_marketing == FALSE): ?>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Master Data</span>
          <a class="link-secondary" aria-label="Master">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('master/tipe'); ?>">
              <span data-feather="file-text"></span>
              Master Tipe
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= site_url('master/warna'); ?>">
              <span data-feather="file-text"></span>
              Master Warna
            </a>
          </li>
        </ul>
        <?php endif; ?>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php if($this->session->is_marketing == FALSE): ?>
      <?php $this->load->view('page/' . $page); ?>
      <?php else: ?>
      <?php $this->load->view('marketing/' . $page); ?>
      <?php endif; ?>
    </main>
  </div>
</div>


      <script src="//cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    
      <script src="<?= base_url('assets/dashboard.js') ?>"></script>
  </body>
</html>
