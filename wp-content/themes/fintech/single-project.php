<?php
/**
 * @package commercegurus
 */
$fintechcommercegurus_share_options	 = '';
$fintechcommercegurus_share_options	 = fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

get_header();
?>

<?php fintechcommercegurus_get_page_title(); ?>

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

<div class="content-area projects-container">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'content', 'fullwidthpage' ); ?>
		<div class="container">
			<?php
				if ( comments_open() || '0' != get_comments_number() ) {
					comments_template();
				}
			?>
		</div>
	<?php endwhile; // end of the loop.   ?>

<div class="prev-next">
<div class="container">
	<div class="row">
		<div class="row-height">
		<div class="col-lg-6 col-md-6 prev-posts col-height">
		<?php
		$prev_post = get_previous_post();
		if($prev_post) {
		   $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
		   echo "\t" . '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">&larr; '. $prev_title . '</a>' . "\n";
		                }
		?>
		</div>

		<div class="col-lg-6 col-md-6 next-posts col-height">
		<?php
		$next_post = get_next_post();
		if($next_post) {
		   $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
		   echo "\t" . '<a rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">'. $next_title . ' &rarr;</a>' . "\n";
		                }
		?>
		</div>
		</div>
	</div>
</div><!--/container -->
</div><!--/prev-next -->



</div><!-- #primary -->
<?php get_footer(); ?>
