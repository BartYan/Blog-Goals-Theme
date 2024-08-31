<?php get_header('center'); ?>

<?php the_post(); ?>

<!--WELCOME SECTION-->
<section class="section-post section-single-post">

  <!-- Left box -->
  <div class="leftBox">
    <div class="leftBox_item noprint">
      <img class="leftBox_item-img" src="<?php echo get_field('pierwsze_zdjecie') ['url'] ?>" alt="">
    </div>
  </div>

  <!-- right box -->
  <div class="infoBoxPost">
    <div class="iconSet title_desktop">
      <a class="print" href="javascript:window.print()">
        Drukuj Przepis
      </a>
    </div>

    <div class="section_title title_desktop">
      <h1 class="section_title-head"><?php the_title(); ?></h1>
      <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
        alt="ikonka gwiazdek">
      <div class="iconSet_box">
        <div class="iconSet_box-iconBox">
          <img class="iconSet_icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_chef.svg"
            alt="kategoria">
          <span class="iconSet_txt"><?php printDishCategories($post->ID) ?></span>
        </div>
        <div class="iconSet_box-iconBox">
          <img class="iconSet_icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_clock.svg"
            alt="czas">
          <span class="iconSet_txt">
            <?php the_field('czas'); ?>
          </span>
        </div>
        <div class="iconSet_box-iconBox">
          <img class="iconSet_icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_calories.svg"
            alt="kalorie">
          <span class="iconSet_txt">
            <?php the_field('kalorie'); ?>
          </span>
        </div>
      </div>
      <article class="infoBoxPost_description">
        <h4>Słowem wstępu</h4>
        <?php the_content(); ?>
      </article>
    </div>
  </div>
</section>

<!-- CONTENT -->
<section class="section-post section-single-post mt-1">
  <div class="leftBox">
    <div class="leftBox_item leftBox_itemColor">
      <h5 class="leftBox_itemColor-head">Składniki</h5>
      <?php if( have_rows('skladniki_potrawy') ): ?>
      <ul class="leftBox_itemColor-list">
        <?php while( have_rows('skladniki_potrawy') ): the_row(); ?>
        <li><?php the_sub_field('skladnik_potrawy'); ?></li>
        <?php endwhile; ?>
      </ul>
      <?php endif; ?>
    </div>
  </div>

  <article class="infoBoxPost">
    <div class="infoBoxPost_content">
      <?php the_field('przepis'); ?>
    </div>
    
  </article>

</section>

<!--Gallery-->
<section class="section-single-post">
  <div class="gallery">
    <div>
      <img class="gallery-image" src="<?php echo get_field('galeria_jeden') ['url'] ?>" alt="zdjęcie potrawy">
    </div>
    <div>
       <img class="gallery-image" src="<?php echo get_field('galeria_dwa') ['url'] ?>" alt="zdjęcie potrawy">
    </div>
    <div>
      <img class="gallery-image" src="<?php echo get_field('galeria_trzy') ['url'] ?>" alt="zdjęcie potrawy">
    </div>
     
      
  </div>
</section>

<!--Comments-->
<section class="noprint section-single-post">
  <?php comments_template(); ?>
</section>

<?php include("sections.php"); ?>

<?php get_footer(); ?>