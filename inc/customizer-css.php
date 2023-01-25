<?php
	
	/**
	 * Custom CSS For Basic Template Customizer
	 * Make sure to enqueue add_inline_style 'load_basic_css' in functions.php
	 * Otherwise your styles won't load in the preview window.
	 */
	
	function load_customizer_css() {
		$css_cust = '';
		
		$wide_temp_img	= get_theme_mod ('wide_temp_img');
		$rec_temp_img		= get_theme_mod('rec_temp_img');
		
		if (is_page_template('templates/full-width-template.php')) {
			$css_cust .= '
		
		.wide-temp-bg-img {
		
				transform: translate3d(0,0,0) scale(1.25);
				position: absolute;
				z-index: -1;
				overflow: hidden;
				width: 100%;
				height: 100vh;
		
				background:  linear-gradient(
                rgba(255, 0, 0, 0.45),
                rgba(255, 0, 0, 0.45)
                ), url(' . $wide_temp_img	 . ');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
				}
				
				.banner {
				  display: flex;
				  align-items: center;
					position: relative;
					width: 100%;
					height: 100vh;
					padding: 0;
					overflow: hidden;
					backface-visibility: hidden;
				}
		
				.loaded .banner .wide-temp-bg-img {
					transform: scale(1);
					transition: 6.5s transform;
				}
		';
			return $css_cust;
		}

		if (is_page_template('templates/recreation-template.php')) {
			$css_rec .= '
		
		.rec-temp-bg-img {
		
				transform: translate3d(0,0,0) scale(1.25);
				position: absolute;
				z-index: -1;
				overflow: hidden;
				width: 100%;
				height: 100vh;
		
				background:  linear-gradient(
                rgba(255, 0, 0, 0.45),
                rgba(255, 0, 0, 0.45)
                ), url(' . $rec_temp_img	 . ');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
		}
		
		.banner {
			display: flex;
			align-items: center;
			position: relative;
			width: 100%;
			height: 100vh;
			padding: 0;
			overflow: hidden;
			backface-visibility: hidden;
		}
		
		.loaded .banner .rec-temp-bg-img {
			transform: scale(1);
			transition: 6.5s transform;
		}
		';
			return $css_rec;
		}
	}
