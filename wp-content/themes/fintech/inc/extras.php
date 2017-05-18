<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package commercegurus
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 */
function fintechcommercegurus_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}

add_filter( 'wp_page_menu_args', 'fintechcommercegurus_page_menu_args' );

/**
 * Adds custom classes to the array of body classes.
 */
function fintechcommercegurus_body_classes( $classes ) {
	
	$fintechcommercegurus_sticky_menu_class	 	 = '';
	$fintechcommercegurus_hide_prices			 = '';
	$fintechcommercegurus_header_bg_style		 = '';

	$fintechcommercegurus_sticky_menu_class = fintechcommercegurus_getoption( 'fintechcommercegurus_sticky_menu' );
	$fintechcommercegurus_hide_prices = fintechcommercegurus_getoption( 'fintechcommercegurus_hide_prices' );

	// Adds a class of group-blog to blogs with more than 1 published author
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( $fintechcommercegurus_hide_prices == 'yes' ) {
		$classes[] = 'cg-hide-prices';
	}

	$classes[] = 'cg-sticky-enabled';

	return $classes;
}

add_filter( 'body_class', 'fintechcommercegurus_body_classes' );

/**
 * Filter in a link to a content ID attribute for the next/previous image links on image attachment pages
 */
function fintechcommercegurus_enhanced_image_navigation( $url, $id ) {
	if ( !is_attachment() && !wp_attachment_is_image( $id ) )
		return $url;

	$image = get_post( $id );
	if ( !empty( $image->post_parent ) && $image->post_parent != $id )
		$url .= '#main';

	return $url;
}

add_filter( 'attachment_link', 'fintechcommercegurus_enhanced_image_navigation', 10, 2 );

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 */
function fintechcommercegurus_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
	//	return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( esc_html__( 'Page %s', 'fintech' ), max( $paged, $page ) );

	return $title;
}

add_filter( 'wp_title', 'fintechcommercegurus_wp_title', 10, 2 );

function fintechcommercegurus_add_menu_parent( $items ) {
	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}
	return $items;
}

add_filter( 'wp_nav_menu_objects', 'fintechcommercegurus_add_menu_parent' );


/* Boxed class */
if ( !function_exists( 'fintechcommercegurus_boxed_class' ) ) {

	function fintechcommercegurus_boxed_class( $classes ) {
		
		$fintechcommercegurus_boxed_status = '';
		$fintechcommercegurus_boxed_status = fintechcommercegurus_getoption( 'container_style' );
	
		
		if ( !empty( $_SESSION['fintechcommercegurus_boxed'] ) ) {
			$fintechcommercegurus_boxed_status = esc_html( $_SESSION['fintechcommercegurus_boxed'] );
		}

		if ( (  $fintechcommercegurus_boxed_status == 'yes' ) || ( $fintechcommercegurus_boxed_status == 'boxed' ) ) :
			$classes[] = 'boxed';
		else:
			$classes[] = "";
		endif;

		return $classes;
	}

}

add_filter( 'body_class', 'fintechcommercegurus_boxed_class' );

// Initialize some global js vars

if ( !function_exists( 'fintechcommercegurus_js_init' ) ) {

	function fintechcommercegurus_js_init() {
		
		?>
		<script type="text/javascript">
		    var view_mode_default = '<?php echo esc_js( $fintechcommercegurus_options['product_layout'] ) ?>';
		    var cg_sticky_default = '<?php echo esc_js( $fintechcommercegurus_options['fintechcommercegurus_sticky_menu'] ) ?>';
		</script>
		<?php
	}

}

// Util function for building VC row styles - replaces default VC buildstyle function

