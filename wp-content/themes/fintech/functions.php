<?php

/**
 * CommerceGurus functions and definitions
 * Maybe your best course would be to tread lightly.
 *
 * @package commercegurus
 */

function fintechcommercegurus_getoption( $option, $fallback = false ) {
	global $fintechcommercegurus_options;
    if ( $fallback == false ) {
        $fallback = '';		
	}
	
    $output = ( isset( $fintechcommercegurus_options[$option] ) && $fintechcommercegurus_options[$option] !== '' ) ? $fintechcommercegurus_options[$option] : $fallback;
    return $output;
}

/**
 * Global Paths
 */
define( 'fintechcommercegurus_FILEPATH', get_template_directory() );
define( 'fintechcommercegurus_THEMEURI', get_template_directory_uri() );
define( 'fintechcommercegurus_BOOTSTRAP_JS', get_template_directory_uri() . '/inc/core/bootstrap/dist/js' );
define( 'fintechcommercegurus_JS', get_template_directory_uri() . '/js' );
define( 'fintechcommercegurus_CORE', get_template_directory() . '/inc/core' );


/**
 * Constants for Plugins
 */
define( 'ULTIMATE_USE_BUILTIN', true );


/**
 * Load Globals
 */
require_once( fintechcommercegurus_CORE . '/functions/javascript.php' );
require_once( fintechcommercegurus_CORE . '/functions/get-the-image.php' );
require_once( fintechcommercegurus_CORE . '/menus/wp_bootstrap_navwalker.php' );
require_once( fintechcommercegurus_CORE . '/menus/megadropdown.php' );


/**
 * TGM Plugin Activation
 */
require_once ( fintechcommercegurus_CORE . '/functions/class-tgm-plugin-activation.php' );
add_action( 'tgmpa_register', 'fintechcommercegurus_register_required_plugins' );

