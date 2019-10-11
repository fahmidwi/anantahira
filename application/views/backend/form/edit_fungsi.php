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
              <h3 class="mb-0">Ubah Data Fungsi</h3><br><br>
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Fungsi Tugas</label>
                    <input type="text" class="form-control" name="fungsi_kerja" required="" placeholder="Masukan Fungsi Tugas">
                  </div>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-info" style="width: 100%;">Simpan</button>
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
  </div>

</body>
    <?php $this->load->view('include/backend/backend_js.php'); ?>
</html>