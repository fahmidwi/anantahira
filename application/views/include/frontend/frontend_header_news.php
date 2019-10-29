<header class="header-area">

  <!-- Top Header Area -->
  <div class="top-header-area" style="background-color: ">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="top-header-content d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="logo">
              <a href="<?php echo base_url(); ?>"><img
                  src="<?php echo base_url('assets/img/websiteresmianantahira.png'); ?>" style="width:50%"></a>
            </div>

            <!-- Login Search Area -->
            <div class="login-search-area d-flex align-items-center">
              <!-- Search Form -->
              <div class="search-form">
                <form action="<?php echo base_url('news/onsearch') ?>" method="GET">
                  <?php 
                    $value = ($this->uri->segment(2) == 'search') ? urldecode($this->uri->segment(3)) : '';
                  ?>
                  <input type="text" name="keyword" class="form-control" id="search" placeholder="Search on title news"
                    value="<?php echo $value; ?>" pattern="[a-zA-Z0-9\s]+" required>
                  <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar Area -->
  <div class="newspaper-main-menu" id="stickyMenu">
    <div class="classy-nav-container breakpoint-off">
      <div class="container">
        <!-- Menu -->
        <nav class="classy-navbar justify-content-between" id="newspaperNav">

          <!-- Logo -->
          <div class="logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url('assets/img/core-img/logo.png') ?>"
                alt=""></a>
          </div>

          <!-- Navbar Toggler -->
          <div class="classy-navbar-toggler">
            <span class="navbarToggler"><span></span><span></span><span></span></span>
          </div>

          <!-- Menu -->
          <div class="classy-menu">

            <!-- close btn -->
            <div class="classycloseIcon">
              <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
            </div>

            <!-- Nav Start -->
            <div class="classynav">
              <ul>
                <li><a href="<?php echo base_url('home') ?>">Home</a></li>
                <?php 
                  $activedhome = ($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index') ? 'class="active"' : null ; 
                ?>
                <li <?php echo $activedhome ?>><a href="<?php echo base_url('news') ?>">All News</a></li>
                <?php 
                  $activednasional = ($this->uri->segment(2) == 'nasional') ? 'class="active"' : null ; 
                ?>
                <li <?php echo $activednasional ?>><a href="<?php echo base_url('news/nasional') ?>">Nasional</a></li>
                <?php 
                  $activedinternasi = ($this->uri->segment(2) == 'internasional') ? 'class="active"' : null ; 
                ?>
                <li <?php echo $activedinternasi ?>><a
                    href="<?php echo base_url('news/internasional') ?>">Internasional</a></li>
                <?php 
                  foreach ($data_cat as $res ) {
                  $uricat = $this->uri->segment(3);
                  $nama_kategori = str_replace(' ', '-', strtolower($res->nama_kategori));
                  $activedcat = ($uricat == $nama_kategori) ? 'class="active"' : null ; 
                ?>
                <li <?php echo $activedcat ?>><a
                    href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>"><?php echo $res->nama_kategori; ?></a>
                </li>
                <?php } ?>
                <?php if ($jum_data_cat > 7) { ?>
                <?php 
                  $activedmore = ($this->uri->segment(2) == 'morecategories') ? 'class="active"' : null ; 
                ?>
                <li <?php echo $activedmore ?>><a href="<?php echo base_url('news/morecategories') ?>">More
                    Categories</a>
                </li>
                <?php } ?>
              </ul>
            </div>
            <!-- Nav End -->
          </div>
        </nav>
      </div>
    </div>
  </div>
</header>