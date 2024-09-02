<!Doctype html>
<html <?php language_attributes(); ?>>

<head>
  <!-- Required meta tags -->
  <meta charset="<?php bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <?php if(is_search()): ?>
    <meta name="robots" content="noindex, nofollow"/>
  <?php endif; ?>

  <!-- SLICK -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick-1.8.1/slick/slick.css" />
  <!-- Add the new slick-theme.css if you want the default styling -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/slick-1.8.1/slick/slick-theme.css" />

  <!--CSS -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?21">
  
  <!--FONTS-->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;1,400&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600&display=swap" rel="stylesheet">

  <title>Blog Goals!</title>

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="description" content="" />
  <meta name="keywords"
    content="" />

  <link rel="pingback" href="<?php bloginfo('pingback_url') ?>">


  <?php wp_head() ?>

</head>

<body style="position: relative" <?php body_class() ?>>
  <!--HEADER SECTION-->
  <header>
    <nav class="nav">
      <!-- <div class="nav_hamburger">
        <span></span>
      </div> -->
      <!--THE OVERLAY-->
      <!-- <div id="overlay_menu" class="nav_overlay">
        <div class="nav_overlay-white">
          <div class="nav_overlay-content">
            <php wp_nav_menu(array(
              'name' => 'Menu Główne'
            )); ?>
            <div class="nav_overlay-content--social">
              <a href="https://www.facebook.com/wyprawiamdobre" class="social_menu-link" target="_blank">
                <span class="facebook_circle-icon social_menu-link--icon"></span>
              </a>
              <a href="https://www.instagram.com/wyprawiamdobre/" class="social_menu-link" target="_blank">
                <span class="insta_circle-icon social_menu-link--icon"></span>
              </a>
            </div>
          </div>
        </div>
      </div> -->

      <!--DESKTOP NAV-->
      <div class="nav__logo">
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
      </div>
      <div class="nav__items">
          <?php wp_nav_menu(array(
              'theme_location' => 'main_nav',
          )); ?>
          <!-- <php wp_nav_menu(array(
            'name' => 'Menu Główne'
          )); ?> -->
      </div>

    </nav>
  </header>