function fintechcommercegurus_register_required_plugins() {

	/**
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'		 => 'Advanced Custom Fields', // The plugin name
			'slug'		 => 'advanced-custom-fields', // The plugin slug (typically the folder name)
			'required'	 => true, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'		 => 'Advanced Sidebar Menu', // The plugin name
			'slug'		 => 'advanced-sidebar-menu', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
			'name'		 => 'Redux Framework', // The plugin name
			'slug'		 => 'redux-framework', // The plugin slug (typically the folder name)
			'required'	 => true, // If false, the plugin is only 'recommended' instead of required
		),
        array(
            'name'               => 'Layer Slider', // The plugin name
            'slug'               => 'LayerSlider', // The plugin slug (typically the folder name)
            'source'             => 'http://files.commercegurus.com/layersliderwp-6.2.2.installable.zip', // The plugin source
            'required'           => false, // If false, the plugin is only 'recommended' instead of required
            'version'            => '6.2.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'       => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name'               => 'WPBakery Visual Composer', // The plugin name
            'slug'               => 'js_composer', // The plugin slug (typically the folder name)
            'source'             => 'http://files.commercegurus.com/js_composer_5.1/js_composer.zip', // The plugin source
            'required'           => false, // If false, the plugin is only 'recommended' instead of required
            'version'            => '5.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url'       => '', // If set, overrides default API URL and points to an external URL
        ),
        array(
            'name' => 'CommerceGurus Toolkit', // The plugin name
            'slug' => 'commercegurus-toolkit', // The plugin slug (typically the folder name)
            'source' => 'http://files.commercegurus.com/commercegurus-toolkit.zip', // The plugin source
            'required' => true, // If false, the plugin is only 'recommended' instead of required
            'version' => '1.6.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
            'force_activation' => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
            'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
            'external_url' => '', // If set, overrides default API URL and points to an external URL
        ),
		array(
			'name'		 => 'Contact Form 7', // The plugin name
			'slug'		 => 'contact-form-7', // The plugin slug (typically the folder name)
			'required'	 => false, // If false, the plugin is only 'recommended' instead of required
		),
		array(
            'name' => 'MailChimp for WordPress', // The plugin name
            'slug' => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Yoast SEO', // The plugin name
            'slug' => 'wordpress-seo', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
        array(
            'name' => 'Widget CSS Classes', // The plugin name
            'slug' => 'widget-css-classes', // The plugin slug (typically the folder name)
            'required' => false, // If false, the plugin is only 'recommended' instead of required
        ),
	);

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'			 => 'fintech', // Text domain - likely want to be the same as your theme.
		'default_path'		 => '', // Default absolute path to pre-packaged plugins
		'parent_slug'	 => 'themes.php', // Default parent menu slug
		'menu'				 => 'tgmpa-install-plugins', // Menu slug
		'has_notices'		 => true, // Show admin notices or not
		'is_automatic'		 => false, // Automatically activate plugins after installation or not
		'message'			 => '', // Message to output right before the plugins table
		'strings'			 => array(
			'page_title'						 => esc_html__( 'Install Required Plugins', 'fintech' ),
			'menu_title'						 => esc_html__( 'Install Plugins', 'fintech' ),
			'installing'						 => esc_html__( 'Installing Plugin: %s', 'fintech' ), // %1$s = plugin name
			'oops'								 => esc_html__( 'Something went wrong with the plugin API.', 'fintech' ),
			'notice_can_install_required'		 => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'fintech' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'	 => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'fintech' ), // %1$s = plugin name(s)
			'notice_cannot_install'				 => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'fintech' ), // %1$s = plugin name(s)
			'notice_can_activate_required'		 => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'fintech' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'	 => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'fintech' ), // %1$s = plugin name(s)
			'notice_cannot_activate'			 => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'fintech' ), // %1$s = plugin name(s)
			'notice_ask_to_update'				 => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'fintech' ), // %1$s = plugin name(s)
			'notice_cannot_update'				 => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'fintech' ), // %1$s = plugin name(s)
			'install_link'						 => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'fintech' ),
			'activate_link'						 => _n_noop( 'Activate installed plugin', 'Activate installed plugins', 'fintech' ),
			'return'							 => esc_html__( 'Return to Required Plugins Installer', 'fintech' ),
			'plugin_activated'					 => esc_html__( 'Plugin activated successfully.', 'fintech' ),
			'complete'							 => esc_html__( 'All plugins installed and activated successfully. %s', 'fintech' ), // %1$s = dashboard link
			'nag_type'							 => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

/**
 * Demo Data Installer
 */
require get_template_directory() . '/inc/radium-one-click-demo-install/init.php';


/**
 * Live Preview
 */

if ( !defined( 'fintechcommercegurus_LIVEDEMO' ) ) {
	define( 'fintechcommercegurus_LIVEDEMO', false );
}

function fintechcommercegurus_is_live_demo() {
	if ( fintechcommercegurus_LIVEDEMO ) {
		return true;
	} else {
		return false;
	}
}


if ( fintechcommercegurus_is_live_demo() ) {

	add_action( 'after_setup_theme', 'fintechcommercegurus_start_live_session', 1 );
	add_action( 'wp_logout', 'fintechcommercegurus_end_live_session' );
	add_action( 'wp_login', 'fintechcommercegurus_end_live_session' );

	//start live session
	if ( !function_exists( 'fintechcommercegurus_start_live_session' ) ) {

		function fintechcommercegurus_start_live_session() {
			if ( !session_id() ) {
				session_start();
			}
		}

	}

	//end live session 
	if ( !function_exists( 'fintechcommercegurus_end_live_session' ) ) {

		function fintechcommercegurus_end_live_session() {
			session_destroy();
		}

	}
}

/**
 * Load CSS
 */
function fintechcommercegurus_load_styles() {

	$fintechcommercegurus_responsive_status = '';
	$fintechcommercegurus_responsive_status = fintechcommercegurus_getoption( 'fintechcommercegurus_responsive' );

	wp_register_style( 'bootstrap', get_template_directory_uri() . '/inc/core/bootstrap/dist/css/bootstrap.min.css' );
	wp_register_style( 'fintechcommercegurus-commercegurus', get_template_directory_uri() . '/css/commercegurus.css' );

	if ( $fintechcommercegurus_responsive_status !== 'disabled' ) {
		wp_register_style( 'fintechcommercegurus-responsive', get_template_directory_uri() . '/css/responsive.css' );
	}

	if ( $fintechcommercegurus_responsive_status == 'disabled' ) {
		wp_register_style( 'fintechcommercegurus-non-responsive', get_template_directory_uri() . '/css/non-responsive.css' );
	}

	wp_enqueue_style( 'fintechcommercegurus-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css' );
	wp_enqueue_style( 'ionicons', get_template_directory_uri() . '/css/ionicons.css' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'fintechcommercegurus-commercegurus' );

	if ( $fintechcommercegurus_responsive_status !== 'disabled' ) {
		wp_enqueue_style( 'fintechcommercegurus-responsive' );
	}

	if ( $fintechcommercegurus_responsive_status == 'disabled' ) {
		wp_enqueue_style( 'fintechcommercegurus-non-responsive' );
	}

	if ( fintechcommercegurus_is_live_demo() ) {
		wp_enqueue_style( 'fintechcommercegurus-livepreviewcss', get_template_directory_uri() . '/css/livepreview.css' );
	}

	// skins
	$cg_skin_color 			 = ''; 
	$cg_skin_color			 = fintechcommercegurus_getoption( 'fintechcommercegurus_skin_color' );

	if ( !empty( $_SESSION['fintechcommercegurus_skin_color'] ) ) {
		$cg_skin_color = $_SESSION['fintechcommercegurus_skin_color'];
	}

	if ( isset( $cg_skin_color ) ) {
		if ( $cg_skin_color !== 'none' ) {
			wp_enqueue_style( 'fintechcommercegurus-cssskin', get_template_directory_uri() . '/css/skins/' . $cg_skin_color . '.css' );
		}
	}	

}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_load_styles' );

// Load css from theme options.
require_once( fintechcommercegurus_CORE . '/css/custom-css.php' );

/**
 * Maybe load js
 */
function fintechcommercegurus_maybe_load_scripts() {

	$fintechcommercegurus_sticky_menu			 = '';
	$fintechcommercegurus_display_search		 = '';
	$fintechcommercegurus_sticky_menu = fintechcommercegurus_getoption( 'fintechcommercegurus_sticky_menu' );

	if ( $fintechcommercegurus_sticky_menu == '1' ) {
		wp_enqueue_script( 'fintechcommercegurus_scrollfix', fintechcommercegurus_JS . '/src/cond/scrollfix.js', array( 'jquery' ), '', false );
	}

	$fintechcommercegurus_display_search = fintechcommercegurus_getoption( 'fintechcommercegurus_show_search' );
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_maybe_load_scripts' );


/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( $disable_updater = true );

	// Disable frontend editor by default - to re-enable just comment out the next line
	vc_disable_frontend();
}

// Initialising Shortcodes
if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

	function fintechcommercegurus_requireVcExtend() {
		require_once locate_template( '/customvc/vc_extend.php' );
	}

	add_action( 'init', 'fintechcommercegurus_requireVcExtend', 2 );

	// Set VC tpl override directory
	$vcdir = get_stylesheet_directory() . '/customvc/vc_templates/';
	vc_set_shortcodes_templates_dir( $vcdir );


	// Remove VC nag looking for key - CommerceGurus has an extended lic.

	if ( is_admin() ) {
		function fintechcommercegurus_remove_vc_nag() {
			setcookie( 'vchideactivationmsg_vc11', ( defined( 'WPB_VC_VERSION' ) ? WPB_VC_VERSION : '1' ), strtotime( '+3 years' ), '/' );
		}
		add_action( 'init', 'fintechcommercegurus_remove_vc_nag' );
	}
	add_action( 'vc_after_mapping', function(){ if( is_admin() ) $_COOKIE['vchideactivationmsg_vc11'] = 30; } );

}


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( !function_exists( 'fintechcommercegurus_setup' ) ) :

	function fintechcommercegurus_setup() {

		/**
		 * Translations can be filed in the /languages/ directory
		 * If you're building a theme based on a commercegurus theme, use a find and replace
		 * to change 'fintech' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'fintech', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to head
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary'	 => esc_html__( 'Primary Menu', 'fintech' ),
		) );

		/**
		 * Infinite Scroll Support via Jetpack
		 */


		function fintechcommercegurus_infinite_scroll_supported() {
			return current_theme_supports( 'infinite-scroll' ) && ( is_home() || is_archive() || is_search() ) && ! ( is_post_type_archive( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) );
		}
		add_filter( 'infinite_scroll_archive_supported', 'fintechcommercegurus_infinite_scroll_supported' );

		add_theme_support( 'infinite-scroll', array(
		    'container' => 'primary',
		    'type' => 'click',
		    'footer' => 'page',
		) );
		
		/**
		 * Custom Thumbnails
		 */
		if ( function_exists( 'add_theme_support' ) ) {
			add_theme_support( 'post-thumbnails' );
			add_image_size( 'fintechcommercegurus-hp-latest-posts', 380, 250, true );
		}

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Formats
		 */
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'audio', 'quote', 'link' ) );

	}

