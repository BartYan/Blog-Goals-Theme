<!--RECIPE CARD-->
<!-- <div id="recipes-<?php the_ID(); ?>" <?php post_class('card_box'); ?>> -->
  <a id="recipes-<?php the_ID(); ?>" class="card_box card_box-link <?php echo (has_term('wege', 'meal-type') || has_term('vegan', 'meal-type')) ? 'card_box-link--veg' : ''; ?>" href="<?php the_permalink(); ?>">

    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card_box-img']); ?>    
    
    <h5 class="card_box-title">
      <?php the_title(); ?>
    </h5>

    <!-- dish category -->
    <div class="card_box-icons">
      <!-- meal category -->
      <div class="card_box-icons--box">
        <img class="card_box-icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_chef.svg"
          alt="kategoria">
        <div class="card_box-iconTxt card_box-iconTxt--cat">
          <?php printDishCategories($post->ID) ?>
        </div>
      </div>
      <!-- preparation time -->
      <div class="card_box-icons--box">
        <img class="card_box-icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_clock.svg" alt="czas">
        <span class="card_box-iconTxt">
          <?php the_field('czas'); ?>
        </span>
      </div>
      <!-- calories -->
      <div class="card_box-icons--box">
        <img class="card_box-icon" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_calories.svg"
          alt="kalorie">
        <span class="card_box-iconTxt">
          <?php the_field('kalorie'); ?>
        </span>
      </div>
    </div>
    <p class="card_box-text desktop"><?php the_excerpt_max_charlength(80); ?></p>
  
  <?php
    if(has_term( 'wege', 'meal-type' ) || has_term( 'vegan', 'meal-type' )){
  ?>
    <span class="card_box-veg">
      <img class="" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/singleleaf-small.svg"
      alt="danie wege">
    </span>
  <?php } ?>
    <div class="card_box-button">zobacz przepis <i class="card_box-button--arrow"
      aria-hidden="true">&#8594</i>
    </div>
  </a>

<!-- </div> -->
<!--RECIPE CARD THE END-->