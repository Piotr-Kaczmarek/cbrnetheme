<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-02-08 17:03:18
 *
 * @package cbrnetheme
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

namespace Cbrne_Theme;

the_post();

get_header(); ?>

<main class="site-main">
  <section class="block block-page">
      <article class="article-content" style="">
          <?php
            the_content();
            air_edit_link();
            ?>
      </article>
  </section>
</main>

<?php get_footer();
