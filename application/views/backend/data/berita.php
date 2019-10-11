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
              <h3 class="mb-0">Data Berita</h3>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">gambar</th>
                    <th scope="col">Judul Berita</th>
                    <th scope="col">Create Date</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = ($this->uri->segment(4)) ? $this->uri->segment(4) + 1 : 1;
                    foreach ($berita as $res) { ?>
                  <tr>
                    <?php $judul = strtolower($res->headnews);
                    $judul = preg_replace('/[^A-Za-z0-9]/', '-', $judul);
                    ?>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" width="100"
                        height="80" /></td>
                    <td><?php echo $res->headnews; ?></td>
                    <td><?php echo changeDate($res->create_date); ?></td>
                    <td>
                      <a href="<?php echo base_url('admin/berita/edit/'.$res->id_berita) ?>"><span class="badge badge-default">Edit</span></a>
                      <a href="<?php echo base_url('admin/berita/hapus/'.$res->id_berita) ?>"><span class="badge badge-danger">Hapus</span></a>
                      <a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>" target="_blank"><span
                          class="badge badge-info">Detail</span></a>
                    </td>
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
      <!-- Footer -->
      <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative
                Tim</a>
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