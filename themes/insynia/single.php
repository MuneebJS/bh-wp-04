<?php
/**
 * Single post template
 *
 * @package Insynia
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area<?php echo is_active_sidebar( 'sidebar-1' ) ? ' has-sidebar' : ''; ?>">

			<?php
			while ( have_posts() ) :
				the_post();
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

					<header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						<?php insynia_post_meta(); ?>
					</header><!-- .entry-header -->

					<?php insynia_post_thumbnail( 'insynia-featured' ); ?>

					<div class="entry-content">
						<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers. */
									__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'insynia' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'insynia' ),
								'after'  => '</div>',
							)
						);
						?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php insynia_entry_tags(); ?>
					</footer><!-- .entry-footer -->

				</article><!-- #post-<?php the_ID(); ?> -->

				<?php insynia_post_navigation(); ?>

				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>

			<?php endwhile; ?>

		</div><!-- .content-area -->

		<?php get_sidebar(); ?>

	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>
