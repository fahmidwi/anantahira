<div class="popular-news-widget mb-30">
  <h3>5 Most popular news of the month</h3>
  <!-- Single Popular Blog -->
  <?php $no=1; foreach ($monthpopulars as $res) { ?>
  <div class="single-popular-post">
    <a href="<?php echo base_url('news/detail/'.$res->id_berita.'/'.$res->uriberita) ?>">
      <h6><span><?php echo $no; ?>.</span> <?php echo $res->headnews; ?></h6>
    </a>
    <p><?php echo changeDate($res->create_date); ?></p>
  </div>
  <?php $no++;} ?>
</div>