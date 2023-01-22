<?php
	
	/**
	 * Custom CSS For Basic Template Customizer
	 * Make sure to enqueue add_inline_style 'load_basic_css' in functions.php
	 * Otherwise your styles won't load in the preview window.
	 */
	
	function load_customizer_css() {
		$css_cust = '';
		
		$wide_temp_img	= get_theme_mod ('wide_temp_img');
		
		if (is_page_template('templates/full-width-template.php')) {
			$css_cust .= '
		
		.wide-temp-bg-img {
		
				background:  linear-gradient(
                rgba(255, 0, 0, 0.45),
                rgba(255, 0, 0, 0.45)
                ), url(' . $wide_temp_img	 . ');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
		}
		';
			return $css_cust;
		}
	}