endif; // cg_setup
add_action( 'after_setup_theme', 'fintechcommercegurus_setup' );


/**
 * Add Redux Framework
 */
require_once get_template_directory() . '/admin/options-init.php';


/**
 * Prevent HTML from being stripped within the WordPress Menu Description Field
 * @param string $menu the current menu HTML
 * @return string the modified menu HTML
 */

remove_filter('nav_menu_description', 'strip_tags');

/**
 * Set WooCommerce image dimensions upon activation
 */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' )
	add_action( 'init', 'fintechcommercegurus_woocommerce_image_dimensions', 1 );

/**
 * Define image sizes
 */
function fintechcommercegurus_woocommerce_image_dimensions() {
	$catalog = array(
		'width'	 => '300', // px
		'height' => '390', // px
		'crop'	 => 1  // true
	);

	$single = array(
		'width'	 => '500', // px
		'height' => '650', // px
		'crop'	 => 1  // true
	);

	$thumbnail = array(
		'width'	 => '120', // px
		'height' => '155', // px
		'crop'	 => 1  // false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog );	// Product category thumbs
	update_option( 'shop_single_image_size', $single );   // Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail );   // Image gallery thumbs
}

/**
 * Register widgetized area and update sidebar with default widgets
 */
function fintechcommercegurus_widgets_init() {

	register_sidebar( array(
		'name'			 => esc_html__( 'Sidebar', 'fintech' ),
		'id' 			 => 'sidebar-1',
		'description' => esc_html__( 'The main sidebar used in most places by default', 'fintech' ),
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Pages Sidebar', 'fintech' ),
		'id'			 => 'sidebar-pages',
		'description' => esc_html__( 'Sidebar for pages', 'fintech' ),
		'before_widget'	 => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'	 => '</aside>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
        'name' => esc_html__( 'Shop Sidebar', 'fintech' ),
        'id' => 'shop-sidebar',
		'description' => esc_html__( 'Sidebar for shop pages', 'fintech' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title"><span>',
        'after_title' => '</span></h4>',
    ) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Top Toolbar - Left', 'fintech' ),
		'id'			 => 'top-bar-left',
		'description' => esc_html__( 'Widgets in the top left toolbar in the header', 'fintech' ),
		'before_widget'	 => '<div id="%1$s" class="%2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Top Toolbar - Right', 'fintech' ),
		'id'			 => 'top-bar-right',
		'description' => esc_html__( 'Widgets in the top right toolbar in the header', 'fintech' ),
		'before_widget'	 => '<div id="%1$s" class="%2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Header Details', 'fintech' ),
		'id'			 => 'header-details',
		'description' => esc_html__( 'Widget area that appears in the header next to the logo', 'fintech' ),
		'before_widget'	 => '<div class="cg-header-details %2$s">',
		'after_widget'	 => '</div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'First Footer', 'fintech' ),
		'id'			 => 'first-footer',
		'description' => esc_html__( 'First row of footer widgets', 'fintech' ),
		'before_widget'	 => '<div id="%1$s"><div class="inner-widget-wrap">',
		'after_widget'	 => '</div></div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );

	register_sidebar( array(
		'name'			 => esc_html__( 'Second Footer', 'fintech' ),
		'id'			 => 'second-footer',
		'description' => esc_html__( 'Second row of footer widgets', 'fintech' ),
		'before_widget'	 => '<div id="%1$s" class="col-lg-4 col-md-4 col-sm-12 col-xs-12 %2$s"><div class="inner-widget-wrap">',
		'after_widget'	 => '</div></div>',
		'before_title'	 => '<h4 class="widget-title"><span>',
		'after_title'	 => '</span></h4>',
	) );
}

add_action( 'widgets_init', 'fintechcommercegurus_widgets_init' );

// Add excerpts to pages
add_action( 'init', 'fintechcommercegurus_add_excerpts_to_pages' );
function fintechcommercegurus_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}

