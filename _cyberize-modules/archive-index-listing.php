<?php 
/**
 *
 * MODULE: Archive Index Biz Mobile w Sidebar
 *
 */
?>

<section class="archive-index-innkeeper">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
      <section class="top-search-box">
        <div class="container">
					<?php // echo do_shortcode('​[wd_asp id=4]'); ?>
					<div class="row">
						<figure class="col-sm-5 search-box">
							<?php get_search_form(); ?>
						</figure>
						<figure class="col-sm-7 search-choice">
							<img src="http://new-innkeeper.local/wp-content/uploads/2019/11/search-choice-box.jpg" alt="">
						</figure>
					</div>
        </div>
      </section>

			<section class="container-fluid">

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-6">

						<?php
						if ( have_posts() ) : ?>

							<header class="page-header d-none">
								<?php
									the_archive_title( '<h4 class="archive-type">', '</h4>' );
								?>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'listing-item-innkeeper' );

							endwhile;
								wp_reset_postdata();

								?>

								<!-- <div class="post-nav-holder">
									<?php // the_posts_navigation(); ?>
								</div> -->

								<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>

					</div> <!-- END col-sm-12 col-md-12 col-lg-6 -->


					<div class="map-box col-sm-12 col-md-12 col-lg-6">

						<!-- ACF MAP START -->
						<!-- <div class=""> -->
						<div class="acf-map">

						<?php 

							rewind_posts();
							// wp_reset_postdata();

							
							if (have_posts()) :
							
							    while(have_posts()) : the_post();
								
								$mapLocation = get_field('listing_address_with_map');

						?>	


						    <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
						    	<a href="<?php the_permalink(); ?>">
						    		<figure style="width: 100% !important;">
							    		<?php the_post_thumbnail( 'map-image' ); ?>
							    	</figure>
							    	<h6><?php the_title(); ?></h6>
							    	<?php echo $mapLocation['address']; ?>
						    	</a>
						    </div>
						    <?php echo $mapLocation['lat'] ?>
						    <?php echo $mapLocation['lng']; ?>
							
						<?php 	endwhile;
								
								wp_reset_postdata();
								
							endif;

						?>

						
						</div> <!-- ACF-MAP END -->						
							
					</div> <!-- END col-sm-12 col-md-12 col-lg-6 -->

				</div> <!-- End Row -->

			</section> <!-- End Container -->	

		</main>	

	</div> <!-- end primary -->

</section>