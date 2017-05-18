<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package commercegurus
 */
$fintechcommercegurus_blog_sidebar	 = '';
$fintechcommercegurus_blog_sidebar	 = fintechcommercegurus_getoption( 'fintechcommercegurus_blog_sidebar' );

$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

get_header();
?>
<?php if ( have_posts() ) { ?>

	<div class="header-wrapper">
		<div class="cg-hero-bg"></div>
		<div class="overlay"></div> 
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 col-md-12">
					<header class="entry-header">
						<h1 class="cg-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fintech' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>
				</div>
			</div>
		</div>
	</div>

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
		<div class="breadcrumbs-wrapper-line"></div>		
	<?php } ?>

	

<?php } else { ?>
	<div class="header-wrapper">
		<div class="cg-hero-bg"></div>
		<div class="overlay"></div> 
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 col-md-12">
					<header class="entry-header">
						<h1 class="cg-page-title"><?php printf( esc_html__( 'Search Results for: %s', 'fintech' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header>
				</div>
			</div>
		</div>
	</div>

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
		<div class="breadcrumbs-wrapper-line"></div>		
	<?php } ?>



<?php } ?>

<div class="container">
    <div class="content">
        <div class="row row-eq-height">
			<?php if ( ( $fintechcommercegurus_blog_sidebar == 'default' ) || ( $fintechcommercegurus_blog_sidebar == '' ) ) { ?>
				<div class="col-lg-8 col-md-8 col-md-push-4 col-lg-push-4">
					<div id="primary" class="content-area cg-blog-layout">

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
							<div>
								<?php if ( have_posts() ) : ?>
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content', 'search' ); ?>
									<?php endwhile; ?>
									<?php fintechcommercegurus_numeric_posts_nav(); ?>
								<?php else : ?>
									<?php get_template_part( 'no-results', 'search' ); ?>
								<?php endif; ?>
							</div>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!-- /9 -->
				<div class="col-lg-4 col-md-4 col-md-pull-8 col-lg-pull-8 sidebar">

					<?php get_sidebar(); ?>

				</div>
			<?php } else if ( $fintechcommercegurus_blog_sidebar == 'right' ) { ?>
				<div class="col-lg-8 col-md-8">
					<div id="primary" class="content-area cg-blog-layout">

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
							<div>
								<?php if ( have_posts() ) : ?>
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content', 'search' ); ?>
									<?php endwhile; ?>
									<?php fintechcommercegurus_numeric_posts_nav(); ?>
								<?php else : ?>
									<?php get_template_part( 'no-results', 'search' ); ?>
								<?php endif; ?>
							</div>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div> <!-- /9 -->
				<div class="col-lg-4 col-md-4 sidebar">
					<?php get_sidebar(); ?>
				</div>
			<?php } else if ( $fintechcommercegurus_blog_sidebar == 'none' ) { ?>
				<div class="col-lg-12 col-md-12">
					<div id="primary" class="content-area cg-blog-layout">
						<main id="main" class="site-main" role="main">
							<div>
								<?php if ( have_posts() ) : ?>
									<?php /* Start the Loop */ ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php get_template_part( 'content', 'search' ); ?>
									<?php endwhile; ?>
									<?php fintechcommercegurus_numeric_posts_nav(); ?>
								<?php else : ?>
									<?php get_template_part( 'no-results', 'search' ); ?>
								<?php endif; ?>
							</div>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--/12 -->
			<?php } ?>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
