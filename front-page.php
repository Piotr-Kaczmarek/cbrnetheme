<?php
/**
 * The template for displaying front page
 *
 * Contains the closing of the #content div and all content after.
 * Initial styles for front page template.
 *
 * @Date:   2019-10-15 12:30:02
 * @Last Modified by:   Roni Laukkarinen
 * @Last Modified time: 2022-05-25 20:18:40
 *
 * @package cbrnetheme
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */

namespace Cbrne_Theme;

// Featured image for Theme Checker (it's a requirement for theme to pass in official Theme directory)
// NB! Our dev version uses newtheme.sh build script which cleans ups things including this next line
$thumbnail = wp_get_attachment_url(get_post_thumbnail_id()) ?: THEME_SETTINGS['default_featured_image'];

get_header(); ?>

<main class="site-main page">
  <section class="block block-page">
      <article class="article-content <?php echo (has_post_thumbnail()) ? 'has-hero ' : '';?><?php echo (!empty(get_field('page-claim'))) ? 'has-slider ' : '';?>">
          <?php
            get_template_part('template-parts/header/page-claim');
            if (has_post_thumbnail()) {
                ?>
              <div class="hero-image wp-block-cover alignfull">
                <span aria-hidden="true" class="wp-block-cover__background full-opacity">
                <?php
                  //add featured image
                    
                        the_post_thumbnail('', array( 'class' => 'featured wp-block-cover__image-background' ));

                ?>      
                  </span>
              </div>      
                <?php
            }
            the_content();
            //air_edit_link();
            ?>
      </article>
  </section>
</main>

<?php get_footer();
