<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<style type="text/css">
.gallery-block.grid-gallery {
  padding-bottom: 60px;
  padding-top: 60px;
}

.gallery-block.grid-gallery .heading {
  margin-bottom: 50px;
  text-align: center;
}

.gallery-block.grid-gallery .heading h2 {
  font-weight: bold;
  font-size: 1.4rem;
  text-transform: uppercase;
}

.gallery-block.grid-gallery a:hover {
  opacity: 0.8;
}

.gallery-block.grid-gallery .item img {
  box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.15);
  transition: 0.4s;
}

.gallery-block.grid-gallery .item {
  margin-bottom: 20px;
}

@media (min-width: 576px) {

  .gallery-block.grid-gallery .scale-on-hover:hover {
    transform: scale(1.05);
    box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.15) !important;
  }
}
</style>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header.php'); ?>

  <!-- ##### Header Area End ##### -->
  <br>
  <!-- ##### About Area Start ##### -->
  <section class="about-area gallery-block grid-gallery">
    <div class="container">
      <div class="heading">
        <h2>Gallery</h2>
      </div>
      <div class="row">
        <?php foreach ($gallery as $res) { ?>
        <div class="col-md-6 col-lg-3 item">
          <a class="lightbox" href="<?php echo base_url('assets/img/gallery/'.$res->gambar_gallery); ?>">
            <img class="img-fluid image scale-on-hover"
              src="<?php echo base_url('assets/img/gallery/'.$res->gambar_gallery); ?>">
          </a>
        </div>
        <?php } ?>
      </div>
      <br>
      <?php echo $pagination; ?>
  </section>
  <!-- ##### About Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_footer.php'); ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
  <script>
  baguetteBox.run('.grid-gallery', {
    animation: 'slideIn'
  });
  </script>
</body>
</html>