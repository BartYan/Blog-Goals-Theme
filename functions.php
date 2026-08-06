<?php

// remove admin bar spaces 
add_action('get_header', 'my_filter_head');

function my_filter_head()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}

//if search input is empty show all posts https://wordpress.stackexchange.com/questions/29516/
if (!is_admin()) {
    add_action('init', 'search_query_fix');
}
function search_query_fix()
{
    if (isset($_GET['s']) && $_GET['s'] == '') {
        $_GET['s'] = 'brak wpisów';
    }
}


if (!defined('BLOGGOALS_THEME_DIR')) {
    define('BLOGGOALS_THEME_DIR', get_theme_root() . '/' . get_template() . '/');
}

if (!defined('BLOGGOALS_THEME_URL')) {
    define('BLOGGOALS_THEME_URL', WP_CONTENT_URL . '/themes/' . get_template() . '/');
}

//check in posttypes.php - function create_posttype()
require_once BLOGGOALS_THEME_DIR . 'libs/posttypes.php';
require_once BLOGGOALS_THEME_DIR . 'libs/utils.php';

add_theme_support('post-formats', array('gallery'));
add_theme_support('post-thumbnails');

//Menu Register
if (function_exists('register_nav_menus')) {
    register_nav_menus(array(
        'main_nav' => 'Main Menu',
    ));
}
//Menu Register THE END

add_theme_support('html5', array('search-form'));


//COMMENTS FUNCTION
function bloggoals_comment_theme($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;

    $tag = $args['style'];
?>

    <?php echo $tag ?> <?php comment_class(empty($args['has_children']) ? '' : 'parent') ?>
    id="li-comment-<?php comment_ID() ?>">
    <div id="div-comment-<?php comment_ID(); ?>" class="inner">
        <?php echo get_avatar($comment); ?>
        <h4>
            <?php echo get_comment_author_link(); ?>
            <?php echo 'w dniu ' . get_comment_date() . 'o' . get_comment_time() ?>
            <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
        </h4>
        <?php comment_text(); ?>

        <?php if ($comment->comment_approved == '0') : ?>
            <div class="comment-awaiting-moderation">Twój komentarz oczekuje na moderację!</div>
        <?php endif; ?>
    </div>
<?php
}



//OPTION PAGE for acf
if (function_exists('acf_add_options_page')) {

    acf_add_options_page();
}
if (function_exists('acf_set_options_page_title')) {
    acf_set_options_page_title(__('Theme Options'));
}

// allow svg in media
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


@ini_set('upload_max_filesize', '64M');
@ini_set('post_max_size', '64M');
@ini_set('memory_limit', '256M');
@ini_set('max_execution_time', '300');
@ini_set('max_input_time', '300');


?>