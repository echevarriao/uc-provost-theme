<?php
/**
 * The default template for displaying content
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */
?>
<div class = "rowClass" onClick = "location.href = '<?php the_permalink(); ?>';">
<table cellspacing = "0" border = "0" cellpadding = "0">
	<tr>
		<td valign = "top"><img src = "<?php echo get_template_directory_uri(); ?>/images/uconn-sig.png" align = "left" alt = "" /></td>
		<td valign = "top"><p><b><?php echo get_the_title(); ?></b></p>
		<?php the_excerpt(); ?>
		<p>Date posted: <?php the_date(); ?></p>
		</td>
	</tr>
</table>
</div>