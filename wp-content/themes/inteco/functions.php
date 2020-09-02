<?php
define("THEME_URL", get_template_directory_uri());
function theme_setting()
{
    $defaults = array(
        'flex-height' => true,
        'flex-width' => true,
    );
    add_theme_support('custom-logo', $defaults);
    add_theme_support('post-thumbnails');
    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(
        array(
            'primary' => 'Primary',
            'social' => 'Social Links Menu',
        )
    );
    /*
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
        )
    );
}

add_action('after_setup_theme', 'theme_setting');
function AddBodyClass($classes)
{
    global $post;
    $suffix = '-ph';
    if (is_home()) {
        $classes[] = 'home' . $suffix;
    }
    if (is_page()) {
        if (in_array($post->post_name, array('dang-nhap', 'dang-ky'))) {
            $classes[] = 'account' . $suffix;
        }
        if ($post->post_name === 'shop') {
            $classes[] = 'product' . $suffix;
        } else {
            $classes[] = $post->post_name . $suffix;
        }
    }
    if (is_singular('product')) {
        $classes[] = 'product' . $suffix;
    }
    return $classes;
}

add_filter('body_class', 'AddBodyClass');
function my_custom_sidebar()
{
    register_sidebar(
        array(
            'name' => __('Slide Bar Blog', 'your-theme-domain'),
            'id' => 'custom-side-bar',
            'description' => __('Custom Sidebar', 'your-theme-domain'),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
    register_sidebar(
        array(
            'name' => __('Slide Bar Search', 'your-theme-domain'),
            'id' => 'custom-side-bar-1',
            'description' => __('Custom Sidebar Search', 'your-theme-domain'),
            'before_widget' => '<div class="widget-content">',
            'after_widget' => "</div>",
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'my_custom_sidebar');
function create_shortcode()
{
    echo "    <div class=\"share-button\">
                    <a target=\"_blank\" class=\"facebook\"
                       href=\"https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&text=<?php the_title(); ?>\">
                        <i class=\"fa fa-facebook-square\"></i>
                    </a>
                    <!-- Google+ -->
                    <a class=\"google\" href=\"https://plus.google.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>\"
                       target=\"_blank\"><i class=\"fab fa-google-plus\"></i></a>
                    <!-- Pinterest -->
                    <a class=\"pinterest\" href=\"javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());\"><i
                                class=\"fa fa-pinterest\"></i></a>
                </div>";
}

add_shortcode('share-social', 'create_shortcode');
function search_filter($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if ($query->is_search) {
            $query->set('paged', (get_query_var('paged')) ? get_query_var('paged') : 1);
            $query->set('posts_per_page', 1);
        }
    }
}