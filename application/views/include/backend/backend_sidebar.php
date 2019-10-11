  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
        aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="home">
        <img src="<?php echo base_url('assets/img/logo.png') ?>" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder"
                  src="<?php echo base_url('assets/backend/img/'.$this->session->userdata('foto')) ?>">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <!-- <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a> -->
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="<?php echo base_url('assets/backend/img/brand/blue.png') ?>">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search"
              aria-label="Search">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <span class="fa fa-search"></span>
              </div>
            </div>
          </div>
        </form>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item  class=" active" ">
          <a class=" nav-link active " href=" <?php echo base_url('admin/home/') ?>"> <i
              class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <?php if ($this->session->userdata('kd_anggota') == 'true' || $this->session->userdata('level_akses') == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('admin/Keanggotaan') ?>">
              <i class="ni ni-single-02"></i> Keanggotaan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('admin/berita') ?>">
              <i class="ni ni-archive-2"></i> Berita
            </a>
          </li>
          <?php } ?>
          <?php if ($this->session->userdata('level_akses') == 'admin') { ?>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('admin/KategoriBerita') ?>">
              <i class="ni ni-tag"></i> Kategori Berita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('admin/fungsi') ?>">
              <i class="ni ni-settings"></i> Fungsi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="<?php echo base_url('admin/DataAdmin') ?>">
              <i class="ni ni-circle-08"></i> Admin
            </a>
          </li>
        </ul>
        <?php } ?>
        <!-- Divider -->
        <hr class="my-3">
        <ul class="navbar-nav mb-md-3">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/login/logout') ?>">
              <i></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>