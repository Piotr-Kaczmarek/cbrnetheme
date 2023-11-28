<?php
/**
 * The template for displaying all single posts
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-09-07 11:57:39
 *
 * @package cbrnetheme
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 */

namespace Cbrne_Theme;

the_post();
get_header(); ?>

<main class="site-main">

  <section class="block block-single">
    <?php
    $page_color_vars = '';
    if (!empty(get_post_custom_values('page-accent-color'))) {
        $page_color_vars = "--color-page-accent: ".get_post_custom_values('page-accent-color')[0]."; ";
    }
    if (!empty(get_post_custom_values('page-accent-color'))) {
        $page_color_vars .= "--color-page-accent-font: ".get_post_custom_values('page-accent-font-color')[0]."; ";
    }
    ?>    
    <article class="article-content" style="<?=$page_color_vars?>">

      <h1><?php the_title(); ?></h1>

      <?php the_content();

      // Required by WordPress Theme Check, feel free to remove as it's rarely used in starter themes
        wp_link_pages(array( 'before' => '<div class="page-links">' . esc_html__('Pages:', 'cbrnetheme'), 'after' => '</div>' ));

        entry_footer();

        if (get_edit_post_link()) {
            edit_post_link(sprintf(wp_kses(__('Edit <span class="screen-reader-text">%s</span>', 'cbrnetheme'), [ 'span' => [ 'class' => [] ] ]), get_the_title()), '<p class="edit-link">', '</p>');
        }

        the_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>

    </article>
  </section>

</main>

<?php get_footer();
