<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/backend/backend_head.php'); ?>

<body class="">
  <?php $this->load->view('include/backend/backend_sidebar.php'); ?>
  <div class="main-content">
    <!-- Navbar -->
    <?php $this->load->view('include/backend/backend_header.php'); ?>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-8 mb-5 mb-xl-0">
              <h1 class="text-white">
                Ubah password
              </h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
          <?php if($this->session->flashdata('success_edit')){ ?>
          <div class="alert alert-success" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-user-run"></i></span>
            <span class="alert-inner--text"><strong>Info!</strong> password berhasil di ubah!</span>
          </div>
          <?php } ?>
          <?php if($this->session->flashdata('gagal')){ ?>
          <div class="alert alert-danger" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-user-run"></i></span>
            <span class="alert-inner--text"><strong>Info!</strong> password gagal di ubah!</span>
          </div>
          <?php } ?>
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Ubah password</h3>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?php echo base_url('admin/home/updatepass/'.$this->session->userdata('id_admin')) ?>" method="POST">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <h6 class="heading-small text-muted mb-4">password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password Lama</label>
                        <input type="password" id="input-password" name="oldpass" required
                          class="form-control form-control-alternative" placeholder="Masukan password baru"
                          value=""><br>
                        <p id="wrongoldpass" style="color:red;display:none;"><i>Password lama tidak sesuai</i></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-password">Password Baru</label>
                        <input type="password" id="input-password" name="newpass" required onchange="cekpass()"
                          class="form-control form-control-alternative" placeholder="Masukan password baru" value="">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Konfirmasi password</label>
                        <input type="password" id="input-email" name="konfirpass" required onchange="cekpass()"
                          placeholder="Konfirmasi password" class="form-control form-control-alternative"><br>
                        <p id="wrongconfirm" style="color:red;display:none;"><i>Password tidak cocok</i></p>
                      </div>
                    </div>
                  </div>
                  <center><button type="submit" class="btn btn-default" id="btn" style="width: 100%;">Simpan</button>
                </div>
                </center>
              </form>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2019
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>

</body>
<?php $this->load->view('include/backend/backend_js.php'); ?>

</html>
<script>
function cekpass() {
  const newpass = $('input[name=newpass]').val();
  const konfirpass = $('input[name=konfirpass]').val();
  if (newpass == konfirpass) {
    $('#btn').prop('disabled', false);
    $('#wrongconfirm').hide()
  } else {
    $('#btn').prop('disabled', true);
    $('#wrongconfirm').show()
  }
}

$(document).ready(function() {

  const url = '<?php echo base_url(); ?>';

  $('input[name=oldpass]').on('change', function() {
    const pass = $(this).val();
    CekOldPass(pass);
  });

  CekOldPass = (pass) => {
    $.ajax({
      type: 'GET',
      url: url + 'admin/home/cekoldpass/' + pass,
      dataType: 'JSON',
      beforeSend: () => {
        $('#btn').prop('disabled', true);
      },
      success: (res) => {
        console.log(res);
        if (res == 1) {
          $('#btn').prop('disabled', false);
          $('#wrongoldpass').hide()
        } else {
          $('#wrongoldpass').show();
          $('#btn').prop('disabled', true);
        }
      }
    })
  }

});
</script>