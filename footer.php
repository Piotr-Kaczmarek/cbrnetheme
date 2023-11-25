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
<?php get_template_part('template-parts/footer/footer-nav'); ?>
  <div class="site-info">
    <span class="theme-info">
    </span>
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
