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
	<section class="post-bizmobile">

		
		<div class="entry-content container">


			<h1 class="blog-index-title col-sm-6 col-md-3 col-lg-3 text-center">
				<?php //the_field('blog_index_title', 'option') ?>
				SINGLE LISTING
			</h1>
			<div class="long-underline"></div>	

			<div class="row">

				<div class="col-sm-12 col-md-12 col-lg-9">

					<figure class="featured-img-holder">
						<?php cyberize_post_thumbnail(); ?>
					</figure>
					
					<main class="">
						<!-- CATEGORY -->
						<!-- <h5 class="post-category"><?php // cyberize_entry_footer(); ?></h5> -->
						<?php
						if ( is_singular() ) :
							the_title( '<h1 class="entry-title mx-auto">', '</h1>' );
							// the_title( '<h1 class="entry-title text-center">', '</h1>' );
						else :
							the_title( '<h2 class="entry-title mx-auto"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
						endif;

						if ( 'listing' === get_post_type() ) : ?>
						<div class="entry-meta pl-2 mb-5 row">
							<?php
								cyberize_posted_by();
								echo '<span class="divider p-2">/</span>';
								cyberize_posted_on();
								echo '<span class="divider p-2">/</span>';
								// cyberize_entry_footer();

							?>	
								<ul class="list-inline">Listing Category:<?php echo get_the_term_list( $post->ID, 'listing-category', '<li class="list-inline-item">', ', ', '</li>' ) ?></ul>
								<ul class="list-inline">Listing Tag:<?php echo get_the_term_list( $post->ID, 'listing-tag', '<li class="list-inline-item">', ', ', '</li>' ) ?></ul>
						</div><!-- .entry-meta -->
						<?php
						endif; ?>

					</main>

					<!-- SINGLE LIST ITEM MAP -->
					<div class="acf-map acf-map-single">

						<?php 

							$mapLocation = get_field('listing_address_with_map');

						    // print_r($mapLocation);
						?>
						    <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
						    	<h6 class=""><?php the_title(); ?></h6>
						    	<?php echo $mapLocation['address']; ?>
						    </div>

					</div> <!-- ACF-MAP END -->		

					<!-- OTHER ACF OUTPUT START -->

					<style type="text/css">
						.acf-output {
							padding: 1rem;
							margin-bottom: 1rem;
							background: #e3e3e3;
						}
					</style>

					<section class="acf-output row">
						<div class="col-sm-4">
							<h6><strong>US State:</strong> <?php the_field('us_state') ?></h6>
						</div>
						<div class="col-sm-4">
							<h6><strong>Listing Type:</strong> <?php the_field('listing_type') ?></h6>
						</div>
						<div class="col-sm-4">
							<h6><strong>Payment Type:</strong> <?php the_field('payment_type') ?></h6>
						</div>
					</section>						

					<!-- OTHER ACF OUTPUT END -->


					<?php
						the_content();


						// If comments are open or we have at least one comment, load up the comment template.
						// if ( comments_open() || get_comments_number() ) :
						// 	comments_template();
						// endif;						
					?>	
							
				</div>
				<aside id="sidebar" class="col-sm-12 col-md-12 col-lg-3">

					<?php get_sidebar();  ?>

				</aside>
			</div>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
		</footer><!-- .entry-footer -->
	</section>
</article><!-- #post-<?php the_ID(); ?> -->



































