<?php
/**
 * Template Name: Full width page
 * @package commercegurus
 */
get_header();

$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );
?>

<?php fintechcommercegurus_get_page_title(); ?>

<div class="content-area">

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
		<div class="breadcrumbs-wrapper-line"></div>
		<div class="breadcrumbs-wrapper">
			<div class="container">
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
			</div>
		</div><!--/breadcrumbs-wrapper -->		
	<?php } ?>

	<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'fullwidthpage' ); ?>
		<div class="container">
			<?php
			if ( comments_open() || '0' != get_comments_number() ) {
				comments_template();
			}
			?>
		</div>
<?php endwhile; // end of the loop.    ?>
</div><!-- #primary -->
<?php get_footer(); ?>
