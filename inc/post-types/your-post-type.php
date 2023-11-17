<?php
/**
 * @Author: Niku Hietanen
 * @Date: 2020-02-18 15:06:45
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2023-03-31 14:39:55
 *
 * @package cbrnetheme
 **/

namespace Cbrne_Theme;

/**
 * Registers the Your Post Type post type.
 */
class Your_Post_Type extends Post_Type
{

    public function register()
    {

      // Modify all the i18ized strings here.
        $generated_labels = [
        'menu_name'          => __('Your Post Type', 'cbrnetheme'),
        'name'               => _x('Your Post Types', 'post type general name', 'cbrnetheme'),
        'singular_name'      => _x('Your Post Type', 'post type singular name', 'cbrnetheme'),
        'name_admin_bar'     => _x('Your Post Type', 'add new on admin bar', 'cbrnetheme'),
        'add_new'            => _x('Add New', 'thing', 'cbrnetheme'),
        'add_new_item'       => __('Add New Your Post Type', 'cbrnetheme'),
        'new_item'           => __('New Your Post Type', 'cbrnetheme'),
        'edit_item'          => __('Edit Your Post Type', 'cbrnetheme'),
        'view_item'          => __('View Your Post Type', 'cbrnetheme'),
        'all_items'          => __('All Your Post Types', 'cbrnetheme'),
        'search_items'       => __('Search Your Post Types', 'cbrnetheme'),
        'parent_item_colon'  => __('Parent Your Post Types:', 'cbrnetheme'),
        'not_found'          => __('No your post types found.', 'cbrnetheme'),
        'not_found_in_trash' => __('No your post types found in Trash.', 'cbrnetheme'),
        ];

      // Definition of the post type arguments. For full list see:
      // http://codex.wordpress.org/Function_Reference/register_post_type
        $args = [
        'labels'              => $generated_labels,
        'menu_icon'           => null,
        'public'              => true,
        'show_ui'             => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'show_in_rest'        => false,
        'pll_translatable'    => true,
        'rewrite'             => [
        'with_front'  => false,
        'slug'        => 'your-post-type',
        ],
        'supports'            => [ 'title', 'editor', 'thumbnail', 'revisions' ],
        'taxonomies'          => [],
        ];

        $this->register_wp_post_type($this->slug, $args);
    }
}
