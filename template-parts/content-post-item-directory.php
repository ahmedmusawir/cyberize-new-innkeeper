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

		<footer class="entry-footer card-footer">
			<?php //cyberize_entry_footer(); ?>

			<div class="entry-meta">
				<?php
					cyberize_posted_on();
				?>
			</div><!-- .entry-meta -->
		</footer><!-- .entry-footer -->

		<?php if (has_post_thumbnail()) : ?>

		<div class="row">

			<div class="col-md-3">

				<figure class="featured-image-box">
			
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('thumbnail'); ?>
					</a>
					
				</figure>
				
			</div>
			<div class="col-md-9">
				<!-- TITLE -->
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				?>

				<div class="entry-meta">
					<?php
						// cyberize_posted_on();
						cyberize_posted_by();
					?>
				</div><!-- .entry-meta -->

				<div class="pr-3">
					<?php
					// <!-- CONTENT -->
						the_excerpt();


						/**
						 *
						 * Change Ownership
						 *
						 */
						$post_id = get_the_ID();

						if (isset($_POST['listing_user_id'])  &&  isset($_POST['the_post_id']) ) {
							$listing_user_id = $_POST['listing_user_id'];
							// echo $selected  
							// echo $listing_user_id . "<br>";

							$current_post_id = $_POST['the_post_id']; 

							$arg = array(
							    'ID' => $current_post_id,
							    'post_author' => $listing_user_id,
							);

							wp_update_post( $arg );

							wp_new_user_notification( $listing_user_id, $deprecated = null, $notify = '' );
						}

						$user = wp_get_current_user();
						$allowed_roles = array('editor', 'administrator', 'author');
						
						?>
						<?php if( array_intersect($allowed_roles, $user->roles ) ) :  


							echo "This Post ID: " . $post_id . "</br>";
							// echo "Current Post ID: " . $current_post_id;


						?>


						   
							<!-- SELECT CATEGORY FORM -->
							<form action="" method="POST" target="_self">
								
								<input class="form-control" type="text" name="the_post_id"  placeholder="Insert Post ID">
								<input class="form-control" type="text" name="listing_user_id" placeholder="Insert User ID">
								<input class="btn btn-dark btn-block" type="submit" name="submit">

								<!-- <input type="hidden" name="categories_taxonomy" value="property-type"> -->

							</form>    						


						<?php endif; ?>						
			



					<!-- Change Ownership Ends -->
					
				</div>

				<figure class="mt-4 mb-4">
					<a class="btn btn-block btn-danger" href="/listing-claim-page/?PROP_NAME=<?php the_title() ?>&PERMALINK=<?php the_permalink(); ?>" target="_blank">CLAIM LISTING</a>
					<!-- <a href="http://dir-cyberize.local/listing-claim-page/?PROP_NAME=moose_home&PERMALINK=http://dir-cyberize.local/listing/moose-home/"></a> -->
				</figure>
				
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















