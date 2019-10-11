<!DOCTYPE html>
<html lang="en">
    <?php $this->load->view('include/backend/backend_head.php'); ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.4.0/classic/ckeditor.js"></script>
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
              <h3 class="mb-0">Tambah Data Kategori Berita</h3><br><br>
            <form>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Judul Berita</label>
                    <input type="text" class="form-control" name="judul_berita" required="" placeholder="Masukan Judul Berita">
                  </div>
                  <div class="form-group">
                    <label>Caption Singkat</label>
                    <textarea type="text" class="form-control" name="caption_singkat" required="" placeholder="Masukan Caption Singkat"></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Pilih Kategori Berita</label>
                    <select class="form-control" name="kategori_berita">
                      <option>Pilih Kategori</option>
                      <option>Healty</option>
                      <option>Sport</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Gambar</label>
                    <input type="file" class="form-control" name="gambar" required="">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  
                  <div class="form-group">
                    <label>Caption Lengkap</label>
                    <textarea  class="form-control" name="caption_lengkap" id="editor" style="overflow-y: 300px;"></textarea>
                    
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
    <script>
                            ClassicEditor
                                    .create( document.querySelector( '#editor' ) )
                                    .then( editor => {
                                            console.log( editor );
                                    } )
                                    .catch( error => {
                                            console.error( error );
                                    } );
                    </script>
</html>