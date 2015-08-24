<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */

function excerpt($limit) {
	
	$excerpt = explode(' ', get_the_content(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
	return $excerpt;
}

load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

$locale = get_locale();
$locale_file = get_template_directory() . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

// Register Custom Navigation Walker
require_once('wp_bootstrap_navwalker.php');

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
//remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/

/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' )
) );

/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );
add_image_size( 'p1', 640, 200, true );

/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Disable the admin bar in 3.1
 */
//show_admin_bar( false );

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function handcraftedwp_widgets_init() {
    register_sidebar(array(  
        'name' => 'Homepage Left Column',  
        'id'   => 'left_column',  
        'description'   => 'Widget area for home age left column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  
    register_sidebar(array(  
        'name' => 'Homepage Center Column',  
        'id'   => 'center_column',  
        'description'   => 'Widget area for homepage center column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  
    register_sidebar(array(  
        'name' => 'Homepage Right Column',  
        'id'   => 'right_column',  
        'description'   => 'Widget area for homepage right column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>'
	) );
	register_sidebar(array(  
        'name' => 'Footer Left Column',  
        'id'   => 'f_left_column',  
        'description'   => 'Widget area for footer center column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  
    register_sidebar(array(  
        'name' => 'Footer Center Column',  
        'id'   => 'f_center_column',  
        'description'   => 'Widget area for footer right column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  
	register_sidebar(array(  
        'name' => 'Footer Right Column',  
        'id'   => 'f_right_column',  
        'description'   => 'Widget area for footer right column',  
        'before_widget' => '<div id="%1$s" class="widget %2$s">',  
        'after_widget'  => '</div>',  
        'before_title'  => '<h2>',  
        'after_title'   => '</h2>'  
    ));  

}
add_action( 'init', 'handcraftedwp_widgets_init' );

/* Arie - TNFP */


function get_not_sys_cat_name() {
	$sys_cat_slugs = array(
		'abre',
		'manchete',
		'nota-1',
		'nota-2',
		'nota-foto',
		'foto-leg'
	);
	
	$catss = array();
	
	foreach($__cats = get_the_category() as $cat) {
		$slug = $cat->slug;
		
		if(!in_array($slug, $sys_cat_slugs)){
			print_r($cat->name);
		}
	}
}

function tnfp_setup() {
	register_nav_menus(
		array(
			'footer-nav' => __( 'Header Menu', 'bootpress' ),
			'top_menu' => __( 'Top Menu', 'bootpress' )
		)
	);
}
add_action( 'after_setup_theme', 'tnfp_setup' );
//if (class_exists('MultiPostThumbnails')) {
//	new MultiPostThumbnails(
//		array(
//			'label' => 'Imagem pra home',
//			'id' => 'secondary-image',
//			'post_type' => 'post'
//		)
//	);
//}

/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

/**
 *	Hide Menu Items in Admin
 */
function themename_configure_dashboard_menu() {
	global $menu,$submenu;

	global $current_user;
	get_currentuserinfo();

		// $menu and $submenu will return all menu and submenu list in admin panel
		
		// $menu[2] = ""; // Dashboard
		// $menu[5] = ""; // Posts
		// $menu[15] = ""; // Links
		// $menu[25] = ""; // Comments
		// $menu[65] = ""; // Plugins

		// unset($submenu['themes.php'][5]); // Themes
		// unset($submenu['themes.php'][12]); // Editor
}


// For non-admins, add action to Hide Dashboard Widgets and Admin Menu Items you just set above
// Don't forget to comment out the admin check to see that changes :)
if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets'); // Add action to hide dashboard widgets
	add_action('admin_head', 'themename_configure_dashboard_menu'); // Add action to hide admin menu items
}


?>
<?php 

/**
 * ILC Tabbed Settings Page
 */

add_action( 'init', 'ilc_admin_init' );
add_action( 'admin_menu', 'ilc_settings_page_init' );

function ilc_admin_init() {
	$settings = get_option( "ilc_theme_settings" );
	if ( empty( $settings ) ) {
		$settings = array(
			'ilc_intro' => 'Some intro text for the home page',
			'ilc_tag_class' => false,
			'ilc_ga' => false
		);
		add_option( "ilc_theme_settings", $settings, '', 'yes' );
	}	
}

function ilc_settings_page_init() {
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	$settings_page = add_theme_page( $theme_data['Name']. ' Settings', $theme_data['Name']. ' Settings', 'edit_theme_options', 'theme-settings', 'ilc_settings_page' );
	add_action( "load-{$settings_page}", 'ilc_load_settings_page' );
}

function ilc_load_settings_page() {
	if ( $_POST["ilc-settings-submit"] == 'Y' ) {
		check_admin_referer( "ilc-settings-page" );
		ilc_save_theme_settings();
		$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		wp_redirect(admin_url('themes.php?page=theme-settings&'.$url_parameters));
		exit;
	}
}

function ilc_save_theme_settings() {
	global $pagenow;
	$settings = get_option( "ilc_theme_settings" );
	
	if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
		if ( isset ( $_GET['tab'] ) )
	        $tab = $_GET['tab']; 
	    else
	        $tab = 'homepage'; 

	    switch ( $tab ){ 
	        case 'general' :
				$settings['ilc_tag_class']	  = $_POST['ilc_tag_class'];
			break; 
	        case 'footer' : 
				$settings['ilc_ga']  = $_POST['ilc_ga'];
			break;
			case 'homepage' : 
				$settings['ilc_intro']	  = $_POST['ilc_intro'];
			break;
	    }
	}
	
	if( !current_user_can( 'unfiltered_html' ) ){
		if ( $settings['ilc_ga']  )
			$settings['ilc_ga'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['ilc_ga'] ) ) );
		if ( $settings['ilc_intro'] )
			$settings['ilc_intro'] = stripslashes( esc_textarea( wp_filter_post_kses( $settings['ilc_intro'] ) ) );
	}

	$updated = update_option( "ilc_theme_settings", $settings );
}

function ilc_admin_tabs( $current = 'homepage' ) { 
    $tabs = array( 'homepage' => 'Home', 'general' => 'General', 'footer' => 'Footer' ); 
    $links = array();
    echo '<div id="icon-themes" class="icon32"><br></div>';
    echo '<h2 class="nav-tab-wrapper">';
    foreach( $tabs as $tab => $name ){
        $class = ( $tab == $current ) ? ' nav-tab-active' : '';
        echo "<a class='nav-tab$class' href='?page=theme-settings&tab=$tab'>$name</a>";
        
    }
    echo '</h2>';
}

function ilc_settings_page() {
	global $pagenow;
	$settings = get_option( "ilc_theme_settings" );
	$theme_data = get_theme_data( TEMPLATEPATH . '/style.css' );
	?>
	
	<div class="wrap">
		<h2><?php echo $theme_data['Name']; ?> Theme Settings</h2>
		
		<?php
			if ( 'true' == esc_attr( $_GET['updated'] ) ) echo '<div class="updated" ><p>Theme Settings updated.</p></div>';
			
			if ( isset ( $_GET['tab'] ) ) ilc_admin_tabs($_GET['tab']); else ilc_admin_tabs('homepage');
		?>

		<div id="poststuff">
			<form method="post" action="<?php admin_url( 'themes.php?page=theme-settings' ); ?>">
				<?php
				wp_nonce_field( "ilc-settings-page" ); 
				
				if ( $pagenow == 'themes.php' && $_GET['page'] == 'theme-settings' ){ 
				
					if ( isset ( $_GET['tab'] ) ) $tab = $_GET['tab']; 
					else $tab = 'homepage'; 
					
					echo '<table class="form-table">';
					switch ( $tab ){
						case 'general' :
							?>
<tr>
<th><label for="ilc_donate">Please Donate </label></th>
<td>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VDP8PJVKH6NHQ" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!"></a><br/>
<span class="description">Please consider donating to help keep this theme updated and feature rich! </span>
</td>
							</tr>

							
							<?php
						break; 
						case 'footer' : 
							?>
							<tr>
								<th><label for="ilc_ga">Insert tracking code:</label></th>
								<td>
									<textarea id="ilc_ga" name="ilc_ga" cols="60" rows="5"><?php echo esc_html( stripslashes( $settings["ilc_ga"] ) ); ?></textarea><br/>
									<span class="description">Enter your Google Analytics tracking code:</span>
								</td>
							</tr>
							<?php
						break;
						case 'homepage' : 
							?>

<tr>
<th><label for="ilc_donate">Please Donate </label></th>
<td>
<a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=VDP8PJVKH6NHQ" target="_blank"><img src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" alt="PayPal - The safer, easier way to pay online!"></a><br/>
<span class="description">Please consider donating to help keep this theme updated and feature rich! </span>
</td>
							</tr>
							<tr>
								<th><label for="ilc_intro">Homepage Blurb </label></th>
								<td>
									<textarea id="ilc_intro" name="ilc_intro" cols="60" rows="5" ><?php echo esc_html( stripslashes( $settings["ilc_intro"] ) ); ?></textarea><br/>
									<span class="description">Enter the blurb text for the home page</span>
								</td>
</tr>

							<?php
						break;
					}
					echo '</table>';
				}
				?>
				<p class="submit" style="clear: both;">
					<input type="submit" name="Submit"  class="button-primary" value="Update Settings" />
					<input type="hidden" name="ilc-settings-submit" value="Y" />
				</p>
			</form>
			
			<p><?php echo $theme_data['Name'] ?> theme by <a href="http://braginteractive.com">braginteractive.com</a> | <a href="http://twitter.com/braginteractive">Follow me on Twitter</a>! | Join <a href="http://facebook.com/braginteractive">braginteractive on Facebook</a>!</p>
		</div>

	</div>
<?php
}


?>