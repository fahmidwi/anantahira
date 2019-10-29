<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header_news.php'); ?>
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
              <div class="post-data">
                <a class="post-title">
                  <h6><?php echo $berita->headnews; ?></h6>
                </a>
                <p><?php echo changeDate($berita->create_date); ?></p>
              </div>
              <div class="post-thumb" style="margin-top:-5%;">
                <a href="#"><img src="<?php echo base_url('assets/img/berita/'.$berita->gambar_berita) ?>" alt="" style="width:650;height:366px;"></a>
              </div><br>
              <p>
              <?php if ($berita->modified_date != '0000-00-00 00:00:00') { ?>
                  <i>diubah pada <?php echo changeDate($berita->modified_date); ?></i></p>
              <?php } ?>
              <div class="fb-share-button"
                data-href="<?php echo base_url('news/detail/'.$berita->id_berita.'/'.$berita->uriberita) ?>"
                data-layout="button" data-size="small">
                <a target="_blank"
                  href="https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('news/detail/'.$berita->id_berita.'/'.$berita->uriberita) ?>&amp;src=sdkpreparse"
                  class="fb-xfbml-parse-ignore">
                  Bagikan</a>
              </div>&nbsp;
              <a href="whatsapp://send?text=<?php echo base_url('news/detail/'.$berita->id_berita.'/'.$berita->uriberita) ?>"
                style="background-color:#39d433;border-radius:5px 5px;padding:3px;color:white;font-size:9.5pt;">
                <img src="<?php echo base_url('assets/img/wa.png') ?>" alt="" width="15" height="5" />
                Bagikan
              </a>&nbsp;
              <a href="http://twitter.com/intent/tweet?url=<?php echo base_url('news/detail/'.$berita->id_berita.'/'.$berita->uriberita) ?>&amp;text=<?php echo $berita->headnews;  ?>&amp;hashtags=<?php echo $berita->nama_kategori; ?>"
                target="_blank"
                style="background-color:#4dd5f7;border-radius:5px 5px;padding:3px;color:white;font-size:9.5pt;">
                <img src="<?php echo base_url('assets/img/twit.png') ?>" alt="" width="18" height="8" />
                Bagikan
              </a>
              <div class="post-data">
                <a href="#" class="post-catagory"><?php echo $berita->nama_kategori ?></a>
                <div class="post-meta">
                  <p class="post-author">By <a><?php echo $berita->nama_lengkap; ?></a></p>
                  <?php echo $berita->isi_berita; ?><br><br>
                  <span>Sumber:</span>
                  <a href="<?php echo $berita->sumber; ?>" target="_blank"><?php echo $berita->sumber; ?></a>
                  <div class="newspaper-post-like d-flex align-items-center justify-content-between">
                    <!-- Categories -->
                    <div class="newspaper-tags d-flex">
                      <span>Categories:</span>
                      <ul class="d-flex">
                        <li><a
                            href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($berita->nama_kategori))) ?>"><?php echo $berita->nama_kategori ?></a>
                        </li>
                      </ul>
                    </div>
                    <!-- Post View -->
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
              <div class="col-12 col-md-6"
                style="display:<?php echo ($res->id_berita === $berita->id_berita) ? 'none' : null ?>">
                <div class="single-blog-post style-3">
                  <div class="post-thumb">
                    <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>">
                      <img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt=""></a>
                  </div>
                  <div class="post-data">
                    <a href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>"
                      class="post-catagory"><?php echo $res->nama_kategori; ?></a>
                    <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>"
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