<?php
/**
 * Template Name: Thrive Page
 *
 *
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

<style>
#primary {
  background: url('/wp-content/uploads/2019/11/contact-bg.jpg') no-repeat fixed;
}
</style>

	<div id="primary" class="content-area">
		<div class="">
			<main id="main" class="site-main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

			</main><!-- #main -->
			
		</div> <!-- END ROW -->
	</div><!-- #primary -->

<?php
get_footer();
