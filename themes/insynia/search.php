<?php
/**
 * Search results template
 *
 * @package Insynia
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area<?php echo is_active_sidebar( 'sidebar-1' ) ? ' has-sidebar' : ''; ?>">

			<header class="page-header">
				<h1 class="page-title">
					<?php
					printf(
						/* translators: %s: search query. */
						esc_html__( 'Search Results for: %s', 'insynia' ),
						'<span class="search-query">' . esc_html( get_search_query() ) . '</span>'
					);
					?>
				</h1>
			</header><!-- .page-header -->

			<?php get_search_form(); ?>

			<?php if ( have_posts() ) : ?>

				<div class="posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;
					?>
				</div><!-- .posts-grid -->

				<?php insynia_posts_pagination(); ?>

			<?php else : ?>

				<div class="no-results">
					<p class="no-results__message">
						<?php
						printf(
							/* translators: %s: search query. */
							esc_html__( 'Nothing found for &ldquo;%s&rdquo;. Try a different search.', 'insynia' ),
							esc_html( get_search_query() )
						);
						?>
					</p>
				</div>

			<?php endif; ?>

		</div><!-- .content-area -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>
