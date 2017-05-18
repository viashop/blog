<?php
/**
 * The template for displaying image attachments.
 *
 * @package commercegurus
 */
get_header();
?>
<div class="container">
    <div class="content">
        <div class="row row-eq-height">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="primary" class="content-area image-attachment">
                    <main id="main" class="site-main" role="main">
						<?php while ( have_posts() ) : the_post(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<header class="entry-header">
									<div class="entry-meta">
										<?php
										$metadata = wp_get_attachment_metadata();
										?>
									</div><!-- .entry-meta -->
									<nav role="navigation" id="image-navigation" class="image-navigation clearfix">
										<div class="nav-previous"><?php previous_image_link( false, '<span class="meta-nav">&larr;</span> Previous' ); ?></div>
										<div class="nav-next"><?php next_image_link( false, 'Next <span class="meta-nav">&rarr;</span>' ); ?></div>
									</nav><!-- #image-navigation -->
								</header><!-- .entry-header -->
								<div class="entry-content">
									<div class="entry-attachment">
										<div class="attachment">
											<?php fintechcommercegurus_the_attached_image(); ?>
										</div><!-- .attachment -->
										<?php if ( has_excerpt() ) : ?>
											<div class="entry-caption">
												<?php the_excerpt(); ?>
											</div><!-- .entry-caption -->
										<?php endif; ?>
									</div><!-- .entry-attachment -->
									<?php
									the_content();
									wp_link_pages( array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fintech' ),
										'after'	 => '</div>',
									) );
									?>
								</div><!-- .entry-content -->
								<?php edit_post_link( esc_html__( 'Edit', 'fintech' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
							</article><!-- #post-## -->
							<?php
								if ( comments_open() || '0' != get_comments_number() ) {
									comments_template();
								}
							?>

						<?php endwhile; // end of the loop. ?>
                    </main><!-- #main -->
                </div><!-- #primary -->
            </div><!--/12 -->
        </div><!--/content -->
    </div>
</div><!--/container -->

<?php get_footer(); ?>
