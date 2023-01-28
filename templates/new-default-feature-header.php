<?php
	/**
	 * Template Name: New Default Featured Header
	 * Template Post Type: post, page
	 *
	 * @package Fall_River_Hotel
	 */

	get_header();

	$hero_cta_content		= get_post_meta(get_the_ID(), 'hero-cta-content', true );
	$scroll_to_cta      = get_post_meta(get_the_ID(), 'scroll-to-cta', true );

	$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
	$imgID = get_post_thumbnail_id($post->ID);
	$image_alt = get_post_meta($imgID, '_wp_attachment_image_alt', true);

?>
  <div id="pagination-next-header" class="container-fluid-no-padding container-fluid">
  <img src="<?php echo $featured_img_url; ?>" alt="<?php echo $image_alt; ?>">
    <div class="container">
      <?php the_title( '<h1>', '</h1>' ); ?>
      <p class="lead"><?php echo $hero_cta_content; ?></p>
    </div>
  </div>
	<div id="new-default-featured" class="container">
		<div class="row">
			<div class="col-md-8">
				<main id="primary" class="site-main">

					<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'newDefaultfeatured' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div>

			<div class="col-md-4">
				<?php
					get_sidebar(); ?>
			</div>
		</div>
	</div>
<?php
	get_footer();
