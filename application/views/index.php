<!DOCTYPE html>
<html>
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header.php'); ?>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2><u>Tentang Anta Hira</u></h2>
        </div>
      </div><br>
      <div class="row">
        <div class="col-12 col-lg-12">
          <p>
            <?php echo substr($tentang_kami->tentang_kami,0,500); ?>
            <a href="<?php echo base_url('home/about'); ?>">Lihat selengkapnya</a>
          </p>
          </p>
        </div>
      </div><br>
      <?php $this->load->view('frontend/headlines'); ?>
    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Featured Post Area Start ##### -->
  <div class="featured-post-area">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-8">
          <div class="row">

            <!-- Single Featured Post -->
            <div class="col-12 col-lg-7">
              <div class="single-blog-post featured-post">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/detail/'.$fresh_berita->id_berita.'/'.$fresh_berita->uriberita) ?>">
                    <img src="<?php echo base_url('assets/img/berita/'.$fresh_berita->gambar_berita) ?>" alt="">
                  </a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($fresh_berita->nama_kategori))) ?>"
                    class="post-catagory"><?php echo $fresh_berita->nama_kategori; ?></a>
                  <a href="<?php echo base_url('news/detail/'.$fresh_berita->id_berita.'/'.$fresh_berita->uriberita) ?>"
                    class="post-title">
                    <h6><?php echo $fresh_berita->headnews; ?></h6>
                  </a>
                  <div class="post-meta">
                    <p class="post-excerp"><?php echo $fresh_berita->caption_singkat; ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-5">
              <!-- Single Featured Post -->
              <?php foreach ($fresh_berita_2 as $res) { ?>
              <div class="single-blog-post featured-post-2">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>"><img
                      src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/categories/'.$res->urikategori) ?>"
                    class="post-catagory"><?php echo $res->nama_kategori; ?></a>
                  <div class="post-meta">
                    <a href="<?php echo base_url('news/detail_berita/'.$res->id_berita.'/'.$res->uriberita) ?>"
                      class="post-title">
                      <h6><?php echo $res->headnews; ?></h6>
                    </a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="section-heading">
            <h6>Categories</h6>
          </div>
          <?php $this->load->view('frontend/categories') ?>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Featured Post Area End ##### -->

  <!-- ##### Popular News Area Start ##### -->
  <div class="popular-news-area section-padding-80-50">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="section-heading">
            <h6>Popular News</h6>
          </div>

          <div class="row">

            <!-- Single Post -->
            <?php foreach ($popular_news as $res) { ?>
            <div class="col-12 col-md-6">
              <div class="single-blog-post style-3">
                <div class="post-thumb">
                  <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>">
                    <img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('news/categories/'.$res->urikategori) ?>"
                    class="post-catagory"><?php echo $res->nama_kategori; ?></a>
                  <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>" class="post-title">
                    <h6><?php echo $res->headnews; ?></h6>
                  </a>
                  <div class="post-meta d-flex align-items-center">
                    <a href="#" class="post-like"><img src="<?php echo base_url('assets/img/core-img/view.png') ?>"
                        alt=""> <span><?php echo $res->view; ?></span></a>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>

        <div class="col-12 col-lg-4">
          <div class="section-heading">
            <h6>Info</h6>
          </div>
          <!-- Popular News Widget -->
          <?php $this->load->view('frontend/monthpopulars'); ?>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Popular News Area End ##### -->

  <!-- ##### Video Post Area Start ##### -->
  <!-- <div class="video-post-area bg-img bg-overlay"
    style="background-image: url(<?php echo base_url('assets/img/bg-img/polisi.jpg') ?>);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-4">
          <div class="single-video-post">
            <img src="<?php echo base_url('assets/img/bg-img/video1.jpg') ?>" alt="">
            <div class="videobtn">
              <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play"
                  aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="single-video-post">
            <img src="<?php echo base_url('assets/img/bg-img/video2.jpg') ?>" alt="">
            <div class="videobtn">
              <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play"
                  aria-hidden="true"></i></a>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6 col-md-4">
          <div class="single-video-post">
            <img src="<?php echo base_url('assets/img/bg-img/video3.jpg') ?>" alt="">
            <div class="videobtn">
              <a href="https://www.youtube.com/watch?v=5BQr-j3BBzU" class="videoPlayer"><i class="fa fa-play"
                  aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->
  <!-- ##### Video Post Area End ##### -->
</body>
<?php $this->load->view('include/frontend/frontend_footer.php'); ?>

</html>