if ( !function_exists( 'fintechcommercegurus_build_style' ) ) {

	function fintechcommercegurus_build_style( $bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '',
						  $padding_bottom = '', $padding_top = '', $margin_bottom = '' ) {
		$has_image	 = false;
		$style		 = '';
		if ( (int) $bg_image > 0 && ( $image_url	 = wp_get_attachment_url( $bg_image, 'large' ) ) !== false ) {
			$has_image = true;
			$style .= "background-image: url(" . $image_url . ");";
		}
		if ( !empty( $bg_color ) ) {
			$style .= 'background-color: ' . $bg_color . ';';
		}
		if ( !empty( $bg_image_repeat ) && $has_image ) {
			if ( $bg_image_repeat === 'cover' ) {
				$style .= "background-repeat:no-repeat;background-size: cover;";
			} elseif ( $bg_image_repeat === 'contain' ) {
				$style .= "background-repeat:no-repeat;background-size: contain;";
			} elseif ( $bg_image_repeat === 'no-repeat' ) {
				$style .= 'background-repeat: no-repeat;';
			}
		}
		if ( !empty( $font_color ) ) {
			$style .= 'color: ' . $font_color . ';';
		}
		if ( $padding != '' ) {
			$style .= 'padding: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding ) ? $padding : $padding . 'px' ) . ';';
		}
		if ( $padding_bottom != '' ) {
			$style .= 'padding-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_bottom ) ? $padding_bottom : $padding_bottom . 'px' ) . ';';
		}
		if ( $padding_top != '' ) {
			$style .= 'padding-top: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_top ) ? $padding_top : $padding_top . 'px' ) . ';';
		}
		if ( $margin_bottom != '' ) {
			$style .= 'margin-bottom: ' . ( preg_match( '/(px|em|\%|pt|cm)$/', $margin_bottom ) ? $margin_bottom : $margin_bottom . 'px' ) . ';';
		}
		return empty( $style ) ? $style : ' style="' . $style . '"';
	}

}

// Hi ThemeForest review team! This is a safe filter for cleaning up CommerceGurus shortcode output only!
// Credits to bitfade for this solution - https://gist.github.com/bitfade/4555047
// Ref - http://themeforest.net/forums/thread/how-to-add-shortcodes-in-wp-themes-without-being-rejected/98804?page=4#996848

add_filter( "the_content", "fintechcommercegurus_content_filter" );

function fintechcommercegurus_content_filter( $content ) {

	// array of custom shortcodes requiring the fix
	$block = join( "|", array( "fintechcommercegurus_content_strip", "vc_button", "cg_video_banner" ) );

	// opening tag
	$rep = preg_replace( "/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/", "[$2$3]", $content );

	// closing tag
	$rep = preg_replace( "/(<p>)?\[\/($block)](<\/p>|<br \/>)?/", "[/$2]", $rep );

	return $rep;
}

add_action( 'fintechcommercegurus_page_title', 'fintechcommercegurus_page_title_callback' );

function fintechcommercegurus_page_title_callback() {
	global $post, $fintechcommercegurus_options;
	$fintechcommercegurus_is_page_title_bg_color				 = '';
	$fintechcommercegurus_show_page_title						 = '';
	$fintechcommercegurus_page_title_background_color			 = '';
	$fintechcommercegurus_page_title_font_color				 	 = '';
	$fintechcommercegurus_page_title_background_color_style	 	 = '';
	$fintechcommercegurus_page_title_font_color_style			 = '';
	$fintechcommercegurus_cta_heading							 = '';
	$fintechcommercegurus_share_options 						 = '';
	$fintechcommercegurus_header_image						 	 = '';
	$fintechcommercegurus_header_image_style					 = '';

	$fintechcommercegurus_share_options = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

	if ( function_exists( 'get_field' ) ) {

		$fintechcommercegurus_show_page_title			 = get_field( 'show_page_title' );
		$fintechcommercegurus_is_page_title_bg_color	 = get_field( 'fintechcommercegurus_is_page_title_bg_color' );

		if ( $fintechcommercegurus_is_page_title_bg_color == 'true' ) {
			$fintechcommercegurus_page_title_background_color		 = get_field( 'page_title_background_color' );
			$fintechcommercegurus_page_title_background_opacity	 = get_field( 'page_title_background_opacity' );
			$fintechcommercegurus_page_title_font_color			 = get_field( 'page_title_font_color' );
			if ( !empty( $fintechcommercegurus_page_title_background_color ) ) {
				$fintechcommercegurus_page_title_background_color_style = 'style="background-color:' . $fintechcommercegurus_page_title_background_color . '; opacity:' . $fintechcommercegurus_page_title_background_opacity . ';"';
			}
			if ( !empty( $fintechcommercegurus_page_title_font_color ) ) {
				$fintechcommercegurus_page_title_font_color_style = 'style="color:' . $fintechcommercegurus_page_title_font_color . '"';
			}
		}
	}
	?>

	<?php 

	$fintechcommercegurus_cta_heading = fintechcommercegurus_getoption( 'fintechcommercegurus_cta_heading' );

	?>

	<?php if ( $fintechcommercegurus_show_page_title !== 'Hide' ) { ?>

	<?php if (has_post_thumbnail( $post->ID ) ):
	$fintechcommercegurus_header_image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); 
	endif; 

	if ( $fintechcommercegurus_header_image ) {
	$fintechcommercegurus_header_image_style = 'background-image: url('. $fintechcommercegurus_header_image[0] . '); ';
	}
	?>

		<div class="header-wrapper">
			<div class="cg-hero-bg" style="<?php echo $fintechcommercegurus_header_image_style; ?>"></div>
			<div class="overlay"></div> 

			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-12 col-md-12">
						<header class="entry-header">
							<h1 class="cg-page-title fadeIn animated"><?php the_title(); ?></h1>
							<?php 
								if ( function_exists( 'get_field' ) ) {
									if( get_field( 'secondary_title' ) ) {
										echo '<p class="fadeIn animated animate--delayed">' . get_field( 'secondary_title' ) . '</p>';
									} 	
								}
							?>
						</header>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>

	<?php
}

