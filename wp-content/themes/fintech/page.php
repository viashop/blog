<?php
/**
 * The template for displaying all pages.
 * @package commercegurus
 */
get_header();
?>
<?php fintechcommercegurus_get_page_title(); ?>
<?php
$fintechcommercegurus_show_page_title = '';

if ( function_exists( 'get_field' ) ) {
	$fintechcommercegurus_show_page_title = get_field( 'show_page_title' );
}

$fintechcommercegurus_page_sidebar	 = '';
$fintechcommercegurus_page_sidebar	 = fintechcommercegurus_getoption( 'fintechcommercegurus_page_sidebar' );

if ( isset( $_GET['pagesidebar'] ) ) {
	$fintechcommercegurus_page_sidebar = $_GET['pagesidebar'];
}

// Get our page banner if it exists
$fintechcommercegurus_page_banner_image = '';
if ( function_exists( 'get_field' ) ) {
	$page_banner		 = get_field( 'banner_image' );
	$page_banner_height	 = get_field( 'page_banner_height' );
}

if ( !empty( $page_banner ) ) {
	$fintechcommercegurus_page_banner_image = $page_banner;
}

$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );
?>



<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
	<div class="breadcrumbs-wrapper-line"></div>		
<?php } ?>

<div class="container">

	<?php if ( $fintechcommercegurus_show_page_title == 'Hide' ) { ?>
		<div class="content hidden-title">
		<?php } else { ?>
			<div class="content">
			<?php } ?>

			<div class="row row-eq-height">

				<?php if ( ( $fintechcommercegurus_page_sidebar == 'default' ) || ( $fintechcommercegurus_page_sidebar == '' ) ) { ?>

					<div class="col-lg-8 col-md-8">
						<div id="primary" class="content-area">

							<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
								<div class="breadcrumbs-wrapper">
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-9">
											<?php yoast_breadcrumb( '<p class="sub-title">', '</p>' ); ?>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-3">
											<?php
											if ( $fintechcommercegurus_share_options == 'yes' ) {
												fintechcommercegurus_get_share_options_content();
											}
											?>
										</div>
									</div>
								</div><!--/breadcrumbs-wrapper -->		
							<?php } ?>

							<main id="main" class="site-main" role="main">

								<?php while ( have_posts() ) : the_post(); ?>

									<?php get_template_part( 'content', 'page' ); ?>

									<?php
									if ( comments_open() || '0' != get_comments_number() ) {
										comments_template();
									}
									?>

								<?php endwhile; // end of the loop.   ?>

							</main><!-- #main -->
						</div><!-- #primary -->
					</div>
					<div class="col-lg-4 col-md-4 sidebar">
						<?php if ( is_active_sidebar( 'sidebar-pages' ) ) : ?>
						<div id="secondary">
							<?php dynamic_sidebar( 'sidebar-pages' ); ?>
						</div>
						<?php endif; ?>
					</div>

				<?php } else if ( $fintechcommercegurus_page_sidebar == 'left' ) { ?>

					<div class="col-lg-8 col-md-8 col-md-push-4 col-lg-push-4">
						<div id="primary" class="content-area">

							<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
								<div class="breadcrumbs-wrapper">
									<div class="row">
										<div class="col-lg-10 col-md-10 col-sm-9">
											<?php yoast_breadcrumb( '<p class="sub-title">', '</p>' ); ?>
										</div>
										<div class="col-lg-2 col-md-2 col-sm-3">

											<?php
											if ( $fintechcommercegurus_share_options == 'yes' ) {
												fintechcommercegurus_get_share_options_content();
											}
											?>
										</div>
									</div>
								</div><!--/breadcrumbs-wrapper -->		
							<?php } ?>

							<main id="main" class="site-main" role="main">

								<?php while ( have_posts() ) : the_post(); ?>

									<?php get_template_part( 'content', 'page' ); ?>

									<?php
									if ( comments_open() || '0' != get_comments_number() ) {
										comments_template();
									}
									?>

								<?php endwhile; // end of the loop.   ?>

							</main><!-- #main -->
						</div><!-- #primary -->
					</div>
					<div class="col-lg-4 col-md-4 col-md-pull-8 col-lg-pull-8 sidebar left-sidebar">
						<?php if ( is_active_sidebar( 'sidebar-pages' ) ) : ?>
						<div id="secondary">
							<?php dynamic_sidebar( 'sidebar-pages' ); ?>
						</div>
						<?php endif; ?>
					</div>

				<?php } ?>

			</div><!--/row -->
		</div><!--/content -->
	</div><!--/container -->

	<?php get_footer(); ?>
