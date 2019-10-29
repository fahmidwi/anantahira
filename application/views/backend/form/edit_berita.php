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
              <h3 class="mb-0">Tambah Data Berita</h3><br><br>
              <form action="<?php echo base_url('admin/berita/prosesedit/'.$berita->id_berita) ?>" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
                  value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Judul Berita</label>
                      <input type="text" class="form-control" name="judul_berita"
                        value="<?php echo $berita->headnews; ?>" required="" placeholder="Masukan Judul Berita">
                    </div>
                    <div class="form-group">
                      <label>Caption Singkat</label>
                      <textarea type="text" class="form-control" name="caption_singkat" required=""
                        placeholder="Masukan Caption Singkat"
                        style="height:200px;"><?php echo $berita->caption_singkat; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Pilih Kategori Berita</label>
                      <select class="form-control" name="kategori_berita">
                        <?php foreach ($kategori as $res ) {?>
                        <?php if ($berita->id_kategori == $res->id_kategori) { ?>
                        <option value="<?php echo $res->id_kategori; ?>" selected><?php echo $res->nama_kategori; ?>
                        </option>
                        <?php }else{ ?>
                        <option value="<?php echo $res->id_kategori; ?>"><?php echo $res->nama_kategori; ?></option>
                        <?php } ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <img src="<?php echo base_url('assets/img/berita/'.$berita->gambar_berita) ?>" width="200"
                        height="100" /><br><br>
                      <label>Gambar</label>
                      <input type="file" class="form-control" name="gambar">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">

                    <div class="form-group">
                      <label>isi berita</label>
                      <textarea class="form-control" name="isi_berita" id="editor" style="overflow-y: 300px;">
                        <?php echo $berita->isi_berita; ?>
                      </textarea>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sumber berita</label>
                      <input type="text" class="form-control" name="sumber" placeholder="Masukan sumber berita"
                        value="<?php echo $berita->sumber; ?>">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>jenis berita</label>
                      <select class="form-control" name="jenis_berita">
                        <option value="nasional">Nasional</option>
                        <option value="internasional">Internasional</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-info" style="width: 100%;">Perbarui</button>
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
              &copy; 2019
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  </div>

</body>
<?php $this->load->view('include/backend/backend_js.php'); ?>
<script src="<?php echo base_url()?>assets/ckeditor/ckeditor.js"></script>

<script language="javascript">
	CKEDITOR.replace( 'isi_berita', {
	filebrowserBrowseUrl : '<?php echo base_url()?>assets/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl : '<?php echo base_url()?>assets/ckfinder/ckfinder.html?type=Images',
	filebrowserFlashBrowseUrl : '<?php echo base_url()?>assets/ckfinder/ckfinder.html?type=Flash',
	filebrowserUploadUrl : '<?php echo base_url()?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl : '<?php echo base_url()?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	filebrowserFlashUploadUrl : '<?php echo base_url()?>assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	filebrowserWindowWidth : '700',
	filebrowserWindowHeight : '400'});
</script>

</html>