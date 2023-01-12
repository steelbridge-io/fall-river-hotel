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
  <div class="carousel-indicators">
   <button type="button" data-bs-target="#slider-frh" data-bs-slide-to="0" class="active"
         aria-current="true" aria-label="Slide 1"></button>
   <button type="button" data-bs-target="#slider-frh" data-bs-slide-to="1" aria-label="Slide 2"></button>
   <button type="button" data-bs-target="#slider-frh" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner frh-slider-wrap">
   <!-- SLIDE #1 -->
   <div class="carousel-item active" data-bs-interval="10000">
    <?php
     $sliderAlt1 = get_theme_mod('slider_img_one');
     $sliderAlt1_id = attachment_url_to_postid($sliderAlt1);
     $slider1_alt = get_post_meta( $sliderAlt1_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_one')); ?>" class="d-block w-100 img-fluid" alt="<?php echo
    $slider1_alt ?>">
    <div class="carousel-caption-cont carousel-caption d-md-block">
    <div class="row caption-row">
    <div class="col-lg-6 title-col">
    <h1 class="slide-one-title"><?php echo get_theme_mod('slide_one_title'); ?></h1>
    </div>
    <div class="col-lg-6 caption-col">
    <div class="slide-one-cap"><?php echo get_theme_mod('slide_one_cap'); ?></div>
    </div>
    </div>
    </div>
   </div>
   <!-- SLIDE #2 -->
   <div class="carousel-item slide-two" data-bs-interval="10000">
    <?php
     $sliderAlt2 = get_theme_mod('slider_img_two');
     $sliderAlt2_id = attachment_url_to_postid($sliderAlt2);
     $slider2_alt = get_post_meta( $sliderAlt2_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_two')); ?>" class="d-block w-100 img-fluid" alt="<?php echo
    $slider2_alt ?>">
    <div class="carousel-caption-cont carousel-caption d-md-block">
    <div class="row caption-row">
    <div class="col-lg-6 title-col">
    <h1 class="slide-two-title"><?php echo get_theme_mod('slide_two_title'); ?></h1>
    </div>
    <div class="col-lg-6 caption-col">
    <p class="slide-two-cap"><?php echo get_theme_mod('slide_two_cap'); ?></p>
    </div>
    </div>
    </div>
   </div>
   <!-- SLIDE #3 -->
   <div class="carousel-item slide-three" data-bs-interval="10000">
    <?php
     $sliderAlt3 = get_theme_mod('slider_img_three');
     $sliderAlt3_id = attachment_url_to_postid($sliderAlt3);
     $slider3_alt = get_post_meta( $sliderAlt3_id, '_wp_attachment_image_alt', true );
    ?>
    <img src="<?php echo esc_url(get_theme_mod('slider_img_three')); ?>" class="d-block w-100 img-fluid" alt="<?php
    echo $slider3_alt ?>">
    <div class="carousel-caption-cont carousel-caption d-md-block">
    <div class="row caption-row">
    <div class="col-lg-6 title-col">
    <h1 class="slide-three-title"><?php echo get_theme_mod('slide_three_title'); ?></h1>
    </div>
    <div class="col-lg-6 caption-col">
    <p class="slide-three-cap"><?php echo get_theme_mod('slide_three_cap'); ?></p>
    </div>
    </div>
    </div>
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

 <div class="page-wrapper">
 <div id="fp-masthead" class="container-fluid pt-5">

  <div class="container pt-5 pb-5">
   <div class="row justify-content-center">

     <div class="feature col-lg-6">

       <img class="img-fluid" src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0
      .3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1558&q=80">

     </div>
     <div class="feature col-lg-6">
       <p class="feature-location">FALL RIVER MILLS, CALIFORNIA</p>
       <h3>Donec rutrum</h3>
       <p class="lead">Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit.</p>
     </div>


    <!-- <div id="fp-masthead-cta-left" class="col-lg-4">
      <h2>Call Us:</h2>&nbsp;
      <a class="tel-number" href="tel:15303365550" title="call us">530 ~ 336 ~ 5550</a></div>
    <div class="col-lg-4">
     <div id="footer-two" class="footer-two-wrap">
      <h3>Book Online Here</h3>
      <a href="https://secure.thinkreservations.com/fallriverhotel/reservations"><button type="button" class="btn btn-red">Click Here To Go To Our Online Booking Site</button></a>
     </div> -->
    </div>
   </div>
  </div>



 
 
 <div class="container mt-5">
   <div id="featurettes-front-page" class="text-center mt-5" data-aos="fade-up" data-aos-duration="2000">
     <div class="row row-one pt-3">
     <div class="feature col-lg-6">
       <div class="feature-text">
       <h3>Donec rutrum</h3>
       <p class="lead">Donec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit.</p>
       </div>
     </div>
     <div class="feature col-lg-6">
       <img class="img-fluid" src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?ixlib=rb-4.0
      .3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1558&q=80">
     </div>
     </div>
     <div class="row row-two pt-3">
     <div class="feature col-lg-6">
      <img class="img-fluid" src="https://images.unsplash.com/photo-1613545325268-9265e1609167?ixlib=rb-4.0
      .3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=3270&q=80">
     </div>
     <div class="feature col-lg-6">
       <div class="feature-text">
       <h3>Sed porttitor</h3>
       <p class="lead">
         Sed porttitor lectus nibh. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Curabitur aliquet quam id dui posuere blandit. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit.
       </p>
       </div>
     </div>
     </div>
   </div>
 </div>
 
	
	<main id="primary" class="site-main container mt-5" data-aos="fade-up" data-aos-duration="2000">
		
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
  </div>

<?php
	//get_sidebar();
	get_footer();
