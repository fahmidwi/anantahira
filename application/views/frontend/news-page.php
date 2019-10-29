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
        <h6>
          <?php 
            if($this->uri->segment(2) == '' || $this->uri->segment(2) == 'index'){
              echo "semua berita";
            }else if ($this->uri->segment(2) != 'categories') {
              echo $this->uri->segment(2);
            }else{
              echo str_replace('-', ' ', ucwords($this->uri->segment(3)));
            }
          ?>
        </h6>
      </div>
      <div class="row" style="margin-top:-5%">
        <div class="col-12 col-lg-8">
          <div class="blog-posts-area">
            <!-- Single Featured Post -->
            <?php if ($jum_data == 0) { ?>
            <center>
              <img src="<?php echo base_url('/assets/img/notfoundnews.png') ?>"
                style="width:100px;heigth:100px;" /><br><br>
              <h4>Belum ada berita</h4><br><br><br><br>
            </center>
            <?php }else{ ?>
            <?php foreach ($data_news as $res ) { ?>
            <div class="single-blog-post featured-post mb-30">
              <div class="post-data">
                <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>" class="post-title">
                  <h6><?php echo $res->headnews ?></h6>
                </a>
              </div>
              <div class="post-thumb">
                <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>">
                  <img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt="" style="width:650;height:366px;">
                </a>
              </div>
              <div class="post-data">
                <a href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>"
                  class="post-catagory"><?php echo $res->nama_kategori ?></a>
                <div class="post-meta">
                  <p class="post-author">By <a><?php echo $res->nama_lengkap; ?></a></p>
                  <p class="post-excerp">
                    <?php echo $res->caption_singkat; ?>
                  </p>
                  <!-- Post Like & Post Comment -->
                  <div class="d-flex align-items-center">
                    <a href="#" class="post-like"><img src="<?php echo base_url('assets/img/core-img/view.png') ?>"
                        alt=""> <span><?php echo $res->view; ?></span></a>
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <?php } ?>

            <?php } ?>
          </div>
          <?php echo $pagination; ?><br><br><br>
        </div>

        <div class="col-12 col-lg-4">
          <div class="blog-sidebar-area">

            <!-- Latest Posts Widget -->
            <div class="latest-posts-widget mb-50">

              <!-- Single Featured Post -->
              <?php $this->load->view('frontend/categories') ?>
            </div>

            <!-- Popular News Widget -->
            <?php $this->load->view('frontend/monthpopulars'); ?>
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