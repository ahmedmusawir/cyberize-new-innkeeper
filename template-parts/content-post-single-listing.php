<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cyberize
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-single'); ?>>
  <section class="post-innkeeper">

    <div class="entry-content container">

      <?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title mx-auto">', '</h1>' );
							// the_title( '<h1 class="entry-title text-center">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title mx-auto"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;
			?>

      <div class="row">

        <div class="col-sm-12 col-md-12 col-lg-6">

          <?php get_header(); ?>

          <!-- SECTION 1: TOP CAROUSEL BLOCK -->
          <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" />
          <!-- Add the new slick-theme.css if you want the default styling -->
          <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" />

          <section class="top-carousel-block">

            <div class="moose-slick-carousel">

              <?php $images = get_field('listing_image_gallery'); ?>

              <?php if ( $images ) : ?>

              <?php foreach($images as $image) : ?>

              <figure class="image-box">
                <div><img class="w-100" src="<?php echo $image['sizes']['large']; ?>" alt="Listing Gallery Image"></div>
              </figure>

              <?php endforeach; ?>

              <?php endif; ?>

            </div>

          </section>

          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js">
          </script>
          <script>
          jQuery(document).ready(function($) {

            $('.moose-slick-carousel').slick({
              dots: true,
              autoplay: true,
              autoplaySpeed: 4000,
            });

          });
          </script>


          <!-- <figure class="slider-holder"> -->
          <?php // cyberize_post_thumbnail(); ?>
          <?php // echo do_shortcode('[sliders_pack id="5743"]'); ?>
          <!-- </figure> -->

          <?php

						the_content();
				
					?>

        </div>
        <aside id="sidebar" class="col-sm-12 col-md-12 col-lg-6">

          <section class="single-listing-info-box">
            <article class="row">
              <div class="col-sm-7">
                <h2 class="price-range">
                  <?php the_field('listing_item_price'); ?>
                  <a href="<?php the_field('listing_visit_website'); ?>" target="_blank" class="btn btn-primary">Visit
                    Website</a>
                </h2>
              </div>
              <div class="col-sm-5">
                <h2 class="btn-set">
                  <img class="img-fluid" src="/wp-content/uploads/2019/11/Screen-Shot-2019-11-26-at-11.16.28-AM.png"
                    alt="">
                </h2>
              </div>
            </article>
            <article class="row phone-box">
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-2">
                    <i class="fas fa-phone-volume"></i>
                  </div>
                  <div class="col-10">
                    <?php the_field('listing_phone_1'); ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-2">
                    <i class="fas fa-phone-volume"></i>
                  </div>
                  <div class="col-10">
                    <?php the_field('listing_phone_2'); ?>
                  </div>
                </div>
              </div>
            </article>
            <hr>
            <span class="highlight">Innkeeper:</span> Staff
            <hr>
            <div class="row address-box">
              <div class="col-2">
                <i class="fas fa-map-marked-alt"></i>
              </div>
              <div class="col-10">
                <?php the_field('listing_business_address'); ?>
              </div>
            </div>

          </section>

          <!-- <section class="social-links">
            <img class="img-fluid pt-3" src="/wp-content/uploads/2019/11/Screen-Shot-2019-11-26-at-12.02.50-PM.png"
              alt="">
          </section> -->

          <!-- SINGLE ACF LIST ITEM MAP -->
          <div class="acf-map acf-map-single mt-5 pt-5">

            <?php 
							$mapLocation = get_field('listing_address_with_map');
						    // print_r($mapLocation);
						?>
            <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>"
              data-lng="<?php echo $mapLocation['lng']; ?>">
              <h6 class=""><?php the_title(); ?></h6>
              <?php echo $mapLocation['address']; ?>
            </div>

          </div> <!-- ACF-MAP END -->


        </aside>
      </div> <!--  end main row -->
      <section class="innkeeper-tabbed-content">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
              aria-selected="true">In-Room</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
              aria-selected="false">Policies</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
              aria-selected="false">On-Site</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <?php  
							if ( 'listing' === get_post_type() ) : 
						?>

            <div class="taxonomy-box">

              <?php   // Get terms for post
								$terms = get_the_terms( $post->ID , 'in-room' );
								// Loop over each item since it's an array
								if ( $terms != null ){
								echo '<ul class="tax-list">';	
									foreach( $terms as $term ) {
										// Print the name method from $term which is an OBJECT
										echo '<li class=""><img class="img-key" src="/wp-content/uploads/2019/11/the-key.png" alt="">' . $term->name . "</li>";
										// Get rid of the other data stored in the object, since it's not needed
										unset($term);
									} 
								echo '</ul>';
								} ?>

            </div><!-- .entry-meta -->

            <?php
							endif; 
						?>
          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

            <?php the_field('listing_policies'); ?>

          </div>
          <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

            <?php  
							if ( 'listing' === get_post_type() ) : 
						?>

            <div class="taxonomy-box">

              <?php   // Get terms for post
								$terms = get_the_terms( $post->ID , 'on-site' );
								// Loop over each item since it's an array
								if ( $terms != null ){
								echo '<ul class="tax-list">';	
									foreach( $terms as $term ) {
										// Print the name method from $term which is an OBJECT
										echo '<li class=""><img class="img-key" src="/wp-content/uploads/2019/11/the-key.png" alt="">' . $term->name . "</li>";
										// Get rid of the other data stored in the object, since it's not needed
										unset($term);
									} 
								echo '</ul>';
								} ?>

            </div><!-- .entry-meta -->

            <?php
							endif; 
						?>

          </div>
        </div>
      </section>
      <section class="check-in-info-box">
        <article class="row">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-2">
                <i class="fas fa-adjust"></i>
              </div>
              <div class="col-10">
                <span class="highlight">Check In:</span> <?php the_field('listing_check_in'); ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-2">
                <i class="fas fa-adjust"></i>
              </div>
              <div class="col-10">
                <span class="highlight">Check Out:</span> <?php the_field('list_check_out'); ?>
              </div>
            </div>
          </div>
        </article>
        <article class="row">
          <div class="col-sm-6">
            <div class="row">
              <div class="col-2">
                <i class="fas fa-adjust"></i>
              </div>
              <div class="col-10">
                <span class="highlight">Deposit:</span> <?php the_field('listing_deposit'); ?>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-2">
                <i class="fas fa-adjust"></i>
              </div>
              <div class="col-10">
                <span class="highlight">Cancelation:</span> <?php the_field('listing_cancelation'); ?>
              </div>
            </div>
          </div>
        </article>
      </section>

    </div><!-- .entry-content -->

    <footer class="similar-property-box container">
      <div class="property-box-content">
        <h3 class="title text-center pb-4 text-primary">Featured Properties</h3>
        <div class="row">
          <article class="col-md-4 featured">
            <a href="/listing/ryans-home/">
              <figure class="property-image">
                <img src="/wp-content/uploads/2019/11/5fc0cb39c36b00917d2226b803b389a1.png" alt="" class="img-fluid">
              </figure>
              <h4 class="prop-title">Lemon Tree Inn</h4>
              <h6 class="prop-price">$99 - $160</h6>
            </a>
          </article>
          <article class="col-md-4 featured">
            <a href="/case-ranch-hotel/">
              <figure class="property-image">
                <img src="/wp-content/uploads/2019/11/9635c14795017c6f4a0e90fa4c299d33.png" alt="" class="img-fluid">
              </figure>
              <h4 class="prop-title">Southernmost Beach Resort</h4>
              <h6 class="prop-price">$199 - $260</h6>
            </a>
          </article>
          <article class="col-md-4 featured">
            <a href="/black-heron-hotel/">
              <figure class="property-image">
                <img src="/wp-content/uploads/2019/11/288023730d9013443946df296168fdfc.png" alt="" class="img-fluid">
              </figure>
              <h4 class="prop-title">Palmetto Riverside Bed and Breakfast</h4>
              <h6 class="prop-price">$991 - $1601</h6>
            </a>
          </article>
        </div>
      </div>
    </footer><!-- .entry-footer -->

  </section>
</article><!-- #post-<?php the_ID(); ?> -->