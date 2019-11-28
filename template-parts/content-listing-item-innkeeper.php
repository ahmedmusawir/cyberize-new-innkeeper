<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Cyberize
 */

?>
 
<article id="post-<?php the_ID(); ?>" <?php post_class('post-item'); ?>>

	<div class="entry-content">

		<?php if (has_post_thumbnail()) : ?>

		<div class="row">

    <?php 
      $post_id = get_the_ID();
      $featured_img_url = get_the_post_thumbnail_url($post_id,'full');
    ?>
    

			<div class="col-sm-5 col-md-5 col-lg-5 left-col" style="background: url(<?php echo $featured_img_url; ?>) no-repeat; background-size: cover;">
				<a href="<?php the_permalink(); ?>">
				  <div class="featured-image-box">
            <!-- THE COVER ON TOP OF THE BG TO LINK TO PERMALINK -->
          </div>
          <div class="price-box">
            <h6><?php the_field('listing_member_status'); ?></h6>
            <h3 class="the-price">
							<!-- $99-$1200 -->
							<?php the_field('listing_item_price'); ?>
            </h3>    
          </div>
        </a>
				
			</div>
			<div class="col-sm-7 col-md-7 col-lg-7 right-col">
				<!-- TITLE -->
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				?>

				<div class="entry-meta">
					<section class="info-box row">
            <article class="left-box col-6">
              <div class="row">
                <div class="col-3">
                  <i class="fas fa-map-marked-alt"></i>
                </div>
                <div class="col-9">
									<!-- 500 Palm Ave Boca Grande, FL 33921 -->
									<?php the_field('listing_business_address'); ?>
                </div>
              </div>
            </article>
            <article class="right-box col-6">
              <div class="row">
                <div class="col-3">
                  <i class="fas fa-phone-volume"></i>
                </div>
                <div class="col-9">
                  <?php the_field('listing_phone_1'); ?> <br>
                  <?php the_field('listing_phone_2'); ?> 
                </div>
              </div>
            </article>
          </section>
				</div><!-- .entry-meta -->

				<div class="the-excerpt pr-3">
					<?php
					// <!-- CONTENT -->
						the_excerpt();
						
          ?>
          <div class="bottom-btn-box text-center">
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
				
		</div>	


		
	</div><!-- .entry-content -->


	<?php else : ?>

		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		endif;
		
		?>
		<div class="entry-meta">
			<?php
				cyberize_posted_by();
			?>
		</div><!-- .entry-meta -->
		
		<div class="pr-3 pt-3 pb-3">
			<?php
			// <!-- CONTENT -->
				the_excerpt();
			?>
		</div>


	<?php endif; ?>	


</article><!-- #post-<?php the_ID(); ?> -->















