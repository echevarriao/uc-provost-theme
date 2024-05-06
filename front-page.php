<?php // lets display the front page

    get_header(); 

    if(is_active_sidebar('top-featured')) { 
?>
<div id = "top-featured">
<?php dynamic_sidebar('top-featured'); ?>
</div>
<?php } ?>

<h4 id = "front-page-header">UConn Today</h4>
<div class="newsContainer">
<?php /* load stories from UConn Today */ ?>
<?php

			$ucnews = null;
			$html = null;
			$err_curl = null;

include(get_template_directory() . "/custom-code/html-uconntoday.php");

?>
	<p class="more-news">&laquo; <a href="http://today.uconn.edu/" class = "story">More UConn Today News</a> &raquo; </p>

</div>
<?php get_footer(); ?>