<?php
/** 
* Template Name: Home Page
*/
?>
<?php get_header(); ?>

<div class="wrapper">
  <?php if( have_rows('flexible_content') ): ?>
      <?php while ( have_rows('flexible_content') ) : the_row(); ?>

            <?php if( get_row_layout() == 'hero' ): ?>
              <?php 
                $bgImage = get_sub_field('background_image');
                $bgColor = get_sub_field('background_color');
                $heroTitle = get_sub_field('title');
                $heroDesc = get_sub_field('description');
                $textColor = get_sub_field('text_color');
                $heroLink = get_sub_field('button');
              ?>
              <section class="section__full hero" style="background-image: url('<?php echo $bgImage['url'] ?>');background-color:<?php echo $bgColor; ?>;color: <?php echo $textColor; ?>!important; ">
                  <div class="hero__content">
                      <div class="hero__content-read">
                        <?php if (!empty($heroTitle)) : ?>
                            <h1 class="hero-title"><?php echo $heroTitle; ?></h1>
                        <?php endif; ?>

                        <?php if (!empty($heroDesc)) : ?>
                            <p class="hero-desc"><?php echo $heroDesc; ?></p>
                        <?php endif; ?>

                        <?php if (!empty($heroLink['url']) && !empty($heroLink['title'])) : ?>
                            <a href="<?php echo $heroLink['url']; ?>" class="hero-button button" target="<?php echo $heroLink['target']; ?>"><?php echo $heroLink['title']; ?></a>
                        <?php endif; ?>
                      </div>
                      <div class="hero__content-img">
                            
                      </div>
                  </div>
              </section>

            <?php elseif( get_row_layout() == 'section_title' ): ?>
              <?php 
                $section_title = get_sub_field('title_section');
              ?>
              <section class="section__full ">
                <h2 class="section__title text-center">
                    <?php echo $section_title; ?>
                </h2>
              </section>

            <?php elseif( get_row_layout() == 'cards_section' ): ?>
              <?php 
                $cards = get_sub_field('cards');
              ?>
              <section class="section__full cards" style="">
                  <div class="cards__content">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $card): ?>
                            <div class="card">
                                <?php if (!empty($card['title'])): ?>
                                    <h2 class="card__title"><?php echo esc_html($card['title']); ?></h2>
                                <?php endif; ?>
                                <?php if (!empty($card['image'])): ?>
                                    <a href="<?php echo esc_url($card['button']['url']); ?>" class="card__image">
                                        <img src="<?php echo esc_url($card['image']['url']); ?>" alt="<?php echo esc_attr($card['image']['alt']); ?>">
                                    </a>
                                <?php endif; ?>
                               
                                <?php if (!empty($card['desc'])): ?>
                                    <p class="card__desc"><?php echo esc_html($card['desc']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($card['button'])): ?>
                                    <a href="<?php echo esc_url($card['button']['url']); ?>" class="button button-filled card__button"><?php echo esc_html($card['button']['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
              </section>
              
            <?php elseif( get_row_layout() == 'icon_cards_section' ): ?>
              <?php 
                $cards = get_sub_field('cards');
              ?>
              <section class="section__full cards cards-icons">
                  <div class="cards__content">
                    <?php if ($cards): ?>
                        <?php foreach ($cards as $card): ?>
                            <div class="card">
                                <?php if (!empty($card['image'])): ?>
                                    <div class="card__image">
                                        <img src="<?php echo esc_url($card['image']['url']); ?>" alt="<?php echo esc_attr($card['image']['alt']); ?>">
                                    </div>
                                <?php endif; ?>
                                <div class="card__content">
                                    <?php if (!empty($card['title'])): ?>
                                        <h2 class="card__title"><?php echo esc_html($card['title']); ?></h2>
                                    <?php endif; ?>
                                    <?php if (!empty($card['desc'])): ?>
                                        <p class="card__desc"><?php echo esc_html($card['desc']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <?php if (!empty($card['button'])): ?>
                                    <a href="<?php echo esc_url($card['button']['url']); ?>" class="button button-filled card__button"><?php echo esc_html($card['button']['title']); ?></a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
              </section>
              
            <?php elseif( get_row_layout() == 'subject__posts_section' ): ?>
              <?php 
                $subjectPosts = get_sub_field('subject_posts');
              ?>
              <section class="section__full postcards" style="">
                  <div class="postcards__content">
                    <?php if ($subjectPosts): ?>
                        <?php foreach ($subjectPosts as $post): ?>
                            <!-- <?php var_dump($post); ?> -->
                            <?php $heroImage = get_field('hero_img', $post->ID); ?>
                            <!-- <?php var_dump($heroImage); ?> -->
                            
                            <div class="postcard">
                                <?php if (!empty($heroImage)): ?>
                                    <img class="postcard__img" src="<?php echo esc_url($heroImage['url']); ?>" alt="<?php echo esc_attr($heroImage['alt']); ?>">
                                <?php endif; ?>
                                <div class="postcard__content">
                                    <div class="postcard__content-text">
                                        <?php if (!empty($post->post_title)): ?>
                                            <h2 class="postcard__title"><?php echo $post->post_title; ?></h2>
                                        <?php endif; ?>
                                        <?php if (!empty($post->post_excerpt)): ?>
                                            <p class="postcard__desc"><?php echo $post->post_excerpt; ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="postcard__content-tags">
                                        <?php 
                                        $tags = get_the_terms($post->ID, 'topic-type');
                                        if ($tags && !is_wp_error($tags)): ?>
                                            <ul>
                                                <?php foreach ($tags as $tag): ?>
                                                    <li class="postcard__tag"><?php echo esc_html($tag->name); ?></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
              </section>

            
            <?php elseif( get_row_layout() == 'half_and_half' ): ?>
              <?php
                $halfLayout = get_sub_field('layout_position');
                $halfImage = get_sub_field('image');
                $halfTitle = get_sub_field('title');
                $halfDesc = get_sub_field('description');
                $halfbutton = get_sub_field('button');
                $halfAlign = get_sub_field('text_position');
              ?>
              <section class="section__full halves <?php echo $halfLayout; ?>" style="">
                  <div class="halves__content">
                        <div class="halves__content-image" style="background-image: url('<?php echo $halfImage['url'] ?>');">
                            <!-- <img src="<php echo esc_url($halfImage['url']); ?>" alt="<php echo esc_attr($halfImage['alt']); ?>"> -->
                        </div>
                        <div class="halves__content-read <?php echo $halfAlign; ?>">
                            <div class="halves__content-read--box">
                            <?php if (!empty($halfTitle)) : ?>
                                <h2 class="halves-title"><?php echo $halfTitle; ?></h2>
                            <?php endif; ?>

                            <?php if (!empty($halfDesc)) : ?>
                                <p class="halves-desc"><?php echo $halfDesc; ?></p>
                            <?php endif; ?>

                            <?php if (!empty($halfbutton['url']) && !empty($halfbutton['title'])) : ?>
                                <a href="<?php echo $halfbutton['url']; ?>" class="halves-button button button-filled" target="<?php echo $halfbutton['target']; ?>"><?php echo $halfbutton['title']; ?></a>
                            <?php endif; ?>
                            </div>
                        </div>
                  </div>
              </section>

          <?php endif; ?>

      <?php endwhile; ?>
  <?php endif; ?>
</div>

<?php get_footer(); ?>