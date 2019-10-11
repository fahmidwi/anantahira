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
          <?php if ($this->session->userdata('level_akses') == 'anggota' && $this->session->userdata('kd_anggota') == 'false') { ?>
            <div class="row">
              <div class="col-xl-8 mb-5 mb-xl-0">
                <h1 class="text-white">
                  Selamat datang <?php echo ucwords($this->session->userdata('nama')); ?> ,
                  <?php if($this->session->userdata('kd_anggota') == 'false'){
                    echo 'Silahkan lengkapi data keanggotaan anda';
                  } ?>
                </h1>
              </div>
            </div>
          <?php } else if($this->session->userdata('level_akses') == 'admin' && $this->session->userdata('kd_anggota') == 'false' && !$this->input->get('user')) {
            $this->load->view('backend/dashadmin');
          }else if($this->input->get('user')){ ?>
            <div class="row">
              <div class="col-xl-8 mb-5 mb-xl-0">
                <h1 class="text-white">
                  Profile dari <?php echo ucwords($nama_lengkap); ?>
                </h1>
              </div>
            </div>
          <?php }else if ($this->input->get('edit')) { ?>
            <div class="row">
              <div class="col-xl-8 mb-5 mb-xl-0">
                <h1 class="text-white">
                Hai <?php echo ucwords($nama_lengkap); ?>, ubah profile mu 
                </h1>
              </div>
            </div>
          <?php } ?>
          <?php if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="ni ni-check-bold"></i></span>
              <span class="alert-inner--text"><strong>Selesai!</strong> Data Anda Berhasil Di Input!</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
          <?php if($this->session->flashdata('success_edit')){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <span class="alert-inner--icon"><i class="ni ni-check-bold"></i></span>
              <span class="alert-inner--text"><strong>Selesai!</strong> Data Anda Berhasil Di Ubah!</span>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <?php
          $edit = $this->input->get('edit');
          if ($this->session->userdata('level_akses') == 'anggota' || ($this->session->userdata('level_akses') == 'admin' && $this->input->get('user'))) {
            if ($this->session->userdata('level_akses') == 'anggota' && $this->session->userdata('kd_anggota') == 'false') {
              $this->load->view('backend/profileform.php');
            }else if($edit == 'true'){
              $this->load->view('backend/profileform.php');
            }else{
              $this->load->view('backend/profileanggota.php');
            }
          }
        ?>
    </div>
  </div>

</body>
<?php $this->load->view('include/backend/backend_js.php'); ?>

</html>