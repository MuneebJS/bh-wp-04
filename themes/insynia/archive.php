<?php
/**
 * Archive template
 *
 * @package Insynia
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area<?php echo is_active_sidebar( 'sidebar-1' ) ? ' has-sidebar' : ''; ?>">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<div class="posts-grid">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
					?>
				</div><!-- .posts-grid -->

				<?php insynia_posts_pagination(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		</div><!-- .content-area -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>
