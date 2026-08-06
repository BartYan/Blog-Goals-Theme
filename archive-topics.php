<?php get_header('center'); ?>

<!-- Ogłoszenia z rynku pierwotnego -->
<section class="section__full section__posts">
  <h2 class="section__title h2-title text-center">
    BLOG
  </h2>
  <!-- <div class="section__desc text-center">Ogłoszenia z rynku</div> -->
</section>
<section class="section__full postcards">
  <div class="postcards__content">
    <?php
    $args = [
      'post_type'      => 'topics',
      'post_status'    => 'publish'
    ];

    $latestPosts = new WP_Query($args);
    ?>

    <?php if ($latestPosts->have_posts()): ?>
      <?php while ($latestPosts->have_posts()): $latestPosts->the_post(); ?>
        <?php
        $heroImage = get_field('hero_img');
        ?>

        <a href="<?php the_permalink(); ?>" class="postcard">
          <?php if (!empty($heroImage)): ?>
            <div class="postcard__left">
              <img class="postcard__img" src="<?php echo esc_url($heroImage['url']); ?>" alt="<?php echo esc_attr($heroImage['alt']); ?>">
            </div>
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
                    <li class="postcard__tag"><?php echo $tag->name; ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </a>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>