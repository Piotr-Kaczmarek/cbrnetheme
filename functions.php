<?php
/**
 * Gather all bits and pieces together.
 * If you end up having multiple post types, taxonomies,
 * hooks and functions - please split those to their
 * own files under /inc and just require here.
 *
 * @Date: 2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2023-09-12 12:20:49
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

/**
 * The current version of the theme.
 */
define('Cbrne_Theme_VERSION', '0.0.1');

// We need to have some defaults as comments or empties so let's allow this:
// phpcs:disable Squiz.Commenting.InlineComment.SpacingBefore, WordPress.Arrays.ArrayDeclarationSpacing.SpaceInEmptyArray
/**
 * Theme settings
 */
add_action('after_setup_theme', function () {
    $theme_settings = [
    /**
     * Theme textdomain
     */
    'textdomain' => 'cbrnetheme',

    /**
     * Content width
     */
    'content_width' => 800,

    /**
     * Logo and featured image
     */
    'default_featured_image'  => null,
    'logo'                    => '/svg/logo-rcb.svg',

    /**
     * Custom setting group settings when using Air setting groups plugin.
     * On multilingual sites using Polylang, translations are handled automatically.
     */
    'custom_settings' => [
      // 'your-custom-setting' => [
      //   'id' => Your custom setting post id,
      //   'title' => 'Your custom setting',
      //   'block-editor' => true,
      //  ],
    ],

    'social_media_accounts'  => [
      // 'twitter' => [
      //   'title' => 'Twitter',
      //   'url'   => 'https://twitter.com/digitoimistodude',
      // ],
    ],

    /**
     * All links are cheked with JS, if those direct to external site and if,
     * indicator of that is included. Exclude domains from that check in this array.
     */
    'external_link_domains_exclude' => [
      'localhost:3000',
      'airdev.test',
      'airwptheme.com',
      'localhost',
    ],

    /**
     * Menu locations
     */
    'menu_locations' => [
      'primary' => __('Primary Menu', 'cbrnetheme'),
      'footer' => __('Footer Menu', 'cbrnetheme'),
      'footer-secondary'=> __('Footer Secondary Menu', 'cbrnetheme'),
      'footer-sub'=> __('Footer Bottom Menu', 'cbrnetheme'),
    ],

    /**
     * Taxonomies
     *
     * See the instructions:
     * https://github.com/digitoimistodude/cbrnetheme#custom-taxonomies
     */
    'taxonomies' => [
      // 'Your_Taxonomy' => [ 'post', 'page' ],
    ],

    /**
     * Post types
     *
     * See the instructions:
     * https://github.com/digitoimistodude/cbrnetheme#custom-post-types
     */
    'post_types' => [
      // 'Your_Post_Type',
    ],

    /**
     * Gutenberg -related settings
     */
    // Register custom ACF Blocks
    'acf_blocks' => [
      // [
      //   'name'           => 'block-file-slug',
      //   'title'          => 'Block Visible Name',
      //   // You can safely remove lines below if you find no use for them
      //   'prevent_cache'  => false, // Defaults to false,
      //   // Icon defaults to svg file inside svg/block-icons named after the block name,
      //   // eg. svg/block-icons/block-file-slug.svg
      //   //
      //   // Icon setting defines the dashicon equivalent: https://developer.wordpress.org/resource/dashicons/#block-default
      //   // 'icon'  => 'block-default',
      // ],
    ],

    // Custom ACF block default settings
    'acf_block_defaults' => [
      'category'          => 'cbrnetheme',
      'mode'              => 'auto',
      'align'             => 'full',
      'post_types'        => [
        'page',
      ],
      'supports'  => [
        'align'           => false,
        'anchor'          => true,
        'customClassName' => false,
      ],
      'render_callback'   => __NAMESPACE__ . '\render_acf_block',
    ],

    // Restrict to only selected blocks
    // Set the value to 'all' to allow all blocks everywhere
    'allowed_blocks' => 'all',/*[
      'default' => [
      ],
      'post' => [
        'core/archives',
        'core/audio',
        'core/buttons',
        'core/categories',
        'core/code',
        'core/column',
        'core/columns',
        'core/coverImage',
        'core/embed',
        'core/file',
        'core/freeform',
        'core/gallery',
        'core/heading',
        'core/html',
        'core/image',
        'core/latestComments',
        'core/latestPosts',
        'core/list',
        'core/list-item',
        'core/more',
        'core/nextpage',
        'core/paragraph',
        'core/preformatted',
        'core/pullquote',
        'core/quote',
        'core/block',
        'core/separator',
        'core/shortcode',
        'core/spacer',
        'core/subhead',
        'core/table',
        'core/textColumns',
        'core/verse',
        'core/video',
      ],
      'page' => 'all',
    ],*/

    // If you want to use classic editor somewhere, define it here
    'use_classic_editor' => [],

    // Add your own settings and use them wherever you need, for example THEME_SETTINGS['my_custom_setting']
    'my_custom_cbrne_radio_setting_id' => 'normal',
    ];

    $theme_settings = apply_filters('Cbrne_Theme_theme_settings', $theme_settings);

    define('THEME_SETTINGS', $theme_settings);
}); // end action after_setup_theme

