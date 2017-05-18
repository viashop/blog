</div>
</div><!--/page-container -->

</div><!--/wrapper-->
</div><!-- close #cg-page-wrap -->

<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package commercegurus
 */
?>

<footer class="footercontainer"> 
	<?php
	/**
	 * @hooked fintechcommercegurus_first_footer - 10
	 * @hooked fintechcommercegurus_second_footer - 20
	 */
	do_action( 'fintechcommercegurus_footer' );
	?>
</footer>

<?php
/**
 * @hooked fintechcommercegurus_fixed_sidebar - 10
 * @hooked fintechcommercegurus_back_to_top - 20
 */
do_action( 'fintechcommercegurus_footerutils' );
?>

<?php wp_footer(); ?>
</body>
</html>