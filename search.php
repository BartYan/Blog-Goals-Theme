<?php get_header('center'); ?>
<!--TOP LEAFs DECORATION-->
<img class="leaf-left--nav" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_left.svg" alt="leaf icon">
<!--RECIPES SECTION-->
<section class="cards_section">
  <!-- Title loop -->
  <?php
      $query_params = getQueryParams();
      if(isset($query_params['search'])) {
      $query_params['post_title_like'] = $query_params['search'];
      unset($query_params['search']);
      }

      $loop = new WP_Query($query_params);
	?>

  <div class="section_title">
    <!-- with posts -->
    <?php if($loop->have_posts()) :?>
    <span class="section_title-span">Znalezione.</span>
    <h2 class="section_title-head">Wiesz co Dobre!</h2>
    <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
    <!-- without posts -->
    <?php else:  ?>
    <span class="section_title-span">Ups...</span>
    <h2 class="section_title-head">Brak wpisów</h2>
    <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
    <?php endif; ?>
    <!-- Title loop the end-->
  </div>

  <div class="infoBox_leftCenter">
    <label for="search" class="input_container-label">Masz na coś jeszcze ochotę?</label>
    <?php get_search_form(); ?>
    <p class="description_leftCenter">
      Wyniki wyszukiwania dla: <span><strong><?php echo get_search_query() ?></strong></span>
    </p>
  </div>

  <!--search php-->
  <?php
      $query_params = getQueryParams();
      if(isset($query_params['search'])) {
      $query_params['post_title_like'] = $query_params['search'];
      unset($query_params['search']);
      }

      $loop = new WP_Query($query_params);
	?>

  <!--posts_row-->
  <div class="posts_row">

    <?php if($loop->have_posts()) :?>
    <?php while ($loop->have_posts()) : $loop->the_post(); ?>

    <!--RECIPE CARD-->
    <?php include 'recipe-card.php';?>

    <!--THE END of wordpress loop-->
    <?php endwhile; ?>
    <?php else:  ?>
    <h4>Niestety nie znaleźliśmy postów<h4>
        <?php endif; ?>
  </div>
  <!--posts_row THE END-->

  <!--BOTTOM LEAFs DECORATION-->
  <img class="leaf-right" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_right.svg" alt="leaf icon">
</section>
<!--RECIPE SECTION THE END-->

<?php get_footer(); ?>