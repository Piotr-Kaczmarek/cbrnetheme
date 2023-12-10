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
get_header();

// restrict sidebar to one category of posts
in_category('zagrozenia') ? $use_menu = true : $use_menu = false;

?>

<main class="site-main single">
<?php
if (has_post_thumbnail()) {
    ?>
  <div class="hero-image wp-block-cover alignfull">
     <span aria-hidden="true" class="wp-block-cover__background full-opacity">
     <?php
      //add featured image

        $hero_img_options = array( 'class' => 'featured wp-block-cover__image-background' );
        if (!empty(get_field('mobile-hero-image'))) {
            $hero_img_options['class'] .= ' hide-on-mobile';
        }
        the_post_thumbnail('', $hero_img_options);

            // mobile hero image from ACF
           
        if (!empty(get_field('mobile-hero-image'))) {
              printf('<span aria-hidden="true" class="mobile-hero-wrapper full-opacity hide-on-desktop">%s</span>', cbrne_get_image_tag(get_field('mobile-hero-image')));
        }

        ?>      
      </span>
      <?php get_template_part('template-parts/header/page-claim'); ?>
  </div>      
    <?php
}
?>
  <section class="block block-single <?php echo ($use_menu == true) ? 'with-sidebar' : '';?>">
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
      <div class="title">
        <span class="title-icon">
        <?php
        if (!empty(get_post_custom_values('title-icon'))) {
            $image_id = get_field('title-icon');
            echo cbrne_get_image_tag($image_id);
        }
        ?>
        </span>
        <h1><?php the_title(); ?></h1>
      </div>
      <?php
        if ($use_menu) {
            $the_content = get_the_content();
            // get post menu
            include get_theme_file_path().'/inc/template-tags/post-menu.php';
        }
        ?>
      <?php
        the_content();

      // Required by WordPress Theme Check, feel free to remove as it's rarely used in starter themes
        wp_link_pages(array( 'before' => '<div class="page-links">' . esc_html__('Pages:', 'cbrnetheme'), 'after' => '</div>' ));

        // entry_footer(); // remove categories, tags and commentary
        /*
        if (get_edit_post_link()) {
            edit_post_link(sprintf(wp_kses(__('Edit <span class="screen-reader-text">%s</span>', 'cbrnetheme'), [ 'span' => [ 'class' => [] ] ]), get_the_title()), '<p class="edit-link">', '</p>');
        }
        */
        //the_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>

    </article> 
  </section>

</main>

<?php get_footer();
