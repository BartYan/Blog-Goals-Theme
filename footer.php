<!--FOOTER SECTION-->
<section id="footer" class="footer noprint">
  <div class="footer__top">
    <div class="footer__top-nav">
      <!-- <div class="footer__top-nav--logo">
        <?php
        // Pobierz lokalizacje menu
        $locations = get_nav_menu_locations();
        // Sprawdź, czy lokalizacja 'main_nav' istnieje
        if (isset($locations['main_nav'])) {
          // Pobierz obiekt menu
          $menu = get_term($locations['main_nav'], 'nav_menu');

          // Pobierz wartość niestandardowego pola ACF przypisanego do menu
          $logo = get_field('logo', $menu);

          if ($logo): ?>
            <a href="<?php echo home_url(); ?>" class="nav__logo-link">
              <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="nav__logo-img">
            </a>
        <?php endif;
        }
        ?>
      </div> -->
      <div class="footer__top-nav--items">
        <?php wp_nav_menu(array(
          'theme_location' => 'main_nav',
        )); ?>
        <!-- <php wp_nav_menu(array(
              'name' => 'Menu Główne'
            )); ?> -->
      </div>
    </div>
    <div class="footer__top-nav--social">
      <ul>
        <?php
        $social_media = get_field('social_media', 'option');

        if ($social_media):
          foreach ($social_media as $item):
            $name = $item['name'] ?? '';
            $link = $item['link'] ?? '';
            $image = $item['image'] ?? '';
        ?>
            <?php if ($name || $image): // Wyświetl tylko jeśli jest obrazek lub tekst 
            ?>
              <li>
                <a href="<?php echo esc_url($link); ?>" target="_blank">
                  <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($name); ?>">
                  <?php endif; ?>
                  <?php if ($name): ?>
                    <?php echo esc_html($name); ?>
                  <?php endif; ?>
                </a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        <?php endif; ?>
      </ul>
    </div>
  </div>
  <div class="footer__bottom">
    <p>Copyright © Blog Goals - Web Design by
      <a class="footer__bottom-link" href="/" target="_blank">blog-goals.com</a>
    </p>
  </div>
</section>

<!--BACK TO TOP BUTTON-->
<!-- <button id="topBtn" title="Do góry!">&uarr;</button> -->

<!-- slick carousel -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo BLOGGOALS_THEME_URL ?>slick-1.8.1/slick/slick.min.js"></script>
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/slick-carousel.js?3"></script>

<!--JS-->
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/cookies.js"></script>
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/searchRoller.js"></script>
<!-- <script src="<?php echo BLOGGOALS_THEME_URL ?>js/mailRoller.js"></script> -->
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/overlays.js"></script>
<!-- <script src="<?php echo BLOGGOALS_THEME_URL ?>js/carousel.js"></script> -->
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/backToTopButton.js"></script>
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/activeLink_filter.js?2"></script>
<script src="<?php echo BLOGGOALS_THEME_URL ?>js/imgCopyDisabled.js"></script>
</body>

</html>