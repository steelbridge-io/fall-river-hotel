<?php
/**
 * Fall River Hotel Theme Customizer
 *
 * @package Fall_River_Hotel
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

include 'customizer-css.php';

function fall_river_hotel_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'fall_river_hotel_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'fall_river_hotel_customize_partial_blogdescription',
			)
		);
	}
	
	// Front Page Slider
	$wp_customize->add_section('slider_fp', array(
		'title'             => __('Slider Images', 'fall-river-hotel'),
		'priority'          => 30,
	));
	
	$wp_customize->add_setting('slider_img_one', array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'slider_img_one', array(
				'label'    => 'Slider One',
				'settings' => 'slider_img_one',
				'section'  => 'slider_fp',
				'priority' => 10,
				'active_callback' => 'is_front_page',
			)
		)
	);

	// Slide One Title
	$wp_customize -> add_setting ( 'slide_one_title', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_one_title', array (
				'label' => __( 'Slider One Title', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_one_title',
				'type'		=> 'text',
			)
		)
	);

	// Slide One Title Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_one_title',
		array(
			'selector'        => '.slide-one-title',
			'render_callback' => function() {
				return get_theme_mod('slide_one_title');
			}
		)
	);

	// Slide One Caption
	$wp_customize -> add_setting ( 'slide_one_cap', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_one_cap', array (
				'label' => __( 'Slider One Caption', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_one_cap',
				'type'		=> 'textarea',
			)
		)
	);
	// Slide One Caption Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_one_cap',
		array(
			'selector'  => '.slide-one-cap',
			'render_callback' => function() {
				return get_theme_mod('slide_one_cap');
			}
		)
	);

	// Slider Two
	$wp_customize->add_setting('slider_img_two', array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'slider_img_two', array(
				'label'    => 'Slider Two',
				'settings' => 'slider_img_two',
				'section'  => 'slider_fp',
				'priority' => 10,
				'active_callback' => 'is_front_page',
			)
		)
	);

	// Slide Two Title
	$wp_customize -> add_setting ( 'slide_two_title', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_two_title', array (
				'label' => __( 'Slider Two Title', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_two_title',
				'type'		=> 'text',
			)
		)
	);

	// Slide Two Title Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_two_title',
		array(
			'selector'        => '.slide-two-title',
			'render_callback' => function() {
				return get_theme_mod('slide_two_title');
			}
		)
	);

	// Slide Two Caption
	$wp_customize -> add_setting ( 'slide_two_cap', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_two_cap', array (
				'label' => __( 'Slider Two Caption', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_two_cap',
				'type'		=> 'textarea',
			)
		)
	);
	// Slide Two Caption Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_two_cap',
		array(
			'selector'  => '.slide-two-cap',
			'render_callback' => function() {
				return get_theme_mod('slide_two_cap');
			}
		)
	);

	// Slide Three
	$wp_customize->add_setting('slider_img_three', array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'slider_img_three', array(
				'label'    => 'Slider Three',
				'settings' => 'slider_img_three',
				'section'  => 'slider_fp',
				'priority' => 10,
				'active_callback' => 'is_front_page',
			)
		)
	);

	// Slide Three Title
	$wp_customize -> add_setting ( 'slide_three_title', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_three_title', array (
				'label' => __( 'Slider Three Title', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_three_title',
				'type'		=> 'text',
			)
		)
	);

	// Slide Three Title Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_three_title',
		array(
			'selector'        => '.slide-three-title',
			'render_callback' => function() {
				return get_theme_mod('slide_three_title');
			}
		)
	);

	// Slide Two Caption
	$wp_customize -> add_setting ( 'slide_three_cap', array(
		'default'   => '',
		'type'  => 'theme_mod',
		'sanitize_callback' => 'wp_kses_post',
		'transport' => 'postMessage',
	));
	// Add control
	$wp_customize -> add_control (
		new WP_Customize_Control (
			$wp_customize,
			'slide_three_cap', array (
				'label' => __( 'Slider Three Caption', 'fall-river-hotel' ),
				'priority'  =>  10,
				'section'   => 'slider_fp',
				'settings'  => 'slide_three_cap',
				'type'		=> 'textarea',
			)
		)
	);
	// Slider Two Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'slide_three_cap',
		array(
			'selector'  => '.slide-three-cap',
			'render_callback' => function() {
				return get_theme_mod('slide_three_cap');
			}
		)
	);
	
	// Wide Template
	$wp_customize->add_section('wide_template', array(
		'title'             => __('Wide Template', 'fall-river-hotel'),
		'priority'          => 30,
	));
	
	// Wide Template Header Image
	$wp_customize->add_setting('wide_temp_img', array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'wide_temp_img', array(
				'label'    => 'Hero Image',
				'settings' => 'wide_temp_img',
				'section'  => 'wide_template',
				'priority' => 10,
				'active_callback' => function() { return is_page_template('templates/full-width-template.php');}
			)
		)
	);
	
	// Wide Template Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'wide_temp_img',
		array(
			'selector'  => '.wide-temp-img',
			'render_callback' => function() {
				return get_theme_mod('wide_temp_img');
			}
		)
	);

	// Recreation Template
	$wp_customize->add_section('rec_template', array(
		'title'             => __('Recreation Template', 'fall-river-hotel'),
		'priority'          => 30,
	));

	// Recreation Template Header Image
	$wp_customize->add_setting('rec_temp_img', array(
		'default' => '',
		'type' => 'theme_mod',
		'transport' => 'refresh',
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'rec_temp_img', array(
				'label'    => 'Hero Image',
				'settings' => 'rec_temp_img',
				'section'  => 'rec_template',
				'priority' => 10,
				'active_callback' => function() { return is_page_template('templates/recreation-template.php');}
			)
		)
	);

	// Recreation Selective Refresh
	$wp_customize->selective_refresh->add_partial(
		'rec_temp_img',
		array(
			'selector'  => '.rec-temp-img',
			'render_callback' => function() {
				return get_theme_mod('rec_temp_img');
			}
		)
	);
}
add_action( 'customize_register', 'fall_river_hotel_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function fall_river_hotel_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function fall_river_hotel_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function fall_river_hotel_customize_preview_js() {
	wp_enqueue_script( 'fall-river-hotel-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'fall_river_hotel_customize_preview_js' );
