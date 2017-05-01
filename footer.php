<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-simple
 */
?>

</div><!-- #content -->

<section id="fatfooter">
	<div class="container">
		<div class="grid">
			<?php dynamic_sidebar( 'sidebar-2' ); ?>
		</div>
	</div>
</section>

<footer>
	<div class="container">
		<nav>
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="news.html">News</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="pages.html">Pages</a></li>
				<li><a href="layout.html">Layouts</a></li>
				<li><a href="#">Features</a></li>
				<li><a href="#">Blog</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>

		<div class="footer-logo">
			<?php
			$image_id = get_theme_mod( 'footer_logo' );
			echo wp_get_attachment_image( $image_id, 'full' );
			?>
		</div>

		<div class="clearfix"></div>
		<p><?php echo get_theme_mod( 'footer_content' ) ?></p>
	</div>
</footer>



</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
