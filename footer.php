<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Provost_Office
 * @since Provost Office 0.5
 */
?>
		</div>
        </div>
    </div>
    <div id = "footerID" class = "clearfix" role = "footer">
        <div id = "footerContentID">
            <!-- start footer navigation -->
<?php wp_nav_menu( array( 'theme_location' => 'bottom-menu', 'menu_id' => 'footerMenuID') ); ?><!-- end top menu -->
            <!-- end footer navigation -->
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>