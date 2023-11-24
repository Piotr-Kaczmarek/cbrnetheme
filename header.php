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
  $custom_class = (!isset(get_option('cbrne_custom_option_group')['cbrne_change_theme_colors']) ? 'color': 'no-color');
?>
<body <?php body_class('no-js'.' '.$custom_class); ?>>
  <a class="skip-link screen-reader-text js-trigger" href="#content"><?php echo esc_html(get_default_localization('Skip to content')); ?></a>

  <?php wp_body_open(); ?>
  <div id="page" class="site">

    <header class="site-header">
      <?php get_template_part('template-parts/header/branding'); ?>
<<<<<<< HEAD
=======
      <?php get_template_part('template-parts/header/language-switcher');?>
<<<<<<< Updated upstream
>>>>>>> 9e1b5073a10c9869acaeb4aed1205b2aeb9ea59e
=======
>>>>>>> 9e1b507 (v0.0.66)
>>>>>>> Stashed changes
      <?php get_template_part('template-parts/header/navigation'); ?>
    </header>

    <div class="site-content">
