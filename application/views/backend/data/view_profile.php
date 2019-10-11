<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('include/backend/backend_head.php'); ?>
<body class="">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <b style="color: #fff;">PROFILE PENGGUNA</b>
        <!-- User -->

        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item ">
            <a class="nav-link pr-0" href="#" role="button"  aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  ">Kembali ke halaman dashboard</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Selamat Datang</h1>
            <p class="text-white mt-0 mb-5">ini adalah halaman profil Dion. Anda dapat melihat data diri Dion</p>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
          <div class="card card-profile shadow">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="<?php echo base_url('assets/backend/img/theme/team-4-800x800.jpg') ?>" class="rounded-circle">
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body pt-0 pt-md-4">
              <br><br><br><br><br>
              <div class="text-center">
                <h3>
                  Jessica Jones<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                  <i class="ni location_pin mr-2"></i>Gg Liwet 103
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>BOS - FUNGSI SANGAT PENTING
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>PAPUA BARAT
                </div>
                <hr class="my-4" />
                <p>Namanya adalah Nur Fitriani, dia lahir di Malang, 19 Oktober 2000. Dia adalah anak kedua dari dua bersaudara. Kakaknya seorang perempuan bernama Hilman Marawi, seorang penyanyi nasyid terkenal di daerah Jawa Timur. Kedua orang tuanya berprofesi sebagai guru dan telah mengabdi dalam bidang pendidikan sejak mereka masih remaja</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Akun Pengguna</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Foto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Foto Probadi</label>
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="<?php echo base_url('assets/backend/img/theme/team-1-800x800.jpg') ?>" alt="Card image cap">
                          <div class="card-body">
                            <a href="#" class="btn btn-primary">Lihat</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Foto Keluarga</label>
                        <div class="card" style="width: 18rem;">
                          <img class="card-img-top" src="<?php echo base_url('assets/backend/img/theme/team-1-800x800.jpg') ?>" alt="Card image cap">
                          <div class="card-body">
                            <a href="#" class="btn btn-primary">Lihat</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Sosmed</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Instagram</label>
                        <input readonly type="text"  id="input-username" class="form-control form-control-alternative" placeholder="Instagram Anda" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Facebook</label>
                        <input readonly type="text"  id="input-email" class="form-control form-control-alternative" placeholder="Facebook Anda">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Twitter</label>
                        <input readonly type="text"  id="input-first-name" class="form-control form-control-alternative" placeholder="Twitter Anda" value="Lucky">
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
    <?php $this->load->view('include/backend/backend_js.php'); ?>
</body>

</html>