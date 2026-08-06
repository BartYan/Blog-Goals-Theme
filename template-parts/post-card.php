<!--POST CARD-->
<a id="post-<?php the_ID(); ?>" class="card_box card_box-link" href="<?php the_permalink(); ?>">

  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail('post-thumbnail', ['class' => 'card_box-img']); ?>
  <?php endif; ?>

  <h5 class="card_box-title">
    <?php the_title(); ?>
  </h5>

  <p class="card_box-text desktop"><?php the_excerpt_max_charlength(80); ?></p>

</a>
<!--POST CARD THE END-->