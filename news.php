<?php
/** 
* Template Name: Newsletter
*/
?>
<?php get_header('center'); ?>

<!--TOP LEAFs DECORATION-->
<img class="leaf-left--nav" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_left.svg" alt="leaf icon">

<!--NEWSLETTER SECTION-->
<section class="cards_section">
  <div class="section_title">
    <span class="section_title-span">Załap się na</span>
    <h2 class="section_title-head">Nowości!</h2>
    <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
  </div>

  <div class="text_center">
    <h2 class="text_center-head">
      Cześć! Tu ekipa Blog Goals!
    </h2>
    <p class="text_center-p newsletter-p">
      [Tu opisz w 1-2 zdaniach, kim jesteście i czym zajmuje się ten projekt.]
    </p>
    <p class="text_center-p newsletter-p">
      Jeśli podoba Ci się to, co robimy, dołącz do naszego newslettera — podzielimy się z Tobą tym, co dla nas ważne!
      <br/><button class="cta cta-news">Zapisuję się!</button>
    </p>
    <p class="text_center-p newsletter-p">
      W naszym newsletterze znajdziesz:
    </p>
    <ul class="text_center-p newsletter-p">
        <li>[punkt 1 — co zyska subskrybent]</li>
        <li>[punkt 2 — co zyska subskrybent]</li>
        <li>[punkt 3 — co zyska subskrybent]</li>
      </ul>
    <p class="newsletter-p text_center-head">
      <strong>Bardzo dziękujemy, że poświęciłeś czas na przeczytanie tej strony!</strong> 🤩
      <br/><button class="cta cta-news">Dołączam!</button>
  </p>
  </div>

  <!--BOTTOM LEAFs DECORATION-->
  <img class="leaf-right" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_right.svg" alt="leaf icon">

</section>
<!--NEWSLETTER SECTION THE END-->



<?php get_footer(); ?>