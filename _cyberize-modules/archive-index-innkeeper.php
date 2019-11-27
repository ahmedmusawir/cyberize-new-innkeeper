<?php 
/**
 *
 * MODULE: ARCHIVE INDEX INNKEEPER
 *
 */
?>

<main id="" class="blog-index-innkeeper">

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="container">
				<h1 class="blog-index-title col-sm-6 col-md-3 col-lg-3 text-center">
					<?php //the_field('blog_index_title', 'option') ?>
					BLOG ARCHIVE
				</h1>
				<div class="long-underline"></div>	

				<div class="row">

					<div class="col-sm-12 col-md-12 col-lg-9">
					
						<article class="post-item-container" >
					
							<?php
								if ( have_posts() ) :
							?>
							
								<header class="page-header">
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
										get_template_part( 'template-parts/content', 'post-item-innkeeper-blog' );

									endwhile;

								else :

									get_template_part( 'template-parts/content', 'none' );

								endif; 
							?>				

						</article>

					</div> <!-- 9 COLS END -->

					<div class="col-sm-12 col-md-12 col-lg-3">

						<?php get_sidebar(); ?>
						
					</div> <!-- 3 COLS END -->
				
				</div> <!-- ROW END -->

				
				
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
	

</main>