function fintechcommercegurus_get_page_title() {
	do_action( 'fintechcommercegurus_page_title' );
}

function fintechcommercegurus_get_share_options_title() { ?>
	
<?php 
}

function fintechcommercegurus_get_share_options_content() { ?>

<div class="cg-share btn-group pull-right">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
      <span id="cg-share-toggle"><?php esc_html_e( 'Share', 'fintech' ); ?></span>
    </a>
    <ul class="dropdown-menu">
      <li><a class="facebook" target="_blank" href="https://facebook.com/sharer.php?u=<?php echo get_permalink(); ?>"><?php esc_html_e( 'Facebook', 'fintech' ); ?></a></li>
      <li><a class="twitter" target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo get_permalink(); ?>&amp;text=<?php echo urlencode(get_the_title()); ?>"><?php esc_html_e( 'Twitter', 'fintech' ); ?></a></li>
      <li><a class="linkedin" target="_blank" href="https://www.linkedin.com/shareArticle?url=<?php echo get_permalink(); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>"><?php esc_html_e( 'LinkedIn', 'fintech' ); ?></a></li>
      <li><a class="googleplus" target="_blank" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><?php esc_html_e( 'Google+', 'fintech' ); ?></a></li>
      <li><a class="email-link" href="mailto:?body=<?php echo get_permalink(); ?>"><?php esc_html_e( 'Email', 'fintech' ); ?></a></li>
    </ul>
  </div>

	<script type='text/javascript'>
		( function ( $ ) { "use strict";
			$(window).load(function(){
				 $(function(){
					 $(".dropdown-menu").on("click", "li")
				 })
			});
		}( jQuery ) );

	</script>

<?php
}


