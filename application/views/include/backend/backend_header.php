<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
  <div class="container-fluid">
    <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index.html">Dashboard</a>
    <ul class="navbar-nav align-items-center d-none d-md-flex">
      <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder"
                src="<?php echo base_url('assets/backend/img/'.$this->session->userdata('foto')) ?>">
            </span>
            <div class="media-body ml-2 d-none d-lg-block">
              <span
                class="mb-0 text-sm  font-weight-bold"><?php echo ucwords($this->session->userdata('nama')); ?></span>
            </div>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url('admin/home/changepassword') ?>" class="dropdown-item">
            <i class="ni ni-key-25"></i>
            <span>Ganti password</span>
          </a>
          <a href="<?php echo base_url('admin/login/logout') ?>" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    </ul>
  </div>
</nav>