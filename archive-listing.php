<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Moose_Framework_2
 */

get_header(); ?>


<section id="BLOCK1">

	<?php get_template_part( '_cyberize-modules/archive-index-directory' ); ?>

</section>

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
// get_sidebar();
get_footer();
