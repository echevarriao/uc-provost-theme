<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */

get_header(); ?>
<div id = "page-content">
			<?php if ( have_posts() ) : ?>
					<h1 class="page-title"><?php
						printf( __( 'News Archives: %s', 'provost_office' ), '<span>' . single_cat_title( '', false ) . '</span>' );
					?></h1>

					<?php
						$category_description = category_description();
						if ( ! empty( $category_description ) )
							echo apply_filters( 'category_archive_meta', '<div class="category-archive-meta">' . $category_description . '</div>' );
					?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

			<?php else : ?>

						<h1 class="entry-title">Article Not Found!</h1>
						<p>We are sorry, but no results were found for the requested archive. Perhaps searching will help find a related article</p>
						<?php get_search_form(); ?>

			<?php endif; ?>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
