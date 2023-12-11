<?php
/**
 * Template for displaying the footer
 *
 * Description for template.
 *
 * @Author: Roni Laukkarinen
 * @Date: 2020-05-11 13:33:49
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-09-07 11:57:45
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div id="footer-columns" class="footer-columns">
    <div class="footer-columns-wrapper">
      <div class="footer-column">
        <?php get_template_part('template-parts/footer/footer-nav'); ?>
      </div>
      <div class="footer-column">
        <span><?php echo get_option('cbrne_footer_settings_section_one');?></span>
      </div>
      <div class="footer-column">
        <span><?php echo get_option('cbrne_footer_settings_section_two');?></span>
      </div>
      <div class="footer-column">
        <?php get_template_part('template-parts/footer/footer-nav-2'); ?>
      </div>
    </div>
  </div><!-- footer columns end -->
  <div id="footer-sub-section" class="sub-section">
      <?php get_template_part('template-parts/footer/footer-nav-sub'); ?>
      <div class="cc-footer">
        <div class="icons">
          <span class="license-cc" aria-hidden="true"><?php include get_theme_file_path('svg/cc.svg'); ?></span>
          <span class="license-by" aria-hidden="true"><?php include get_theme_file_path('svg/by.svg'); ?></span>
        </div>
        <div class="text">Wszystkie treści publikowane w serwisie są udostępniane na licencji Creative Commons: uznanie autorstwa - użycie niekomercyjne - bez utworów zależnych 3.0 Polska (CC BY-NC-ND 3.0 PL), o ile nie jest to stwierdzone inaczej.</div>
      </div>
  </div><!-- sub section end -->
  <div class="site-info">
      <div id="ng-logo">
        <?php include get_theme_file_path('svg/Norway_grants.svg'); ?>
      </div>  
      <div id="footer-logo">
        <?php include get_theme_file_path(THEME_SETTINGS['logo']); ?>
      </div>
  </div>

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<a
  href="#page"
  id="top"
  class="top no-external-link-indicator"
  data-version="<?php echo esc_attr(Cbrne_Theme_VERSION); ?>"
>
  <span class="screen-reader-text"><?php echo esc_html(get_default_localization('Back to top')); ?></span>
  <span aria-hidden="true">&uarr;</span>
</a>

</body>
</html>
