<?php
/**
 * 404 Not Found template
 *
 * @package Insynia
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<div class="content-area content-area--full">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( '404 &mdash; Page Not Found', 'insynia' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'insynia' ); ?></p>

					<?php get_search_form(); ?>

					<?php
					the_widget(
						'WP_Widget_Recent_Posts',
						array(
							'title'  => esc_html__( 'Recent Posts', 'insynia' ),
							'number' => 5,
						)
					);
					?>

					<?php
					$archives_widget_args = array(
						'before_widget' => '<div class="widget">',
						'after_widget'  => '</div>',
						'before_title'  => '<h2 class="widget-title">',
						'after_title'   => '</h2>',
					);
					the_widget( 'WP_Widget_Archives', array( 'title' => esc_html__( 'Archives', 'insynia' ) ), $archives_widget_args );
					the_widget( 'WP_Widget_Categories', array( 'title' => esc_html__( 'Categories', 'insynia' ) ), $archives_widget_args );
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- .content-area -->
	</div><!-- .container -->
</main><!-- #primary -->

<?php get_footer(); ?>
