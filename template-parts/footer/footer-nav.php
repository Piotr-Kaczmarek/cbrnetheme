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
<div class="footer-nav-wrapper nav-wrapper">
  <nav id="nav-footer" class="nav-footer nav-menu" aria-label="<?php echo esc_html(get_default_localization('Footer navigation')); ?>">

    <div id="footer-items-wrapper" class="footer-items-wrapper">
      <?php wp_nav_menu(array(
        'theme_location' => 'footer',
        'container'      => false,
        'depth'          => 4,
        'menu_class'     => 'footer-menu-items',
        'menu_id'        => 'footer-menu',
        'echo'           => true,
        'fallback_cb'    => __NAMESPACE__ . '\Nav_Walker::fallback',
        'items_wrap'     => '<ul id="footer-menu" class="footer-menu-items">%3$s</ul>',
        'has_dropdown'   => true,
        'walker'         => new Nav_Walker(),
      )); ?>
    </div>

  </nav>
</div>