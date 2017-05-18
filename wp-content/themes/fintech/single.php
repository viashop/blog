<?php
/**
 * The Template for displaying all single posts.
 *
 * @package commercegurus
 */
$fintechcommercegurus_post_sidebar	 = '';
$fintechcommercegurus_post_sidebar	 = fintechcommercegurus_getoption( 'fintechcommercegurus_post_sidebar' );

$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

get_header();
?>

<?php fintechcommercegurus_get_page_title(); ?>

<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
	<div class="breadcrumbs-wrapper-line"></div>		
<?php } ?>

<div class="container">
    <div class="content">
        <div class="row row-eq-height">
			<?php if ( ( $fintechcommercegurus_post_sidebar == 'default' ) || ( $fintechcommercegurus_post_sidebar == '' ) ) { ?>
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
								<?php get_template_part( 'content', 'single' ); ?>
								<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
								?>
							<?php endwhile; // end of the loop.   ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
				<div class="col-lg-4 col-md-4 col-md-pull-8 col-lg-pull-8 sidebar left-sidebar">
					<?php get_sidebar(); ?>
				</div>
			<?php } else if ( $fintechcommercegurus_post_sidebar == 'right' ) { ?>
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
								<?php get_template_part( 'content', 'single' ); ?>
								<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
								?>
							<?php endwhile; // end of the loop.   ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
				<div class="col-lg-4 col-md-4 sidebar">
					<?php get_sidebar(); ?>
				</div>
			<?php } else if ( $fintechcommercegurus_post_sidebar == 'none' ) { ?>
				<div class="col-lg-12 col-md-12">
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
								<?php get_template_part( 'content', 'single' ); ?>
								<?php
								// If comments are open or we have at least one comment, load up the comment template
								if ( comments_open() || '0' != get_comments_number() )
									comments_template();
								?>
							<?php endwhile; // end of the loop.   ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div>
			<?php } ?>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->
<?php get_footer(); ?>