// Dynamic blog header banner
function fintechcommercegurus_blog_header_banner() {
    global $wp_query, $fintechcommercegurus_options;
    $post_id = '';

    if ( !is_404() ) {
        if ( isset( $wp_query ) ) {
            if ( $wp_query->have_posts() ) {
                $post_id = $wp_query->post->ID;                    
            }
        }
    }

    $fintechcommercegurus_blog_header_bg = '';
    $fintechcommercegurus_blog_archive_title_bg_img = '';
    $fintechcommercegurus_blog_banner_css = '';
    $fintechcommercegurus_blog_archive_banner_css = '';

    if ( is_single() || is_page() ) {
        if ( !empty( $post_id ) ) {
            $fintechcommercegurus_blog_header_bg = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'full' );
        }
        $fintechcommercegurus_blog_banner_css .= "
            .cg-hero-bg {
                background-image: url( $fintechcommercegurus_blog_header_bg[0] );
            }
        ";
        wp_add_inline_style( 'fintechcommercegurus-commercegurus', $fintechcommercegurus_blog_banner_css );

    } else if ( is_wc_active() ) {
		if ( ( is_archive() || is_home() ) && ( !is_wc_shop() && !is_product_category() && !is_product_tag() ) ) {
        	$fintechcommercegurus_blog_archive_title_bg_img_array = fintechcommercegurus_getoption( 'fintechcommercegurus_blog_archive_title_bg_img' );
			if ( $fintechcommercegurus_blog_archive_title_bg_img_array ) {
				$fintechcommercegurus_blog_archive_title_bg_img = $fintechcommercegurus_blog_archive_title_bg_img_array['url'];
			}
    
        	$fintechcommercegurus_blog_archive_banner_css .= "
            	body .cg-hero-bg {
                	background-image: url( $fintechcommercegurus_blog_archive_title_bg_img );
            	}
        	";
        	wp_add_inline_style( 'fintechcommercegurus-commercegurus', $fintechcommercegurus_blog_archive_banner_css );
    	}

    }
    else if ( ( is_archive() || is_home() ) ) {

        $fintechcommercegurus_blog_archive_title_bg_img_array = fintechcommercegurus_getoption( 'fintechcommercegurus_blog_archive_title_bg_img' );
		if ( $fintechcommercegurus_blog_archive_title_bg_img_array ) {
			$fintechcommercegurus_blog_archive_title_bg_img = $fintechcommercegurus_blog_archive_title_bg_img_array['url'];
		}
    
        $fintechcommercegurus_blog_archive_banner_css .= "
            body .cg-hero-bg {
                background-image: url( $fintechcommercegurus_blog_archive_title_bg_img );
            }
        ";
        wp_add_inline_style( 'fintechcommercegurus-commercegurus', $fintechcommercegurus_blog_archive_banner_css );

    } 
}

add_action( 'wp_enqueue_scripts', 'fintechcommercegurus_blog_header_banner' );


// WooCommerce Header

add_action( 'fintechcommercegurus_woo_title', 'fintechcommercegurus_woo_title_callback' );

function fintechcommercegurus_woo_title_callback() {
	global $post;
	$fintechcommercegurus_is_page_title_bg_color				 = '';
	$fintechcommercegurus_show_page_title						 = '';
	$fintechcommercegurus_page_title_background_color			 = '';
	$fintechcommercegurus_page_title_font_color				 = '';
	$fintechcommercegurus_page_title_background_color_style	 = '';
	$fintechcommercegurus_page_title_font_color_style			 = '';
	$fintechcommercegurus_share_options 						 = '';
	$fintechcommercegurus_share_options = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

	if ( function_exists( 'get_field' ) ) {

		$fintechcommercegurus_show_page_title			 = get_field( 'show_page_title' );
		$fintechcommercegurus_is_page_title_bg_color	 = get_field( 'fintechcommercegurus_is_page_title_bg_color' );

		if ( $fintechcommercegurus_is_page_title_bg_color == 'true' ) {
			$fintechcommercegurus_page_title_background_color		 = get_field( 'page_title_background_color' );
			$fintechcommercegurus_page_title_background_opacity	 = get_field( 'page_title_background_opacity' );
			$fintechcommercegurus_page_title_font_color			 = get_field( 'page_title_font_color' );
			if ( !empty( $fintechcommercegurus_page_title_background_color ) ) {
				$fintechcommercegurus_page_title_background_color_style = 'style="background-color:' . $fintechcommercegurus_page_title_background_color . '; opacity:' . $fintechcommercegurus_page_title_background_opacity . ';"';
			}
			if ( !empty( $fintechcommercegurus_page_title_font_color ) ) {
				$fintechcommercegurus_page_title_font_color_style = 'style="color:' . $fintechcommercegurus_page_title_font_color . '"';
			}
		}
	}
	?>

	
	<?php if ( $fintechcommercegurus_show_page_title !== 'Hide' ) { ?>

		<div class="header-wrapper">
		<div class="cg-hero-bg"></div>
			<div class="overlay"></div> 
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-12 col-md-12">
						<header class="entry-header">
							<h1 class="cg-page-title"><?php woocommerce_page_title(); ?></h1>
						</header>
					</div>
					
				</div>
			</div>
		</div>
		<?php // echo fintechcommercegurus_get_bcrumbs(); ?>
	
	<?php }
	?>

	<?php
}

