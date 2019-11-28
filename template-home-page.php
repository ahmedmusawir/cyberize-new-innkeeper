<?php
/**
 * The template for displaying all pages
 * Template Name: Home Page
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moose_Framework_2
 */

get_header(); ?>

<main id="home-page" class="content-area">

  <section class="section-one">



  </section> <!-- section-one -->	

  <section class="section-two">

  <?php 
    $args = array(
      'post_type' => 'listing',
      'category_name' => 'featured',
      'posts_per_page' => 3
    );
 
    $inn_query = new WP_Query( $args );
  ?>

  <div class="container">

    <div class="row">

      <?php
        if($inn_query->have_posts()) : 
          while($inn_query->have_posts()) : 
              $inn_query->the_post(); 
      
              $post_id = get_the_ID();
              $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
      ?>
      <div class="col-md-4">        
          <div class="featured-box">
          <div class="top-img-box" style="background: url(<?php echo $featured_img_url; ?>) no-repeat; background-size: cover;">
            <a href="<?php the_permalink(); ?>">
              <div class="featured-image-box">
                <!-- THE COVER ON TOP OF THE BG TO LINK TO PERMALINK -->
              </div>
            </a>
          </div>
          <div class="middle-content-box">

            <!-- TITLE -->
            <?php
          
              the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

            ?>  
            <div class="entry-meta">
              <section class="info-box row">
                <article class="col-6">
                  <div class="row">
                    <div class="col-3">
                      <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <div class="col-9 text">
                      <!-- 500 Palm Ave Boca Grande, FL 33921 -->
                      <?php the_field('listing_business_address'); ?>
                    </div>
                  </div>
                </article>
                <article class="col-6">
                  <div class="row">
                    <div class="col-3">
                      <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="col-9 text">
                      <?php the_field('listing_phone_1'); ?> <br>
                      <?php the_field('listing_phone_2'); ?> 
                    </div>
                  </div>
                </article>
              </section>
            </div><!-- .entry-meta -->

            <div class="the-excerpt pr-3">
              
              <div class="btn-box text-center">
                <section class="info-box row">
                  <article class="left-btn-box col-6">
                    <a class="btn btn-primary" href="<?php the_field('listing_visit_website'); ?>" target="_blank">Visit Website</a>
                  </article>
                  <article class="right-btn-box col-6">
                    <a class="btn btn-secondary" href="<?php the_permalink(); ?>">More Info</a>
                  </article>
                </section>
              </div><!-- .entry-meta -->

              <!-- Change Ownership Ends -->
              
            </div>

          </div>
          <div class="bottom-pricebox text-center">
            <div class="price-box">
              <h6><?php the_field('listing_member_status'); ?></h6>
              <h3 class="the-price">
                <!-- $99-$1200 -->
                <?php the_field('listing_item_price'); ?>
              </h3>    
            </div>
          </div>
          </div>
      </div>
      <?php
            endwhile;
        else : 
      ?>

            Oops, there are no posts.

      <?php
        endif;
      ?>
      
    </div>

  </div>

  </section> <!-- End section-two -->	

  <section class="section-three">

    <div class="container">

      <div class="row">
        <div class="col-md-4 text-center">
          <figure class="pt-5 pb-3">
            <img src="/wp-content/uploads/2019/11/Group-137.png" alt="">
          </figure>
          <h4 class="title">
            News Optin For Deals
          </h4>
        </div>
        <div class="col-md-4 text-center">
          <figure class="pt-5 pb-3">
            <img src="/wp-content/uploads/2019/11/Group-137.png" alt="">
          </figure>
          <h4 class="title">
            News Optin For Deals
          </h4>
        </div>
        <div class="col-md-4 text-center">
          <figure class="pt-5 pb-3">
            <img src="/wp-content/uploads/2019/11/Group-137.png" alt="">
          </figure>
          <h4 class="title">
            News Optin For Deals
          </h4>
        </div>
      </div>

    </div>

  </section> <!-- End section-three -->	


</main><!-- #primary -->

<?php
get_footer();
