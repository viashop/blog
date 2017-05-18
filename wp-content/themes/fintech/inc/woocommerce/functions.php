<?php
/**
 * General functions used to integrate this theme with WooCommerce.
 *
 * @package fintech
 */

/**
 * Before Content
 * Wraps all WooCommerce content in wrappers which match the theme markup
 * @since   1.0.0
 * @return  void
 */

if ( ! function_exists( 'fintechcommercegurus_header_before_content' ) ) {
	function fintechcommercegurus_header_before_content() {
		?>
		
		<?php do_action( 'fintechcommercegurus_woo_title' ); ?>
	    	<?php
	}
}

if ( ! function_exists( 'fintechcommercegurus_before_content' ) ) {
	function fintechcommercegurus_before_content() {
		?>
		<div class="breadcrumbs-wrapper-line"></div>
		<div class="container cg-shop-main">
			<div class="row row-eq-height">
				<div class="col-lg-8 col-md-8">

				<?php echo fintechcommercegurus_get_bcrumbs(); ?>
	    	<?php
	}
}


/**
 * After Content
 * Closes the wrapping divs
 * @since   1.0.0
 * @return  void
 */
if ( ! function_exists( 'fintechcommercegurus_after_content' ) ) {
	function fintechcommercegurus_after_content() {
		?>
				</div>
				<div class="col-lg-4 col-md-4 sidebar">
            		<div id="secondary">
						<?php dynamic_sidebar( 'shop-sidebar' ); ?>
					</div>	
            	</div>

			</div>
		</div>
	<?php }
}

/**
 * Removes page titles
 * @since   1.0.0
 * @return  void
 */
function fintechcommercegurus_override_page_title() {
return false;
}
add_filter('woocommerce_show_page_title', 'fintechcommercegurus_override_page_title');

// Change number or products per row to 3
add_filter('loop_shop_columns', 'fintechcommercegurus_loop_columns');
if (!function_exists('fintechcommercegurus_loop_columns')) {
	function fintechcommercegurus_loop_columns() {
		return 3; // 3 products per row
	}
}

// Change number of related products per row to 3
add_filter( 'woocommerce_output_related_products_args', 'fintechcommercegurus_related_products_count' );
 
function fintechcommercegurus_related_products_count( $args ) {
     $args['posts_per_page'] = 3;
     $args['columns'] = 3;
 
     return $args;
}

// Change number of upsell products per row to 3
add_filter( 'woocommerce_output_upsells_args', 'fintechcommercegurus_upsell_products_count' );
 
function fintechcommercegurus_upsell_products_count( $args ) {
     $args['posts_per_page'] = 3;
     $args['columns'] = 3;
 
     return $args;
}

// Change number of products per page to 9
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 9;' ), 20 );


// Remove Jetpack's Related Posts for WooCommerce
function fintechcommercegurus_jetpack_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'fintechcommercegurus_jetpack_remove_rp', 20 );

?>