<?php

// CommerceGurus Custom CSS

function fintechcommercegurus_custom_css() {
	
	?>

	<style type="text/css">

		<?php
		$fintechcommercegurus_logo_height							 = '';
		$fintechcommercegurus_sticky_logo_height					 = '';
		$fintechcommercegurus_padding_above_logo					 = '';
		$fintechcommercegurus_padding_below_sticky_logo			 	 = '';
		$fintechcommercegurus_padding_above_sticky_logo			 	 = '';
		$fintechcommercegurus_padding_below_logo					 = '';
		$fintechcommercegurus_dynamic_logo_width					 = '';
		$fintechcommercegurus_mobile_header_height					 = '';
		$fintechcommercegurus_mobile_logo_height					 = '';
		$fintechcommercegurus_page_heading_top_margin				 = '';
		$fintechcommercegurus_page_heading_bottom_margin			 = '';
		$fintechcommercegurus_bg_color							 	 = '';
		$fintechcommercegurus_pagewrapper_color					 	 = '';
		$fintechcommercegurus_bg_img								 = '';
		$fintechcommercegurus_bg_img_attach						 	 = '';
		$fintechcommercegurus_bg_pattern_img						 = '';
		$fintechcommercegurus_bg_img_repeat						 	 = '';
		$fintechcommercegurus_bg_pattern_img_repeat				 	 = '';
		$fintechcommercegurus_footer_bg_img							 = '';
		$fintechcommercegurus_first_footer_pattern					 = '';
		$fintechcommercegurus_page_wrapper_color					 = '';
		$fintechcommercegurus_skin_color							 = '';
		$fintechcommercegurus_custom_css							 = '';
		$fintechcommercegurus_announcements_bg					 	 = '';
		$fintechcommercegurus_announcements_text					 = '';
		$fintechcommercegurus_topbar_bgcolor						 = '';
		$fintechcommercegurus_topbar_txtcolor						 = '';
		$fintechcommercegurus_page_header_bg						 = '';
		$fintechcommercegurus_level2_font_color 					 = '';
		
		$fintechcommercegurus_bg_color_array						 = '';
		$fintechcommercegurus_bg_color_array = fintechcommercegurus_getoption( 'fintechcommercegurus_background' );
		if ( $fintechcommercegurus_bg_color_array ) {
			$fintechcommercegurus_bg_color = $fintechcommercegurus_bg_color_array['background-color'];
		}

	
		$fintechcommercegurus_bg_img_array						 = '';
		$fintechcommercegurus_bg_img_array = fintechcommercegurus_getoption( 'fintechcommercegurus_background' );
		if ( $fintechcommercegurus_bg_img_array ) {
			if ( array_key_exists( 'background-image' , $fintechcommercegurus_bg_img_array ) ) {
					$fintechcommercegurus_bg_img = $fintechcommercegurus_bg_img_array['background-image'];
			}
		}

		$fintechcommercegurus_bg_pattern_img_array						 = '';
		$fintechcommercegurus_bg_pattern_img_array = fintechcommercegurus_getoption( 'fintechcommercegurus_pattern_background' );
		if ( $fintechcommercegurus_bg_pattern_img_array ) {
			if ( array_key_exists( 'background-image' , $fintechcommercegurus_bg_pattern_img_array ) ) {
					$fintechcommercegurus_bg_pattern_img = $fintechcommercegurus_bg_pattern_img_array['background-image'];
			}
		}

		$fintechcommercegurus_first_footer_pattern_array						 = '';
		$fintechcommercegurus_first_footer_pattern_array = fintechcommercegurus_getoption( 'fintechcommercegurus_first_footer_pattern' );
		if ( $fintechcommercegurus_first_footer_pattern_array ) {
			$fintechcommercegurus_first_footer_pattern = $fintechcommercegurus_first_footer_pattern_array['url'];
		}

		$fintechcommercegurus_bg_img_repeat_array						 = '';
		$fintechcommercegurus_bg_img_repeat_array = fintechcommercegurus_getoption( 'fintechcommercegurus_background' );
		
		if ( $fintechcommercegurus_bg_img_repeat_array ) {
			if ( array_key_exists( 'background-repeat' , $fintechcommercegurus_bg_img_repeat_array ) ) {
					$fintechcommercegurus_bg_pattern_img_repeat = $fintechcommercegurus_bg_img_repeat_array['background-repeat'];
			}
		}

		if ( isset( $fintechcommercegurus_options['fintechcommercegurus_footer_bg_img']['url'] ) ) {
			$fintechcommercegurus_footer_bg_img = $fintechcommercegurus_options['fintechcommercegurus_footer_bg_img']['url'];
		}
		
		$fintechcommercegurus_page_wrapper_color = fintechcommercegurus_getoption( 'fintechcommercegurus_page_wrapper_color' );
		$fintechcommercegurus_primary_menu_img_height = fintechcommercegurus_getoption( 'fintechcommercegurus_primary_menu_img_height' );
		$fintechcommercegurus_logo_height = fintechcommercegurus_getoption( 'fintechcommercegurus_logo_height' );
		$fintechcommercegurus_padding_above_logo = fintechcommercegurus_getoption( 'fintechcommercegurus_padding_above_logo' );
		$fintechcommercegurus_padding_below_logo = fintechcommercegurus_getoption( 'fintechcommercegurus_padding_below_logo' );
		$fintechcommercegurus_sticky_logo_height = fintechcommercegurus_getoption( 'fintechcommercegurus_sticky_logo_height' );
		$fintechcommercegurus_padding_above_sticky_logo = fintechcommercegurus_getoption( 'fintechcommercegurus_padding_above_sticky_logo' );
		$fintechcommercegurus_padding_below_sticky_logo = fintechcommercegurus_getoption( 'fintechcommercegurus_padding_below_sticky_logo' );
		$fintechcommercegurus_padding_below_logo = fintechcommercegurus_getoption( 'fintechcommercegurus_padding_below_logo' );
		$fintechcommercegurus_dynamic_logo_width = fintechcommercegurus_getoption( 'fintechcommercegurus_dynamic_logo_width' );
		$fintechcommercegurus_mobile_header_height = fintechcommercegurus_getoption( 'fintechcommercegurus_mobile_header_height' );
		$fintechcommercegurus_mobile_logo_height = fintechcommercegurus_getoption( 'fintechcommercegurus_mobile_logo_height' );
		$fintechcommercegurus_dynamic_widget_area_width = ( 100 - ( $fintechcommercegurus_dynamic_logo_width ));
		$fintechcommercegurus_page_heading_top_margin = fintechcommercegurus_getoption( 'fintechcommercegurus_page_heading_top_margin' );
		$fintechcommercegurus_page_heading_bottom_margin = fintechcommercegurus_getoption( 'fintechcommercegurus_page_heading_bottom_margin' );
		$fintechcommercegurus_announcements_bg = fintechcommercegurus_getoption( 'fintechcommercegurus_announcements_bg' );
		$fintechcommercegurus_announcements_text = fintechcommercegurus_getoption( 'fintechcommercegurus_announcements_text' );
		$fintechcommercegurus_topbar_bgcolor = fintechcommercegurus_getoption( 'fintechcommercegurus_topbar_bgcolor' );
		$fintechcommercegurus_topbar_txtcolor = fintechcommercegurus_getoption( 'fintechcommercegurus_topbar_txtcolor' );
		
		$fintechcommercegurus_page_header_bg_array = '';
		$fintechcommercegurus_page_header_bg_array = fintechcommercegurus_getoption( 'fintechcommercegurus_page_header_bg' );
		if ( $fintechcommercegurus_page_header_bg_array ) {
			$fintechcommercegurus_page_header_bg = $fintechcommercegurus_page_header_bg_array['url'] ;			
		}

		
		$fintechcommercegurus_skin_color			 			= fintechcommercegurus_getoption( 'fintechcommercegurus_skin_color' );
		$fintechcommercegurus_primary_color		 				= fintechcommercegurus_getoption( 'fintechcommercegurus_primary_color' );
		$fintechcommercegurus_active_link_color	 				= fintechcommercegurus_getoption( 'fintechcommercegurus_active_link_color' );
		$fintechcommercegurus_link_hover_color	 				= fintechcommercegurus_getoption( 'fintechcommercegurus_link_hover_color' );
		$fintechcommercegurus_first_footer_bg			 	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_first_footer_bg' );
		$fintechcommercegurus_second_footer_bg		 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_second_footer_bg' );
		$fintechcommercegurus_first_footer_text		 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_first_footer_text' );
		$fintechcommercegurus_first_footer_link		 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_first_footer_link' );
		$fintechcommercegurus_second_footer_text		 	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_second_footer_text' );
		$fintechcommercegurus_header_bg_color			 	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_header_bg_color' );
		$fintechcommercegurus_header_text_color		 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_header_text_color' );
		$fintechcommercegurus_navigation_text_color	 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_navigation_text_color' );
		$fintechcommercegurus_navigation_link_color	 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_navigation_link_color' );
		$fintechcommercegurus_navigation_button_color	  		= fintechcommercegurus_getoption( 'fintechcommercegurus_navigation_button_color' );
		$fintechcommercegurus_navigation_button_hover_color	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_navigation_button_hover_color' );
		$fintechcommercegurus_main_menu_dropdown_hover	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_main_menu_dropdown_hover' );
		$fintechcommercegurus_mega_menu_color			 		= fintechcommercegurus_getoption( 'fintechcommercegurus_mega_menu_color' );
		$fintechcommercegurus_mobile_header_bg_color	 	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_mobile_header_bg_color' );
		$fintechcommercegurus_header_fixed_bg_color	 	 		= fintechcommercegurus_getoption( 'fintechcommercegurus_header_fixed_bg_color' );
		$fintechcommercegurus_header_fixed_text_color	 	 	= fintechcommercegurus_getoption( 'fintechcommercegurus_header_fixed_text_color' );
		$fintechcommercegurus_custom_css 						= fintechcommercegurus_getoption( 'fintechcommercegurus_custom_css' );

		$fintechcommercegurus_level2_font_color_array = '';
		$fintechcommercegurus_level2_font_color_array = fintechcommercegurus_getoption( 'fintechcommercegurus_level2_font' );
		if ( $fintechcommercegurus_level2_font_color_array ) {
			$fintechcommercegurus_level2_font_color = $fintechcommercegurus_level2_font_color_array['color'];
		}

		$header_top_padding_height			 = ( ( $fintechcommercegurus_logo_height ) + ( $fintechcommercegurus_padding_above_logo ) );
		$sticky_header_top_padding_height	 = ( ( $fintechcommercegurus_sticky_logo_height ) + ( $fintechcommercegurus_padding_above_sticky_logo ) );
		$header_total_height				 = ( ( $fintechcommercegurus_logo_height ) + ( $fintechcommercegurus_padding_above_logo ) + ( $fintechcommercegurus_padding_below_logo ) );
		$sticky_header_total_height			 = ( ( $fintechcommercegurus_sticky_logo_height ) + ( $fintechcommercegurus_padding_above_sticky_logo ) + ( $fintechcommercegurus_padding_below_sticky_logo ) );

		if ( $fintechcommercegurus_announcements_bg ) {
			?>

			.cg-announcements 
			{
				background-color: <?php echo esc_attr( $fintechcommercegurus_announcements_bg ); ?>;
			}

			<?php
		}

		if ( $fintechcommercegurus_announcements_text ) {
			?>

			.cg-announcements,
			.cg-announcements a,
			.cg-announcements a:hover,
			.activate-mobile-search i

			{
				color: <?php echo esc_attr( $fintechcommercegurus_announcements_text ); ?>;
			}

			<?php
		}

		if ( $fintechcommercegurus_topbar_bgcolor ) {
			?>

			.cg-shopping-toolbar 
			{
				background-color: <?php echo esc_attr( $fintechcommercegurus_topbar_bgcolor ); ?>;
			}

			<?php
		}

		if ( $fintechcommercegurus_topbar_txtcolor ) {
			?>

			.cg-shopping-toolbar .wpml .widget_text,
			.cg-shopping-toolbar a.divider,
			.cg-shopping-toolbar a,
			.cg-shopping-toolbar
			{            
				color: <?php echo esc_attr( $fintechcommercegurus_topbar_txtcolor ); ?>;
			}

			<?php
		}

		if ( $fintechcommercegurus_level2_font_color ) {
			?>

			.cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a:hover, 
			.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a:hover 
			{
				color: <?php echo esc_attr( $fintechcommercegurus_level2_font_color ); ?>;
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_main_menu_dropdown_hover ) {
			?>
			body .cg-primary-menu .menu > li .cg-submenu-ddown .container > ul > li > a:hover,
			.cg-primary-menu .menu > li .cg-submenu-ddown .container > ul .menu-item-has-children .cg-submenu ul > li > a:hover
			 {
				color: <?php echo esc_attr( $fintechcommercegurus_main_menu_dropdown_hover ); ?>; 
			}
			
		<?php } ?>

		<?php if ( $fintechcommercegurus_mega_menu_color ) {
			?>
			.cg-primary-menu.cg-primary-menu-left .menu > li.menu-full-width .cg-submenu-ddown li *,
			body .cg-primary-menu.cg-primary-menu-left .menu > li.menu-full-width .cg-submenu-ddown li p,
			body .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children > a,
			body .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children > a:hover,
			.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children .cg-submenu li a,
			.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children .cg-submenu li a:hover,
			.menu > li.menu-full-width .cg-submenu-ddown h2,
			.menu > li.menu-full-width .cg-submenu-ddown h3,
			.menu > li.menu-full-width .cg-submenu-ddown h4,
			.menu > li.menu-full-width .cg-submenu-ddown h5,
			.menu > li.menu-full-width .cg-submenu-ddown h6,
			.menu > li.menu-full-width .cg-submenu-ddown h6 a
			{
				color: <?php echo esc_attr( $fintechcommercegurus_mega_menu_color ); ?>; 
			}
			
		<?php } ?>

		<?php if ( $fintechcommercegurus_bg_color ) {
			?>
			body {
				background-color: <?php echo esc_attr( $fintechcommercegurus_bg_color ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_bg_img ) { ?>
			body {
				background-image: url('<?php echo esc_url( $fintechcommercegurus_bg_img ); ?>'); 
				background-position: 0px 0px;
				background-attachment: fixed;
				background-size: cover;
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_bg_img_repeat ) { ?>
			body {
				background-repeat: <?php echo esc_attr( $fintechcommercegurus_bg_img_repeat ); ?>; 
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_bg_pattern_img ) { ?>
			body {
				background-image: url('<?php echo esc_url( $fintechcommercegurus_bg_pattern_img ); ?>'); 
				background-position: 0px 0px;
			}
		<?php } ?>

			<?php if ( $fintechcommercegurus_page_header_bg ) { ?>
			.cg-hero-bg {
				background-image: url('<?php echo esc_url( $fintechcommercegurus_page_header_bg ); ?>'); 
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_bg_pattern_img_repeat ) { ?>
			body {
				background-repeat: <?php echo esc_attr( $fintechcommercegurus_bg_pattern_img_repeat ); ?>; 
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_page_wrapper_color ) { ?>
			#main-wrapper, 
			body.boxed #main-wrapper,
			#cg-page-wrap,
			.page-container {
				background-color: <?php echo esc_attr( $fintechcommercegurus_page_wrapper_color ); ?>; 
			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_primary_color ) { ?>

			#top,
			.new.menu-item a:after, 
			#secondary:before,
			.blog-pagination ul li.active a,
			.first-footer .inner-widget-wrap .button a,
			.bttn:before, .cg-product-cta .button:before, 
			.slider .cg-product-cta .button:before, 
			.widget_shopping_cart_content p.buttons a.button:before,
			.faqs-reviews .accordionButton .icon-plus:before, 
			.content-area ul.bullets li:before,
			.container .mejs-controls .mejs-time-rail .mejs-time-current,
			.wpb_toggle:before, h4.wpb_toggle:before,
			#filters button.is-checked,
			.first-footer ul.list li:before,
			.tipr_content,
			.navbar-toggle .icon-bar,
			#calendar_wrap caption,
			.subfooter #mc_signup_submit,
			.container .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active,
			.page-numbers li span.current,
			.page-numbers li a:hover,
			.product-category-description,
			.nav-slit h3,
			.cg-folio-thumb,
			.cg-folio-button,
			.cg-extra-product-options li a:after,
			.post-tags a:hover, 
			body.single-post.has-featured-image .header-wrapper .entry-meta time,
			#respond input#submit,
			#respond input#submit:hover,
			.content-area footer.entry-meta a:after,
			body .flex-direction-nav a,
			body.single-post .content-area footer.entry-meta a:after,
			.content-area .medium-blog footer.entry-meta a:after,
			.container #mc_signup_submit,
			.cg-overlay-feature .cg-copy span.subtitle strong,
			.cg-overlay-slideup:hover .cg-copy,
			.container .mc4wp-form input[type="submit"],
			.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content,
			.wpcf7 input.wpcf7-submit,
			.double-bounce1, .double-bounce2,
			.entry-content a.more-link:before,
			.woocommerce a.button.alt,
			.woocommerce a.button.alt:hover,
			.widget_pages ul li:before, 
			.widget_meta ul li:before, 
			.widget_archive ul li:before, 
			.widget_categories ul li:before, 
			.widget_nav_menu ul li:before,
			.woocommerce button.button.alt,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt,
			.woocommerce input.button.alt:hover

			{
				background-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>; 
			}

			.page-numbers li span.current,
			ul.tiny-cart li ul.cart_list li.buttons .button.checkout,
			.page-numbers li a:hover, 
			.page-numbers li span.current,
			.page-numbers li span.current:hover,
			.content-area .blog-pagination ul li a:hover,
			.page-numbers li a:hover,
			.blog-pagination ul li.active a,
			.vc_read_more,
			body .wpb_teaser_grid .categories_filter li a:hover, 
			.owl-theme .owl-controls .owl-page.active span, 
			.owl-theme .owl-controls.clickable .owl-page:hover span,
			.woocommerce-page .container .cart-collaterals a.button,
			.container .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a,
			.order-wrap,
			.cg-product-cta .button:hover,
			.slider .cg-product-cta .button:hover,
			.widget_shopping_cart_content p.buttons a.button.checkout,
			body.home .wpb_text_column p a.more-link:hover,
			.woocommerce-message,
			#respond input#submit,
			.up-sells-bottom h2 span,
			.content-area .up-sells-bottom h2 span,
			.related h2 span,
			.content-area .related h2 span,
			.cross-sells h2 span,
			.woocommerce-page .content-area form .coupon h3 span,
			body .vc_tta.vc_general.vc_tta-color-white .vc_tta-tab.vc_active span,
			body.error404 .content-area a.btn,
			body .flexslider,
			body.woocommerce-page ul.products li.product a:hover img,
			.cg-primary-menu .menu > li:hover,
			.content-area h5 a

			{
				border-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}

			.post-tags a:hover:before,
			.cat-links a:hover:before,
			.tags-links a:hover:before {
				border-right-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}

			.content-area .grid-news article.sticky.type-post .news-summary {
				border-top-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}

			.container .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a:before {
				border-top-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}

			a,
			.model-1 .spinner,
			body.bbpress button,
			.cg-features i,
			.cg-features h2,
			.toggle-active i.fa,
			.mobile-header-details .cg-header-details i,
			body.single-post #primary article.type-post .entry-content > p:first-of-type:first-letter,
			#secondary .widget_product_categories ul.product-categories li a:after,
			.content-area .entry-content blockquote:before,
			#secondary .advanced-sidebar-menu ul li a:after,
			.content-area .blog-pagination ul li a:hover,
			.cg-menu-beside .cg-cart-count,
			.widget_layered_nav ul.yith-wcan-list li a:before,
			.widget_layered_nav ul.yith-wcan-list li.chosen a:before,
			.widget_layered_nav ul.yith-wcan-list li.chosen a,
			.cg-menu-below .cg-extras .cg-header-details i,
			blockquote:before,
			blockquote:after,
			article.format-link .entry-content p:before,
			.container .ui-state-default a, 
			.container .ui-state-default a:link, 
			.container .ui-state-default a:visited,
			.logo a,
			.content-area .grid-news article:hover h2 a,
			.container .cg-product-cta a.button.added:after,
			.woocommerce-breadcrumb a,
			#cg-articles h3 a,
			.cg-recent-folio-title a, 
			.woocommerce-message,
			.content-area h2.cg-recent-folio-title a,
			.cg-primary-menu-below-wrapper .menu > li.download a:before,
			.cg-primary-menu-below-wrapper .menu > li.arrow a:before,
			.widget_rss ul li a,
			.lightwrapper .widget_rss ul li a,
			.woocommerce-tabs .tabs li a:hover,
			.content-area .checkout-confirmed-payment p,
			.icon.cg-icon-bag-shopping-2, 
			.icon.cg-icon-basket-1, 
			.icon.cg-icon-shopping-1,
			#top-menu-wrap li a:hover,
			.widget ul.product-categories ul.children li a:before,
			.widget_pages ul ul.children li a:before,
			.container .wpb_content_element .wpb_tabs_nav li.ui-tabs-active a,
			.container .wpb_tabs .wpb_tabs_nav li a:hover,
			.widget a:hover,
			.cg-product-cta a.button.added,
			.woocommerce-tabs .tabs li.active a,
			.summary .price ins .amount,
			.woocommerce div.product p.price,
			body.woocommerce-page ul.products li.product .price,
			ul.tiny-cart li a.cart_dropdown_link:before,
			button.mfp-close:hover,
			body .vc_custom_heading a:hover,
			body.error404 .content-area a.btn,
			.no-grid .vc_custom_heading a:hover,
			.cg-price-action .cg-product-cta a,
            .prev-product:hover:before, 
			.next-product:hover:before,
			.woocommerce nav.woocommerce-pagination ul li span.current,
			.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a:hover,
			.container .wpb_tour.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav li.ui-state-active a,
			.cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li.title a:hover,
			.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li.title a:hover 

			{
				color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}

			.owl-theme .owl-controls .owl-buttons div:hover,
			article.format-link .entry-content p:hover,
			.container .ui-state-hover,
			#filters button.is-checked,
			#filters button.is-checked:hover,
			.map_inner,
			h4.widget-title span,
			.wpb_teaser_grid .categories_filter li.active a,
			.cg-header-fixed .menu > li .cg-submenu-ddown, 
			body .wpb_teaser_grid .categories_filter li.active a,
			.cg-wp-menu-wrapper .menu li a:hover,
			.cg-primary-menu-beside .cg-wp-menu-wrapper .menu li:hover a,
			.cg-header-fixed .cg-wp-menu-wrapper .menu li:hover a,
			.container .cg-product-cta a.button.added,
			h4.widget-title span,
			#secondary h4.widget-title span,
			.container .wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active

			{
				border-color: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;
			}


			ul.tabNavigation li a.active,
			.wpb_teaser_grid .categories_filter li.active a,
			ul.tiny-cart li ul.cart_list li.buttons .button.checkout

			{
				background: <?php echo esc_attr( $fintechcommercegurus_primary_color ); ?>;

			}


		<?php } ?>

		<?php if ( $fintechcommercegurus_active_link_color ) { ?>

			a,
			.logo a,
			#secondary .widget_rss ul li a,
			.navbar ul li.current-menu-item a, 
			.navbar ul li.current-menu-ancestor a, 
			body.woocommerce ul.products li.product a:hover,
			.entry-content a.more-link,
			#cg-articles h3 a,
			.current-menu-item,
			.content-area table.my_account_orders td.order-actions a,
			body.blog.has-featured-image .header-wrapper p.sub-title a,
			.content-area .cart-collaterals table a.shipping-calculator-button,
			.content-area h6 a.email,
			#secondary .widget_recent_entries ul li a

			{
				color: <?php echo esc_attr( $fintechcommercegurus_active_link_color ); ?>; 
			}

			.entry-content a.more-link {
				border-color: <?php echo esc_attr( $fintechcommercegurus_active_link_color ); ?>; 	
			}


		<?php } ?>

		<?php if ( $fintechcommercegurus_link_hover_color ) { ?>
			.page-container a:hover,
			.page-container a:focus,
			body.single footer.entry-meta a:hover,
			.content-area table a:hover,
			.cg-blog-date .comments-link a:hover,
			.widget ul.product-categories li a:hover,
			.widget ul.product-categories ul.children li a:hover,
			#top .dropdown-menu li a:hover, 
			ul.navbar-nav li .nav-dropdown li a:hover,
			.navbar ul li.current-menu-item a:hover, 
			.navbar ul li.current-menu-ancestor a:hover,
			.content-area a.post-edit-link:hover:before,
			.blog-pagination ul li a:hover,
			.content-area .medium-blog footer.entry-meta a:hover,
			.widget.popular-posts ul li a.wpp-post-title:hover,
			body .content-area article h2 a:hover,
			body .vc_custom_heading a:hover,
			.widget_tag_cloud a:hover,
			body.woocommerce-page ul.products li.product .button:hover,
			#secondary .widget_recent_entries ul li a:hover

			{
				color: <?php echo esc_attr( $fintechcommercegurus_link_hover_color ); ?>; 
			}

			.dropdown-menu > li > a:hover {
				background-color: <?php echo esc_attr( $fintechcommercegurus_link_hover_color ); ?>; 
			}

			.entry-content a.more-link:hover {
				border-color: <?php echo esc_attr( $fintechcommercegurus_link_hover_color ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_header_text_color ) { ?>

			@media only screen and (min-width: 1100px) { 

				.rightnav,
				.rightnav h4.widget-title {
					color: <?php echo esc_attr( $fintechcommercegurus_header_text_color ); ?>;
				}

			}
		<?php } ?>

		<?php if ( $fintechcommercegurus_navigation_text_color ) { ?>

				.cg-primary-menu .menu > li > a {
					color: <?php echo esc_attr( $fintechcommercegurus_navigation_text_color ); ?>;
				}

		<?php } ?>

		<?php if ( $fintechcommercegurus_navigation_link_color ) { ?>

				.cg-header-fixed .menu > li:hover > a, 
				.cg-primary-menu .menu > li:hover > a, 
				.cg-primary-menu-below-wrapper .menu > li.current_page_item > a,
				.cg-primary-menu-below-wrapper .menu > li.current-page-ancestor > a,
				.cg-primary-menu-below-wrapper .menu > li.current_page_parent > a,
				.cg-header-fixed .menu > li.current-page-ancestor > a,
				.cg-header-fixed .menu > li.current_page_parent > a {
					color: <?php echo esc_attr( $fintechcommercegurus_navigation_link_color ); ?>;
				}

				.cg-primary-menu .menu > li a:before {
					border-color: <?php echo esc_attr( $fintechcommercegurus_navigation_link_color ); ?>;
				}

		<?php } ?>

		<?php if ( $fintechcommercegurus_navigation_button_color ) { ?>

				.menu > li.button > a span {
					border-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_color ); ?>;
					background-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_color ); ?>;
				}

				.menu > li.button.see-through > a span {
					border-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_color ); ?>;
					color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_color ); ?>;
				}

				.cg-primary-menu .menu > li > a strong {
					background-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_color ); ?>;
				}

		<?php } ?>

		<?php if ( $fintechcommercegurus_navigation_button_hover_color ) { ?>

				.menu > li.button > a:hover span {
					border-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_hover_color ); ?>;
					background-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_hover_color ); ?>;
				}

				.menu > li.button.see-through > a:hover span {
					border-color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_hover_color ); ?>;
					color: <?php echo esc_attr( $fintechcommercegurus_navigation_button_hover_color ); ?>;
				}

		<?php } ?>

		/* Sticky Header Text */

		<?php if ( $fintechcommercegurus_header_fixed_text_color ) { ?>

			.cg-transparent-header.scroller .cg-primary-menu .menu > li > a,
			.cg-transparent-header.scroller .rightnav .cart_subtotal,
			.cg-transparent-header.scroller .search-button,
			body.transparent-light .cg-transparent-header.scroller .cg-primary-menu .menu > li > a, 
			body.transparent-light .cg-transparent-header.scroller .rightnav .cart_subtotal, 
			body.transparent-light .cg-transparent-header.scroller .search-button,
			body.transparent-dark .cg-transparent-header.scroller .cg-primary-menu .menu > li > a,
			body.transparent-dark .cg-transparent-header.scroller .rightnav .cart_subtotal,
			body.transparent-dark .cg-transparent-header.scroller .search-button,
			.cg-header-fixed-wrapper .rightnav .cart_subtotal {
				color: <?php echo esc_attr( $fintechcommercegurus_header_fixed_text_color ); ?>;
			}


			.cg-transparent-header.scroller .burger span,
			body.transparent-light .cg-transparent-header.scroller .burger span,
			body.transparent-dark .cg-transparent-header.scroller .burger span {
				background: <?php echo esc_attr( $fintechcommercegurus_header_fixed_text_color ); ?>;
			}

			.cg-transparent-header.scroller .leftnav a,
			.cg-header-fixed .leftnav a {
				color: <?php echo esc_attr( $fintechcommercegurus_header_fixed_text_color ); ?>;
				border-color: <?php echo esc_attr( $fintechcommercegurus_header_fixed_text_color ); ?>;
			}



		<?php } ?>

		<?php if ( $fintechcommercegurus_mobile_header_bg_color ) { ?>

			@media only screen and (max-width: 1100px) { 
				body .cg-header-wrap .cg-transparent-header,
				body.transparent-light .cg-header-wrap .cg-transparent-header,
				body.transparent-dark .cg-header-wrap .cg-transparent-header,
				body .cg-menu-below,
				.scroller, 
				body.transparent-light .cg-header-wrap .scroller, 
				body.transparent-dark .cg-header-wrap .scroller {
					background: <?php echo esc_attr( $fintechcommercegurus_mobile_header_bg_color ); ?>; 
				}
			}

		<?php } ?>

		/* Standard Logo */
		<?php if ( $fintechcommercegurus_logo_height ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-transparent-header,
				.cg-menu-below {
					height: <?php echo esc_attr( $fintechcommercegurus_logo_height ); ?>px;
				}

				.leftnav .cg-main-logo img {
					height: <?php echo esc_attr( $fintechcommercegurus_logo_height ); ?>px;
					width: auto;
				}

				.cg-extras {
					line-height: <?php echo esc_attr( $fintechcommercegurus_logo_height ); ?>px;
				}

				.cg-menu-below,
				.cg-menu-below .ul.tiny-cart,
				.cg-logo-center .search-button,
				.cg-menu-below .leftnav a { 
					line-height: <?php echo esc_attr( $header_total_height ); ?>px;
				}

				.cg-menu-below .ul.tiny-cart,
				.cg-menu-below .cg-extras .site-search {
					height: <?php echo esc_attr( $header_total_height ); ?>px;
					line-height: <?php echo esc_attr( $header_total_height ); ?>px;
				}

				.rightnav .extra {
					height: <?php echo esc_attr( $header_total_height ); ?>px;
				}


			}

		<?php } ?>

		/* Sticky Logo */
		<?php if ( $fintechcommercegurus_sticky_logo_height ) { ?>

			@media only screen and (min-width: 1100px) {

				.cg-header-fixed .helper {
					height: <?php echo esc_attr( $sticky_header_total_height ); ?>px;
					line-height: <?php echo esc_attr( $sticky_header_total_height ); ?>px;
				}

				.scroller .leftnav .cg-sticky-logo img,
				.cg-header-fixed .leftnav img {
					height: <?php echo esc_attr( $fintechcommercegurus_sticky_logo_height ); ?>px;
					width: auto;
				}

				.scroller .cg-extras {
					line-height: <?php echo esc_attr( $fintechcommercegurus_sticky_logo_height ); ?>px;
				}

				.scroller.cg-transparent-header .midnav li,
				.scroller.rightnav {
					line-height: <?php echo esc_attr( $fintechcommercegurus_sticky_logo_height ); ?>px;
				}

				.cg-header-fixed-wrapper .cg-primary-menu .menu > li > a {
					line-height: <?php echo esc_attr( $sticky_header_total_height ); ?>px;
				}

				

			}

		<?php } ?>


		/* Standard Top Padding */
		<?php if ( $fintechcommercegurus_padding_above_logo ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-transparent-header {
					height: <?php echo esc_attr( $header_top_padding_height ); ?>px;
					padding-top: <?php echo esc_attr( $fintechcommercegurus_padding_above_logo ); ?>px;
				}

			}

		<?php } ?>

		/* Sticky Top Padding */
		<?php if ( $fintechcommercegurus_padding_above_sticky_logo ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-transparent-header.scroller {
					height: <?php echo esc_attr( $sticky_header_top_padding_height ); ?>px;
					padding-top: <?php echo esc_attr( $fintechcommercegurus_padding_above_sticky_logo ); ?>px;
				}
			}

		<?php } ?>

		/* Standard Bottom Padding */
		<?php if ( $fintechcommercegurus_padding_below_logo ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-transparent-header,
				.cg-menu-below {
					height: <?php echo esc_attr( $header_total_height ); ?>px;
				}

				.cg-transparent-header .cg-primary-menu .menu > li > a {
					padding-bottom: <?php echo esc_attr( $fintechcommercegurus_padding_below_logo ); ?>px;
				}
			}

		<?php } ?>

		/* Sticky Bottom Padding */
		<?php if ( $fintechcommercegurus_padding_below_sticky_logo ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-transparent-header.scroller {
					height: <?php echo esc_attr( $sticky_header_total_height ); ?>px;
				}

				.cg-transparent-header.scroller .cg-primary-menu .menu > li > a {
					padding-bottom: <?php echo esc_attr( $fintechcommercegurus_padding_below_sticky_logo ); ?>px;
				}
			}

		<?php } ?>

		/* Dynamic Logo Width */
		<?php if ( $fintechcommercegurus_dynamic_logo_width ) { ?>

			@media only screen and (min-width: 1100px) {
				.cg-menu-below .leftnav.dynamic-logo-width {
					width: <?php echo esc_attr( $fintechcommercegurus_dynamic_logo_width ); ?>%;
				}

				.rightnav {
					width: <?php echo esc_attr( $fintechcommercegurus_dynamic_widget_area_width ); ?>%;
				}

			}

				.cg-menu-below .leftnav.text-logo {
				  min-height: auto;
				  padding-bottom: inherit;
				}

		<?php } ?>

		/* Heading Top Margin */
		<?php if ( $fintechcommercegurus_page_heading_top_margin ) { ?>

				.header-wrapper {
					padding-top: <?php echo esc_attr( $fintechcommercegurus_page_heading_top_margin ); ?>px;
				}

		<?php } ?>

		/* Heading Bottom Margin */
		<?php if ( $fintechcommercegurus_page_heading_bottom_margin ) { ?>

				.header-wrapper {
					padding-bottom: <?php echo esc_attr( $fintechcommercegurus_page_heading_bottom_margin ); ?>px;
				}

		<?php } ?>

		<?php if ( $fintechcommercegurus_mobile_header_height ) { ?>

			@media only screen and (max-width: 1100px) {

				.cg-wp-menu-wrapper .activate-mobile-search {
					line-height: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
				}

				.cg-menu-below .leftnav.text-logo {
					height: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
					line-height: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
				}

				.mean-container a.meanmenu-reveal {
					height: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
				}

				.cg-menu-below .logo a {
					line-height: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
				}

				.mean-container .mean-nav {
					margin-top: <?php echo esc_attr( $fintechcommercegurus_mobile_header_height ); ?>px;
				}
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_mobile_logo_height ) { ?>

			@media only screen and (max-width: 1100px) {
				.logo img, .cg-menu-below .logo img {
					max-height: <?php echo esc_attr( $fintechcommercegurus_mobile_logo_height ); ?>px;
				}
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_first_footer_bg ) { ?>
			.first-footer

			{
				background-color: <?php echo esc_attr( $fintechcommercegurus_first_footer_bg ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_first_footer_pattern ) { ?>
			.footercontainer .first-footer {
				background-image: url('<?php echo esc_url( $fintechcommercegurus_first_footer_pattern ); ?>'); 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_second_footer_bg ) { ?>
			.second-footer

			{
				background-color: <?php echo esc_attr( $fintechcommercegurus_second_footer_bg ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_first_footer_text ) { ?>
			.first-footer, .first-footer h4.widget-title, .first-footer a:hover, .first-footer li  

			{
				color: <?php echo esc_attr( $fintechcommercegurus_first_footer_text ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_first_footer_link ) { ?>
			.first-footer a  

			{
				color: <?php echo esc_attr( $fintechcommercegurus_first_footer_link ); ?>; 
			}

		<?php } ?>

		<?php if ( $fintechcommercegurus_second_footer_text ) { ?>

			.second-footer, .second-footer h4.widget-title, .second-footer a, .second-footer a:hover, .second-footer li  

			{
				color: <?php echo esc_attr( $fintechcommercegurus_second_footer_text ); ?>; 
			}

		<?php } ?>


		<?php
		if ( $fintechcommercegurus_custom_css ) {
			echo esc_attr( $fintechcommercegurus_custom_css );
		}
		?>

	</style>

	<?php
}

function fintechcommercegurus_hex2rgb( $hex ) {
	$hex = str_replace( "#", "", $hex );

	if ( strlen( $hex ) == 3 ) {
		$r	 = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g	 = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b	 = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r	 = hexdec( substr( $hex, 0, 2 ) );
		$g	 = hexdec( substr( $hex, 2, 2 ) );
		$b	 = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = array( $r, $g, $b );
	return implode( ",", $rgb ); // returns the rgb values separated by commas
}

add_action( 'wp_head', 'fintechcommercegurus_custom_css', 100 );
