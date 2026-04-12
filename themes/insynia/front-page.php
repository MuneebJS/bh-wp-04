<?php
/**
 * Front Page Template
 *
 * Custom front page template that doesn't display recent posts or comments.
 * This overrides the default index.php for the home page.
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

		</div><!-- .content-area -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>