    <footer class="footer-area">

      <!-- Main Footer Area -->
      <div class="main-footer-area">
        <div class="container">
          <div class="row">

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="footer-widget-area mt-80">
                <!-- Footer Logo -->
                <div class="footer-logo">
                  <a href="index.html"><img src="<?php echo base_url('assets/img/logo.png'); ?>" alt=""></a>
                </div>
                <!-- List -->
                <ul class="list">
                  <li><a href="mailto:contact@youremail.com">contact@youremail.com</a></li>
                  <li><a href="tel:+4352782883884">+43 5278 2883 884</a></li>
                  <li><a href="http://yoursitename.com">www.anantahira.com</a></li>
                </ul>
              </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-6 col-lg-2">
            </div>
            <div class="col-12 col-sm-6 col-lg-2">
              <div class="footer-widget-area mt-80">
                <!-- Title -->
                <h4 class="widget-title">Categories</h4>
                <!-- List -->
                <ul class="list">
                <?php foreach ($data_cat as $res) { ?>
                  <li><a href="<?php echo base_url('news/categories/'.str_replace(' ', '-', strtolower($res->nama_kategori))) ?>" target="_blank"><?php echo $res->nama_kategori; ?></a></li>
                <?php } ?>
                <?php if ($jum_data_cat > 7) { ?>
                <li><a href="<?php echo base_url('news/morecategories') ?>" target="_blank">More
                    Categories</a>
                </li>
                <?php } ?>
                </ul>
              </div>
            </div>

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-4 col-lg-2">
              <div class="footer-widget-area mt-80">
                <!-- Title -->
                <h4 class="widget-title">Type of news</h4>
                <!-- List -->
                <ul class="list">
                  <li><a href="<?php echo base_url('news/nasional') ?>" target="_blank">National</a></li>
                  <li><a href="<?php echo base_url('news/internasional') ?>" target="_blank">International</a></li>
                </ul>
              </div>
            </div>

            <!-- Footer Widget Area -->
            <!-- <div class="col-12 col-sm-4 col-lg-2">
                        <div class="footer-widget-area mt-80">
                            <h4 class="widget-title">FAQ</h4>
                            <ul class="list">
                                <li><a href="#">Aviation</a></li>
                                <li><a href="#">Business</a></li>
                                <li><a href="#">Traveller</a></li>
                                <li><a href="#">Destinations</a></li>
                                <li><a href="#">Features</a></li>
                                <li><a href="#">Food/Drink</a></li>
                                <li><a href="#">Hotels</a></li>
                                <li><a href="#">Partner Hotels</a></li>
                            </ul>
                        </div>
                    </div> -->

            <!-- Footer Widget Area -->
            <div class="col-12 col-sm-4 col-lg-2">
              <div class="footer-widget-area mt-80">
                <h4 class="widget-title">+More</h4>
                <!-- List -->
                <ul class="list">
                  <li><a href="<?php echo base_url('home/about') ?>" target="_blank">About us</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Bottom Footer Area -->
      <div class="bottom-footer-area">
        <div class="container h-100">
          <div class="row h-100 align-items-center">
            <div class="col-12">
              <!-- Copywrite -->
              <p class="text-center">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy; 2019 || All rights reserved
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- Popper js -->
    <script src="<?php echo base_url('lib/frontend/js/bootstrap/popper.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo base_url('lib/frontend/js/bootstrap/bootstrap.min.js') ?>"></script>
    <!-- All Plugins js -->
    <script src="<?php echo base_url('lib/frontend/js/plugins/plugins.js') ?>"></script>
    <!-- Active js -->
    <script src="<?php echo base_url('lib/frontend/js/active.js') ?>"></script>