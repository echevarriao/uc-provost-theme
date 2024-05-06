<?php get_header(); ?>
<div id = "page-content">
			<?php if ( have_posts() ) : ?>

					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'provost_office' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Monthly Archives: %s', 'provost_office' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'provost_office' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'provost_office' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'provost_office' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'provost_office' ); ?>
						<?php endif; ?>
					</h1>


				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'content', get_post_format() ); ?>

				<?php endwhile; ?>

			<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>