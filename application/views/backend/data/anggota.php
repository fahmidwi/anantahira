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
              <h3 class="mb-0">Data Anggota</h3>
              <form class="mt-4 mb-3">
                <div class="input-group input-group-rounded input-group-merge">
                  <input type="search" class="form-control form-control-rounded form-control-prepended"
                    placeholder="Cari berdasarkan nama" name="keyword" aria-label="Search">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      <span class="fa fa-search"></span>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = ($this->uri->segment(4)) ? $this->uri->segment(4) + 1: 1; ?>
                  <?php foreach ($anggota as $res) { ?>
                  <tr>
                    <th scope="row"><?php echo $no; ?></th>
                    <td><?php echo $res->nama_lengkap; ?></td>
                    <td><?php echo $res->email; ?></td>
                    <td><?php echo $res->no_hp ?></td>
                    <td>
                      <?php 
                          $username = $this->db->select('username')
                                              ->from('admin')
                                              ->where(array('id_admin' => $res->id_admin ))
                                              ->get()->row();
                         ?>
                      <a href="<?php echo base_url('admin/home?user='.$username->username) ?>">
                        <span class="badge badge-info">Detail</span>
                      </a>
                    </td>
                  </tr>
                  <?php $no++;} ?>
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