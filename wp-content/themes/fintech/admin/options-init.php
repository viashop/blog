<?php
/**
 * ReduxFramework Config
 * */
if ( !class_exists( 'fintechcommercegurus_Redux_Framework_config' ) ) {

	class fintechcommercegurus_Redux_Framework_config {

		public $args	 = array();
		public $sections = array();
		public $theme;
		public $ReduxFramework;

		public function __construct() {

			if ( !class_exists( 'ReduxFramework' ) ) {
				return;
			}

			// This is needed. Bah WordPress bugs.  ;)
			if ( true == Redux_Helpers::isTheme( __FILE__ ) ) {
				$this->initSettings();
			} else {
				add_action( 'plugins_loaded', array( $this, 'initSettings' ), 10 );
			}
		}

		public function initSettings() {

			// Just for demo purposes. Not needed per say.
			$this->theme = wp_get_theme();

			// Set the default arguments
			$this->setArguments();

			// Set a few help tabs so you can see how it's done
			$this->setHelpTabs();

			// Create the sections and fields
			$this->setSections();

			if ( !isset( $this->args['opt_name'] ) ) { // No errors please
				return;
			}

			// If Redux is running as a plugin, this will remove the demo notice and links
			add_action( 'redux/loaded', array( $this, 'remove_demo' ) );

			$this->ReduxFramework = new ReduxFramework( $this->sections, $this->args );
		}

		/**
		 * This is a test function that will let you see when the compiler hook occurs.
		 * It only runs if a field   set with compiler=>true is changed.
		 * */
		function compiler_action( $options, $css ) {

		}

		/**
		 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
		 * Simply include this function in the child themes functions.php file.
		 * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
		 * so you must use get_template_directory_uri() if you want to use any of the built in icons
		 * */
		function dynamic_section( $sections ) {
			//$sections = array();
			$sections[] = array(
				'title'	 => esc_html__( 'Section via hook', 'fintech' ),
				'desc'	 => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'fintech' ),
				'icon'	 => 'el-icon-paper-clip',
				// Leave this as a blank section, no options just some intro text set above.
				'fields' => array()
			);

			return $sections;
		}

		/**
		 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
		 * */
		function change_arguments( $args ) {
			//$args['dev_mode'] = true;

			return $args;
		}

		/**
		 * Filter hook for filtering the default value of any given field. Very useful in development mode.
		 * */
		function change_defaults( $defaults ) {
			$defaults['str_replace'] = 'Testing filter hook!';

			return $defaults;
		}

		// Remove the demo link and the notice of integrated demo from the redux-framework plugin
		function remove_demo() {

			// Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
			if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
				remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ), null, 2 );

				// Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
				remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
			}
		}

		public function setSections() {

			/**
			 * Theme Options sections
			 * */
			$this->sections[] = array(
				'title'	 => esc_html__( 'Global Settings', 'fintech' ),
				'desc'	 => esc_html__( 'Changes to major global elements.', 'fintech' ),
				'icon'	 => 'el-icon-home',
				'fields' => array(
					array(
						'desc'		 => esc_html__( 'Select a container layout style', 'fintech' ),
						'id'		 => 'container_style',
						'type'		 => 'select',
						'options'	 => array(
							'full-width' => esc_html__( 'Full Width Layout', 'fintech' ),
							'boxed'		 => esc_html__( 'Boxed Layout', 'fintech' ),
						),
						'title'		 => esc_html__( 'Container layout style', 'fintech' ),
						'default'	 => 'full-width',
					),
					array(
						'desc'		 => esc_html__( 'Enable or disable responsiveness on smartphones', 'fintech' ),
						'id'		 => 'fintechcommercegurus_responsive',
						'type'		 => 'select',
						'options'	 => array(
							'enabled'	 => esc_html__( 'Enabled', 'fintech' ),
							'disabled'	 => esc_html__( 'Disabled', 'fintech' ),
						),
						'title'		 => esc_html__( 'Responsive', 'fintech' ),
						'default'	 => 'enabled',
					),
					array(
                        'desc' => esc_html__( 'Enable or disable the Page preloader', 'fintech' ),
                        'id' => 'fintechcommercegurus_preloader',
                        'type' => 'select',
                        'options' => array(
                            'enabled' => esc_html__( 'Enabled', 'fintech' ),
                            'disabled' => esc_html__( 'Disabled', 'fintech' ),
                        ),
                        'title' => esc_html__( 'Page Preloader', 'fintech' ),
                        'default' => 'enabled',
                    ),
					array(
						'id'					 => 'fintechcommercegurus_background',
						'type'					 => 'background',
						'title'					 => esc_html__( 'Body Background - Color and image', 'fintech' ),
						'subtitle'				 => esc_html__( 'Configure your theme background.', 'fintech' ),
						'background-position'	 => false,
						'background-size'		 => false,
						'background-attachment'	 => false,
						'default'				 => array(
							'background-color' => '#f8f8f8',
						),
					),
					array(
						'id'					 => 'fintechcommercegurus_pattern_background',
						'type'					 => 'background',
						'title'					 => esc_html__( 'Body Background - Pattern', 'fintech' ),
						'subtitle'				 => esc_html__( 'Use this option if you want to use a repeating pattern for your background. Note: Do not try to use both a pattern background and a full size image background! ', 'fintech' ),
						'background-position'	 => false,
						'background-size'		 => false,
						'background-attachment'	 => false,
						'default'				 => array(
							'background-color' => '#efefef',
						),
					),
					array(
						'id'		 => 'fintechcommercegurus_page_wrapper_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Main body wrapper color', 'fintech' ),
						'subtitle'	 => esc_html__( 'Configure your theme wrapper.', 'fintech' ),
						'default'	 => '#ffffff',
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'Colors', 'fintech' ),
				'desc'	 => esc_html__( 'Customize your theme color palette.', 'fintech' ),
				'icon'	 => 'el-icon-tint',
				'fields' => array(
					array(
						'desc'		 => esc_html__( 'Select from one of the predefined color skins, or have your own colors by selecting "No Skin" and choosing colors below.', 'fintech' ),
						'id'		 => 'fintechcommercegurus_skin_color',
						'type'		 => 'select',
						'options'	 => array(
							'none'	 => esc_html__( 'No skin - use custom', 'fintech' ),
							'red'	 => esc_html__( 'Red', 'fintech' ),
							'green'	 => esc_html__( 'Green', 'fintech' ),
							'blue' 	 => esc_html__( 'Blue', 'fintech' ),
						),
						'title'		 => esc_html__( 'Color Skin', 'fintech' ),
						'default'	 => 'none',
					),
					array(
						'id'		 => 'fintechcommercegurus_primary_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Primary theme color', 'fintech' ),
						'subtitle'	 => esc_html__( 'This should be something unique about your site.', 'fintech' ),
						'default'	 => '#00c96d',
					),
					array(
						'id'		 => 'link-colors-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Link Colors', 'fintech' ),
						'subtitle'	 => esc_html__( 'Define your link colors.', 'fintech' ),
						'indent'	 => true
					),
					array(
						'id'		 => 'fintechcommercegurus_active_link_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Active link color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of active links.', 'fintech' ),
						'default'	 => '#0da15d',
					),
					array(
						'id'		 => 'fintechcommercegurus_link_hover_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Link hover color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of your links in the hover state.', 'fintech' ),
						'default'	 => '#000000',
					),
					array(
						'id'	 => 'link-colors-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'header-colors-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Header Colors', 'fintech' ),
						'subtitle'	 => esc_html__( 'Define your header colors. Note: not all color options apply to all header styles.', 'fintech' ),
						'indent'	 => true
					),
					array(
						'id'		 => 'fintechcommercegurus_header_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Header Background Color', 'fintech' ),
						'indent'	 => true,
						'subtitle'	 => esc_html__( 'The Color of the Header Background.', 'fintech' ),
						'default'	 => '#ffffff',
						'output'	 => array( 'background-color' => '.cg-transparent-header, .cg-logo-center, .cg-logo-left' )
					),
					array(
						'id'		 => 'fintechcommercegurus_header_text_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Header Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Header Text.', 'fintech' ),
						'default'	 => '#444444',
					),
					array(
						'id'		 => 'fintechcommercegurus_header_fixed_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Sticky Header Background Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Color of the Sticky Header Background.', 'fintech' ),
						'default'	 => '#ffffff',
						'output'	 => array( 'background-color' => '.scroller, body.transparent-light .scroller, body.transparent-dark .scroller' )
					),
					array(
						'id'		 => 'fintechcommercegurus_header_fixed_text_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Sticky Header Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Sticky Header Text.', 'fintech' ),
						'default'	 => '#222222',
					),
					array(
						'id'		 => 'fintechcommercegurus_mobile_header_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Mobile Header Background Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Mobile Header Background.', 'fintech' ),
						'default'	 => '#ffffff',
					),
					array(
						'id'	 => 'header-colors-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'navigation-colors-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Navigation Colors', 'fintech' ),
						'subtitle'	 => esc_html__( 'Define your navigation colors.', 'fintech' ),
						'indent'	 => true
					),
					array(
						'id'		 => 'fintechcommercegurus_navigation_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Navigation Background Color', 'fintech' ),
						'indent'	 => true,
						'subtitle'	 => esc_html__( 'The Color of Navigation Background.', 'fintech' ),
						'default'	 => '#ffffff',
						'output'	 => array( 'background-color' => '.cg-primary-menu-below-wrapper' )
					),
					array(
						'id'		 => 'fintechcommercegurus_navigation_text_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Navigation Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Navigation', 'fintech' ),
						'default'	 => '#222222',
					),
					array(
						'id'		 => 'fintechcommercegurus_navigation_link_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Navigation Hover, Active Item and Line Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the hover, active item and line within the Navigation', 'fintech' ),
						'default'	 => '#0da15d',
					),
					array(
						'id'		 => 'fintechcommercegurus_navigation_button_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Navigation Button Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Color of buttons within the Navigation', 'fintech' ),
						'default'	 => '#f98b00',
					),
					array(
						'id'		 => 'fintechcommercegurus_navigation_button_hover_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Navigation Button Hover Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Hover Color of buttons within the Navigation', 'fintech' ),
						'default'	 => '#cc6600',
					),
					array(
						'id'	 => 'navigation-colors-end',
						'type'	 => 'section',
						'indent' => false,
					),
					
					array(
						'id'		 => 'rightbar-colors-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Fixed Right Bar Colors', 'fintech' ),
						'subtitle'	 => esc_html__( 'Define your right bar colors.', 'fintech' ),
						'indent'	 => true
					),
					array(
						'id'		 => 'fintechcommercegurus_rightbar_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Right Bar Background Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Background Color of the Fixed Right Bar', 'fintech' ),
						'default'	 => '#ffffff',
						'output'	 => array( 'background-color' => '#nav-right' )
					),
					array(
						'id'		 => 'fintechcommercegurus_rightbar_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Right Bar Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Text Color of the Fixed Right Bar', 'fintech' ),
						'default'	 => '#333333',
						'output'	 => array( 'color' => '#nav-right ul li a, .cd-top:before' )
					),
					array(
						'id'		 => 'fintechcommercegurus_rightbar_hover_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Right Bar Hover Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The Hover Text Color of the Fixed Right Bar', 'fintech' ),
						'default'	 => '#000000',
						'output'	 => array( 'color' => '#nav-right ul li a:hover' )
					),
					array(
						'id'	 => 'rightbar-colors-end',
						'type'	 => 'section',
						'indent' => false,
					),



					
					array(
						'id'		 => 'footer-colors-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Footer Colors', 'fintech' ),
						'subtitle'	 => esc_html__( 'Define your footer colors.', 'fintech' ),
						'indent'	 => true
					),

					array(
						'id'		 => 'fintechcommercegurus_first_footer_bg',
						'type'		 => 'color',
						'title'		 => esc_html__( 'First footer background color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The background color of the first (top) footer.', 'fintech' ),
						'default'	 => '#354a5e',
					),

					array(
						'desc'	 => esc_html__( 'First Footer Background Pattern', 'fintech' ),
						'title'	 => esc_html__( 'First footer background pattern', 'fintech' ),
						'id'	 => 'fintechcommercegurus_first_footer_pattern',
						'type'	 => 'media',
						'subtitle'	=> esc_html__( 'Configure the first (top) footer pattern', 'fintech' ),
						'url'	 => true,
						'default'  		 => array (
        					'url' 		 => get_template_directory_uri() . '/images/pattern.png'
    					),
					),

					array(
						'id'		 => 'fintechcommercegurus_first_footer_text',
						'type'		 => 'color',
						'title'		 => esc_html__( 'First footer text color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The text color of the first (top) footer.', 'fintech' ),
						'default'	 => '#ffffff',
					),
					array(
						'id'		 => 'fintechcommercegurus_first_footer_link',
						'type'		 => 'color',
						'title'		 => esc_html__( 'First footer link color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The link color of the first (top) footer.', 'fintech' ),
						'default'	 => '#ffffff',
					),
					array(
						'id'		 => 'fintechcommercegurus_second_footer_bg',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Second footer background color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The background color of the second (bottom) footer.', 'fintech' ),
						'default'	 => '#ffffff',
					),
					array(
						'id'		 => 'fintechcommercegurus_second_footer_text',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Second footer text color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The text color of the second (bottom) footer.', 'fintech' ),
						'default'	 => '#4f5d6b',
					),
					array(
						'id'	 => 'footer-colors-end',
						'type'	 => 'section',
						'indent' => false,
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'Logos', 'fintech' ),
				'desc'	 => esc_html__( 'Update your Logos.', 'fintech' ),
				'icon'	 => 'el-icon-photo',
				'fields' => array(
					array(
						'id'		 => 'standard-logo-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Logos', 'fintech' ),
						'subtitle'	 => esc_html__( 'Set your Logo', 'fintech' ),
						'indent'	 => true
					),
					array(
						'desc'	 => esc_html__( 'Upload your Logo.', 'fintech' ),
						'id'	 => 'site_logo',
						'type'	 => 'media',
						'title'	 => esc_html__( 'Logo', 'fintech' ),
						'url'	 => true,
						'default'  		 => array (
        					'url' 		 => get_template_directory_uri() . '/images/example-logo.png'
    					),
					),
					array(
						'title'			 => esc_html__( 'Logo Height', 'fintech' ),
						'subtitle'		 => esc_html__( 'Set your Logo Height in pixels', 'fintech' ),
						'id'			 => 'fintechcommercegurus_logo_height',
						'type'			 => 'slider',
						"default"		 => 38,
						"min"			 => 0,
						"step"			 => 1,
						"max"			 => 200,
						'display_value'	 => 'text',
					),
					array(
						'title'			 => esc_html__( 'Padding around Logo', 'fintech' ),
						'subtitle'		 => esc_html__( 'Set some padding around your logo', 'fintech' ),
						'id'			 => 'fintechcommercegurus_padding_below_logo',
						'type'			 => 'slider',
						"default"		 => 78,
						"min"			 => 0,
						"step"			 => 1,
						"max"			 => 200,
						'display_value'	 => 'text',
					),
					array(
						'id'	 => 'standard-logo-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'sticky-logo-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Sticky Logo', 'fintech' ),
						'subtitle'	 => esc_html__( 'Set your Sticky Logo', 'fintech' ),
						'indent'	 => true
					),
					array(
						'desc'	 => esc_html__( 'Upload a Logo which appears within a Sticky Header.', 'fintech' ),
						'id'	 => 'fintechcommercegurus_alt_site_logo',
						'type'	 => 'media',
						'title'	 => esc_html__( 'Sticky Logo (optional)', 'fintech' ),
						'url'	 => true,
						'default'  		 => array (
        					'url' 		 => get_template_directory_uri() . '/images/example-mark.png'
    					),
					),
					array(
						'id'	 => 'sticky-logo-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'dynamic-width-logo-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Logo Container Width', 'fintech' ),
						'subtitle'	 => esc_html__( 'Set the Container width of the Logo - the default is 25%. Unless you have a very wide logo you should not need to adjust this.', 'fintech' ),
						'indent'	 => true
					),
					array(
						'title'			 => esc_html__( 'Logo Container Width', 'fintech' ),
						'subtitle'	 	 => esc_html__( 'Set in %', 'fintech' ),
						'desc'		 	 => esc_html__( 'You may need to remove or adjust your Header Details Widgets if you increase this.', 'fintech' ),
						'id'			 => 'fintechcommercegurus_dynamic_logo_width',
						'type'			 => 'slider',
						"default"		 => 25,
						"min"			 => 10,
						"step"			 => 1,
						"max"			 => 50,
						'display_value'	 => 'text',
					),
					array(
						'id'	 => 'dynamic-width-logo-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'mobile-header-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Mobile Header Height', 'fintech' ),
						'subtitle'	 => esc_html__( 'Set the mobile header height', 'fintech' ),
						'indent'	 => true
					),
					array(
						'title'			 => esc_html__( 'Mobile Header Height', 'fintech' ),
						'subtitle'	 	 => esc_html__( 'Set in px', 'fintech' ),
						'desc'		 	 => esc_html__( 'Increase the Mobile Header Height if you wish (Default is 60px)', 'fintech' ),
						'id'			 => 'fintechcommercegurus_mobile_header_height',
						'type'			 => 'slider',
						"default"		 => 60,
						"min"			 => 60,
						"step"			 => 1,
						"max"			 => 150,
						'display_value'	 => 'text',
					),
					array(
						'title'			 => esc_html__( 'Mobile Logo Height', 'fintech' ),
						'subtitle'	 	 => esc_html__( 'Set in px', 'fintech' ),
						'desc'		 	 => esc_html__( 'This should be set to be roughly half the Mobile Header Height. A little whitespace is good. (Default is 35px)', 'fintech' ),
						'id'			 => 'fintechcommercegurus_mobile_logo_height',
						'type'			 => 'slider',
						"default"		 => 35,
						"min"			 => 25,
						"step"			 => 1,
						"max"			 => 150,
						'display_value'	 => 'text',
					),
					array(
						'id'	 => 'mobile-header-end',
						'type'	 => 'section',
						'indent' => false,
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'Header Settings', 'fintech' ),
				'desc'	 => esc_html__( 'Manage your header.', 'fintech' ),
				'icon'	 => 'el-icon-hand-up',
				'fields' => array(
					array(
						'id'		 => 'fintechcommercegurus_logo_position',
						'type'		 => 'image_select',
						'compiler'	 => true,
						'title'		 => esc_html__( 'Header Layout', 'fintech' ),
						'subtitle'	 => esc_html__( 'Select the Header Layout.', 'fintech' ),
						'options'	 => array(

							'left'	 => array(
							'alt'	 => 'Layout 4',
							'img'	 => get_template_directory_uri() . '/images/theme_options/header_4.png'
							),
						),
						'default'	 => 'left'
					),

					array(
						'id'		 => 'fintechcommercegurus_topbar',
						'type'		 => 'switch',
						'title'		 => esc_html__( 'Top Bar', 'fintech' ),
						'subtitle'	 => esc_html__( 'Enable the Top Bar?', 'fintech' ),
						'on'		 => esc_html__( 'Enable', 'fintech' ),
						'off'		 => esc_html__( 'Disable', 'fintech' ),
						'default'	 => 1,
					),
					array(
						'id'		 => 'fintechcommercegurus_mobile_visible',
						'type'		 => 'switch',
						'title'		 => esc_html__( 'Top Bar Mobile Visibility', 'fintech' ),
						'subtitle'	 => esc_html__( 'If Top Bar is enabled, display on mobile?', 'fintech' ),
						'on'		 => esc_html__( 'Enable', 'fintech' ),
						'off'		 => esc_html__( 'Disable', 'fintech' ),
						'default'	 => 1,
					),
					array(
						'title'		 => esc_html__( 'Sticky Menu', 'fintech' ),
						'desc'		 => esc_html__( 'A sticky menu is a menu which fixes itself to the top as you scroll.', 'fintech' ),
						'id'		 => 'fintechcommercegurus_sticky_menu',
						'type'		 => 'switch',
						'subtitle'	 => esc_html__( 'Enable Sticky Menu?', 'fintech' ),
						'on'		 => esc_html__( 'Enable', 'fintech' ),
						'off'		 => esc_html__( 'Disable', 'fintech' ),
						'default'	 => 1,
					),
					
					array(
						'id'		 => 'fintechcommercegurus_show_search',
						'type'		 => 'switch',
						'title'		 => esc_html__( 'Search', 'fintech' ),
						'subtitle'	 => esc_html__( 'Show Search?', 'fintech' ),
						'on'		 => esc_html__( 'Enable', 'fintech' ),
						'off'		 => esc_html__( 'Disable', 'fintech' ),
						'default'	 => 1,
					),
					array(
						'id'		 => 'fintechcommercegurus_announcements_bg',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Top Bar Background Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Top Bar background.', 'fintech' ),
						'default'	 => '#00c96d',
					),
					array(
						'id'		 => 'fintechcommercegurus_announcements_hover_bg',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Top Bar Background Hover Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Top Bar Hover background.', 'fintech' ),
						'default'	 => '#0da15d',
						'output'	 => array( 'background-color' => '.mobile-search-reveal, .cg-announcements ul li a:hover, .cg-announcements ul.dropdown li:hover, .cg-announcements ul.dropdown ul' )
					),
					array(
						'id'		 => 'fintechcommercegurus_announcements_text',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Top Bar Text Color', 'fintech' ),
						'subtitle'	 => esc_html__( 'The color of the Top Bar text.', 'fintech' ),
						'default'	 => '#ffffff',
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'Main Menu Settings', 'fintech' ),
				'desc'	 => esc_html__( 'Manage your main menu.', 'fintech' ),
				'icon'	 => 'el-icon-cog-alt',
				'fields' => array(
					array(
						'id'			 => 'fintechcommercegurus_level1_font',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Level 1 Typeface', 'fintech' ),
						'text-transform' => true,
						'google'		 => true,
						'font-backup'	 => true,
						'line-height'	 => false,
						'letter-spacing' => true,
						'all_styles'	 => true,
						'output'		 => array( '.cg-primary-menu .menu > li > a', 'ul.tiny-cart > li > a', '.rightnav .cart_subtotal' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px',
						'subtitle'		 => esc_html__( 'Typography option where each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '18px',
						),
					),
					array(
						'id'			 => 'fintechcommercegurus_level2_heading_font',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Level 2 Heading Typeface', 'fintech' ),
						'text-transform' => true,
						'google'		 => true,
						'font-backup'	 => true,
						'line-height'	 => false,
						'letter-spacing' => true,
						'all_styles'	 => true,
						'output'		 => array( '.cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a, .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a, .menu-full-width .cg-menu-title, .cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children > a, .cg-primary-menu .menu > li .cg-submenu-ddown ul li.image-item-title a, .cg-primary-menu .menu > li .cg-submenu-ddown ul li.image-item-title ul a,
.cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul .menu-item-has-children > a, .cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li.title a, .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li.title a, .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li > a:hover' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px',
						'subtitle'		 => esc_html__( 'Typography option where each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '20px',
						),
					),
					array(
						'id'			 => 'fintechcommercegurus_level2_font',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Level 2 Typeface', 'fintech' ),
						'text-transform' => true,
						'google'		 => true, 
						'font-backup'	 => true,
						'line-height'	 => false,
						'letter-spacing' => true,
						'all_styles'	 => true,
						'output'		 => array( '.cg-primary-menu .menu > li .cg-submenu-ddown .container > ul > li > a, .cg-submenu-ddown .container > ul > li > a, .cg-header-fixed .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li ul li > a, .cg-primary-menu .menu > li.menu-full-width .cg-submenu-ddown .container > ul > li .cg-submenu ul li ul li > a, .menu > li.menu-full-width .cg-submenu-ddown li p, .menu > li.menu-full-width .cg-submenu-ddown li .cg-submenu ul li a, .cg-primary-menu .menu > li .cg-submenu-ddown .container > ul .menu-item-has-children .cg-submenu li a' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px',
						'subtitle'		 => esc_html__( 'Typography option where each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#555555',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '16px',
						),
					),

					array(
						'id'		 => 'fintechcommercegurus_main_menu_dropdown_hover',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Dropdown menu hover text color', 'fintech' ),
						'default'	 => '#0da15d',
					),

					array(
						'id'		 => 'mega-heading-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Mega Dropdown', 'fintech' ),
						'subtitle'	 => esc_html__( 'Tweak the colors of the mega dropdown menu', 'fintech' ),
						'indent'	 => false,
					),

					array(
						'id'		 => 'fintechcommercegurus_mega_menu_bg_color',
						'type'		 => 'color',
						'title'		 => esc_html__( 'Mega dropdown background color', 'fintech' ),
						'indent'	 => false,
						'default'	 => '#333333',
						'output'	 => array( 'background-color' => '.menu > li.menu-full-width .cg-submenu-ddown' )
					),

					array(
						'id'		 => 'fintechcommercegurus_mega_menu_color',
						'type'		 => 'color',
						'indent'	 => false,
						'title'		 => esc_html__( 'Mega dropdown text color', 'fintech' ),
						'default'	 => '#ffffff',
					),

					array(
						'id'	 => 'mega-heading-end',
						'type'	 => 'section',
						'indent' => false,
					),
				),
			);


			// Page Settings
			$this->sections[] = array(
				'title'	 => esc_html__( 'Page Options', 'fintech' ),
				'desc'	 => esc_html__( 'Extra Page Options', 'fintech' ),
				'icon'	 => 'el-icon-list-alt',
				'fields' => array(

					array(
						'id'		 => 'page-heading-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Page Heading', 'fintech' ),
						'subtitle'	 => esc_html__( '', 'fintech' ),
						'indent'	 => true
					),
					array(
						
						'id'		 => 'fintechcommercegurus_page_heading_alignment',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Heading Alignment', 'fintech' ),
						'options'	 => array(
							'center' => esc_html__( 'Center', 'fintech' ),
							'left'	 => esc_html__( 'Left', 'fintech' ),
						),
						'default'	 => 'left',
					),

					array(
						'title'			 => esc_html__( 'Heading Top Margin', 'fintech' ),
						'subtitle'	 	 => esc_html__( 'Set in px', 'fintech' ),
						'id'			 => 'fintechcommercegurus_page_heading_top_margin',
						'type'			 => 'slider',
						"default"		 => 95,
						"min"			 => 0,
						"step"			 => 1,
						"max"			 => 300,
						'display_value'	 => 'text',
					),
					array(
						'title'			 => esc_html__( 'Heading Bottom Margin', 'fintech' ),
						'subtitle'	 	 => esc_html__( 'Set in px', 'fintech' ),
						'id'			 => 'fintechcommercegurus_page_heading_bottom_margin',
						'type'			 => 'slider',
						"default"		 => 140,
						"min"			 => 0,
						"step"			 => 1,
						"max"			 => 300,
						'display_value'	 => 'text',
					),
					array(
                        'subtitle' 		 => esc_html__( 'Should be at least 1200px wide', 'fintech' ),
                        'id' 			 => 'fintechcommercegurus_page_header_bg',
                        'type' 			 => 'media',
                        'title' 		 => esc_html__( 'Default Background Image', 'fintech' ),
                        'url' 			 => true,
                        'default'  		 => array (
        					'url' 		 => get_template_directory_uri() . '/images/default-heading-bg.jpg'
    					),					
                    ),
					array(
						'id'	 => 'page-heading-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'share-heading-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Share', 'fintech' ),
						'subtitle'	 => esc_html__( '', 'fintech' ),
						'indent'	 => true
					),
					array(
						'desc'		 => esc_html__( 'Display share buttons below page heading?', 'fintech' ),
						'id'		 => 'fintechcommercegurus_share_options',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Show Share Buttons', 'fintech' ),
						'options'	 => array(
							'yes'	 => esc_html__( 'Yes', 'fintech' ),
							'no'	 => esc_html__( 'No', 'fintech' ),
						),
						'default'	 => 'yes',
					),
					array(
						'id'	 => 'share-heading-end',
						'type'	 => 'section',
						'indent' => false,
					),
					array(
						'id'		 => 'pagesidebar-heading-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Page Sidebar Position', 'fintech' ),
						'subtitle'	 => esc_html__( '', 'fintech' ),
						'indent'	 => true
					),
					array(
						'id'		 => 'fintechcommercegurus_page_sidebar',
						'type'		 => 'select',
						'options'	 => array(
							'default'	 => esc_html__( 'Right sidebar', 'fintech' ),
							'left'		 => esc_html__( 'Left sidebar', 'fintech' ),
						),
						'title'		 => esc_html__( 'Position of the page sidebar', 'fintech' ),
						'default'	 => 'default',
					),
					array(
						'id'	 => 'pagesidebar-heading-end',
						'type'	 => 'section',
						'indent' => false,
					),

					array(
						'id'		 => 'projects-header-start',
						'type'		 => 'section',
						'title'		 => esc_html__( 'Projects Layout', 'fintech' ),
						'indent'	 => true
					),

					array(
						'desc'		 => esc_html__( 'Choose the number of columns', 'fintech' ),
						'id'		 => 'fintechcommercegurus_portfolio_columns',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Projects Columns', 'fintech' ),
						'options'	 => array(
							'two'	 => esc_html__( '2', 'fintech' ),
							'three'	 => esc_html__( '3', 'fintech' ),
							'four'	 => esc_html__( '4', 'fintech' ),
						),
						'default'	 => 'three',
					),

					array(
						'id'	 => 'projects-header-end',
						'type'	 => 'section',
						'indent' => false,
					),

				),
			);


			// End Main/Primary menu image uploads
			$this->sections[] = array(
				'title'	 => esc_html__( 'Footer Settings', 'fintech' ),
				'desc'	 => esc_html__( 'Manage your footer.', 'fintech' ),
				'icon'	 => 'el-icon-hand-down',
				'fields' => array(
					
					array(
						'desc'		 => esc_html__( 'Show Right Side Fixed Bar?', 'fintech' ),
						'id'		 => 'fintechcommercegurus_right_fixed_active',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Show right side fixed bar', 'fintech' ),
						'options'	 => array(
							'yes'	 => esc_html__( 'Yes', 'fintech' ),
							'no'	 => esc_html__( 'No', 'fintech' ),
						),
						'default'	 => 'yes',
					),
					array(
						'desc'		 => __( 'Right Side Fixed Bar Content - Some basic html allowed - ul, li and a html tags only', 'fintech' ),
						'id'		 => 'fintechcommercegurus_right_fixed_content',
						'type'		 => 'textarea',
						'required'	 => array( 'fintechcommercegurus_right_fixed_active', '=', array( 'yes' ) ),
						'title'		 => __( 'Right Side Fixed Bar Content', 'fintech' ),
						'default'	 => '
						<ul class="social">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						</ul>
						<ul class="links">
						<li><a href="#">Terms</a></li>
						<li><a href="#">Privacy</a></li>
						<li><a href="#">Sitemap</a></li>
						<li><a href="#">Contact Us</a></li>
						</ul>',
						'validate'	 => 'html_custom',
				    	'allowed_html' => array(
        					'a' => array(
            					'href' => array(),
            					'title' => array()
        					),
        					'ul' => array(
        						'class' => array()
        					),
        					'i' => array(
        						'class' => array()
        					),
        					'li' => array(),
        					'br' => array(),
        					'em' => array(),
        					'strong' => array()
    					)
					),

					array(
						'desc'		 => esc_html__( 'Show Top Footer?', 'fintech' ),
						'id'		 => 'fintechcommercegurus_footer_top_active',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Show top footer', 'fintech' ),
						'options'	 => array(
							'yes'	 => esc_html__( 'Yes', 'fintech' ),
							'no'	 => esc_html__( 'No', 'fintech' ),
						),
						'default'	 => 'yes',
					),
					array(
						'desc'		 => esc_html__( 'Show Bottom Footer?', 'fintech' ),
						'id'		 => 'fintechcommercegurus_footer_bottom_active',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Show bottom footer', 'fintech' ),
						'options'	 => array(
							'yes'	 => esc_html__( 'Yes', 'fintech' ),
							'no'	 => esc_html__( 'No', 'fintech' ),
						),
						'default'	 => 'yes',
					),
					array(
						'desc'		 => esc_html__( 'Show Back to Top?', 'fintech' ),
						'id'		 => 'fintechcommercegurus_back_to_top',
						'type'		 => 'select',
						'title'		 => esc_html__( 'Show back to top?', 'fintech' ),
						'options'	 => array(
							'yes'	 => esc_html__( 'Yes', 'fintech' ),
							'no'	 => esc_html__( 'No', 'fintech' ),
						),
						'default'	 => 'yes',
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'Typography', 'fintech' ),
				'desc'	 => esc_html__( 'Manage your fonts and typefaces.', 'fintech' ),
				'icon'	 => 'el-icon-fontsize',
				'fields' => array(
					array(
						'id'			 => 'opt-typography-body',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Body/Main text font', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'body', 'select', 'input', 'textarea', 'button', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#333333',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '17px',
							'line-height'	 => '27px'
						),
					),
					array(
						'id'			 => 'opt-typography-secondary',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Secondary font', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'letter-spacing' => true, // Defaults to false
						'text-transform' => true,
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array(
							'.content-area .entry-content p.signature',
							/*'.container .mc4wp-form input[type="submit"]',
							'.text-logo a',*/
							
						),
						'compiler'		 => array( 'h2.site-description-compiler' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'font-weight'	 => '400',
							'font-family'	 => 'Nothing You Could Do',
							'google'		 => true,
						),
					),
					array(
						'id'			 => 'opt-typography-p',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Paragraph Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( '.content-area .entry-content p', '.product p', '.content-area .vc_toggle_title h4', '.content-area ul', '.content-area ol', '.vc_figure-caption', '.authordescription p', 'body.page-template-template-home-default .wpb_text_column p', ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Typography option with each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#343e47',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '17px',
							'line-height'	 => '27px',
						),
					),
					array(
						'id'			 => 'opt-typography-h1',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 1 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h1', '.content-area h1', 'h1.cg-page-title', '.summary h1', '.content-area .summary h1', ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Typography option with each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#111',
							'font-weight'	 => '600',
							'font-family'	 => 'Poppins',
							'google'		 => true,
							'font-size'		 => '55px',
							'line-height'	 => '65px',
							'letter-spacing' => '-1px',
						),
					),
					array(
						'id'			 => 'opt-typography-h2',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 2 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h2', '.content-area h2' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#222',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '32px',
							'line-height'	 => '42px',
							'letter-spacing' => '-0.4px',
						),
					),
					array(
						'id'			 => 'opt-typography-h3',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 3 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h3', '.content-area h3' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#222',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '28px',
							'line-height'	 => '42px'
						),
					),
					array(
						'id'			 => 'opt-typography-h4',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 4 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h4', '.content-area h4', 'body .vc_separator h4' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#222',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '22px',
							'line-height'	 => '35px'
						),
					),
					array(
						'id'			 => 'opt-typography-h5',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 5 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h5', '.content-area h5' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px', // Defaults to px
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#222',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '20px',
							'line-height'	 => '31px'
						),
					),
					array(
						'id'			 => 'opt-typography-h6',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Heading 6 Style', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h6', '.content-area h6' ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px',
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#343e47',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '15px',
							'line-height'	 => '23px'
						),
					),
					array(
						'id'			 => 'cg-type-widget-title',
						'type'			 => 'typography',
						'title'			 => esc_html__( 'Widget Title Typeface', 'fintech' ),
						'google'		 => true, // Disable google fonts. Won't work if you haven't defined your google api key
						'font-backup'	 => true, // Select a backup non-google font in addition to a google font
						'text-transform' => true,
						'letter-spacing' => true, // Defaults to false
						'all_styles'	 => true, // Enable all Google Font style/weight variations to be added to the page
						'output'		 => array( 'h4.widget-title', '#secondary h4.widget-title a', '.subfooter h4', ), // An array of CSS selectors to apply this font style to dynamically
						'units'			 => 'px',
						'subtitle'		 => esc_html__( 'Each property can be called individually.', 'fintech' ),
						'default'		 => array(
							'color'			 => '#444',
							'font-weight'	 => '300',
							'font-family'	 => 'Source Sans Pro',
							'google'		 => true,
							'font-size'		 => '20px',
							'line-height'	 => '29px',
						),
					),
				),
			);

			$this->sections[] = array(
				'title'	 => esc_html__( 'News Settings', 'fintech' ),
				'desc'	 => esc_html__( 'Manage your news settings.', 'fintech' ),
				'icon'	 => 'el-icon-file-edit',
				'fields' => array(
					array(
						'id'		 => 'fintechcommercegurus_blog_page_title',
						'type'		 => 'text',
						'title'		 => esc_html__( 'News Page Title', 'fintech' ),
						'default'	 => esc_html__( 'Latest News', 'fintech' ),
					),

					array(
                        'desc' => esc_html__( 'Upload an optional background image for your news archives page title. The image should be at least 1200px wide.', 'fintech' ),
                        'id' => 'fintechcommercegurus_blog_archive_title_bg_img',
                        'type' => 'media',
                        'title' => esc_html__( 'News Archive Title Background Image', 'fintech' ),
                        'url' => true,
                        'default'  		 => array (
        					'url' 		 => get_template_directory_uri() . '/images/default-heading-bg.jpg'
    					),	
                    ),

					array(
                        'id' 		 => 'fintechcommercegurus_news_layout',
                        'type' 		 => 'select',
                        'options' 	 => array(
                            'default-news' 		=> 'Default',
                            'grid-news' 		=> 'Grid (3 columns)',
                            'grid-news-two' 	=> 'Grid (2 columns)',
                        ),
                        'title'		 => esc_html__( 'News Layout', 'fintech' ),
                        'default' => 'default-news',
                    ),

					array(
						'id'		 => 'fintechcommercegurus_blog_sidebar',
						'type'		 => 'select',
						'options'	 => array(
							'default'	 => esc_html__( 'Left sidebar', 'fintech' ),
							'right'		 => esc_html__( 'Right sidebar', 'fintech' ),
							'none'		 => esc_html__( 'No sidebar', 'fintech' ),
						),
						'title'		 => esc_html__( 'Choose a sidebar position for the news archive page', 'fintech' ),
						'default'	 => 'right',
					),

					array(
						'id'		 => 'fintechcommercegurus_post_sidebar',
						'type'		 => 'select',
						'options'	 => array(
							'default'	 => esc_html__( 'Left sidebar', 'fintech' ),
							'right'		 => esc_html__( 'Right sidebar', 'fintech' ),
							'none'		 => esc_html__( 'No sidebar', 'fintech' ),
						),
						'title'		 => esc_html__( 'Choose a sidebar position for an individual post', 'fintech' ),
						'default'	 => 'right',
					),
				),
			);
			

			$this->sections[] = array(
				'title'	 => esc_html__( 'Custom Code', 'fintech' ),
				'desc'	 => esc_html__( 'Add some custom code.', 'fintech' ),
				'fields' => array(
					array(
						'title'	 => esc_html__( 'Custom CSS', 'fintech' ),
						'desc'	 => esc_html__( 'Add some custom css to your site?', 'fintech' ),
						'id'	 => 'fintechcommercegurus_custom_css',
						'type'	 => 'ace_editor',
						'mode'	 => 'css',
						'theme'	 => 'monokai'
					),
				),
			);
		}

		public function setHelpTabs() {

			// Custom page help tabs, displayed using the help API. Tabs are shown in order of definition.
			$this->args['help_tabs'][] = array(
				'id'		 => 'redux-help-tab-1',
				'title'		 => esc_html__( 'Theme Information 1', 'fintech' ),
				'content'	 => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'fintech' )
			);

			$this->args['help_tabs'][] = array(
				'id'		 => 'redux-help-tab-2',
				'title'		 => esc_html__( 'Theme Information 2', 'fintech' ),
				'content'	 => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'fintech' )
			);

			// Set the help sidebar
			$this->args['help_sidebar'] = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'fintech' );
		}

		/**
		 * Redux config
		 * */
		public function setArguments() {

			$theme = wp_get_theme(); // For use with some settings. Not necessary.

			$this->args = array(
				// TYPICAL -> Change these values as you need/desire

				'opt_name'				 => 'fintechcommercegurus_reduxopt', // This is where your data is stored in the database and also becomes your global variable name.
				'display_name'			 => $theme->get( 'Name' ), // Name that appears at the top of your panel
				'display_version'		 => $theme->get( 'Version' ), // Version that appears at the top of your panel
				'menu_type'				 => 'menu', //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
				'allow_sub_menu'		 => true, // Show the sections below the admin menu item or not
				'menu_title'			 => esc_html__( 'Theme Options', 'fintech' ),
				'page_title'			 => esc_html__( 'Theme Options', 'fintech' ),
				// You will need to generate a Google API key to use this feature.
				// Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
				'google_api_key'		 => 'AIzaSyB9TDy0IOriQpR8gt2TmoaZ070oWgIhvcs', // Must be defined to add google fonts to the typography module
				'google_update_weekly'	 => true,
				'async_typography'		 => false, // Use a asynchronous font on the front end or font string
				'admin_bar'				 => true, // Show the panel pages on the admin bar
				'global_variable'		 => 'fintechcommercegurus_options', // Set a different name for your global variable other than the opt_name
				'dev_mode'				 => false, // Show the time the page took to load, etc
				'customizer'			 => true, // Enable basic customizer support
				//'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
				//'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
				// OPTIONAL -> Give you extra features
				'page_priority'			 => null, // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
				'page_parent'			 => 'themes.php', // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
				'page_permissions'		 => 'manage_options', // Permissions needed to access the options panel.
				'menu_icon'				 => '', // Specify a custom URL to an icon
				'last_tab'				 => '', // Force your panel to always open to a specific tab (by id)
				'page_icon'				 => 'icon-themes', // Icon displayed in the admin panel next to your menu_title
				'page_slug'				 => 'fintechcommercegurus_reduxopt', // Page slug used to denote the panel
				'save_defaults'			 => true, // On load save the defaults to DB before user clicks save or not
				'default_show'			 => false, // If true, shows the default value next to each field that is not the default value.
				'default_mark'			 => '*', // What to print by the field's title if the value shown is default. Suggested: *
				'show_import_export'	 => true, // Shows the Import/Export panel when not used as a field.
				// CAREFUL -> These options are for advanced use only
				'transient_time'		 => 60 * MINUTE_IN_SECONDS,
				'output'				 => true, // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
				'output_tag'			 => true, // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
				'footer_credit'			 => false, // Disable the footer credit of Redux. Please leave if you can help it.
				// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
				'database'				 => '', // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
				'system_info'			 => false, // REMOVE
				// HINTS
				'hints'					 => array(
					'icon'			 => 'icon-question-sign',
					'icon_position'	 => 'right',
					'icon_color'	 => 'lightgray',
					'icon_size'		 => 'normal',
					'tip_style'		 => array(
						'color'		 => 'light',
						'shadow'	 => true,
						'rounded'	 => false,
						'style'		 => '',
					),
					'tip_position'	 => array(
						'my' => 'top left',
						'at' => 'bottom right',
					),
					'tip_effect'	 => array(
						'show'	 => array(
							'effect'	 => 'slide',
							'duration'	 => '500',
							'event'		 => 'mouseover',
						),
						'hide'	 => array(
							'effect'	 => 'slide',
							'duration'	 => '500',
							'event'		 => 'click mouseleave',
						),
					),
				)
			);


			// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
			//$this->args[ 'share_icons' ][] = array(
			//    'url' => 'https://github.com/ReduxFramework/ReduxFramework',
			//    'title' => 'Visit us on GitHub',
			//    'icon' => 'el-icon-github'
			//    //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
			//);
			$this->args[ 'share_icons' ][] = array(
			    'url' => 'https://www.facebook.com/CommerceGurus-1687149888185740',
			    'title' => 'Like us on Facebook',
			    'icon' => 'el-icon-facebook'
			);
			$this->args['share_icons'][] = array(
				'url'	 => esc_html__( 'http://twitter.com/commercegurus', 'fintech' ),
				'title'	 => esc_html__( 'Follow us on Twitter', 'fintech' ),
				'icon'	 => 'el-icon-twitter'
			);
			// Panel Intro text -> before the form
			if ( !isset( $this->args['global_variable'] ) || $this->args['global_variable'] !== false ) {
				if ( !empty( $this->args['global_variable'] ) ) {
					$v = $this->args['global_variable'];
				} else {
					$v = str_replace( '-', '_', $this->args['opt_name'] );
				}
			} else {
			}

		}

	}

	global $reduxConfig;
	$reduxConfig = new fintechcommercegurus_Redux_Framework_config();
}

/**
 * Custom function for the callback referenced above
 */
if ( !function_exists( 'redux_theme_my_custom_field' ) ):

	function redux_theme_my_custom_field( $field, $value ) {
		print_r( $field );
		echo '<br/>';
		print_r( $value );
	}

endif;

/**
 * Custom function for the callback validation referenced above
 * */
if ( !function_exists( 'redux_theme_validate_callback_function' ) ):

	function redux_theme_validate_callback_function( $field, $value, $existing_value ) {
		$error	 = false;
		$value	 = 'just testing';

		$return['value'] = $value;
		if ( $error == true ) {
			$return['error'] = $field;
		}
		return $return;
	}

endif;