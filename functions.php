<?php
@define(ThemePath, esc_url(get_template_directory_uri()));
@define(SUBDIR, 'opencode'); //Usar caso o projeto n�o esteja na pasta raiz do htdocs
@define(BASEPATCH, substr($_SERVER['SCRIPT_FILENAME'], 0, -strlen($_SERVER['SCRIPT_NAME'])) . SUBDIR);
@define(BASEURL, 'http://' . $_SERVER['SERVER_NAME'] . SUBDIR);

function inc($DirFile) {
    require(get_template_directory() . DIRECTORY_SEPARATOR . $DirFile);
}

inc("app/Inc/Load.inc.php");
inc("app/Inc/siteSettings.inc.php");
inc("app/Inc/metabox.inc.php");
inc("app/Inc/postType.inc.php");
inc("app/Inc/LoadModules.inc.php");

function mytheme_enqueue_options_style() {
    wp_enqueue_style('mytheme-options-style', get_template_directory_uri() . '/assets/admin/admin.css');
    wp_enqueue_script('newjquery', get_template_directory_uri() . '/assets/admin/js/jquery.min.js');
    wp_enqueue_script('admin', get_template_directory_uri() . '/assets/admin/js/admin.js');
}

if (is_admin()) :
    add_action('admin_enqueue_scripts', 'mytheme_enqueue_options_style');
endif;

function add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='user-image img-circle", $class);
    return $class;
}

add_filter('get_avatar', 'add_gravatar_class');

function evcetec_wp_title($title, $sep) {
    global $paged, $page;

    if (is_feed()) {
        return $title;
    }

    // Add the site name.
    $title .= get_bloginfo('name', 'display');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() )) {
        $title = "$title $sep $site_description";
    }

    // Add a page number if necessary.
    if (( $paged >= 2 || $page >= 2 ) && !is_404()) {
        $title = "$title $sep " . sprintf(__('Page %s', 'evcetec'), max($paged, $page));
    }

    return $title;
}

add_filter('wp_title', 'evcetec_wp_title', 10, 2);

// This theme uses wp_nav_menu() in two locations.
register_nav_menus([
    'Main' => "Menu principal"
]);

