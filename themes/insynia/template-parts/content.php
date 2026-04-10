<?php
/**
 * Template part for displaying posts in the blog loop
 *
 * @package Insynia
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

	<?php insynia_post_thumbnail( 'insynia-card' ); ?>

	<div class="post-card__body">

		<header class="entry-header">
			<?php
			if ( is_singular() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
			?>

			<?php if ( 'post' === get_post_type() ) : ?>
				<?php insynia_post_meta(); ?>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->

		<?php if ( ! is_singular() ) : ?>
			<a class="read-more btn btn--outline" href="<?php the_permalink(); ?>">
				<?php esc_html_e( 'Read More', 'insynia' ); ?>
				<span class="screen-reader-text">
					<?php
					printf(
						/* translators: %s: Post title. */
						esc_html__( ': %s', 'insynia' ),
						esc_html( get_the_title() )
					);
					?>
				</span>
			</a>
		<?php endif; ?>

	</div><!-- .post-card__body -->

</article><!-- #post-<?php the_ID(); ?> -->
