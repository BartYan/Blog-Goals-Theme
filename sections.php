<!--RECIPES SECTION-->
<section class="cards_section">
  <div class="section_title">
    <span class="section_title-span">Nasze</span>
    <h2 class="section_title-head">Przepisy</h2>
    <img class="section_title-stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg"
      alt="ikonka gwiazdek">
  </div>


  <div class="cards mobile-flex">
    <?php 
      $args = array(
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'post_type' => 'recipes',
        // 'orderby' => 'rand',
        'orderby' => 'post_date',
    );
    query_posts( $args );
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

    <!--RECIPE CARD-->
    <?php include 'recipe-card.php';?>

    <!--THE END of wordpress loop-->
    <?php endwhile; ?>
    <?php endif; ?>

    <a href="https://wyprawiamdobre.pl/recipes" class="cards-button">
      zobacz wszystkie
    </a>
  </div>
  <div class="cards desktop-flex">
    <?php 
      $args = array(
        'posts_per_page' => 4,
        'post_status' => 'publish',
        'post_type' => 'recipes',
        'orderby' => 'rand',
        // 'orderby' => 'post_date',
    );
    query_posts( $args );
    if (have_posts()) :
        while (have_posts()) : the_post();
    ?>

    <!--RECIPE CARD-->
    <?php include 'recipe-card.php';?>

    <!--THE END of wordpress loop-->
    <?php endwhile; ?>
    <?php endif; ?>

    <a href="https://wyprawiamdobre.pl/recipes" class="cards-button">
      zobacz wszystkie
    </a>
  </div>

  <img class="leaf-left" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_left.svg" alt="leaf icon">
  <img class="leaf-right" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/leaf_right.svg" alt="leaf icon">
</section>

<!--NEWSLETTER SECTION-->
<section id="newsletter" class="section">
  <div class="infoBox infoBox_newsLetter">
    <div class="infoBox_top">
      <div class="section_title">
        <span class="section_title-span">Załap się na</span>
        <h1 class="section_title-head">Małe co nieco!</h1>
      </div>
      <h5 class="infoBox_top-description">
        <strong>Dziękujemy, że jesteś tu razem z nami!</strong>
      </h5>
      <p class="infoBox_top-description">
        Wyprawiaj Dobre i&nbsp;spraw by gotowanie stało się Twoją odskocznią od codziennych trosk!
        <a href="https://wyprawiamdobre.pl/newsletter">KLIKNIJ TUTAJ</a> i&nbsp;zobacz więcej o&nbsp;tym co znajdziesz w&nbsp;naszym Newsletterze&nbsp;☺️
      </p>
      <p class="infoBox_top-description">
      Dzielimy się w nim naszą wiedzą od kuchni -  przemyśleniami nie tylko kulinarnymi, ale też związanymi 
      z prowadzeniem bloga, strony www i social mediów!
      Skutkuje to świetną zabawą i zaskakującymi doświadczeniami! 😍
      </p>
      <p class="infoBox_top-description">
      Zobacz sam i <strong>Wyprawiaj Dobre</strong> razem z nami! ☺️
      <br/><button class="cta cta-news">Dołączam Wyprawiać Dobre</button>
      </p>
    </div>
    <div class="infoBox_bottom">
      <img class="infoBox_bottom-img" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/orange.svg"
        alt="ikonka pomarańczy">
    </div>
  </div>
  <div class="patternBox patternNewsletter">
    <div class="patternBox_white">
      <div class="patternBox_white-items">
        <!-- <img class="image" src="<php echo get_stylesheet_directory_uri() ?>/img/photos/news.jpg"
          alt="newsletter"> -->
        <img class="image image-news" src="<?php echo get_stylesheet_directory_uri() ?>/img/photos/news.png"
          alt="obrazek koperty z przepisami">
        <!-- <img class="image image-news" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/newsletter.svg"
          alt="obrazek koperty z przepisami"> -->
        <img class="stars" src="<?php echo get_stylesheet_directory_uri() ?>/img/svg/icon_stars.svg" alt="ikonka gwiazdek">
        <h4 class="blogTitle">newsletter</h4>
      </div>
    </div>
  </div>
</section>