<?php
/**
 * @Author: Timi Wahalahti
 * @Date:   2019-12-03 11:03:31
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-12-29 19:05:36
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

add_filter('air_helper_pll_register_strings', function () {
    $strings = [
    // 'Key: String' => 'String',
    ];

  /**
   * Uncomment if you need to have default cbrnetheme accessibility strings
   * translatable via Polylang string translations.
   */
  // foreach ( get_default_localization_strings() as $key => $value ) {
  // $strings[ "Accessibility: {$key}" ] = $value;
  // }

    return $strings;
});

function get_default_localization_strings($language = 'en')
{
    $strings = [
    'en'  => [
      'Add a menu'                                   => __('Add a menu', 'cbrnetheme'),
      'Open main menu'                               => __('Open main menu', 'cbrnetheme'),
      'Close main menu'                              => __('Close main menu', 'cbrnetheme'),
      'Main navigation'                              => __('Main navigation', 'cbrnetheme'),
      'Back to top'                                  => __('Back to top', 'cbrnetheme'),
      'Open child menu for'                          => __('Open child menu for', 'cbrnetheme'),
      'Close child menu for'                         => __('Close child menu for', 'cbrnetheme'),
      'Skip to content'                              => __('Skip to content', 'cbrnetheme'),
      'Skip over the carousel element'               => __('Skip over the carousel element', 'cbrnetheme'),
      'External site'                                => __('External site', 'cbrnetheme'),
      'opens in a new window'                        => __('opens in a new window', 'cbrnetheme'),
      'Page not found.'                              => __('Page not found.', 'cbrnetheme'),
      'The reason might be mistyped or expired URL.' => __('The reason might be mistyped or expired URL.', 'cbrnetheme'),
      'Search'                                       => __('Search', 'cbrnetheme'),
      'Block missing required data'                  => __('Block missing required data', 'cbrnetheme'),
      'This error is shown only for logged in users' => __('This error is shown only for logged in users', 'cbrnetheme'),
      'No results found for your search'             => __('No results found for your search', 'cbrnetheme'),
      'Edit'                                         => __('Edit', 'cbrnetheme'),
      'Previous slide'                               => __('Previous slide', 'cbrnetheme'),
      'Next slide'                                   => __('Next slide', 'cbrnetheme'),
      'Last slide'                                   => __('Last slide', 'cbrnetheme'),
    ]
    ];

    return ( array_key_exists($language, $strings) ) ? $strings[ $language ] : $strings['en'];
} // end get_default_localization_strings

function get_default_localization($string)
{
    if (function_exists('ask__') && array_key_exists("Accessibility: {$string}", apply_filters('air_helper_pll_register_strings', []))) {
        return ask__("Accessibility: {$string}");
    }

    return esc_html(get_default_localization_translation($string));
} // end get_default_localization

function get_default_localization_translation($string)
{
    $language = get_bloginfo('language');
    if (function_exists('pll_the_languages')) {
        $language = pll_current_language();
    }

    $translations = get_default_localization_strings($language);

    return ( array_key_exists($string, $translations) ) ? $translations[ $string ] : '';
} // end get_default_localization_translation
