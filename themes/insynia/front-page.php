<?php
/**
 * Front Page Template
 *
 * Custom front page template that doesn't display recent posts, comments, or search.
 * This provides a clean, focused landing page and overrides index.php for the home page.
 *
 * @package Insynia
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area">

			<div class="front-page-content">
				<header class="page-header">
					<h1 class="page-title"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h1>
					<?php if ( get_bloginfo( 'description' ) ) : ?>
						<p class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></p>
					<?php endif; ?>
				</header>

				<div class="welcome-content">
					<p><?php esc_html_e( 'Welcome to our website. Explore our content using the navigation menu above.', 'insynia' ); ?></p>
				</div>

			</div><!-- .front-page-content -->

			<?php
			// This front page intentionally excludes recent posts, comments, and search
			// to provide a clean, focused landing page experience.
			?>

		</div><!-- .content-area -->

	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>