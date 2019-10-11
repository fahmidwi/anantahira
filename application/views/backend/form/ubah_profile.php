<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/backend/backend_head.php'); ?>

<body class="">
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Brand -->
        <b style="color: #fff;">UBAH PROFILE PENGGUNA</b>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder"
                    src="<?php echo base_url('assets/backend/img/theme/team-4-800x800.jpg') ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold">Jessica Jones</span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
      style="min-height: 600px; background-image: url(/assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      <div class="container-fluid d-flex align-items-center">
        <div class="row">
          <div class="col-lg-7 col-md-10">
            <h1 class="display-2 text-white">Hello Dion</h1>
            <p class="text-white mt-0 mb-5">ini adalah halaman untuk mengubah profil Anda. Harap lengkapi data sesuai
              form yang ada</p>
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
                    <img src="<?php echo base_url('assets/backend/img/theme/team-4-800x800.jpg') ?>"
                      class="rounded-circle">
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
                  <i class="ni location_pin mr-2"></i>Alamat dia
                </div>
                <div class="h5 mt-4">
                  <i class="ni business_briefcase-24 mr-2"></i>Ini Jabatan - Ini Fungsi
                </div>
                <div>
                  <i class="ni education_hat mr-2"></i>Penempatan tugas
                </div>
                <hr class="my-4" />
                <p>Namanya adalah Nur Fitriani, dia lahir di Malang, 19 Oktober 2000. Dia adalah anak kedua dari dua
                  bersaudara. Kakaknya seorang perempuan bernama Hilman Marawi, seorang penyanyi nasyid terkenal di
                  daerah Jawa Timur. Kedua orang tuanya berprofesi sebagai guru dan telah mengabdi dalam bidang
                  pendidikan sejak mereka masih remaja</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">

          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Akun Saya</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                <h6 class="heading-small text-muted mb-4">Informasi User</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative"
                          placeholder="Username" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Alamat Email</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative"
                          placeholder="jesse@example.com">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          placeholder="First name" value="Lucky">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Nomor HP</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative"
                          placeholder="Last name" value="Jesse">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-address">Alamat</label>
                        <input id="input-address" class="form-control form-control-alternative"
                          placeholder="Alamat Lengkap Anda" type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Foto</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Foto Probadi</label>
                        <input type="file" id="input-username" class="form-control form-control-alternative">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Foto Keluarga</label>
                        <input type="file" id="input-email" class="form-control form-control-alternative">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Penugasan</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Provinsi</label>
                        <select class="form-control form-control-alternative">
                          <option>asd</option>
                          <option>asd</option>
                          <option>asd</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Kota/kab</label>
                        <select class="form-control form-control-alternative">
                          <option>asd</option>
                          <option>asd</option>
                          <option>asd</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Jabatan</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          placeholder="Jabatan Anda" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Fungsi</label>
                        <select class="form-control form-control-alternative">
                          <option>Reskrim</option>
                          <option>Lantas</option>
                          <option>asd</option>
                        </select>
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
                        <input type="text" id="input-username" class="form-control form-control-alternative"
                          placeholder="Instagram Anda" value="lucky.jesse">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Facebook</label>
                        <input type="text" id="input-email" class="form-control form-control-alternative"
                          placeholder="Facebook Anda">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Twitter</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"
                          placeholder="Twitter Anda" value="Lucky">
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <h6 class="heading-small text-muted mb-4">Biografi</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Biografi Anda</label>
                        <textarea type="text" id="input-username" class="form-control form-control-alternative"
                          placeholder="Biografi Anda" value=""></textarea>
                      </div>
                    </div>
                  </div>
                </div>

                <center><button class="btn btn-default" style="width: 100%;">Simpan</button></center>
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
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative
                Tim</a>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <?php $this->load->view('include/backend/backend_js.php'); ?>
</body>

</html>