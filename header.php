<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */
?><!DOCTYPE html>
<?php $path = get_template_directory_uri(); ?>
<!--[if IE 6]>
<html id="ie6" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="ltr" lang="en-US">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="ltr" lang="en-US">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="ltr" lang="en-US">
<!--<![endif]-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta charset="UTF-8" />
<title>
<?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'provost_office' ), max( $paged, $page ) );

?></title>
<!--

Internet Explorer 7 has a stacking bug for superfish so we use a
different style sheet for the UConn Is, and content DIV sections

--->
<!--[if (IE 6) | (IE 7) | (IE 8) ]>

<style type = "text/css">

/*
 
 IE and has a stacking bug for superfish
 
*/

#provostTitleID{

    position: relative;
    float: left;
    height: 60px;
    margin-left: 25px;
    margin-top: 27px;

}

#uconnIsID, #contentID, #contentSectionID, #page-content, #containerID{
    
    position: static;
    
}	

</style>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<script type = "text/javascript" language = "javascript"> 
 
    jQuery(document).ready(function(){ 

        jQuery("ul.sf-menu").superfish();
	
	jQuery("#toggleMenuID").click(function(argv){
		
	jQuery("#dropdownid").slideToggle();
	jQuery("ul.sf-menu li ul").css({top: "-99999em"});

	argv.preventDefault();
		
	});
	
    }); 
 
</script>
</head>
<body <?php body_class(); ?>>
<div id = "wrapperID" role = "container">
        <div id = "header">
            <div id = "headerWrapper">
					<div id = "headerTitle">
			    		<a href="http://www.uconn.edu">
		    				<span id = "signature-id">UCONN</span>
							<span id = "signature-separator"> | </span>
							<span id = "signature-name">University of Connecticut</span>
			    		</a>
					</div>
					<div id = "icons-box">
						<ul>
			    			<li>
			    			<div class = "top-icons">
			    				<a href="http://www.uconn.edu/search.php">
			    					<img src = "<?php echo  $path ?>/images/m-icons_0000_search-white.png" />
			    				</a>
			    			</div>
			    			</li>
			    			<li>&nbsp; </li>
			    			<li>
			    			<div class = "top-icons">
			    				<a href="http://www.uconn.edu/azindex.php"><span>A-Z</span></a>
			    			</div>
			    			</li>
						</ul>
					</div>            
				</div>
        </div>
        <div id = "subheader">
        		<div id = "subheadercontainer">
        			<div id = "site-name">
        				<p><span><a href = "#"></a></p>
        				<h3 id = "org-name"><a href = "<?php bloginfo("url"); ?>"><?php bloginfo("name"); ?></a></h3>
					</div>
					<div id = "social-media">
					<ul>
						<li><a href="https://www.facebook.com/UConn" title="Facebook"><img src = "http://www.engr.uconn.edu/images/social-icon-facebook.png" border = "0" align = "left" /></a></li>
						<li><a href="http://feeds.feedburner.com/uconn-today" title="RSS Feed"><img src = "http://www.engr.uconn.edu/images/social-icon-rss.png" border = "0" align = "left" /></a></li>
						<li><a href="http://twitter.com/uconn" title="Twitter"><img src = "http://www.engr.uconn.edu/images/social-icon-twitter.png" border = "0" align = "left" /></a></li>
						<li><a href="http://youtube.com/uconn" title="YouTube"><img src = "http://www.engr.uconn.edu/images/social-icon-youtube.png" border = "0" align = "left" /></a></li>
						<li><a href="http://www.flickr.com/photos/uconntoday/" style = "padding: 0" title="Flickr"><img src = "http://www.engr.uconn.edu/images/social-icon-flickr.png" border = "0" align = "left" /></a></li>
					</ul>						
					</div>
        		</div>        
        </div>

    <div id = "navID" class = "clearfix" role = "navigation">
<div id = "toggleMenuBarID">
<ul>
	<li><a href="#" id = "toggleMenuID">Toggle Menu</a></li>
</ul>
</div>
            <!-- start  navigation -->
<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'menu_class' => 'sf-menu sf-js-enabled sf-shadow menu dropdown', 'menu_id' => 'dropdownid') ); ?><!-- end top menu -->
            <!-- end navigation -->
    </div>
    <div id = "uconnIsID" class = "clearfix" role = "subbanner">
        <div id = "uconnIsContentID">
            <div id = "uconnIsTxtID">
<?php if(is_active_sidebar('uconn-is')): ?>
<?php dynamic_sidebar('uconn-is'); ?>
<?php else : ?>
                <img src = "<?php echo  $path ?>/images/wilburcross-provost.jpg" alt = "uconn photo" id = "sub-uconnisID" align = "left" />
               <p>Welcome to the Office of the Provost at the University of Connecticut. As a world-class institution of higher education, UConn strives to improve the lives of its students and enhance the economic and social well-being of the state and its citizens.</p>
<p>We believe, that as a public institution, it is important to push the potential of the human mind and to ensure we continue to strive in becoming an institution that fosters collaboration to help advance the future of humanity.</p>
<?php endif; ?>
            </div>
        </div>
    </div>
    <div id = "contentID" class = "clearfix" role = "content">
	<div id = "containerID" class = "clearfix">
        <div id = "leftNavID" role = "sidemenus">
            <!-- start left side navigation -->
<?php wp_nav_menu( array( 'theme_location' => 'left-menu', 'menu_id' => 'leftSideMenuID') ); ?><!-- end top menu -->
<!-- end left side navigation -->
        </div>
	<div id="mainSection" role="webcontent">