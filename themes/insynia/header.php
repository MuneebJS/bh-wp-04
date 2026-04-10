<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'insynia' ); ?>
	</a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-header__inner container">

			<div class="site-branding">
				<?php insynia_site_logo(); ?>

				<?php
				$tagline = get_bloginfo( 'description', 'display' );
				if ( $tagline && ! has_custom_logo() ) :
					?>
					<p class="site-description"><?php echo esc_html( $tagline ); ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<nav
				id="site-navigation"
				class="main-navigation"
				aria-label="<?php esc_attr_e( 'Primary Navigation', 'insynia' ); ?>"
			>
				<button
					class="menu-toggle"
					aria-controls="primary-menu"
					aria-expanded="false"
					aria-label="<?php esc_attr_e( 'Toggle navigation menu', 'insynia' ); ?>"
				>
					<span class="menu-toggle__bar" aria-hidden="true"></span>
					<span class="menu-toggle__bar" aria-hidden="true"></span>
					<span class="menu-toggle__bar" aria-hidden="true"></span>
				</button>

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'insynia_primary_menu_fallback',
					)
				);
				?>
			</nav><!-- #site-navigation -->

		</div><!-- .site-header__inner -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
<?php

/**
 * Fallback for primary menu when no menu is assigned.
 */
function insynia_primary_menu_fallback() {
	if ( current_user_can( 'manage_options' ) ) {
		printf(
			'<ul id="primary-menu" class="nav-menu"><li><a href="%s">%s</a></li></ul>',
			esc_url( admin_url( 'nav-menus.php' ) ),
			esc_html__( 'Add a menu', 'insynia' )
		);
	}
}
