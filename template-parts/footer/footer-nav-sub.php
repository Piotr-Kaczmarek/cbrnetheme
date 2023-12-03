<?php
/**
 * Footer navigation layout.
 *
 * @Author: Piotr Kaczmarek
 *
 * @package cbrnetheme
 */

namespace Cbrne_Theme;

?>
<div class="footer-sub-nav-wrapper nav-wrapper">
  <nav id="nav-footer-sub" class="nav-footer" aria-label="<?php echo esc_html(get_default_localization('Footer Bottom navigation')); ?>">

      <?php wp_nav_menu(array(
        'theme_location' => 'footer-sub',
        'container'      => false,
        'depth'          => 4,
        'menu_class'     => 'footer-sub-menu-items',
        'menu_id'        => 'footer-sub-menu',
        'echo'           => true,
        'fallback_cb'    => __NAMESPACE__ . '\Nav_Walker::fallback',
        'items_wrap'     => '<ul id="footer-sub-menu" class="footer-menu-items">%3$s</ul>',
        'has_dropdown'   => true,
        'walker'         => new Nav_Walker(),
      )); ?>

  </nav>
</div>