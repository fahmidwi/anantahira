<div class="row">
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Berita</h5>
            <span class="h2 font-weight-bold mb-0"><?php echo $this->db->count_all('berita') ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
              <i class="fas fa-book"></i>
            </div>
          </div>
        </div><br><br>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-lg-6">
    <div class="card card-stats mb-4 mb-xl-0">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h5 class="card-title text-uppercase text-muted mb-0">Anggota</h5>
            <span class="h2 font-weight-bold mb-0"><?php echo $this->db->count_all('anggota'); ?></span>
          </div>
          <div class="col-auto">
            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div><br><br>
      </div>
    </div>
  </div>
</div>