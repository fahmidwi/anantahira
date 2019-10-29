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
              <a href="<?php echo base_url('admin/gallery/tambah') ?>" class="btn btn-info"
                style="right:0;position:absolute;">Tambah</a>
              <h3 class="mb-4"> Data Gallery </h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">gambar</th>
                    <th scope="col">upload by</th>
                    <th scope="col">tanggal upload</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = ($this->uri->segment(4)) ? $this->uri->segment(4) + 1 : 1;
                    foreach ($gallery as $res) { ?>
                  <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><img src="<?php echo base_url('assets/img/gallery/'.$res->gambar_gallery) ?>" width="100"
                        height="80" /></td>
                    <td scope="row">
                      <a href="<?php echo base_url('admin/home?user='.$res->username) ?>">
                        <?php echo $res->nama_lengkap; ?>
                      </a>
                    </td>
                    <td scope="row"><?php echo changeDate($res->upload_date); ?></td>
                    <?php if ($this->session->userdata('id_admin') == $res->id_admin || $this->session->userdata('level_akses') == 'admin') { ?>
                    <td>
                      <a href="<?php echo base_url('admin/gallery/edit/'.$res->id_gallery) ?>"><span
                          class="badge badge-default">Edit</span></a>
                      <a href="<?php echo base_url('admin/gallery/hapus/'.$res->id_gallery) ?>"><span
                          class="badge badge-danger"
                          onclick="return confirm('dengan ini anda menghapus data selamanya, yakin?')">Hapus</span></a>
                    </td>
                    <?php }else{ ?>
                      <td>-</td>
                    <?php } ?>
                  </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
            <div class="card-footer py-4">
              <?php echo $pagination; ?>
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
  </div>

</body>
<?php $this->load->view('include/backend/backend_js.php'); ?>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css
"></script>

</html>