<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fall_River_Hotel
 */

?>

	<footer id="colophon" class="site-footer">
  
  <div class="container-fluid">
   <div class="container">
    <div class="row">
     <div class="col-lg-4 widget-cont">
      <?php dynamic_sidebar( 'footer_area_one' ); ?>
     </div>
     <div class="col-lg-8 widget-cont">
      <?php dynamic_sidebar( 'footer_area_two' ); ?>
     </div>
    </div>
   </div>
  </div>
  
  <div id="site-info-cont" class="container-fluid">
   <div class="site-info container">
    <span>Copyright&copy; <?php echo date("Y"); ?> Fall River Hotel</span>
   </div><!-- .site-info -->
  </div><!-- #site-info-cont -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
