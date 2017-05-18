<?php
// Logo to the left with the menu below


$fintechcommercegurus_protocol = ( is_ssl() ) ? "https:" : "http:";

$fintechcommercegurus_responsive_status = '';
$fintechcommercegurus_responsive_status = fintechcommercegurus_getoption( 'fintechcommercegurus_responsive' );

$fintechcommercegurus_logo = '';

$fintechcommercegurus_display_cart = '';
$fintechcommercegurus_display_cart = fintechcommercegurus_getoption( 'fintechcommercegurus_show_cart' );

$fintechcommercegurus_display_search = '';
$fintechcommercegurus_display_search = fintechcommercegurus_getoption( 'fintechcommercegurus_show_search' );

$fintechcommercegurus_page_heading_alignment = '';
$fintechcommercegurus_page_heading_alignment = fintechcommercegurus_getoption( 'fintechcommercegurus_page_heading_alignment' );

$fintechcommercegurus_catalog = '';
$fintechcommercegurus_catalog = fintechcommercegurus_getoption( 'fintechcommercegurus_catalog_mode' );

$fintechcommercegurus_primary_menu_layout = '';
$fintechcommercegurus_primary_menu_layout = fintechcommercegurus_getoption( 'fintechcommercegurus_primary_menu_layout' );

$fintechcommercegurus_sticky_menu = '';
$fintechcommercegurus_sticky_menu = fintechcommercegurus_getoption( 'fintechcommercegurus_sticky_menu' );

if ( !empty( $_SESSION['fintechcommercegurus_header_top'] ) ) {
	$fintechcommercegurus_topbar_display = $_SESSION['fintechcommercegurus_header_top'];
}

$fintechcommercegurus_topbar = '';
$fintechcommercegurus_topbar = fintechcommercegurus_getoption( 'fintechcommercegurus_topbar' );

$fintechcommercegurus_mobile_visible = '';
$fintechcommercegurus_mobile_visible = fintechcommercegurus_getoption( 'fintechcommercegurus_mobile_visible' );

$fintechcommercegurus_shop_announcements = '';
$fintechcommercegurus_shop_announcements = fintechcommercegurus_getoption( 'fintechcommercegurus_shop_announcements' );

$fintechcommercegurus_logo_position = '';
$fintechcommercegurus_logo_position = fintechcommercegurus_getoption( 'fintechcommercegurus_logo_position' );

$fintechcommercegurus_cta_sticky = '';
$fintechcommercegurus_cta_sticky = fintechcommercegurus_getoption( 'fintechcommercegurus_cta_sticky' );

?>

<?php if ( $fintechcommercegurus_mobile_visible == '1' ) { ?>
	<div class="mobile-header-details">
		<?php dynamic_sidebar( 'header-details' ); ?>
	</div>
<?php } ?>


<!-- Only load if Mobile Search Widget Area is Enabled -->
<?php if ( $fintechcommercegurus_display_search == '1' ) { ?>

	<script>

	    ( function ( $ ) {
	        "use strict";

	        $( document ).ready( function () {
	            $( ".activate-mobile-search" ).click( function () {
	                $( ".mobile-search-reveal" ).slideToggle( "fast" );
	            } );
	        } );

	    }( jQuery ) );
	</script>

	<div class="mobile-search-reveal">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<div class="activate-mobile-search close"><i class="ion-close-round"></i></div>
					<?php echo fintechcommercegurus_search(); ?>
				</div>
			</div>
		</div>
	</div>

	
<?php } ?>
<!--/ End Search -->

<!-- Load Top Bar -->
<?php if ( $fintechcommercegurus_topbar == '1' ) { ?>

<?php if ( $fintechcommercegurus_mobile_visible == '1' ) { ?>
	<div class="cg-announcements mobile-visible">
<?php } else { ?>
	<div class="cg-announcements">
<?php } ?>

		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 col-lg-6 top-bar-left">
					<?php if ( $fintechcommercegurus_shop_announcements == '1' ) { ?>
						<ul class="cg-show-announcements">
							<?php fintechcommercegurus_get_announcements(); ?>
						</ul>
					<?php } else { ?>
						<?php if ( is_active_sidebar( 'top-bar-left' ) ) : ?>
							<?php dynamic_sidebar( 'top-bar-left' ); ?>
						<?php endif; ?>
					<?php } ?>
				</div>
				<div class="col-sm-12 col-md-6 col-lg-6 top-bar-right">
					<?php if ( is_active_sidebar( 'top-bar-right' ) ) : ?>
						<?php if ( $fintechcommercegurus_display_search == '1' ) { ?>
							<div class="activate-mobile-search"><i class="ion-android-search mobile-search-icon"></i></div>
						<?php } ?> 

						<?php dynamic_sidebar( 'top-bar-right' ); ?>
						
					<?php endif; ?>
				</div>		
			</div>
		</div>
	</div>
<?php } ?>	
<!--/ End Top Bar -->


