<?php
/*
 * Template Name: Full Width
 * */

  get_header();
 
  $hero_cta_content		= get_post_meta(get_the_ID(), 'hero-cta-content', true );
  $scroll_to_cta       = get_post_meta(get_the_ID(), 'scroll-to-cta', true );

	if (strpos($_SERVER['REQUEST_URI'], "/2/") || strpos($_SERVER['REQUEST_URI'], "/3/") !== false) :
		$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
		$imgID = get_post_thumbnail_id($post->ID);
		$image_alt = get_post_meta($imgID, '_wp_attachment_image_alt', true);
		?>

  <div id="pagination-next-header" class="container-fluid-no-padding container-fluid">
    <img src="<?php echo $featured_img_url; ?>" alt="<?php echo $image_alt; ?>">
    <div class="container">
			<?php the_title( '<h1>', '</h1>' ); ?>
      <p class="lead">Continued:<br><?php echo $hero_cta_content; ?></p>
    </div>
  </div>

  <?php else: ?>

  <div class="banner">
    <div id="wide-temp-cont" class="p-5 mb-4 bg-light wide-temp-bg-img"></div>
    <div class="container py-5 wide-temp-img">
      <?php the_title( '<h1>', '</h1>' ); ?>
      <p class="col-md-8 fs-4"><?php echo $hero_cta_content; ?></p>
      <div class="hero-read-more-icon">
        <div id="section1" class="scrollto animated animatedFadeInUp fadeInUp" onclick="scrolldiv()">
          <a href="#section2"><i class="lni lni-chevron-down-circle"></i>&nbsp;<span
              class="cta-click-prompt"><?php echo $scroll_to_cta; ?></span></a>
        </div>
      </div>
    </div>
  </div>

  <?php endif; ?>

  <div id="section2" class="main second"></div>

  <div class="container">
    <main id="primary" class="site-main">

     <?php
     while ( have_posts() ) :
     the_post();

     get_template_part( 'template-parts/content', 'wide' );

     // If comments are open or we have at least one comment, load up the comment template.
     if ( comments_open() || get_comments_number() ) :
     comments_template();
     endif;

     endwhile; // End of the loop.
     ?>

    </main><!-- #main -->
  </div>

<?php get_footer(); ?>
