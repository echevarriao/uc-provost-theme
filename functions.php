<?php
/**
 *
 * @package WordPress
 * @subpackage Provost
 * @since Provost 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* added by Orlando Echevarria */

add_action('after_setup_theme', 'register_my_post_types');

function register_my_post_types(){
  
  $provost_formats = array( 'video', 'image', 'gallery', 'status', 'link', 'audio');
  
  add_theme_support( 'post-formats', $provost_formats );
  
}

add_action('wp_enqueue_scripts', 'load_provost_css_js');

function load_provost_css_js(){
  
  wp_enqueue_style('fonts', get_template_directory_uri() . "/css/fonts.css");
  wp_enqueue_style('main',  get_stylesheet_uri());
  wp_enqueue_style('menus', get_template_directory_uri() . "/css/superfish.css");
  
  wp_enqueue_script('jquery');
  wp_enqueue_script('hoverIntent', get_template_directory_uri() . "/js/hoverIntent.js");
  wp_enqueue_script('superfish', get_template_directory_uri() . "/js/superfish.js");
  wp_enqueue_script('supersubs', get_template_directory_uri() . "/js/supersubs.js");
  
}

add_action( 'widgets_init', 'register_my_content' );

function register_my_content() {

  // lets register widgets for front page
  
  // UConn IS widget
  
	register_sidebar(

  array(
  'id' => 'uconn-is',
  'name' => 'UConn Is Section',
  'before_widget' => '',
  'after_widget' => '',
  'before_title' => '',
  'after_title' => '')
	);

  // UConn Today column widget	
	
	register_sidebar(

	array(
	'id' => 'uconn-today',
	'name' => 'UConn Today News',
'before_widget' => '<div class = "front-page-news">',
'after_widget' => '</div>',
'before_title' => '',
'after_title' => ''
	)

	);

  // UConn Health Center column widget
	
	register_sidebar(

	array(
	'id' => 'uconn-healthcenter',
	'name' => 'UConn Health Center',
'before_widget' => '<div class = "front-page-news">',
'after_widget' => '</div>',
'before_title' => '',
'after_title' => ''
	)

	);
	
  // Bottom Featured Item Widget
	
	register_sidebar(

	array(
	'id' => 'bottom-featured',
	'name' => 'Bottom Featured Item',
'before_widget' => '',
'after_widget' => '',
'before_title' => '<div id = "widgettitleID">',
'after_title' => '</div>'
	)

	);

	register_sidebar(

	array(
	'id' => 'top-featured',
	'name' => 'Top Featured Item',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => ''
	)

	);


	
}





add_action( 'init', 'register_provost_menus' );

function register_provost_menus() {

  // register menus

  register_nav_menus(
    array(
	'top-menu' => __( 'Top Menu' ),
	'right-menu' => __( 'Right Menu' ),
	'left-menu' => __( 'Left Menu' ),
	'bottom-menu' => __( 'Bottom Menu' )
    )
  );
	
}

// if the function does not exist
// lets define the function

if(!function_exists("uconn_reDirectPage")){

// add functionality to the HEAD tag

/*
 * @param void
 * @version 0.5
 * @return void
 * @description allows user to redirect page to a different website or page
 * 
 */

add_action('wp_head','uconn_reDirectPage');

function uconn_reDirectPage() {

    global $post;
    
    $redirect = get_post_meta($post->ID, 'redirect', true);
    $url = get_post_meta($post->ID, 'redirecturl', true);

    if((strtolower($redirect) == "yes" || strtolower($redirect) == "true" || strtolower($redirect) == "y") && filter_var($url, FILTER_VALIDATE_URL) == true && (is_page() || is_single())){
	
    print "<meta http-equiv=\"refresh\" content=\"0;url=$url\" />\n\r";
	
    }

}

}

// if the function does not exist
// lets define the function

// add functionality to content section
// allows short code [uconn_gotourl link = "http://www.example.com"]

/*
 * @param void
 * @version 0.2
 * @return void
 * @description allows user to redirect page to a different website or page using a shortcode
 * 
 */

add_shortcode( 'uconn_gotonewurl', 'gotonewurl_shortcode' );

function gotonewurl_shortcode( $atts ) {

    $url = "";

     extract( shortcode_atts( array(
	      'url' => ''), $atts ) );

    $url = $atts['url'];

    if(filter_var($url, FILTER_VALIDATE_URL) && (is_page || is_single())){
    
?>
<p>You will now be redirected momentarily to <a href="<?php print $url; ?>"><?php print $url; ?></a>. If you are not redirected within the next 10 seconds, please <a href="<?php print $url; ?>">click here</a>.</p>
<script language = "javascript">

gotoURL(); // execute function

// function that triggers web browser
// to go to new web site

function gotoURL(){
    
    location.href = "<?php print $url; ?>";
    
}
    
</script>    
<?php } else { ?>
<p>The page is trying redirect you to a URL(<?php print $url; ?>) that is not a valid URL. Please contact the website administrator.</p>
<?php }

}
