<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/backend/backend_head.php'); ?>

<body class="bg-default">
  <div class="main-content">
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Selamat Datang di dashboard Anantahira silahkan login!</h1>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
          xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Login Disini</small>
              </div>
              <form role="form" action="<?php echo base_url('admin/Login/actLogin') ?>" method="POST">
                <?php if ($this->session->flashdata('pesan')) { ?>
                <div class="text-muted font-italic"><small><span
                      class="text-danger font-weight-700"><?php echo $this->session->flashdata('pesan'); ?></span></small>
                </div><br>
                <?php }?>
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" type="text" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Login</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="py-5">
      <div class="container">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-12">
            <div class="copyright text-center text-xl-left text-muted">
              <center>© 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank"></a>
              </center>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!--   Core   -->
  <script src="<?php echo base_url('lib/backend/js/plugins/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('lib/backend/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?php echo base_url('lib/backend/js/argon-dashboard.min.js?v=1.1.0') ?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
  window.TrackJS &&
    TrackJS.install({
      token: "ee6fab19c5a04ac1a32a645abde4613a",
      application: "argon-dashboard-free"
    });
  </script>
</body>

</html>