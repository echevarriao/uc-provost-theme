<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */

get_header(); ?>
<div id = "page-content">
		<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'content', 'page' ); ?>
				<?php endwhile; // end of the loop. ?>
		<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
</div>
<?php get_footer(); ?>