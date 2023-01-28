<?php
  /**
   * Template Name: Recreation Template
   * Template Post Type: post, page
   * @package Fall_River_Hotel
   */

	get_header();

	$hero_cta_content		= get_post_meta(get_the_ID(), 'hero-cta-content', true );
	$scroll_to_cta       = get_post_meta(get_the_ID(), 'scroll-to-cta', true );

  ?>

  <div class="banner">
    <div id="wide-temp-cont" class="p-5 mb-4 bg-light rec-temp-bg-img"></div>
    <div class="container py-5 rec-temp-img">
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

  <div id="section2" class="main second"></div>

  <div class="container">
  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content">
      <?php
        the_content(
          sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
              __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'fall-river-hotel' ),
              array(
                'span' => array(
                  'class' => array(),
                ),
              )
            ),
            wp_kses_post( get_the_title() )
          )
        );

        the_posts_pagination();

        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fall-river-hotel' ),
            'after'  => '</div>',
          )
        );
      ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
      <?php fall_river_hotel_entry_footer(); ?>
    </footer><!-- .entry-footer -->
  </article><!-- #post-<?php the_ID(); ?> -->
  </div>


<?php get_footer(); ?>
