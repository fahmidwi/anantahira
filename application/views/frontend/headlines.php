<div class="row align-items-center">
  <div class="col-12 col-lg-12">
    <!-- Breaking News Widget -->
    <div class="breaking-news-area d-flex align-items-center">
      <div class="news-title">
        <p>Nasional</p>
      </div>
      <div id="breakingNewsTicker" class="ticker">
        <ul>
          <?php foreach ($nasional as $res ) { ?>
          <?php $judul = strtolower($res->headnews);
                  $judul = preg_replace('/[^A-Za-z0-9]/', '-', $judul);;
                  ?>
          <li><a
              href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$judul) ?>"><?php echo $res->headnews ?></a>
          </li>
          <?php } ?>
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
          <li><a
              href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$judul) ?>"><?php echo $res->headnews ?></a>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>

</div>