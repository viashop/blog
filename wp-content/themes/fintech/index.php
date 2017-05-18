<?php
/**
 * The main template file.
 * @package commercegurus
 */

$fintechcommercegurus_blog_sidebar	 = '';
$fintechcommercegurus_blog_sidebar	 = fintechcommercegurus_getoption( 'fintechcommercegurus_blog_sidebar' );

$fintechcommercegurus_news_layout	 = '';
$fintechcommercegurus_news_layout	 = 'default-news';
$fintechcommercegurus_islayout		 = '';

if ( isset( $_GET['blogsidebar'] ) ) {
	$fintechcommercegurus_blog_sidebar = $_GET['blogsidebar'];
}

if ( isset( $fintechcommercegurus_options['fintechcommercegurus_news_layout'] ) ) {
	$fintechcommercegurus_news_layout = $fintechcommercegurus_options['fintechcommercegurus_news_layout'];
}

if ( isset( $_GET['newslayout'] ) ) {
	$fintechcommercegurus_news_layout = $_GET['newslayout'];
}
?>

<?php
if ( $fintechcommercegurus_news_layout == 'grid-news' ) {
	$fintechcommercegurus_islayout = 'grid-news';
}

if ( $fintechcommercegurus_news_layout == 'grid-news-two' ) {
	$fintechcommercegurus_islayout = 'grid-news';
}

$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

get_header();
?>
<?php echo fintechcommercegurus_get_blog_page_title(); ?>

<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
	<div class="breadcrumbs-wrapper-line"></div>		
<?php } ?>

<div class="container">
    <div class="content">

        <div class="row row-eq-height">
			<?php if ( ( $fintechcommercegurus_blog_sidebar == 'default' ) || ( $fintechcommercegurus_blog_sidebar == '' ) ) { ?>
				<div class="col-lg-8 col-md-8 col-sm-12 col-md-push-4 col-lg-push-4">
					<div id="primary" class="content-area cg-blog-layout <?php echo $fintechcommercegurus_islayout ?>">

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

						<main id="main" class="site-main <?php echo $fintechcommercegurus_islayout ?>" role="main">
							<?php if ( have_posts() ) : ?>
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
									?>
								<?php endwhile; ?>
								<?php fintechcommercegurus_numeric_posts_nav(); ?>
							<?php else : ?>
								<?php get_template_part( 'no-results', 'index' ); ?>
							<?php endif; ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--/8 -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-md-pull-8 col-lg-pull-8 sidebar left-sidebar">
					<?php get_sidebar(); ?>
				</div>
			<?php } else if ( $fintechcommercegurus_blog_sidebar == 'right' ) { ?>
				<div class="col-lg-8 col-md-8 col-sm-12">
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

						<main id="main" class="site-main <?php echo $fintechcommercegurus_islayout ?>" role="main">
							<?php if ( have_posts() ) : ?>
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
									?>
								<?php endwhile; ?>
								<?php fintechcommercegurus_numeric_posts_nav(); ?>
							<?php else : ?>
								<?php get_template_part( 'no-results', 'index' ); ?>
							<?php endif; ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--/9 -->
				<div class="col-lg-4 col-md-4 col-sm-12 sidebar">
					<?php get_sidebar(); ?>
				</div>
			<?php } else if ( $fintechcommercegurus_blog_sidebar == 'none' ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12">
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

						<main id="main" class="site-main <?php echo $fintechcommercegurus_islayout ?>" role="main">
							<?php if ( have_posts() ) : ?>
								<?php /* Start the Loop */ ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php
									/* Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );
									?>
								<?php endwhile; ?>
								<?php fintechcommercegurus_numeric_posts_nav(); ?>
							<?php else : ?>
								<?php get_template_part( 'no-results', 'index' ); ?>
							<?php endif; ?>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--/12 -->
			<?php } ?>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>