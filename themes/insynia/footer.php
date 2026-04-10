	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">

			<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widgets">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="footer-widget-column">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="footer-widget-column">
							<?php dynamic_sidebar( 'footer-2' ); ?>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="footer-widget-column">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					<?php endif; ?>
				</div><!-- .footer-widgets -->
			<?php endif; ?>

			<div class="footer-bottom">
				<div class="site-info">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo-link">
						<?php bloginfo( 'name' ); ?>
					</a>
					<span class="footer-sep" aria-hidden="true">&mdash;</span>
					<span class="copyright">
						&copy; <?php echo esc_html( date( 'Y' ) ); ?>
						<?php bloginfo( 'name' ); ?>.
						<?php esc_html_e( 'All rights reserved.', 'insynia' ); ?>
					</span>
				</div><!-- .site-info -->

				<?php if ( has_nav_menu( 'footer' ) ) : ?>
					<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Navigation', 'insynia' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer',
								'menu_id'        => 'footer-menu',
								'container'      => false,
								'depth'          => 1,
							)
						);
						?>
					</nav><!-- .footer-navigation -->
				<?php endif; ?>

				<?php if ( has_nav_menu( 'social' ) ) : ?>
					<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links', 'insynia' ); ?>">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'social',
								'menu_id'        => 'social-menu',
								'container'      => false,
								'depth'          => 1,
								'link_before'    => '<span class="screen-reader-text">',
								'link_after'     => '</span>',
							)
						);
						?>
					</nav><!-- .social-navigation -->
				<?php endif; ?>

			</div><!-- .footer-bottom -->

		</div><!-- .container -->
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
