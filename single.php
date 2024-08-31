<?php get_header('center'); ?>

<?php the_post(); ?>

<!--RECIPE SECTION-->
<section class="section-post">

  <!--MOBILE TITLE-->
  <div class="infoBoxPost title_mobile noprint">
    <div class="section_title">
      <!-- <span class="section_title-span">Przepis na</span> -->
      <h3 class="section_title-head"><?php the_title(); ?></h3>
      <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
    </div>
  </div>

  <div class="leftBox">
    <div class="leftBox_item noprint">
      <!-- <img class="leftBox_item-img" src="img/photos/pancake3.jpg" alt="tost"> -->
      <?php the_post_thumbnail('post-thumbnail', ['class' => 'leftBox_item-img']); ?>
    </div>
  </div>

  <div class="infoBoxPost">
    <!--DESKTOP TITLE-->

    <div class="section_title title_desktop">
      <!-- <span class="section_title-span">Przepis na</span> -->
      <h1 class="section_title-head"><?php the_title(); ?></h1>
      <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
    </div>

    <article class="infoBoxPost_description">
      <?php the_content(); ?>
    </article>
</section>

<!--Gallery-->
<!-- <section>
  <div class="gallery">
    <div class="gallery_left">
      <img class="gallery_left-image" src="img/photos/pancake.jpg" alt="zdjęcie">
    </div>
    <div class="gallery_right">
      <img class="gallery_right-image" src="img/photos/pancake3.jpg" alt="zdjęcie">
      <img class="gallery_right-image2" src="img/photos/pancake2.jpg" alt="zdjęcie">
    </div>
  </div>
</section> -->

<!--Comments-->
<section>
  <?php comments_template(); ?>
</section>

<?php get_footer(); ?>