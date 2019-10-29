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

    </div>
    <div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="card-header border-0">
              <h3 class="mb-0">Edit Data Gallery</h3><br><br>
              <form action="<?php echo base_url('admin/gallery/prosesedit/'.$gallery->id_gallery) ?>" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <img src="<?php echo base_url('assets/img/gallery/'.$gallery->gambar_gallery) ?>" width="200"
                        height="100" /><br><br>
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="gallery" required="">
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="submit" class="btn btn-info" style="width: 100%;">Simpan</button>
                </div>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Footer -->
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
CKEDITOR.replace('isi_berita', {
  filebrowserUploadUrl: 'upload'
});
</script>

</html>