<?php
/** 
* Template Name: O Nas
*/
?>
<?php get_header(); ?>

<!--WELCOME SECTION-->
<section class="section">

<div class="patternBox patternBox__blue">
  <div class="patternBox_white">
    <div class="patternBox_white-items">
      <img class="image" src="<?php echo get_stylesheet_directory_uri() ?>/img/photos/sesja5.png" alt="Nasze zdjęcie">
      <img class="stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg" alt="ikonka gwiazdek">
      <h4 class="blogTitle">To My</h4>
    </div>
  </div>
</div>

<div class="infoBox">
  <div class="infoBox_top">
    <div class="section_title">
      <span class="section_title-span">O Nas</span>
      <h1 class="section_title-head">Cześć!</h1>
    </div>
    <h4 class="infoBox_top-head">Fajnie, że jesteś!</h4>
    <p class="infoBox_top-description">
    <strong>Z tej strony ekipa Blog Goals 🤗 Bardzo nam miło, że tu jesteś!</strong>
    <br/>[Tu opowiedz, kim jesteście i skąd wziął się pomysł na ten projekt.]
    </p>
    <p class="infoBox_top-description">
    [Miejsce na historię Waszego zespołu / marki — co Was połączyło i dlaczego robicie to, co robicie.]
    </p>
    <p class="infoBox_top-description">
    <strong>Zapraszamy Cię do wspólnej przygody</strong>, dzięki której razem odkryjemy to, na czym się znamy. Dodatkowo przygotujemy dla Ciebie mnóstwo wartościowego contentu
    <a href="<?php echo esc_url(home_url('/newsletter')); ?>">(koniecznie zajrzyj tutaj)!</a>
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