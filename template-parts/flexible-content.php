<?php if (have_rows('flexible_content')): ?>
    <?php while (have_rows('flexible_content')) : the_row(); ?>

        <?php if (get_row_layout() == 'hero'): ?>
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
                            <h1 class="h1-title"><?php echo $heroTitle; ?></h1>
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

        <?php elseif (get_row_layout() == 'highlight_overlay'): ?>
            <?php
            $highlightbgImage = get_sub_field('background_image');
            $highlightbgColor = get_sub_field('overlay_color');
            $highlightTitle = get_sub_field('title');
            $highlightDesc = get_sub_field('description');
            $highlightColor = get_sub_field('text_color');
            $highlightLink = get_sub_field('button');
            ?>
            <section class="section__full hero highlight-overlay" style="background-image: url('<?php echo $highlightbgImage['url'] ?>');background-color:<?php echo $highlightbgColor; ?>;color: <?php echo $highlightColor; ?>!important;">
                <span class="highlight-overlay__span" style="background-color:<?php echo $highlightbgColor; ?>;"></span>
                <div class="hero__content">
                    <div class="hero__content-read">
                        <?php if (!empty($highlightTitle)) : ?>
                            <h2 class="section__title"><?php echo $highlightTitle; ?></h2>
                        <?php endif; ?>

                        <?php if (!empty($highlightDesc)) : ?>
                            <p class="hero-desc"><?php echo $highlightDesc; ?></p>
                        <?php endif; ?>

                        <?php if (!empty($highlightLink['url']) && !empty($highlightLink['title'])) : ?>
                            <a href="<?php echo $highlightLink['url']; ?>" class="hero-button button" target="<?php echo $highlightLink['target']; ?>"><?php echo $highlightLink['title']; ?></a>
                        <?php endif; ?>
                    </div>
                    <div class="hero__content-img">

                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'image_and_text'): ?>
            <?php
            $imgtxtImage = get_sub_field('image');
            $imgtxtBgColor = get_sub_field('background_color');
            $imgtxtTitle = get_sub_field('title');
            $imgtxtDesc = get_sub_field('description');
            $imgtxtColor = get_sub_field('text_color');
            $imgtxtLink = get_sub_field('button');
            ?>
            <section class="section__full imgtxt" style="background-color:<?php echo $imgtxtBgColor; ?>;color: <?php echo $imgtxtColor; ?>!important; ">
                <div class="imgtxt__content">
                    <div class="imgtxt__content-image">
                        <?php if (!empty($imgtxtImage)) : ?>
                            <img class="imgtxt__content-image--img" src="<?php echo esc_url($imgtxtImage['url']); ?>" alt="<?php echo esc_attr($imgtxtImage['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="imgtxt__content-read">
                        <?php if (!empty($imgtxtTitle)) : ?>
                            <h3 class="section__title"><?php echo $imgtxtTitle; ?></h3>
                        <?php endif; ?>

                        <?php if (!empty($imgtxtDesc)) : ?>
                            <p class="imgtxt-desc"><?php echo $imgtxtDesc; ?></p>
                        <?php endif; ?>

                        <?php if (!empty($imgtxtLink['url']) && !empty($imgtxtLink['title'])) : ?>
                            <a href="<?php echo $imgtxtLink['url']; ?>" class="imgtxt-button button" target="<?php echo $imgtxtLink['target']; ?>"><?php echo $imgtxtLink['title']; ?></a>
                        <?php endif; ?>
                    </div>

                </div>
            </section>

        <?php elseif (get_row_layout() == 'large_text_banner'): ?>
            <?php
            $ltbBgColor = get_sub_field('background_color');
            $ltbTitle = get_sub_field('title');
            $ltbSmallText = get_sub_field('small_text');
            $ltbTextColor = get_sub_field('text_color');
            ?>
            <section class="section__full ltb" style="background-color:<?php echo $ltbBgColor; ?>;color: <?php echo $ltbTextColor; ?>!important; ">
                <div class="ltb__content">
                    <div class="ltb__content-read">
                        <?php if (!empty($ltbSmallText)) : ?>
                            <p class="ltb__small-text"><?php echo $ltbSmallText; ?></p>
                        <?php endif; ?>

                        <?php if (!empty($ltbTitle)) : ?>
                            <h2 class="h2-title"><?php echo $ltbTitle; ?></h2>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'section_title'): ?>
            <?php
            $section_title = get_sub_field('title_section');
            ?>
            <section class="section__full ">
                <h2 class="section__title text-center">
                    <?php echo $section_title; ?>
                </h2>
            </section>

        <?php elseif (get_row_layout() == 'cards_section'): ?>
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

        <?php elseif (get_row_layout() == 'icon_cards_section'): ?>
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

        <?php elseif (get_row_layout() == 'subject_posts_section'): ?>
            <?php
            $subjectPosts = get_sub_field('subject_posts');
            ?>
            <section class="section__full postcards">
                <div class="postcards__content">
                    <?php if ($subjectPosts): ?>
                        <?php foreach ($subjectPosts as $post): ?>
                            <?php $heroImage = get_field('hero_img', $post->ID); ?>

                            <div class="postcard">
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
                            </div>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>

        <?php elseif (get_row_layout() == 'blog_posts_section'): ?>
            <?php
            $checkBlogPosts = get_sub_field('blog_posts');

            $blogPosts = get_posts(array(
                'posts_per_page' => 4,
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
            ));
            ?>
            <section class="section__full postcards">
                <div class="postcards__content">
                    <?php if ($checkBlogPosts && $blogPosts): ?>

                        <?php foreach ($blogPosts as $post): ?>
                            <?php $heroImage = get_field('hero_img', $post->ID); ?>

                            <div class="postcard">
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
                                        $tags = get_the_terms($post->ID, 'post_tag'); // Pobieranie tagów z domyślnej taksonomii 'post_tag'
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
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                </div>
            </section>


        <?php elseif (get_row_layout() == 'half_and_half'): ?>
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
