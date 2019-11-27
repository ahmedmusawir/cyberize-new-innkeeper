<?php
/**
 * 
 * MODULE: Search Index Innkeeper
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

				<h1 class="archive-index-title col-sm-6 col-md-3 col-lg-3 text-center">
					<?php //the_field('blog_index_title', 'option') ?>
					LISTING SEARCH
				</h1>
				<div class="long-underline"></div>	

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-6">

						<main id="main" class="site-main">

							<?php
							if ( have_posts() ) : ?>

								<header class="page-header">
									<h4 class="search-type"><?php
										/* translators: %s: search query. */
										printf( esc_html__( 'Search Results for: %s', 'moose-framework-2' ), '<span>' . get_search_query() . '</span>' );
									?></h4>
								</header><!-- .page-header -->

								<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'listing-item-innkeeper' );

								endwhile;
									wp_reset_postdata();

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif; ?>

						</main><!-- #main -->

					</div>
					
						<div class="col-sm-12 col-md-12 col-lg-6">

						<!-- ACF MAP START -->
						<div class="acf-map">

						<?php 

							rewind_posts();
							
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
							
						<?php 	endwhile;
								
								wp_reset_postdata();
								
							endif;

						?>

						</div> <!-- ACF-MAP END -->						
						
					</div>	

				</div> <!-- end row -->		

			</section> <!-- End Container -->	

		</main>
		
	</div> <!-- End Primary -->		


</section>	
