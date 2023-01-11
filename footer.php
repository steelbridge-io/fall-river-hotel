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
     <div class="col-lg-4 widget-cont">
      <?php dynamic_sidebar( 'footer_area_two' ); ?>
     </div>
     <div class="col-lg-4 widget-cont">
      <?php dynamic_sidebar( 'footer_area_three' ); ?>
     </div>
    </div>
   </div>
  </div>
  
		<div class="site-info container">
			<a href="<?php echo esc_url( __( 'https://parsonshosting.com/store/wordpress-hosting', 'fall-river-hotel' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'fall-river-hotel' ), 'ParsonsHosting' );
				?>
			</a>
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'fall-river-hotel' ), 'fall-river-hotel', '<a href="https://parsonshosting.com">Dev Team at ParsonsHosting</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
