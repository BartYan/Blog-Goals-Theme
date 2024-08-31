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
    <strong>Z tej strony Julka i Bartek 🤗 Bardzo nam miło, że się tu znalazłeś!</strong>
    <br/>Jesteśmy parą z Krakowa, która lubi mieszać i kombinować w kuchni. Jednocześnie świetnie się bawimy realizując swoje pomysły. Skąd wzięła się idea bloga i jak to wszystko się zaczęło? 

    </p>
    <p class="infoBox_top-description">
    Od początku naszej znajomości, chcąc zaimponować sobie nawzajem, zaczęliśmy przyrządzać różne smaczne rzeczy i tak już pozostało. 
    Julkę zawsze ciągnęło do garów, co popchnęło ją do magistra technologii żywności i mimo, że nie pracuje w zawodzie, gotowanie sprawia jej dużą satysfakcję. A przy tym wie też co z czym i dlaczego 🧐
    Bartek natomiast jako web developer, troszczy się o kwestie techniczne naszej strony, często wyprawiając Julce coś dobrego 👩‍🍳🤩
    </p>
    <p class="infoBox_top-description">
    <strong>Zapraszamy Cię do wspólnej przygody</strong>, dzięki której, razem będziemy odkrywać świat od kuchni. Dodatkowo oprócz smacznych przepisów, postaramy się przygotować mnóstwo wybornego kontentu 
    <a href="https://wyprawiamdobre.pl/newsletter">(koniecznie zajrzyj tutaj)!</a>
    </p>
  </div>
  <div class="infoBox_bottom">
  <ul class="infoBox_bottom_social">
      <!-- <li class="infoBox_bottom_social-item">
        <a class="infoBox_bottom_social-link" href="https://www.tastewithit.com" target="_blank">
          <img class="infoBox_bottom_social-facebook" src="<?php echo get_stylesheet_directory_uri() ?>/img/uk-large.png" alt="uk">
        </a>
      </li> -->
      <li class="infoBox_bottom_social-item">
        <a class="infoBox_bottom_social-link" href="https://www.facebook.com/wyprawiamdobre" target="_blank">
          <img class="infoBox_bottom_social-facebook" src="<?php echo get_stylesheet_directory_uri() ?>/img/facebook_menu.svg" alt="facebook">
        </a>
      </li>
      <li class="infoBox_bottom_social-item">
        <a class="infoBox_bottom_social-link" href="https://www.instagram.com/wyprawiamdobre/" target="_blank">
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

<?php include("sections.php"); ?>

<?php get_footer(); ?>