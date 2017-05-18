<?php
/**
 * @package commercegurus
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="cg-blog-article">
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>   
		</header><!-- .entry-header -->
		<?php if ( is_search() ) { // Only display Excerpts for Search   ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php } else { ?>
			<div class="entry-content">
				<?php
				the_content( esc_html__( 'Read more', 'fintech' ) );
				wp_link_pages( array(
					'before'		 => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'fintech' ) . '</span>',
					'after'			 => '</div>',
					'link_before'	 => '<span>',
					'link_after'	 => '</span>',
				) );
				?>
			</div><!-- .entry-content -->
		<?php } ?>
		<footer class="entry-meta">
		</footer><!-- .entry-meta -->
	</div><!--/cg-blog-article -->
</article><!-- only-regular-post #post-## -->