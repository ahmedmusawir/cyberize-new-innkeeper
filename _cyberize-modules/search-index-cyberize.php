<?php
/**
 * 
 * MODULE: Search Index Cyberize
 */
?>
<style type="text/css">
	#general-page-header {
		width: 100vw;
		height: 200px;
		background-color: black;
		background-image: url('<?php the_field('general_page_header_image', 'option') ?>');
		background-size: cover;
		background-position: top center;
	}
</style>

<section id="general-page-header">
	<!-- <img class="img-fluid" src="/wp-content/uploads/2018/02/general-page-header-2400x300.jpg"> -->
</section>

<main class="search-index-cyberize" class="">
	<section id="primary" class="content-area container">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header text-center">
				<h1 class="page-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'cyberize' ), '<span>' . get_search_query() . '</span>' );
				?></h1>
			</header><!-- .page-header -->

			<div class="card-columns">

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search-item-cyberize' );

			endwhile;

			?>
			</div>
			<div class="post-nav-holder col-12"><?php the_posts_navigation(); ?></div>
			<?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

</main>	
