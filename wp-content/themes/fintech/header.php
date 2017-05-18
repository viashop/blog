<?php
/**
 * The theme header
 *
 * */
?>

<!DOCTYPE html>
<!--[if IE 9 ]><html class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
		<?php do_action( 'fintechcommercegurus_maybe_responsive' ); ?>
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">        
       <!--[if lte IE 9]><script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script><![endif]-->
		<?php wp_head(); ?>
    </head>
    <body id="skrollr-body" <?php body_class(); ?>>
		<?php do_action( 'fintechcommercegurus_maybe_preloader' ); ?>
		<div id="main-wrapper" class="content-wrap">
			<?php
			do_action( 'fintechcommercegurus_header_layout' );
			do_action( 'fintechcommercegurus_maybe_mobile_menu' );
			?>
			<div id="cg-page-wrap" class="hfeed site">