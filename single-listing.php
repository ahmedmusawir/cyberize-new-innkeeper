<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Moose_Framework_2
 */

get_header(); ?>

<div id="primary" class="content-area">
	<!-- <div class="row"> -->
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'post-single-listing' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
		
	<!-- </div> END ROW -->
</div><!-- #primary -->

<!--====================================================
=            THE IS THE THRIVE LEADBOX AREA            =
=====================================================-->

<section class="leadbox">

	<div class="container">

		<?php 

			// $leadbox = get_field('mas_post_lead_shortcode');

			// if ($leadbox) {
			// 	echo do_shortcode( $leadbox ); 

			// } else {
			// 	echo do_shortcode( '[thrive_leads id="5486"]' );
			// }

		?>
		<?php if (function_exists('tve_leads_form_display')) { tve_leads_form_display(0, 5486); } ?>
		
		
	</div>
	
</section>

<!--====  End of THE IS THE THRIVE LEADBOX AREA  ====-->

<?php
get_footer();
