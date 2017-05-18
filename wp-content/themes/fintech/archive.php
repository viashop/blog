<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
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
<?php if ( have_posts() ) : ?>


	<div class="header-wrapper">
		<div class="cg-hero-bg" data-center-top="top:-10%;" data-top-top="top: 0%;"></div>
		<div class="overlay"></div> 

		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<header class="entry-header">
						<h1 class="cg-page-title">
	<?php
	if ( is_category() ) :
		single_cat_title();

	elseif ( is_tag() ) :
		single_tag_title();

	elseif ( is_author() ) :
		/* Queue the first post, that way we know
		 * what author we're dealing with (if that is the case).
		 */
		the_post();
		printf( esc_html__( 'Author: %s', 'fintech' ), '<span class="vcard">' . get_the_author() . '</span>' );
		/* Since we called the_post() above, we need to
		 * rewind the loop back to the beginning that way
		 * we can run the loop properly, in full.
		 */
		rewind_posts();

	elseif ( is_day() ) :
		printf( esc_html__( 'Day: %s', 'fintech' ), '<span>' . get_the_date() . '</span>' );

	elseif ( is_month() ) :
		printf( esc_html__( 'Month: %s', 'fintech' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

	elseif ( is_year() ) :
		printf( esc_html__( 'Year: %s', 'fintech' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

	elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
		esc_html_e( 'Asides', 'fintech' );

	elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
		esc_html_e( 'Images', 'fintech' );

	elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
		esc_html_e( 'Videos', 'fintech' );

	elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
		esc_html_e( 'Quotes', 'fintech' );

	elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
		esc_html_e( 'Links', 'fintech' );

	else :
		esc_html_e( 'Archives', 'fintech' );

	endif;
	?>                            
						</h1>
					</header>
				</div>

			</div>
		</div>
	</div>
	</div>

	<?php if ( function_exists( 'yoast_breadcrumb' ) ) { ?>
		<div class="breadcrumbs-wrapper-line"></div>		
	<?php } ?>


<?php endif; ?>

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
								<div>
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
									<?php get_template_part( 'no-results', 'archive' ); ?>
								<?php endif; ?>
							</div>
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
								<div>
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
									<?php get_template_part( 'no-results', 'archive' ); ?>
								<?php endif; ?>
							</div>
						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--/8 -->
				<div class="col-lg-4 col-md-4 col-sm-12 sidebar">
	<?php get_sidebar(); ?>
				</div>

				<?php } else if ( $fintechcommercegurus_blog_sidebar == 'none' ) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12">
					<section id="primary" class="content-area">
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
								<div>
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
									<?php get_template_part( 'no-results', 'archive' ); ?>
								<?php endif; ?>
							</div>
						</main><!-- #main -->
					</section><!-- #primary -->
				</div><!--/12 -->
<?php } ?>
        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>