// Remove certain custom post types from the CG Toolkit
if ( ! function_exists( 'fintechcommercegurus_unregister_announcements' ) ) :
function fintechcommercegurus_unregister_announcements() {
    global $wp_post_types;
    if ( isset( $wp_post_types[ 'shopannouncements' ] ) ) {
        unset( $wp_post_types[ 'shopannouncements' ] );
        return true;
    }
    return false;
}
endif;

if ( ! function_exists( 'fintechcommercegurus_unregister_testimonials' ) ) :
function fintechcommercegurus_unregister_testimonials() {
    global $wp_post_types;
    if ( isset( $wp_post_types[ 'testimonials' ] ) ) {
        unset( $wp_post_types[ 'testimonials' ] );
        return true;
    }
    return false;
}
endif;

if ( ! function_exists( 'fintechcommercegurus_unregister_topreviews' ) ) :
function fintechcommercegurus_unregister_topreviews() {
    global $wp_post_types;
    if ( isset( $wp_post_types[ 'topreviews' ] ) ) {
        unset( $wp_post_types[ 'topreviews' ] );
        return true;
    }
    return false;
}
endif;

if ( ! function_exists( 'fintechcommercegurus_unregister_showcases' ) ) :
function fintechcommercegurus_unregister_showcases() {
    global $wp_post_types;
    if ( isset( $wp_post_types[ 'showcases' ] ) ) {
        unset( $wp_post_types[ 'showcases' ] );
        return true;
    }
    return false;
}
endif;

