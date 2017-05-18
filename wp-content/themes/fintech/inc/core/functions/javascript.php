<?php

/* ----------------------------------------------------------------------------------- */
/*  Register and load common JS
  /*----------------------------------------------------------------------------------- */

function fintechcommercegurus_register_production_js() {

	if ( !is_admin() ) {
		// don't concat and minify these
		wp_enqueue_script( 'waypoints', fintechcommercegurus_JS . '/dist/waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'bootstrap_js', fintechcommercegurus_BOOTSTRAP_JS . '/bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'magnific-popup', fintechcommercegurus_JS . '/src/cond/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'owlcarousel', fintechcommercegurus_JS . '/src/cond/owl.carousel.min.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'fintechcommercegurus_modernizr_custom', fintechcommercegurus_JS . '/src/cond/modernizr.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'fintechcommercegurus_ticker', fintechcommercegurus_JS . '/src/cond/inewsticker.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'imagesloaded', fintechcommercegurus_JS . '/src/cond/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );
		
		wp_enqueue_script( 'fintechcommercegurus_quickview', fintechcommercegurus_JS . '/src/cond/cg_quickview.js', array( 'jquery' ), '', true );
		wp_localize_script( 'fintechcommercegurus_quickview', 'fintechcommercegurus_ajax', array( 'fintechcommercegurus_ajax_url' => admin_url( 'admin-ajax.php' ) ) );

		// Minified versions of all plugins in /js/src/plugins
		wp_enqueue_script( 'fintechcommercegurus_commercegurus_plugins_js', fintechcommercegurus_JS . '/dist/plugins.min.js', array( 'jquery' ), '', true );

		if ( fintechcommercegurus_is_live_demo() ) {
			wp_enqueue_script( 'jqueryui', fintechcommercegurus_JS . '/src/cond/jquery-ui.min.js', array(), '', true );
			wp_enqueue_script( 'fintechcommercegurus-livepreviewjs', fintechcommercegurus_JS . '/src/cond/livepreview.js', array(), '', true );
			wp_localize_script('fintechcommercegurus-livepreviewjs', 'WPURLS', array( 'siteurl' => home_url( '/' ) ));
		}

		// Minified commercegurus.js call from /src/commercegurus.js original - /dist/commercegurus.min.js
		wp_enqueue_script( 'fintechcommercegurus_commercegurus_js', fintechcommercegurus_JS . '/dist/commercegurus.min.js', array( 'jquery' ), '', true );
	}
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_register_production_js' );

function fintechcommercegurus_register_debug_js() {

	if ( !is_admin() ) {

		//Loading from unminified source

		wp_enqueue_script( 'waypoints', fintechcommercegurus_JS . '/dist/waypoints.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'bootstrap_js', fintechcommercegurus_BOOTSTRAP_JS . '/bootstrap.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'magnific-popup', fintechcommercegurus_JS . '/src/cond/jquery.magnific-popup.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fintechcommercegurus_modernizr_custom', fintechcommercegurus_JS . '/src/cond/modernizr.js', array( 'jquery' ), '', false );		
		wp_enqueue_script( 'fintechcommercegurus_ticker', fintechcommercegurus_JS . '/src/cond/inewsticker.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'imagesloaded', fintechcommercegurus_JS . '/src/cond/imagesloaded.pkgd.min.js', array( 'jquery' ), '', true );

		
		wp_enqueue_script( 'fintechcommercegurus_quickview', fintechcommercegurus_JS . '/src/cond/cg_quickview.js', array( 'jquery' ), '', true );
		wp_localize_script( 'fintechcommercegurus_quickview', 'fintechcommercegurus_ajax', array( 'fintechcommercegurus_ajax_url' => admin_url( 'admin-ajax.php' ) ) );
		wp_enqueue_script( 'classie_js', fintechcommercegurus_JS . '/src/plugins/classie.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'uisearch_js', fintechcommercegurus_JS . '/src/plugins/uisearch.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'bootstrap_select_js', fintechcommercegurus_JS . '/src/plugins/bootstrap-select.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'owlcarousel', fintechcommercegurus_JS . '/src/cond/owl.carousel.min.js', array( 'jquery' ), '', false );
		wp_enqueue_script( 'jrespond', fintechcommercegurus_JS . '/src/plugins/jRespond.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fintechcommercegurus_cookie', fintechcommercegurus_JS . '/src/plugins/cookie.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'meanmenu', fintechcommercegurus_JS . '/src/plugins/jquery.meanmenu.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'flexslider', fintechcommercegurus_JS . '/src/plugins/jquery.flexslider-min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'skrollr', fintechcommercegurus_JS . '/src/plugins/skrollr.js', array( 'jquery' ), '', true );



		if ( fintechcommercegurus_is_live_demo() ) {
			wp_enqueue_script( 'jqueryui', fintechcommercegurus_JS . '/src/cond/jquery-ui.min.js', array(), '', true );
			wp_enqueue_script( 'fintechcommercegurus-livepreviewjs', fintechcommercegurus_JS . '/src/cond/livepreview.js', array(), '', true );
			wp_localize_script('fintechcommercegurus-livepreviewjs', 'WPURLS', array( 'siteurl' => get_option('siteurl') ));

		}

		// Full source commerceugurus.js call
		wp_enqueue_script( 'fintechcommercegurus_commercegurus_js', fintechcommercegurus_JS . '/src/commercegurus.js', array( 'jquery' ), '', true );
	}
}

//add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_register_debug_js' );

//uncomment the next line if you wish to enqueue individual js files. If you uncomment the next line you will also need to comment out
//line 35 above-> add_action( 'init', 'fintechcommercegurus_register_production_js' );
//add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_register_debug_js' );
// load portfolio scripts only on portfolio template
function fintechcommercegurus_showcase_js() {
	if ( (is_page_template( 'template-showcase-4col.php' )) || (is_page_template( 'template-showcase-4col-alt.php' )) || (is_page_template( 'template-showcase-3col.php' )) || (is_page_template( 'template-showcase-2col.php' )) ) {
		wp_enqueue_script( 'isotope', fintechcommercegurus_JS . '/src/cond/isotope.pkgd.min.js', array( 'jquery' ), '1.0', false );
		wp_enqueue_script( 'fintechcommercegurus_showcasejs', fintechcommercegurus_JS . '/src/cond/jquery.tfshowcase.js', array( 'jquery' ), '1.0', false );
	}
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_showcase_js' );

/**
 * Enqueue scripts and styles
 */
function fintechcommercegurus_scripts() {

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'fintechcommercegurus-keyboard-image-navigation', fintechcommercegurus_JS . '/src/cond/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_scripts' );

/* header js for preloader */
if ( !function_exists( 'fintechcommercegurus_preloader_js' ) ) {
	function fintechcommercegurus_preloader_js() {
		$fintechcommercegurus_preloader	 = '';
		$fintechcommercegurus_preloader	 = fintechcommercegurus_getoption( 'fintechcommercegurus_preloader' );
		if ( $fintechcommercegurus_preloader !== 'disabled' ) {
			wp_enqueue_script( 'fintechcommercegurus_preloader', fintechcommercegurus_JS . '/src/cond/cg_preloader.js', array( 'jquery' ), '', true );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_preloader_js' );