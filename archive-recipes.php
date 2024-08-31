<?php get_header('center'); ?>

<!--TOP LEAFs DECORATION-->
<img class="leaf-left--nav" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_left.svg" alt="leaf icon">

<!--RECIPES SECTION-->
<section class="cards_section">
  <div class="section_title">
    <span class="section_title-span">Nasze</span>
    <h2 class="section_title-head">Przepisy</h2>
    <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
  </div>

  <div class="infoBox_leftCenter">

    <label for="search" class="input_container-label">Wpisz frazę która Cię interesuje:</label>
    <?php get_search_form(); ?>
    <p class="description_leftCenter">
      Nasze propozycje:
    </p>
  </div>

  <!--AJAX FILTER-->
  <div id="filter">
    <nav>
      <ul>
        <li class="filter_item">
          <button class="filter_item-link tag-active">
            Wszystkie
          </button>
        </li>
        <?php
        $cat_args = array(
          'exclude' => array(1),
          'taxonomy' => 'meal-type',
          'option_all' => 'All'
        );
        $categories = get_categories($cat_args);
        foreach($categories as $cat) : ?>
        <li class="filter_item">
          <button class="filter_item-link" 
            data-category="<?= $cat->term_id; ?>">
            <?= $cat->name; ?>
        </button>
        </li>
      <?php endforeach; ?>
      </ul>
    </nav>
  </div>
  <!-- <div id="filter">
    <nav>
      <ul>
        <li class="filter_item"><a class="filter_item-link tag-active" href="">Wszystkie</a></li>
        <php
      $cat_args = array(
        'exclude' => array(1),
        'taxonomy' => 'meal-type',
        'option_all' => 'All'
      );

      $categories = get_categories($cat_args);
      foreach($categories as $cat) : ?>
        <li class="filter_item"><a class="filter_item-link" data-category="<= $cat->term_id; ?>"
            href="<= get_category_link($cat->term_id); ?>"><= $cat->name; ?></a></li>
        <php endforeach; ?>
      </ul>
    </nav>
  </div> -->

  <div class="js-filter posts_row">
    <?php

      $args = array(
        'post_type' => 'recipes',
        'posts_per_page' => -1
      );

      $query = new WP_Query($args);
      wp_reset_postdata();
      ?>

    <?php if($query->have_posts()) : ?>
    <?php  while($query->have_posts()) : $query->the_post();?>

    <!--RECIPE CARD-->
    <?php include 'recipe-card.php';?>

    <?php endwhile; ?>
    <?php endif; ?>

  </div>
  <!--AJAX FILTER THE END-->

  <!--BOTTOM LEAFs DECORATION-->
  <img class="leaf-right" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_right.svg" alt="leaf icon">

</section>
<!--RECIPE SECTION THE END-->

<?php get_footer(); ?>