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
 
 <div id="fp-cta-row" class="container-fluid">
  <div class="container">
  <div class="row">
   
   <div class="col-lg-4">
    <div id="footer-two" class="footer-two-wrap">
     <h3>Book Online Here</h3>
     <a href="https://secure.thinkreservations.com/fallriverhotel/reservations"><button type="button" class="btn btn-red">Click Here To Go To Our Online Booking Site</button></a>
    </div>
   </div>
  
   <div class="col-lg-4">
    <div class="post-cta">
    <?php
     $args = array(
      'post_type'   => 'post',
			 'posts_per_page' => 1,
     );
     $scheduled = new WP_Query( $args );
 
    if ( $scheduled->have_posts() ) :
    ?>
       <?php while( $scheduled->have_posts() ) : $scheduled->the_post() ?>
       <?php the_title( '<h3>', '</h3>' ); ?>
       <?php fall_river_hotel_posted_on(); ?>
       <?php the_excerpt(); ?>
       <?php endwhile ?>
       <?php else : ?>
       <h3>No News!</h3>
       <?php endif ?>
    </div>
   </div>
   
   <div class="col-lg-4">
    
    <div class="add-wrap">
    <h3>Contact Us?</h3>
    <address>
     <p class="lead">24860 Main Street</p>
     <p class="lead">Fall River Mills, CA. 96028</p>
     <p class="lead"><a href="tel:15303365550" title="Telephone Nimber">(530) 336-5550</a></p>
     <p class="lead"><a href="/contact-fall-river-hotel/" title="Contact Fall River Hotel">Contact Us: Send Message</a></p>
    </address>
    </div>
    
    
   </div>
   
  </div>
  </div>
 </div>

 <div class="page-wrapper">
 <div id="fp-masthead" class="container-fluid pt-5">
  <div class="container pt-5 pb-5" data-aos="fade-up" data-aos-duration="2000">
   <div class="row justify-content-center">
    <div class="feature col-lg-6">
    <img class="img-fluid" src="https://fallriverhotel.local/wp-content/uploads/2023/01/fall-river-hotel.webp" alt="Fall River Hotel - Restaurant and Bar - Hotel in Fall River Mills, California">
    </div>
    <div class="feature col-lg-6">
    <p class="feature-location">FALL RIVER MILLS, CALIFORNIA</p>
    <h3>Lodging Located In The Heart Of Fall River</h3>
    <p class="lead">Only minutes from Fishing, Golfing, Hunting, and less than 2 hours from Redding, and 1 hour to Mt. Shasta. Fall River Hotel is a unique and one of a kind Northern California destination and is so much more than just a hotel. With the personal touch of our restarant and bar, the privacy of romantic, cozy rooms, Fall River Hotel is the perfect base for you adventures.</p>
    </div>
   </div>
  </div>
 </div>
 
 <div class="container mt-5">
   <div id="featurettes-front-page" class="text-center mt-5" data-aos="fade-up" data-aos-duration="2000">
     <div class="row row-one pt-3">
     <div class="feature col-lg-6">
       <div class="feature-text">
       <p class="feature-desc">Rustic Architecture</p>
       <h3>STAY</h3>
       <p class="lead">Located within walking distance to dining, movie theater, coffee shop, 12 rustic and
         cozy rooms. From romance to adventure, our cozy and comfortable rooms are sure to delight.</p>
        <div class="icon-cont">
         <a href="/contact-fall-river-hotel/" title="Contact Us"><i class="lni lni-arrow-right-circle"></i></a>
        </div>
       </div>
     </div>
     <div class="feature col-lg-6">
       <img class="img-fluid" src="https://fallriverhotel.local/wp-content/uploads/2023/01/fall-river-hotel-room.webp" alt="Fall River Hotel - Restaurant and Bar - Hotel in Fall River Mills, California">
     </div>
     </div>
     <div class="row row-two pt-3">
     <div class="feature col-lg-6">
      <img class="img-fluid" src="https://fallriverhotel.local/wp-content/uploads/2023/01/fall-river-hotel-dining.webp" alt="Fall River Hotel - Restaurant and Bar - Hotel in Fall River Mills, California">
     </div>
     <div class="feature col-lg-6">
       <div class="feature-text">
       <p class="feature-desc">Customize Your Stay</p>
       <h3>SPECIALS</h3>
       <p class="lead">Special occasions, corporate event or your next family reunion, we can help you with local
         options for your group activity or event. We have options for indoor or outdoor planning. We will help add
         your personal touches. Stay and play while you work. No matter what you're planning let us help you create a
         memorable experience.</p>
        <div class="icon-cont">
         <a href="/contact-fall-river-hotel/" title="Contact Us"><i class="lni lni-arrow-left-circle"></i></a>
        </div>
       </div>
     </div>
     </div>
   </div>
 </div>
 
 
  <?php echo do_shortcode('[gmap-embed id="318"]'); ?>
  </div>

<?php
	//get_sidebar();
	get_footer();
