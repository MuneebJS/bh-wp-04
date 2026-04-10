<?php
/**
 * Template part for displaying results in search pages
 *
 * @package Insynia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card post-card--search' ); ?>>

	<div class="post-card__body">
		<header class="entry-header">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php insynia_post_meta( true, true ); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<a class="read-more btn btn--outline" href="<?php the_permalink(); ?>">
			<?php esc_html_e( 'View Post', 'insynia' ); ?>
		</a>
	</div><!-- .post-card__body -->

</article><!-- #post-<?php the_ID(); ?> -->