<?php if ( $fintechcommercegurus_page_heading_alignment == 'center' ) { ?>
	<div id="wrapper" class="cg-heading-align-center">
<?php } else { ?>
	<div id="wrapper" class="cg-heading-align-left">
<?php } ?>
	<!-- Left Logo with menu below -->
	<div class="cg-menu-below cg-logo-left cg-menu-left">
		<div class="container">
			<div class="cg-logo-cart-wrap">
				<div class="cg-logo-inner-cart-wrap">
					<div class="row">
						<div class="container width-auto">
							<div class="cg-wp-menu-wrapper">
								<div id="load-mobile-menu">
								</div>

								<?php if ( is_active_sidebar( 'mobile-search' ) ) : ?>
									<div class="activate-mobile-search"><i class="ion-android-search mobile-search-icon"></i></div>
								<?php endif; ?>

								<div class="rightnav">
									<div class="cg-extras">
															
										<div class="extra"><?php dynamic_sidebar( 'header-details' ); ?></div>

									</div><!--/cg-extras --> 
								</div><!--/rightnav -->

								<?php
								$fintechcommercegurus_main_logo	 = '';
								$fintechcommercegurus_main_logo	 = fintechcommercegurus_get_logo( 'main' );

								if ( $fintechcommercegurus_main_logo ) {
									?>

									<div class="leftnav logo image dynamic-logo-width">
										<a class="cg-main-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
											<span class="helper"></span><img src="<?php echo esc_url( $fintechcommercegurus_main_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
									</div>

								<?php } else { ?>
									<div class="leftnav text-logo dynamic-logo-width">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									</div>
								<?php } ?>

							</div>
						</div><!--/container -->
					</div><!--/row -->
				</div><!--/cg-logo-inner-cart-wrap -->
			</div><!--/cg-logo-cart-wrap -->
		</div><!--/container -->
	</div><!--/cg-menu-below -->
	<div class="cg-primary-menu cg-wp-menu-wrapper cg-primary-menu-below-wrapper cg-primary-menu-left">
		<div class="container">
			<div class="row margin-auto">
			
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
						<?php
						wp_nav_menu( array(
							'theme_location'	 => 'primary',
							'before'			 => '',
							'after'				 => '',
							'link_before'		 => '<span>',
							'link_after'		 => '</span>',
							'depth'				 => 4,
							'container'			 => 'div',
							'container_class'	 => 'cg-main-menu',
							'fallback_cb'		 => false,
							'walker'			 => new fintechcommercegurus_primary_menu() )
						);
						?>
					<?php } else { ?>
						<p class="setup-message"><?php echo esc_html__( 'You can set your main menu in Appearance &rarr; Menus', 'fintech' ); ?></p>
					<?php } ?>
					
			</div>
		</div>
	</div>
	<?php
	if ( $fintechcommercegurus_sticky_menu == '1' ) {
		?>
		<!--FIXED -->
		<?php
		$fintechcommercegurus_fixed_beside_style = '';

		if ( isset( $_GET['logo_position'] ) ) {
			$fintechcommercegurus_logo_position = $_GET['logo_position'];
		}

		if ( $fintechcommercegurus_logo_position == 'beside' ) {
			$fintechcommercegurus_fixed_beside_style = 'cg-fixed-beside';
		}
		?>
		<div class="cg-header-fixed-wrapper <?php echo esc_attr( $fintechcommercegurus_fixed_beside_style ); ?>">
			<div class="cg-header-fixed">
				<div class="container">
					<div class="cg-wp-menu-wrapper">
						<div class="cg-primary-menu">
							<div class="row">
								<div class="container width-auto">
									<div class="cg-wp-menu-wrapper">
										<div class="rightnav">
											
											<?php 
											if ( $fintechcommercegurus_cta_sticky == 'yes' ) {
												fintechcommercegurus_get_cta_button(); 
											}
											?>

										</div><!--/rightnav -->

										<?php
										$fintechcommercegurus_sticky_logo	 = '';
										$fintechcommercegurus_sticky_logo	 = fintechcommercegurus_get_logo( 'sticky' );

										if ( $fintechcommercegurus_sticky_logo ) {
											?>

											<div class="leftnav logo image">
												<a class="cg-sticky-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
													<span class="helper"></span><img src="<?php echo esc_url( $fintechcommercegurus_sticky_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>"/></a>
											</div>
										<?php } else { ?>
											<div class="leftnav text-logo">
												<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
											</div>
										<?php } ?>
										<?php if ( has_nav_menu( 'primary' ) ) { ?>
											<?php
											wp_nav_menu( array(
												'theme_location' => 'primary',
												'before'		 => '',
												'after'			 => '',
												'link_before'	 => '<span>',
												'link_after'	 => '</span>',
												'depth'			 => 4,
												'fallback_cb'	 => false,
												'walker'		 => new fintechcommercegurus_primary_menu() )
											);
											?>
										<?php } else { ?>
											<p class="setup-message"><?php echo esc_html__( 'You can set your main menu in Appearance -> Menus', 'fintech' ); ?></p>
										<?php } ?>
									</div><!--/cg-wp-menu-wrapper -->
								</div><!--/container -->
							</div><!--/row -->
						</div><!--/cg-primary-menu -->
					</div><!--/cg-wp-menu-wrapper -->
				</div><!--/container -->
			</div><!--/cg-header-fixed -->
		</div><!--/cg-header-fixed-wrapper. -->
	<?php }
	?>
	<div class="page-container">