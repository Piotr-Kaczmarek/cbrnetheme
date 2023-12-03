<?php
/**
 * Include custom features etc.
 *
 * @Author: Niku Hietanen
 * @Date: 2020-02-18 15:07:17
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2021-12-10 11:48:15
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

// Theme setup
require get_theme_file_path('/inc/includes/theme-setup.php');

// Localized strings
require get_theme_file_path('/inc/includes/localization.php');

// Nav Walker
require get_theme_file_path('/inc/includes/nav-walker.php');

// Post type and taxonomy base classes
// We check this with if, because this stuff will not go to WP theme directory
if (file_exists(get_theme_file_path('/inc/includes/taxonomy.php'))) {
    require get_theme_file_path('/inc/includes/taxonomy.php');
}

if (file_exists(get_theme_file_path('/inc/includes/post-type.php'))) {
    require get_theme_file_path('/inc/includes/post-type.php');
}

// Custom functions
if (file_exists(get_theme_file_path('/inc/includes/archives.php'))) {
    require get_theme_file_path('/inc/includes/archives.php');
}
if (file_exists(get_theme_file_path('/inc/includes/comments.php'))) {
    require get_theme_file_path('/inc/includes/comments.php');
}
/*
if (file_exists(get_theme_file_path('/inc/includes/customizer.php'))) {
    require get_theme_file_path('/inc/includes/customizer.php');
}*/
if (file_exists(get_theme_file_path('/inc/includes/misc.php'))) {
    require get_theme_file_path('/inc/includes/misc.php');
}
if (file_exists(get_theme_file_path('/inc/includes/site-health-check.php'))) {
    require get_theme_file_path('/inc/includes/site-health-check.php');
}

if (file_exists(get_theme_file_path('/inc/includes/rest-api.php'))) {
    require get_theme_file_path('/inc/includes/rest-api.php');
}

if (file_exists(get_theme_file_path('/inc/includes/yoast-seo.php'))) {
    require get_theme_file_path('/inc/includes/yoast-seo.php');
}

/**
* Require files needed on admin side of the site.
*/
add_action('init', __NAMESPACE__ . '\air_helper_admin_fly');
function air_helper_admin_fly()
{
    if (! is_user_logged_in() || wp_doing_ajax()) {
        return false;
    }

    require_once get_theme_file_path() . '/inc/admin/adminbar.php';
    require_once get_theme_file_path() . '/inc/admin/notifications.php';
    require_once get_theme_file_path() . '/inc/admin/access.php';
    require_once get_theme_file_path() . '/inc/admin/acf.php';
    require_once get_theme_file_path() . '/inc/admin/dashboard.php';
    require_once get_theme_file_path() . '/inc/admin/gutenberg.php';
    require_once get_theme_file_path() . '/inc/admin/updates.php';

    //require_once get_theme_file_path() . '/inc/admin/customizer.php';
    //
    require_once get_theme_file_path() . '/inc/admin/custom_settigs.php';
} // end air_helper_admin_fly
