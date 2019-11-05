<div class="row">
  <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
    <div class="card card-profile shadow">
      <div class="row justify-content-center">
        <div class="col-lg-3 order-lg-2">
          <div class="card-profile-image">
            <a href="#">
              <img src="<?php echo base_url('assets/backend/img/'.$foto_pribadi) ?>" class="rounded-circle" width="200"
                height="180">
            </a>
          </div>
        </div>
      </div>
      <div class="card-body pt-0 pt-md-4">
        <br><br><br><br><br>
        <div class="text-center">
          <h3>
            <?php echo ucwords($nama_lengkap) ?> - <?php echo $no_ak; ?>
          </h3>
          <div class="h5 font-weight-300">
            <i class="ni location_pin mr-2"></i><?php echo $no_hp; ?>
          </div>
          <div class="h5 font-weight-300">
            <i class="ni location_pin mr-2"></i><?php echo $alamat ?>
          </div>
          <div class="h5 mt-4">
            <i class="ni business_briefcase-24 mr-2"></i><?php echo strtoupper($jabatan) ?> -
            <?php echo strtoupper($nama_fungsi) ?>
          </div>
          <div>
            <i class="ni education_hat mr-2"></i><?php echo $provinsi.', '. $kotakab?>
          </div>
          <hr class="my-4" />
          <p><?php echo $biografi ?></p>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-8 order-xl-1">

    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="row align-items-center">
          <div class="col-8">
          <?php if ($this->input->get('user')) { ?>
            <h3 class="mb-0">Informasi</h3>
          <?php }else{ ?>
            <h3 class="mb-0">Informasi kamu</h3>
          <?php } ?>
          </div>
          <?php if (!$this->input->get('user')) { ?>
          <div class="col-4">
            <a href="<?php echo base_url('admin/home?edit=true') ; ?>" style="right:0;position:absolute;top:-20px;"
              class="btn btn-primary">ubah</a>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="card-body">
        <form>
          <h6 class="heading-small text-muted mb-4">Foto</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Foto Keluarga</label>
                  <div class="card" style="width: 25rem;">
                    <img class="card-img-top" src="<?php echo base_url('assets/backend/img/'.$foto_keluarga) ?>"
                      alt="Card image cap">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Sosmed</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Instagram</label>
                  <input readonly type="text" id="input-username" class="form-control form-control-alternative"
                    placeholder="Instagram Anda" value="<?php echo $instagram ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Facebook</label>
                  <input readonly type="text" id="input-email" class="form-control form-control-alternative"
                    value="<?php echo $facebook; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Twitter</label>
                  <input readonly type="text" id="input-first-name" class="form-control form-control-alternative"
                    placeholder="Twitter Anda" value="<?php echo $twitter ?>">
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>