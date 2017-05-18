<?php
/**
 * @package commercegurus
 */
?>
<?php 		
$allowed_args = array(
	//formatting
	'span' => array(
		'class' => array()
	),
);
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

    <footer class="entry-meta">
		<?php
		/* translators: used between list items, there is a space after the comma */
		$category_list	 = get_the_category_list( esc_html__( ', ', 'fintech' ) );

		/* translators: used between list items, there is a space after the comma */
		$tag_list = get_the_tag_list( '', esc_html__( ', ', 'fintech' ) );

		if ( !fintechcommercegurus_categorized_blog() ) {
			// This blog only has 1 category so we just need to worry about tags in the meta text
			if ( '' != $tag_list ) {
				$meta_text = wp_kses( __( '<span class="tags">%2$s</span>', 'fintech' ), $allowed_args );
			} else {
				$meta_text = wp_kses( __( '<span class="tags">%2$s</span>', 'fintech' ), $allowed_args );
			}
		} else {
			// But this blog has loads of categories so we should probably display them here
			if ( '' != $tag_list ) {
				$meta_text = wp_kses( __( '<span class="categories">%1$s</span> <span class="tags">%2$s</span>', 'fintech' ), $allowed_args );
			} else {
				$meta_text = wp_kses( __( '<span class="categories">%1$s</span> <span class="tags">%2$s</span>', 'fintech' ), $allowed_args );
			}
		} // end check for categories on this blog

		printf(
		$meta_text, $category_list, $tag_list, get_permalink()
		);
		?>

    </footer><!-- .entry-meta -->

    <?php
	// Get Author Data
	$author             = get_the_author();
	$author_description = get_the_author_meta( 'description' );
	$author_url         = esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
	$author_avatar      = get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 75 ) );

	// Only display if author has a description
	if ( $author_description ) : ?>

	    <div class="author-info clr">
	        <div class="author-info-inner clr">
	            <?php if ( $author_avatar ) { ?>
	                <div class="author-avatar clr">
	                    <a href="<?php echo $author_url; ?>" rel="author">
	                        <?php echo $author_avatar; ?>
	                    </a>
	                </div><!-- .author-avatar -->
	            <?php } ?>
	            <div class="author-description">
	                <p><?php echo $author_description; ?></p>
	            </div><!-- .author-description -->
	        </div><!-- .author-info-inner -->
	    </div><!-- .author-info -->

	<?php endif; ?>

</article><!-- #post-## -->
