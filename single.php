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
in_category('zagrozenia') ? $use_sidebar = true : $use_sidebar = false;

?>

<main class="site-main">
<?php
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
?>
  <section class="block block-single <?php echo ($use_sidebar == true) ? 'with-sidebar' : '';?>">
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
        if (!empty(get_post_custom_values('page-icon-image'))) {
            ?>
              <img decoding="async" src="<?=get_post_custom_values('page-icon-image')[0]?>" alt="" class="" style="object-fit:cover;">
            <?php
        }
        ?>
        </span>
        <h1><?php the_title(); ?></h1>
      </div>

      <?php
        the_content();
        $the_content = get_the_content();

      // Required by WordPress Theme Check, feel free to remove as it's rarely used in starter themes
        wp_link_pages(array( 'before' => '<div class="page-links">' . esc_html__('Pages:', 'cbrnetheme'), 'after' => '</div>' ));

        // entry_footer(); // remove categories, tags and commentary

        if (get_edit_post_link()) {
            edit_post_link(sprintf(wp_kses(__('Edit <span class="screen-reader-text">%s</span>', 'cbrnetheme'), [ 'span' => [ 'class' => [] ] ]), get_the_title()), '<p class="edit-link">', '</p>');
        }

        the_post_navigation();

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        } ?>

    </article>
    <?php
    // this is to restrict sidebar only to one category
    if ($use_sidebar) {
        ?>
      <div id="post-sidebar" class="sidebar post-menu-wrapper">
        <?php
        // get all H2 elements from content
        // build menu with links to H2
        preg_match_all('@<h2.*?>(.*?)<\/h2>@', $the_content, $matches);
        $tag = $matches[1];
        printf('<ul id="menu-post-%s" class="post-menu">', get_the_ID());
        foreach ($tag as $header) {
            printf('<li class="menu-link"><a href="#%s">%s</a></li>', string_to_id($header), $header);
        }
        printf('</ul>');
        ?>
    </div> 
        <?php
    }
    ?>        
  </section>

</main>

<?php get_footer();
