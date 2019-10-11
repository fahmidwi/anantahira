<div class="row align-items-center">
  <div class="col-12 col-lg-12">
    <!-- Breaking News Widget -->
    <div class="breaking-news-area d-flex align-items-center">
      <div class="news-title">
        <p>Nasional</p>
      </div>
      <div id="breakingNewsTicker" class="ticker">
        <ul>
          <li><a href="#">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></li>
          <li><a href="#">Welcome to Colorlib Family.</a></li>
          <li><a href="#">Nam eu metus sitsit amet, consec!</a></li>
        </ul>
      </div>
    </div>

    <!-- Breaking News Widget -->
    <div class="breaking-news-area d-flex align-items-center mt-15">
      <div class="news-title title2">
        <p>Breaking News</p>
      </div>
      <div id="internationalTicker" class="ticker">
        <ul>
          <?php foreach ($breaking_news as $res ) { ?>
            <?php $judul = strtolower($res->headnews);
                  $judul = preg_replace('/[^A-Za-z0-9]/', '-', $judul);;
                  ?>
          <li><a href="<?php echo base_url('home/detail_berita/'.$res->id_berita.'/'.$judul) ?>"><?php echo $res->headnews ?></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</div>