<div class="row">
  <div class="col-xl-12 order-xl-1">
    <?php if($this->session->userdata('kd_anggota') == 'false'){ ?>
    <div class="alert alert-warning" role="alert">
      <span class="alert-inner--icon"><i class="ni ni-user-run"></i></span>
      <span class="alert-inner--text"><strong>Peringatan!</strong> Harap Lengkapi Data Keanggotaan Anda!</span>
    </div>
    <?php } ?>
    <div class="card bg-secondary shadow">
      <div class="card-header bg-white border-0">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Data diri keanggotaan</h3>
          </div>
          <?php if ($this->input->get('edit')) { ?>
          <div class="col-4">
            <a href="<?php echo base_url('admin/home') ; ?>" style="right:0;position:absolute;top:-20px;"
              class="btn btn-danger">Batal</a>
          </div>
          <?php } ?>
        </div>
      </div>
      <div class="card-body">
        <?php 
        $stat = $this->input->get('edit');
        $urlfrom = ($stat == 'true') ? 'UpdateDataKeanggotaan/'.$id_anggota : 'AddDataKeanggotaan' ; ?>
        <form action="<?php echo base_url('admin/home/'.$urlfrom) ?>" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>"
            value="<?=$this->security->get_csrf_hash();?>" style="display: none">
          <h6 class="heading-small text-muted mb-4">Informasi User</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Username</label>
                  <input type="text" id="input-username" name="username" required class="form-control form-control-alternative"
                    placeholder="Username" value="<?php echo $username ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Alamat Email</label>
                  <input type="email" id="input-email" name="email" required class="form-control form-control-alternative"
                    value="<?php echo $email ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Nama Lengkap</label>
                  <input type="text" id="input-first-name" name="nama_lengkap" required
                    class="form-control form-control-alternative" placeholder="First name"
                    value="<?php echo $nama_lengkap ?>">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-last-name">Nomor HP</label>
                  <input type="text" id="input-last-name" name="no_hp" required class="form-control form-control-alternative"
                    placeholder="ex: 0812xxxxxxxx" value="<?php echo $no_hp ?>">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Informasi Kontak</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-address">Alamat</label>
                  <input id="input-address" name="alamat" required value="<?php echo $alamat; ?>"
                    class="form-control form-control-alternative" placeholder="Alamat Lengkap Anda" type="text">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Foto</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Foto Pribadi</label>
                  <input type="hidden" name="foto_pribadi" required value="<?php echo $foto_pribadi ?>">
                  <input type="file" id="input-username" name="foto_pribadi" <?php ($stat == 'true') ? 'required' : null ?>
                    class="form-control form-control-alternative">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Foto Keluarga</label>
                  <input type="hidden" name="foto_keluarga" required value="<?php echo $foto_keluarga ?>">
                  <input type="file" id="input-email" name="foto_keluarga" <?php ($stat == 'true') ? 'required' : null ?>
                    class="form-control form-control-alternative">
                </div>
              </div>
              <?php if ($stat == 'true') { ?>
              <div class="text-muted font-italic" id="wrongpass"><small><span
                    class="text-danger font-weight-700">jika memilih foto baru dan menyimpan foto lama akan
                    hilang, (tidak perlu memilih foto jika tidak ingin merubah foto)</span></small></div>
              <?php } ?>
            </div>
          </div>
          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Penugasan</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Provinsi</label>
                  <div id="opt-propinsi"></div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Kota/kab</label>
                  <div id="opt-kotakab"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Jabatan</label>
                  <input type="text" id="input-first-name" name="jabatan" required value="<?php echo $jabatan ?>"
                    class="form-control form-control-alternative" placeholder="Jabatan Anda" value="">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Fungsi</label>
                  <select class="form-control form-control-alternative" name="fungsi"> required
                    <?php foreach ($fungsi as $res) { ?>
                    <?php if ($res->id_fungsi == $id_fungsi) { ?>
                    <option value="<?php echo $res->id_fungsi; ?>" selected><?php echo $res->nama_fungsi; ?></option>
                    <?php }else{ ?>
                    <option value="<?php echo $res->id_fungsi; ?>"><?php echo $res->nama_fungsi; ?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
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
                  <input type="text" id="input-username" name="instagram" required value="<?php echo $instagram; ?>"
                    class="form-control form-control-alternative" placeholder="Instagram Anda" value="lucky.jesse">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Facebook</label>
                  <input type="text" id="input-email" name="facebook" required value="<?php echo $facebook; ?>"
                    class="form-control form-control-alternative" placeholder="Facebook Anda">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Twitter</label>
                  <input type="text" id="input-first-name" name="twitter" required value="<?php echo $twitter; ?>"
                    class="form-control form-control-alternative" placeholder="Twitter Anda" value="Lucky">
                </div>
              </div>
            </div>
          </div>
          <hr class="my-4" />
          <h6 class="heading-small text-muted mb-4">Biografi</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Biografi Anda</label>
                  <textarea type="text" id="input-username" name="biografi" required
                    class="form-control form-control-alternative"
                    placeholder="Biografi Anda"><?php echo $biografi ?></textarea>
                </div>
              </div>
            </div>
          </div>
          <center><button type="submit" class="btn btn-default" id="btn" style="width: 100%;">Simpan</button></center>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function() {

  const url = '<?php echo base_url(); ?>';
  const id_provinsi = '<?php echo $id_provinsi; ?>';
  const id_kotakab = '<?php echo $id_kotakab; ?>';
  $('#btn').prop('disabled', true);

  $('#opt-propinsi').on('change', '#selectPropinsi', function() {
    $('#opt-kecamatan').html(' - ')
    $('#opt-kelurahan').html(' - ')
    var propinsi_id = $(this).val()
    getKabKota(propinsi_id)
  })

  getPropinsi()
  'use strict'

  function getPropinsi() {
    $.ajax({
      type: 'GET',
      url: url + 'admin/Home/provinsi',
      dataType: 'JSON',
      beforeSend: function() {
        $('#opt-propinsi').html('<p>Sedang mengambil data . . .</p>')
      },
      success: function(data) {
        var html = ''
        $.each(data, function(index, value) {

          if (value.id_provinsi == id_provinsi) {
            html += '<option value="' + value.id_provinsi + '" selected>' + value.name + '</option>'
          } else {
            html += '<option value="' + value.id_provinsi + '">' + value.name + '</option>'
          }

        })

        $('#opt-propinsi').html(
          '<select class="form-control form-control-alternative" name="provinsi" id="selectPropinsi">' +
          '<option value="null">Pilih</Option>' +
          html +
          '</select>')
      }
    })
  }

  'use strict'
  if (id_kotakab != '') {
    getKabKota(id_provinsi)
  }

  function getKabKota(propinsi_id) {
    $.ajax({
      type: 'GET',
      url: url + 'admin/Home/kotakab/' + propinsi_id,
      dataType: 'JSON',
      beforeSend: function() {
        $('#opt-kotakab').html('<p>Sedang mengambil data . . .</p>')
      },
      success: function(data) {
        //console.log(data)
        $('#btn').prop('disabled', false);
        var html = ''
        $.each(data, function(index, value) {
          if (value.id_kotakab == id_kotakab) {
            html += '<option value="' + value.id_kotakab + '" selected>' + value.name + '</option>'
          } else {
            html += '<option value="' + value.id_kotakab + '">' + value.name + '</option>'
          }
        })

        $('#opt-kotakab').html(
          '<select class="form-control form-control-alternative" name="kotakab">' +
          html + '</select>')
      }
    })
  }

});
</script>