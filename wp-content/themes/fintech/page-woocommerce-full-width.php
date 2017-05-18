<?php
/**
 * Template Name: WooCommerce full width
 * @package commercegurus
 */
get_header();

$fintechcommercegurus_share_options  = '';
$fintechcommercegurus_share_options  = 
fintechcommercegurus_getoption( 'fintechcommercegurus_share_options' );

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

<div class="container">
    <div class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'content', 'page' ); ?>

						<?php endwhile; // end of the loop.  ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>

        </div><!--/row -->
    </div><!--/content -->
</div><!--/container -->

<?php get_footer(); ?>
