<?php
/** 
* Template Name: 404
*/
?>
<?php get_header(); ?>

<!--WELCOME SECTION-->
<section class="section">

<div class="patternBox">
  <div class="patternBox_white">
    <div class="patternBox_white-items">
      <img class="image" src="<?php echo get_stylesheet_directory_uri() ?>/img/photos/sesja3.png" alt="Photo by Daniela Díaz on Unsplash">
      <img class="stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg" alt="ikonka gwiazdek">
      <h4 class="blogTitle">Ups... Wysypało się.</h4>
    </div>
  </div>
</div>

<div class="infoBox">
  <div class="infoBox_top">
    <div class="section_title">
      <span class="section_title-span">błąd</span>
      <h1 class="section_title-head section_title-head--bigger">404</h1>
    </div>
    <h4 class="infoBox_top-head">Chyba coś się wysypało!</h4>
    <p class="infoBox_top-description">
      Strona pod wskazanym adresem Url nie istnieje.
      <br />Wybierz coś z naszego menu lub wróć na <a href="<?php echo esc_url(home_url('/')); ?>">stronę główną</a>.
    </p>
  </div>
  <div class="infoBox_bottom">
    <ul class="infoBox_bottom_social">
      <li class="infoBox_bottom_social-item">
        <a class="infoBox_bottom_social-link" href="https://www.facebook.com/bloggoals" target="_blank">
          <img class="infoBox_bottom_social-facebook" src="<?php echo get_stylesheet_directory_uri() ?>/img/facebook_menu.svg" alt="facebook">
        </a>
      </li>
      <li class="infoBox_bottom_social-item">
        <a class="infoBox_bottom_social-link" href="https://www.instagram.com/bloggoals" target="_blank">
          <img class="infoBox_bottom_social-insta" src="<?php echo get_stylesheet_directory_uri() ?>/img/instagram_menu.svg" alt="insta">
        </a>
      </li>
      <li class="infoBox_bottom_social-item">
        <p class="infoBox_bottom_social-txt">Skuś się na więcej!</p>
      </li>
    </ul>
    <img class="blueBerry" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/blueberry.svg" alt="">
  </div>
</div>
</section>

<?php get_footer(); ?>