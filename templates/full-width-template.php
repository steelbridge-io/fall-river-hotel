<?php
/*
 * Template Name: Full Width
 * */

 get_header();
 
 $hero_cta_content		= get_post_meta(get_the_ID(), 'hero-cta-content', true);
 
?>

 <div id="wide-temp-cont" class="p-5 mb-4 bg-light wide-temp-bg-img">
  <div class="container py-5 wide-temp-img">
   <?php the_title( '<h1>', '</h1>' ); ?>
   <p class="col-md-8 fs-4"><?php echo $hero_cta_content; ?></p>
   <div class="hero-read-more-icon">
    <span class="scrollto" onclick="scrolldiv()"><i class="lni lni-chevron-down-circle"></i></span>
   </div>
  </div>
 </div>

 <div id="ele" class="container second">
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
