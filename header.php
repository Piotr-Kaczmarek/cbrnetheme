<?php
/**
 * Template for header
 *
 * <head> section and everything up until <div id="content">
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:17:32
 * @Last Modified by:   Tuomas Marttila
 * @Last Modified time: 2023-02-27 10:46:23
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">

  <?php wp_head(); ?>
</head>
<?php
  $custom_class = (empty(get_option('cbrne_change_theme_colors'))) ? 'color': 'no-color';
?>
<body <?php body_class('no-js'.' '.$custom_class); ?>>
  <a class="skip-link screen-reader-text js-trigger" href="#content"><?php echo esc_html(get_default_localization('Skip to content')); ?></a>

  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="site-header">
      <?php get_template_part('template-parts/header/branding'); ?>   
      <div class="nav-block">  
        <?php get_template_part('template-parts/header/navigation'); ?>
        <?php get_template_part('template-parts/header/language-switcher');?> 
      </div>
    </header>
    <?php get_template_part('template-parts/header/alert-bar'); ?>
    <div class="site-content">
