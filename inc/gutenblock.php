<?php
	
	function frh_setup_theme_supported_features() {
		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name' => esc_attr__( 'Small', 'fall-river-hotel' ),
				'size' => 12,
				'slug' => 'small'
			),
			array(
				'name' => esc_attr__( 'Regular', 'fall-river-hotel' ),
				'size' => 16,
				'slug' => 'regular'
			),
			array(
				'name' => esc_attr__( 'Large', 'fall-river-hotel' ),
				'size' => 36,
				'slug' => 'large'
			),
			array(
				'name' => esc_attr__( 'Huge', 'fall-river-hotel' ),
				'size' => 50,
				'slug' => 'huge'
			)
		) );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => esc_attr__( 'strong magenta', 'fall-river-hotel' ),
				'slug'  => 'strong-magenta',
				'color' => '#a156b4',
			),
			array(
				'name'  => esc_attr__( 'light grayish magenta', 'fall-river-hotel' ),
				'slug'  => 'light-grayish-magenta',
				'color' => '#d0a5db',
			),
			array(
				'name'  => esc_attr__( 'very light gray', 'fall-river-hotel' ),
				'slug'  => 'very-light-gray',
				'color' => '#eee',
			),
			array(
				'name'  => esc_attr__( 'very dark gray', 'fall-river-hotel' ),
				'slug'  => 'very-dark-gray',
				'color' => '#444',
			),
		) );
	}
	
	add_action( 'after_setup_theme', 'frh_setup_theme_supported_features' );
