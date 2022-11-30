<?php
	/**
	 * The main template file
	 *
	 * This is the most generic template file in a WordPress theme
	 * and one of the two required files for a theme (the other being style.css).
	 * It is used to display a page when nothing more specific matches a query.
	 * E.g., it puts together the home page when no home.php file exists.
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
	 *
	 * @package Fall_River_Hotel
	 */
	
	get_header();
?>
 
 <div id="slider-frh" class="carousel slide carousel-fade frh-slider-cont" data-bs-ride="carousel">
  <div class="carousel-inner frh-slider-wrap">
   <div class="carousel-item active">
    <?php
     $sliderAlt1 = get_theme_mod('slider_img_one');
     $sliderAlt1_id = attachment_url_to_postid($sliderAlt1);
     $slider1_alt = get_post_meta( $sliderAlt1_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_one')); ?>" class="d-block w-100 img-fluid" alt="<?php echo
    $slider1_alt ?>">
   </div>
   <div class="carousel-item">
    <?php
     $sliderAlt2 = get_theme_mod('slider_img_two');
     $sliderAlt2_id = attachment_url_to_postid($sliderAlt2);
     $slider2_alt = get_post_meta( $sliderAlt2_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_two')); ?>" class="d-block w-100 img-fluid" alt="<?php echo
    $slider2_alt ?>">
   </div>
   <div class="carousel-item">
    <?php
     $sliderAlt3 = get_theme_mod('slider_img_three');
     $sliderAlt3_id = attachment_url_to_postid($sliderAlt3);
     $slider3_alt = get_post_meta( $sliderAlt3_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_three')); ?>" class="d-block w-100 img-fluid" alt="<?php
    echo $slider3_alt ?>">
   </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#slider-frh" data-bs-slide="prev">
   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#slider-frh" data-bs-slide="next">
   <span class="carousel-control-next-icon" aria-hidden="true"></span>
   <span class="visually-hidden">Next</span>
  </button>
 </div>
 
 
	
	<main id="primary" class="site-main container" data-aos="fade-up" data-aos-duration="2000">
		
		<?php
			if ( have_posts() ) :
				
				//if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						<h2>Some text</h2>
					</header>
				<?php
				//endif;
				
				/* Start the Loop */
				while ( have_posts() ) :
					the_post();
					
					/*
					 * Include the Post-Type-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_type() );
				
				endwhile;
				
				the_posts_navigation();
			
			else :
				
				get_template_part( 'template-parts/content', 'none' );
			
			endif;
		?>
	
	</main><!-- #main -->

<?php
	//get_sidebar();
	get_footer();
