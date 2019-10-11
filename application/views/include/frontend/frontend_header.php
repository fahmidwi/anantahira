<header class="header-area">

  <!-- Top Header Area -->
  <div class="top-header-area" style="background-color: ">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="top-header-content d-flex align-items-center justify-content-between">
            <!-- Logo -->
            <div class="logo">
              <a href="index.html"><img src="<?php echo base_url('assets/img/core-img/logo.png'); ?> " alt=""></a>
            </div>

            <!-- Login Search Area -->
            <div class="login-search-area d-flex align-items-center">
              <!-- Search Form -->
              <div class="search-form">
                <form action="<?php echo base_url('home/search') ?>" method="GET">
                  <input type="text" name="keyword" class="form-control" placeholder="Search on title news">
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
            <a href="index.html"><img src="<?php echo base_url('assets/img/core-img/logo.png') ?>" alt=""></a>
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
                <li class="active"><a href="<?php echo base_url('home') ?>">Home</a></li>
                <!-- <li><a href="<?php echo base_url('') ?>">Mega Menu</a>
                  <div class="megamenu">
                    <ul class="single-mega cn-col-4">
                      <li class="title">Catagories</li>
                      <li><a href="<?php echo base_url('') ?>">Home</a></li>
                      <li><a href="<?php echo base_url('') ?>atagories-">Catagories</a></li>
                      <li><a href="<?php echo base_url('') ?>ingle-">Single Articles</a></li>
                      <li><a href="<?php echo base_url('') ?>">About Us</a></li>
                      <li><a href="<?php echo base_url('') ?>">Contact</a></li>
                    </ul>
                    <ul class="single-mega cn-col-4">
                      <li class="title">Catagories</li>
                      <li><a href="<?php echo base_url('') ?>ndex.html">Home</a></li>
                      <li><a href="<?php echo base_url('') ?>atagories-post.html">Catagories</a></li>
                      <li><a href="<?php echo base_url('') ?>ingle-post.html">Single Articles</a></li>
                      <li><a href="<?php echo base_url('') ?>bout.html">About Us</a></li>
                      <li><a href="<?php echo base_url('') ?>ontact.html">Contact</a></li>
                    </ul>
                    <ul class="single-mega cn-col-4">
                      <li class="title">Catagories</li>
                      <li><a href="<?php echo base_url('') ?>ndex.html">Home</a></li>
                      <li><a href="<?php echo base_url('') ?>atagories-post.html">Catagories</a></li>
                      <li><a href="<?php echo base_url('') ?>ingle-post.html">Single Articles</a></li>
                      <li><a href="<?php echo base_url('') ?>bout.html">About Us</a></li>
                      <li><a href="<?php echo base_url('') ?>ontact.html">Contact</a></li>
                    </ul>
                    <div class="single-mega cn-col-4">
                      <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                          <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/img/bg-img/23.jpg') ?>" alt=""></a>
                        </div>
                        <div class="post-data">
                          <a href="<?php echo base_url('') ?>" class="post-catagory">Travel</a>
                          <div class="post-meta">
                            <a href="<?php echo base_url('') ?>" class="post-title">
                              <h6>Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                          </div>
                        </div>
                      </div>

                      <div class="single-blog-post small-featured-post d-flex">
                        <div class="post-thumb">
                          <a href="<?php echo base_url('') ?>"><img src="<?php echo base_url('assets/img/bg-img/24.jpg') ?>" alt=""></a>
                        </div>
                        <div class="post-data">
                          <a href="<?php echo base_url('') ?>" class="post-catagory">Politics</a>
                          <div class="post-meta">
                            <a href="<?php echo base_url('') ?>" class="post-title">
                              <h6>Augue semper congue sit amet ac sapien. Fusce consequat.</h6>
                            </a>
                            <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </li> -->
                <?php foreach ($data_cat as $res ) { ?>
                <li><a href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>"><?php echo $res->nama_kategori; ?></a></li>
                <?php } ?>
                <?php if ($jum_data_cat > 7) { ?>
                <li><a href="<?php echo base_url('home/morecategories') ?>">More Categories</a>
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