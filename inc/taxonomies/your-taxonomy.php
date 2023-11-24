<?php
/**
 * @Author: Niku Hietanen
 * @Date: 2020-02-18 15:05:35
 * @Last Modified by:   Timi Wahalahti
 * @Last Modified time: 2023-03-31 14:29:17
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

/**
 * Registers the Your Taxonomy taxonomy.
 *
 * @param Array $post_types Optional. Post types in
 * which the taxonomy should be registered.
 */
class Your_Taxonomy extends Taxonomy
{


    public function register(array $post_types = [])
    {
      // Taxonomy labels.
        $labels = [
        'name'                  => _x('Your Taxonomies', 'Taxonomy plural name', 'cbrnetheme'),
        'singular_name'         => _x('Your Taxonomy', 'Taxonomy singular name', 'cbrnetheme'),
        'search_items'          => __('Search Your Taxonomies', 'cbrnetheme'),
        'popular_items'         => __('Popular Your Taxonomies', 'cbrnetheme'),
        'all_items'             => __('All Your Taxonomies', 'cbrnetheme'),
        'parent_item'           => __('Parent Your Taxonomy', 'cbrnetheme'),
        'parent_item_colon'     => __('Parent Your Taxonomy', 'cbrnetheme'),
        'edit_item'             => __('Edit Your Taxonomy', 'cbrnetheme'),
        'update_item'           => __('Update Your Taxonomy', 'cbrnetheme'),
        'add_new_item'          => __('Add New Your Taxonomy', 'cbrnetheme'),
        'new_item_name'         => __('New Your Taxonomy', 'cbrnetheme'),
        'add_or_remove_items'   => __('Add or remove Your Taxonomies', 'cbrnetheme'),
        'choose_from_most_used' => __('Choose from most used Taxonomies', 'cbrnetheme'),
        'menu_name'             => __('Your Taxonomy', 'cbrnetheme'),
        ];

        $args = [
        'labels'            => $labels,
        'public'            => false,
        'show_in_nav_menus' => true,
        'show_admin_column' => true,
        'hierarchical'      => true,
        'show_tagcloud'     => false,
        'query_var'         => false,
        'pll_translatable'  => true,
        'rewrite'           => [
        'slug' => 'your-taxonomy',
        ],
        ];

        $this->register_wp_taxonomy($this->slug, $post_types, $args);
    }
}
