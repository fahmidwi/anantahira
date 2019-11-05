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
              <h1 class="text-white">Registrasi untuk anggota anantahira!</h1>
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
                <small>Daftar akun anggota anantahira disini</small>
              </div>
              <?php if ($this->session->flashdata('Gagal')) { ?>
              <div class="text-muted font-italic"><small><span
                    class="text-danger font-weight-700"><?php echo $this->session->flashdata('Gagal') ?></span></small><br><br>
              </div>
              <?php } ?>
              <form role="form" action="<?php echo base_url('register/prosesRegistrasi') ?>" method="POST">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <input class="form-control" name="nama_lengkap" required placeholder="Nama Lengkap" type="text">
                  </div>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" name="email" required onChange="cekEmail()" id="email"
                      placeholder="Email" type="email">
                  </div>
                </div>
                <div class="text-muted font-italic" id="emailused" style="display:none;"><small><span
                      class="text-danger font-weight-700">email sudah
                      digunakan</span></small><br><br>
                </div>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" name="username" required onChange="cekUsername()" placeholder="Username"
                      type="Username" id="username">
                  </div>
                </div>
                <div class="text-muted font-italic" id="usernameused" style="display:none;"><small><span
                      class="text-danger font-weight-700">username sudah
                      digunakan</span></small><br><br>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password" required id="password" onKeyup="cekPass()"
                      placeholder="Password" type="password">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required id="konfirpass" onKeyup="cekPass()"
                      placeholder="Konfirmasi Password " type="password">
                  </div>
                </div>
                <div class="text-muted font-italic" id="wrongpass" style="display:none;"><small><span
                      class="text-danger font-weight-700">password tidak
                      sesuai</span></small><br><br>
                </div>
                <div class="text-muted font-italic" id="passcorrect" style="display:none;"><small><span
                      class="text-success font-weight-700">password
                      sesuai</span></small><br><br>
                </div>
                <br>
                <div class="form-group">
                  <div class="g-recaptcha" data-sitekey="6LfQObwUAAAAAJwTadQ2w4-ghfhntyB_ozrEKXM8" required></div>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" id="daftar">Daftar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
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
  const uri = '<?php echo base_url(); ?>';
  cekPass = () => {
    const pass = document.getElementById('password').value;
    const konfirpass = document.getElementById('konfirpass').value;

    if (pass == konfirpass) {
      document.getElementById('passcorrect').style.display = 'inline';
      document.getElementById('wrongpass').style.display = 'none';
      document.getElementById('daftar').disabled = false;
    } else {
      document.getElementById('daftar').disabled = true;
      document.getElementById('passcorrect').style.display = 'none';
      document.getElementById('wrongpass').style.display = 'inline';
    }

  }

  cekUsername = () => {
    const username = document.getElementById('username').value;
    getUsername(username);
  }

  getUsername = (username) => {
    $.ajax({
      type: 'GET',
      url: uri + 'admin/login/cekusername/' + username,
      dataType: 'JSON',
      beforeSend: () => {
        document.getElementById('usernameused').style.display = 'none';
        document.getElementById('daftar').disabled = false;
        document.getElementById('daftar').innerHTML = 'Cek username ...';
      },
      success: (res) => {
        document.getElementById('daftar').innerHTML = 'Daftar';

        if (res == 1) {
          document.getElementById('daftar').disabled = true;
          document.getElementById('usernameused').style.display = 'inline';
        } else {
          document.getElementById('daftar').disabled = false;
        }
      }
    })
  }

  cekEmail = () => {
    const email = document.getElementById('email').value;
    const split = email.split('@');
    uriemail = split[0] + '-' + split[1];
    getEmail(uriemail);
  }

  getEmail = (email) => {
    $.ajax({
      type: 'GET',
      url: uri + 'admin/login/cekemail/' + email,
      dataType: 'JSON',
      beforeSend: () => {
        document.getElementById('emailused').style.display = 'none';
        document.getElementById('daftar').disabled = false;
        document.getElementById('daftar').innerHTML = 'Cek username ...';
      },
      success: (res) => {
        document.getElementById('daftar').innerHTML = 'Daftar';

        if (res == 1) {
          document.getElementById('daftar').disabled = true;
          document.getElementById('emailused').style.display = 'inline';
          console.log('used')
        } else {
          document.getElementById('daftar').disabled = false;
        }
      }
    })
  }
  </script>
</body>

</html>
<!--