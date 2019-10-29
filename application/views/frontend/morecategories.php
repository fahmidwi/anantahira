<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header_news.php'); ?>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <!-- ##### Hero Area End ##### -->
  <br><br>
  <!-- ##### Blog Area Start ##### -->
  <div class="blog-area section-padding-0-80">
    <div class="container">
      <div class="section-heading">
        <h6>More categories</h6>
      </div>
      <div class="row" style="margin-top:-5%">
        <div class="col-12 col-lg-8">
          <?php foreach ($cat as $res ) { ?>
          <a href="<?php echo base_url('news/categories/'.$res->urikategori) ?>"
            class="badge badge-secondary" style="margin-top:5%;padding:2%;">
            <h4><?php echo $res->nama_kategori; ?></h4>
          </a>&nbsp;&nbsp;&nbsp;&nbsp;
          <?php } ?>
          <br><br><br><br>
        </div>
        <div class="col-12 col-lg-4">
          <div class="blog-sidebar-area">

            <!-- Latest Posts Widget -->
            <div class="latest-posts-widget mb-50">

              <!-- Single Featured Post -->
              <?php $this->load->view('frontend/categories') ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Blog Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_footer.php'); ?>

</body>

</html>