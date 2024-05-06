<?php
/**
 * The template for displaying posts in the Image Post Format on index and archive pages
 *
 * Learn more: http://codex.wordpress.org/Post_Formats
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */
?>
<h1 class = "entry-title">Image Attachment</h1>

<p><?php print wp_get_attachment_image($post->ID); ?></p>
	<?php
	
		$metadata = wp_get_attachment_metadata();
		printf( __( '<span class="meta-prep meta-prep-entry-date">Uploaded </span> <span class="entry-date"><abbr class="published" title="%1$s">%2$s</abbr></span> at <a href="%3$s" title="Link to full-size image">%4$s &times; %5$s</a> in <a href="%6$s" title="Return to %7$s" rel="gallery">%8$s</a>', 'provost_office' ),
		esc_attr( get_the_time() ),
		get_the_date(),
		esc_url( wp_get_attachment_url() ),
		$metadata['width'],
		$metadata['height'],
		esc_url( get_permalink( $post->post_parent ) ),
		esc_attr( strip_tags( get_the_title( $post->post_parent ) ) ),
		get_the_title( $post->post_parent )
		);
	?>
	<?php edit_post_link( __( 'Edit', 'provost' ), '<span class="edit-link">', '</span>' ); ?>
