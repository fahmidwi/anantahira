<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header.php'); ?>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <div class="hero-area">
    <div class="container">
      <?php $this->load->view('frontend/headlines'); ?>
    </div>
  </div>
  <!-- ##### Hero Area End ##### -->

  <!-- ##### Blog Area Start ##### -->
  <div class="blog-area section-padding-0-80">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-8">
          <div class="blog-posts-area">

            <!-- Single Featured Post -->
            <div class="single-blog-post featured-post single-post">
              <div class="post-thumb">
                <a href="#"><img src="<?php echo base_url('assets/img/berita/'.$berita->gambar_berita) ?>" alt=""></a>
              </div>
              <div class="fb-share-button" data-href="https://instagram.com/dwifhmi" data-layout="button"
                data-size="small">
                <a target="_blank"
                  href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2Fanantahira%2Fhome%2Fdetail_berita%2F1%2Fyasonna-laoly--sebaiknya-jokowi-jangan-terbitkan-perppu-kpk&amp;src=sdkpreparse"
                  class="fb-xfbml-parse-ignore">
                  Bagikan</a>
              </div>
              <a href="whatsapp://send?text=URL Artikel">Bagikan ke WhatsApp</a>
              <div class="post-data">
                <a href="#" class="post-catagory"><?php echo $berita->nama_kategori ?></a>
                <a class="post-title">
                  <h6><?php echo $berita->headnews; ?></h6>
                </a>
                <div class="post-meta">
                  <p class="post-author">By <a><?php echo $berita->nama_lengkap; ?></a></p>
                  <?php echo $berita->isi_berita; ?>
                  <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                    <!-- Tags -->
                    <div class="newspaper-tags d-flex">
                      <span>Categories:</span>
                      <ul class="d-flex">
                        <li><a
                            href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($berita->nama_kategori))) ?>"><?php echo $berita->nama_kategori ?></a>
                        </li>
                      </ul>
                    </div>

                    <!-- Post Like & Post Comment -->
                    <div class="d-flex align-items-center post-like--comments">
                      <a href="" class="post-like"><img src="<?php echo base_url('assets/img/core-img/view.png') ?>"
                          alt=""> <span><?php echo $berita->view; ?></span></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="section-heading">
              <h6>Related</h6>
            </div>

            <div class="row">
              <!-- Single Post -->
              <?php foreach ($relasi as $res) { ?>
              <?php $judul = strtolower($res->headnews);
                  $judul = str_replace(' ', '-',$judul);
                  ?>
              <div class="col-12 col-md-6" style="display:<?php echo ($res->id_berita === $berita->id_berita) ? 'none' : null ?>">
                <div class="single-blog-post style-3">
                  <div class="post-thumb">
                    <a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>">
                      <img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt=""></a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>"
                      class="post-catagory"><?php echo $res->nama_kategori; ?></a>
                    <a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>"
                      class="post-title">
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
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <?php $this->load->view('frontend/categories') ?>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Blog Area End ##### -->

  <!-- ##### Footer Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_footer.php'); ?>

</body>

</html>