<?php
/*
 * Template Name: Home
 */

get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		$args = array( 'posts_per_page' => 4 );

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {
			?>
			<div class="slider-controller">
				<div class="container">
					<div class="slider-wrapper">
						<div class="slider">
							<?php
							while ( $the_query->have_posts() ) {
								$the_query->the_post();
								?>
								<div class = "wrapper">
									<?php the_post_thumbnail(); ?>
									<div class="caption">
										<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
										<div class="slider-para"><?php the_excerpt(); ?></div>
									</div>
								</div>
							<?php }
							?>
						</div>
						<div class = "arrow-controller">
							<span class = "prev"><i class = "fa fa-arrow-up" aria-hidden = "true"></i></span>
							<span class = "next"><i class = "fa fa-arrow-down" aria-hidden = "true"></i></span>
						</div>
					</div>
				</div>
			</div>

			<?php
			/* Restore original Post Data */
			wp_reset_postdata();
			?>

			<?php
		} else {
			// no posts found
		}
		?>

	</main><!--#main -->
</div><!--#primary -->

<?php
get_footer();
