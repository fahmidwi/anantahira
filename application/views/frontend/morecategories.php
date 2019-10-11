<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header.php'); ?>

  <!-- ##### Header Area End ##### -->
  <br>
  <!-- ##### About Area Start ##### -->
  <section class="about-area">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2><u>Categories News</u></h2>
        </div>
      </div>

      <div class="row">
      <?php foreach ($cat as $res) { ?>
        <div class="col-2">
          <a href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>">
            <div class="section-heading" style="border:none;">
              <h6><?php echo $res->nama_kategori; ?></h6>
            </div>
          </a>
        </div>
      <?php } ?>
      </div>
</body>

</html>