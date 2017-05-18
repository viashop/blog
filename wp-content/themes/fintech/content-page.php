<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package commercegurus
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="structured-metadata">
        <div class="entry-title"><?php the_title(); ?></div>
        <div class="entry-posted"><?php fintechcommercegurus_posted_on(); ?></div>
    </div>
    <div class="entry-content">
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fintech' ),
			'after'	 => '</div>',
		) );
		?>
    </div><!-- .entry-content -->

</article><!-- #post-## -->
