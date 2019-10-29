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
      <div class="container-fluid mt-1">
        <?php if($this->session->flashdata('success')){ ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <span class="alert-inner--icon"><i class="ni ni-check-bold"></i></span>
          <span class="alert-inner--text"><?php echo $this->session->flashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Tentang Kami</h3>
              <hr>
              <form action="<?php echo base_url('admin/Tentangkami/prosesedit/'.$tentangkami->id_tentang_kami) ?>"
                method="POST" <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <textarea type="text" class="form-control" name="tentang_kami" required="" style="height:300px;">
                      <?php echo $tentangkami->tentang_kami; ?>
                    </textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-info" style="width: 100%;">Perbarui</button>
                </div>
            </div>
            </form>
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
  </div>
  </div>

</body>
<?php $this->load->view('include/backend/backend_js.php'); ?>
<script>
CKEDITOR.replace('tentang_kami', {});
CKEDITOR.config.toolbar = [
  ['Styles', 'Format', 'Font', 'FontSize'],
  '/',
  ['Bold', 'Italic', 'Underline', 'StrikeThrough', '-', 'Undo', 'Redo', '-', 'Cut', 'Copy', 'Paste', 'Find',
    'Replace', '-', 'Outdent', 'Indent', '-', 'Print'
  ],
  '/',
  ['NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
  ['Image', 'Table', '-', 'Link', 'Flash', 'Smiley', 'TextColor', 'BGColor', 'Source']
];
</script>

</html>