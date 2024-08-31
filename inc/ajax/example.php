<?php

add_action( 'wp_ajax_nopriv_filter', 'filter_ajax' );
add_action( 'wp_ajax_filter', 'filter_ajax' );

function filter_ajax() {

    $category = $_POST['category'];

    $args = array(
        'post_type' => 'recipes',
        'posts_per_page' => -1
      );
      
    //This is working for normal posts types
    //   if(isset($category)) {
    //       $args['category__in'] = array($category);
    //   }

    if(!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'meal-type',
                'field'    => 'term_id',
                'terms'    => $category ,
            ),
        );
    }

      $query = new WP_Query($args);
    ?>

    <?php if($query->have_posts()) :?>
    <?php while ($query->have_posts()) : $query->the_post(); ?>

    <!--RECIPE CARD-->
    <!-- <php include 'C:\wamp64\www\wordpress\WyprawiamDobre\wp-content\themes\WyprawiamDobre\recipe-card.php';?> -->
    <!-- <php include 'https://wyprawiamdobre.pl/wp-content/themes/WyprawiamDobre/recipe-card.php';?> -->
    <?php include("recipe-card.php"); ?>
    <!--THE END of wordpress loop-->
    <?php endwhile; ?>
    <?php endif; ?>
    
    <?php
      wp_reset_postdata();

    die();
}

?>