<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */

get_header(); ?>
<div id = "page-content">
		<?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>

		<?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'content', 'single' ); ?>

		<?php endwhile; ?>

		<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

</div>
<?php get_footer(); ?>