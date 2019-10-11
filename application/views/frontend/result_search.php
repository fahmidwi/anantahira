<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/frontend/frontend_head.php'); ?>

<body>
  <!-- ##### Header Area Start ##### -->
  <?php $this->load->view('include/frontend/frontend_header.php'); ?>
  <!-- ##### Header Area End ##### -->

  <!-- ##### Hero Area Start ##### -->
  <!-- ##### Hero Area End ##### -->
  <br><br>
  <!-- ##### Blog Area Start ##### -->
  <div class="blog-area section-padding-0-80">
    <div class="container">
      <div class="section-heading">
      <i class="fa fa-search" aria-hidden="true"></i> Hasil penelusuran anda <i>"<?php echo $headnews; ?>"</i>
      , <?php echo $jum ?> data ditemukan dari <?php echo $this->db->count_all('berita'); ?> data berita<br>
      </div>
      <div class="row" style="margin-top:-5%">
        <div class="col-12 col-lg-8">
          <div class="blog-posts-area">

            <!-- Single Featured Post -->
            <?php foreach ($result_search as $res ) { ?>
              <div class="single-blog-post featured-post mb-30">
              <?php $judul = strtolower($res->headnews);
                  $judul = preg_replace('/[^A-Za-z0-9]/', '-', $judul);;
                  ?>
                <div class="post-thumb">
                  <a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>"><img src="<?php echo base_url('assets/img/berita/'.$res->gambar_berita) ?>" alt=""></a>
                </div>
                <div class="post-data">
                  <a href="<?php echo base_url('home/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>" class="post-catagory"><?php echo $res->nama_kategori ?></a>
                  <a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>" class="post-title">
                    <h6><?php echo $res->headnews ?></h6>
                  </a>
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
            <?php } ?>
          </div>

          <nav aria-label="Page navigation example">
            <ul class="pagination mt-50">
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">4</a></li>
              <li class="page-item"><a class="page-link" href="#">5</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">10</a></li>
            </ul>
          </nav>
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