/**
 * Required files
 */
require get_theme_file_path('/inc/hooks.php');
require get_theme_file_path('/inc/includes.php');
require get_theme_file_path('/inc/template-tags.php');

// Run theme setup
add_action('after_setup_theme', __NAMESPACE__ . '\theme_setup');
add_action('after_setup_theme', __NAMESPACE__ . '\build_theme_support');

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
//
// Multisite LS menu tags change
/**
 * @param array $tags
 * @return array
 */
function my_msls_output_get_tags($tags)
{
    return array(
        'before_item'   => '<li class="menu-item menu-item-language">',
        'after_item'    => '</li>',
        'before_output' => '<ul class="menu-items menu-items-language">',
        'after_output'  => '</ul>',
    );
}
add_filter('msls_output_get_tags', __NAMESPACE__ .'\my_msls_output_get_tags');

// produce shortcode for home page grid
add_shortcode('home-page-grid', __NAMESPACE__ .'\cbrne_generate_home_page_grid');
function cbrne_generate_home_page_grid($atts)
{
// get post category
// default post category = 'zagrozenia'
// default count = 9 (number of posts to query)
// excerpt length in words, default = 10
// need ACF (free)
    // get default category name 'zagrozenia'
    $atts = shortcode_atts(array(
      'cat' => 'zagrozenia',
      'count'=> 9,
      'text_length' => 10,
    ), $atts, 'home-page-grid');
    // get the posts
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => $atts['count'],
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'category_name' => $atts['cat'],
    );

    $html = '';
    // query DB
    $loop = new \WP_Query($args);
    if ($loop->have_posts()) {
        $html .= '<div class="post-grid alignwide" id="home-post-grid">';
        $html .= '<div class="is-grid grid-wrapper">';
        while ($loop->have_posts()) {
            $loop->the_post();

            // show them
            $html .= '<div class="grid-post">';
            // get post page-icon from acf
            $icon_image_id = !empty(get_field('page-icon')) ? get_field('page-icon') : 212;
                $image_obj = wp_get_attachment_image_src($icon_image_id);
                $image_tag = '<img src="' .$image_obj[0]. '" ';
                $image_tag .= 'width="'.$image_obj[1].'" height="'.$image_obj[1].'" ';
                $image_tag .= 'alt="'.get_post_meta($icon_image_id, '_wp_attachment_image_alt', true).'" title="'.get_post_field('post_title', $icon_image_id).'" class="post-icon" wp-image="' . $icon_image_id . '" />';
            $image_tag = \wp_filter_content_tags($image_tag);
            $html .= sprintf('<a href="%s">', get_permalink());
            $html .= $image_tag;
            $html .= '</a>';
            // post title
            $html .= sprintf('<div class="post-title" title><a href="%s">', get_permalink());
            $html .= sprintf('<h3>%s</h3>', get_the_title($loop->post->ID));
            $html .= '</a></div>';
            // excerpt
            $html .= sprintf('<div class="post-excerpt" title>%s', cbrne_limit_excerpt_words(get_the_excerpt(), $atts['text_length']));
            $html .= sprintf('<a class="read-more" href="%s" rel="nofollow"> '.\apply_filters('excerpt_more', 'Read More').'</a></div>', get_the_permalink());

            $html .= '</div><!-- one post -->';
        }
        $html .= '</div></div><!--post grid-->';
    }

    return $html;
}
// add mor link to the excerpt
function cbrne_excerpt_more($more)
{
    //return '<a href="'.get_the_permalink().'" rel="nofollow"> '.__('Read More', 'cbrnetheme').'</a>';
    return '>>';
}
add_filter('excerpt_more', __NAMESPACE__ .'\cbrne_excerpt_more');

// Excerpt length
function cbrne_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', __NAMESPACE__ .'\cbrne_excerpt_length');

// limit excerpt in words
function cbrne_limit_excerpt_words($excerpt, $limit = 30)
{
    $excerpt_words = explode(' ', $excerpt);
    $limit = intval($limit);
    $i = 0;
    $result = '';
    foreach ($excerpt_words as $word) {
        if ($i++ < $limit) {
            $result .= $word;
            $result .= ($i < $limit) ? ' ' : '';
        } else {
            $result .=  sizeof($excerpt_words) > $limit ? '...' : '';
            break;
        }
    }
    return wp_kses_post($result);
}

// add page attributes to posts (menu_order !)
add_action('admin_init', __NAMESPACE__ .'\cbrne_post_page_attrib');
function cbrne_post_page_attrib()
{
      add_post_type_support('post', 'page-attributes');
}
