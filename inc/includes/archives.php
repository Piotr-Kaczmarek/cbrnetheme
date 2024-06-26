<?php
/**
 * Archive related actions.
 *
 * @Author: Timi Wahalahti
 * @Date:   2020-01-10 16:20:24
 * @Last Modified by:   PK
 * @Last Modified time: 2023-11-13 13:11:00
 *
 */

/**
 * Remove archive title prefix.
 *
 * Turn off by using `remove_filter( 'get_the_archive_title', 'air_helper_helper_remove_archive_title_prefix' )`
 *
 * @since  0.1.0
 * @param  string $title Default title.
 * @return string Title without prefix
 */
add_filter('get_the_archive_title', 'air_helper_helper_remove_archive_title_prefix');
function air_helper_helper_remove_archive_title_prefix($title)
{
    return preg_replace('#^[\w\d\s]+:\s*#', '', wp_strip_all_tags($title));
} // end air_helper_helper_remove_archive_title_prefix

/**
 *  Disable some views by default.
 *  archives: tag, category, date, author
 *  other: search
 *
 *  Turn off by using `remove_action( 'template_redirect', 'air_helper_disable_views' )`
 *  or spesific views, for example tag archive, with `add_filter( 'air_helper_disable_views_tag', '__return_false' )`
 *
 *  @since  1.6.0
 */
add_action('template_redirect', 'air_helper_disable_views');
function air_helper_disable_views()
{

  // Enable tag archives by using `add_filter( 'air_helper_disable_views_tag', '__return_false' )`
    if (apply_filters('air_helper_disable_views_tag', true)) {
        if (is_tag()) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
        }
    }

  // Enable category archives by using `add_filter( 'air_helper_disable_views_category', '__return_false' )`
    if (apply_filters('air_helper_disable_views_category', true)) {
        if (is_category()) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
        }
    }

  // Enable date archives by using `add_filter( 'air_helper_disable_views_date', '__return_false' )`
    if (apply_filters('air_helper_disable_views_date', true)) {
        if (is_date()) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
        }
    }

  // Enable author archives by using `add_filter( 'air_helper_disable_views_author', '__return_false' )`
    if (apply_filters('air_helper_disable_views_author', true)) {
        if (is_author()) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
        }
    }

  // Enable search view by using `add_filter( 'air_helper_disable_views_search', '__return_false' )`
    if (apply_filters('air_helper_disable_views_search', true)) {
        if (is_search()) {
            global $wp_query;
            $wp_query->set_404();
            status_header(404);
        }
    }
} // end air_helper_disable_views