add_action( 'init', 'fintechcommercegurus_unregister_announcements', 100 );
add_action( 'init', 'fintechcommercegurus_unregister_testimonials', 100 );
add_action( 'init', 'fintechcommercegurus_unregister_topreviews', 100 );
add_action( 'init', 'fintechcommercegurus_unregister_showcases', 100 );


/**
 * Convert Yoast breadcrumbs to use Microdata
 *
 * @params string $breadcrumbs Breadcrumb HTML
 * @return string
 * @author Jaik Dean
 **/
function convertBreadcrumbsToMicrodata($breadcrumbs)
{
    // remove the XML namespace
    $breadcrumbs = str_replace(' xmlns:v="http://rdf.data-vocabulary.org/#"', '', $breadcrumbs);
 
    // convert each breadcrumb
    $breadcrumbs = preg_replace(
        '/<span typeof="v:Breadcrumb"><a href="([^"]+)" rel="v:url" property="v:title">([^<]+)<\\/a><\\/span>/',
        '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="$1" itemprop="url"><span itemprop="title">$2</span></a></span>',
        $breadcrumbs
    );
 
    $breadcrumbs = preg_replace(
        '/<span typeof="v:Breadcrumb"><span class="breadcrumb_last" property="v:title">([^<]+)<\\/span><\\/span>/',
        '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><span class="breadcrumb_last" itemprop="title">$1</span></span>',
        $breadcrumbs
    );
 
    return $breadcrumbs;
}


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Adds a body class if a featured image is present
 */
function fintechcommercegurus_featured_image_body_class( $classes ) {
	global $post;

	if ( isset( $post->ID ) && get_the_post_thumbnail( $post->ID ) ) {
		$classes[] = 'has-featured-image';
	}

	return $classes;
}

add_filter( 'body_class', 'fintechcommercegurus_featured_image_body_class' );


/* WooCommerce */

/* ----------------------------------------------------------------------------------- */
/* Start Woo Functions - Please refrain from editing this section */
/* ----------------------------------------------------------------------------------- */

// Custom function to check if WooCommerce is active - support for WPMU

if ( !function_exists( 'is_wc_active' ) ) {

	function is_wc_active() {
		if ( class_exists( 'WooCommerce' ) ) {
			return true;
		} else {
			return false;
		}
	}

}

/**
 * Load WooCommerce Config.
 */
if ( is_wc_active() ) {
    require get_template_directory() . '/inc/woocommerce/hooks.php';
    require get_template_directory() . '/inc/woocommerce/functions.php';
}

// Custom function to check if WooCommerce is active and is the shop page

if ( !function_exists( 'is_wc_shop' ) ) {

	function is_wc_shop() {
		if ( class_exists( 'WooCommerce' ) ) {
			if ( is_shop() ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

}

// Register Support
add_theme_support( 'woocommerce' );
add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( !isset( $content_width ) )
	$content_width = 640; /* pixels */

// End of core functions.