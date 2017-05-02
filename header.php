<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp-simple
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'wp-simple' ); ?></a>

			<header id="masthead" class="site-header" role="banner">
				<div class="container">
					<div class="logo">
						<?php
						if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
							the_custom_logo();
						} else {
							if ( is_front_page() && is_home() ) :
								?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
						}
						?>
					</div>
					<nav>
						<label for="checkButton" id="menuLabel">
							<i id="menu" class="fa fa-bars" aria-hidden="true"></i>
						</label>
						<input type="checkbox" name="checkButton" id="checkButton">
						<div class="desktopNav animate">
							<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
						</div>
					</nav>
					<div class="clearfix"></div>
				</div>
			</header>


			<div id="content" class="site-content">