function fintechcommercegurus_get_woo_title() {
	do_action( 'fintechcommercegurus_woo_title' );
}

// End Woo Header

add_action( 'fintechcommercegurus_blog_page_title', 'fintechcommercegurus_blog_page_title_callback' );

function fintechcommercegurus_blog_page_title_callback() {
	
	$fintechcommercegurus_blog_page_title	 = '';
	$fintechcommercegurus_blog_header_bg	 = '';

	$fintechcommercegurus_is_page_title_bg_color				 = '';
	$fintechcommercegurus_show_page_title						 = '';
	$fintechcommercegurus_page_title_background_color			 = '';
	$fintechcommercegurus_page_title_font_color				 = '';
	$fintechcommercegurus_page_title_background_color_style	 = '';
	$fintechcommercegurus_page_title_font_color_style			 = '';
	$fintechcommercegurus_cta_heading 						 = '';
	$fintechcommercegurus_cta_heading = fintechcommercegurus_getoption( 'fintechcommercegurus_cta_heading' );

	$fintechcommercegurus_share_options 						 = '';
	$fintechcommercegurus_share_options = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

	$fintechcommercegurus_blog_page_title = fintechcommercegurus_getoption( 'fintechcommercegurus_blog_page_title' );

	if ( function_exists( 'get_field' ) ) {
		$fintechcommercegurus_show_page_title			 = get_field( 'show_page_title' );
		$fintechcommercegurus_is_page_title_bg_color	 = get_field( 'fintechcommercegurus_is_page_title_bg_color' );

		if ( $fintechcommercegurus_is_page_title_bg_color == 'true' ) {
			$fintechcommercegurus_page_title_background_color		 = get_field( 'page_title_background_color' );
			$fintechcommercegurus_page_title_background_opacity	 = get_field( 'page_title_background_opacity' );
			$fintechcommercegurus_page_title_font_color			 = get_field( 'page_title_font_color' );
			if ( !empty( $fintechcommercegurus_page_title_background_color ) ) {
				$fintechcommercegurus_page_title_background_color_style = 'style="background-color:' . $fintechcommercegurus_page_title_background_color . '; opacity:' . $fintechcommercegurus_page_title_background_opacity . ';"';
			}
			if ( !empty( $fintechcommercegurus_page_title_font_color ) ) {
				$fintechcommercegurus_page_title_font_color_style = 'style="color:' . $fintechcommercegurus_page_title_font_color . '"';
			}
		}
	}
	?>

<div class="header-wrapper">
			<div class="cg-hero-bg"></div>
			<div class="overlay"></div> 
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-lg-12 col-md-12">
						<header class="entry-header">
							<h1 class="cg-page-title"><?php echo wp_kses_post( $fintechcommercegurus_blog_page_title ); ?></h1>
						</header>
					</div>
					
				</div>
			</div>
		</div>
	
	<?php
}

function fintechcommercegurus_get_blog_page_title() {
	do_action( 'fintechcommercegurus_blog_page_title' );
}

/* Logo helper */
if ( !function_exists( 'fintechcommercegurus_get_logo' ) ) {

	function fintechcommercegurus_get_logo( $logo_type ) {
		global $fintechcommercegurus_mobile_light_logo;
		$fintechcommercegurus_protocol = ( is_ssl() ) ? "https:" : "http:";
		$fintechcommercegurus_logo				 = '';
		$fintechcommercegurus_logo_array = '';
		$fintechcommercegurus_trans_logo			 = '';
		$trans_site_logo_light	 = '';
		$trans_site_logo_dark	 = '';

		// Logo vars

		if ( $logo_type == 'main' ) {

			// Main logo
			$fintechcommercegurus_logo_array = fintechcommercegurus_getoption( 'site_logo' );
			if ( $fintechcommercegurus_logo_array ) {
				$fintechcommercegurus_logo =  $fintechcommercegurus_logo_array['url'];
			}
			
			if ( !empty( $fintechcommercegurus_logo ) ) {
				$fintechcommercegurus_logo = $fintechcommercegurus_protocol . str_replace( array( 'http:', 'https:' ), '', $fintechcommercegurus_logo );
			}

			// Header styles
			$global_trans_header_style	 = '';
			$fintechcommercegurus_header_bg_style			 = '';

			$fintechcommercegurus_logo_position = '';
			$fintechcommercegurus_logo_position = fintechcommercegurus_getoption( 'fintechcommercegurus_logo_position' );
			
			if ( isset( $_GET['logo_position'] ) ) {
				$fintechcommercegurus_logo_position = $_GET['logo_position'];
			}

			$global_trans_header_style = fintechcommercegurus_getoption( 'global_trans_header_style' );
			$fintechcommercegurus_header_bg_style = get_post_meta( get_the_ID(), '_cgcmb_header_style', true );

			if ( ( $fintechcommercegurus_logo_position == 'beside' ) || ( $fintechcommercegurus_logo_position == 'right' ) ) {

				if ( ( "" !== $fintechcommercegurus_header_bg_style ) && ( 'header-globaloption' !== $fintechcommercegurus_header_bg_style ) ) {
					if ( $fintechcommercegurus_header_bg_style == 'header-default' ) {
						$fintechcommercegurus_trans_logo = esc_url( $fintechcommercegurus_logo );
						return $fintechcommercegurus_trans_logo;
					} else if ( $fintechcommercegurus_header_bg_style == 'transparent-light' ) {
						$fintechcommercegurus_trans_logo		 = esc_url( $trans_site_logo_light );
						$fintechcommercegurus_dark_mobile_logo = esc_url( $fintechcommercegurus_logo );
						return array( $fintechcommercegurus_trans_logo, $fintechcommercegurus_dark_mobile_logo );
					} else if ( $fintechcommercegurus_header_bg_style == 'transparent-dark' ) {
						$fintechcommercegurus_trans_logo = esc_url( $trans_site_logo_dark );
						return $fintechcommercegurus_trans_logo;
					}
				} else if ( "" !== $global_trans_header_style ) {
					if ( $global_trans_header_style == 'header-default' ) {
						$fintechcommercegurus_trans_logo = esc_url( $fintechcommercegurus_logo );
						return $fintechcommercegurus_trans_logo;
					} else if ( $global_trans_header_style == 'transparent-light' ) {
						$fintechcommercegurus_trans_logo = esc_url( $trans_site_logo_light );
						return $fintechcommercegurus_trans_logo;
					} else {
						$fintechcommercegurus_trans_logo = esc_url( $trans_site_logo_dark );
						return $fintechcommercegurus_trans_logo;
					}
				} else if ( $fintechcommercegurus_logo ) {
					return $fintechcommercegurus_logo;
				} else {
					return false;
				}
			} else if ( $fintechcommercegurus_logo ) {
				return $fintechcommercegurus_logo;
			} else {
				return false;
			}
		} else if ( $logo_type == 'sticky' ) {
				
			// Sticky logo
			$fintechcommercegurus_alt_site_logo_array = '';
			$fintechcommercegurus_alt_site_logo_array = fintechcommercegurus_getoption( 'fintechcommercegurus_alt_site_logo' );
			
			if ( $fintechcommercegurus_alt_site_logo_array ) {
				$fintechcommercegurus_sticky_logo =  $fintechcommercegurus_alt_site_logo_array['url'];	
			}
			
			if ( !empty( $fintechcommercegurus_sticky_logo ) ) {
				$fintechcommercegurus_sticky_logo = $fintechcommercegurus_protocol . str_replace( array( 'http:', 'https:' ), '', $fintechcommercegurus_sticky_logo );
				return $fintechcommercegurus_sticky_logo;

			}
		}
	}
}


/* Logo helper */
if ( !function_exists( 'fintechcommercegurus_get_bcrumbs' ) ) {
	function fintechcommercegurus_get_bcrumbs() {

		$fintechcommercegurus_share_options = '';
		$fintechcommercegurus_share_options = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

		if ( function_exists( 'yoast_breadcrumb' ) ) {
		?>
		<div class="breadcrumbs-wrapper">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9">
					<?php
						yoast_breadcrumb( '<p class="sub-title">', '</p>' );
					?>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3">
						<?php 
						if ( $fintechcommercegurus_share_options == 'yes' ) {
							fintechcommercegurus_get_share_options_content();
						}
						?>
					</div>
				</div>
		</div>		
		<?php }
	}
}