<?php
/**
 * Template Tags and Helper Functions
 *
 * Custom template tags and helper functions used throughout the theme.
 *
 * @package Insynia
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Output post metadata: date, author, and categories.
 *
 * @param bool $show_author   Whether to show the author. Default true.
 * @param bool $show_cats     Whether to show categories. Default true.
 * @param bool $show_comments Whether to show comments link. Default false.
 */
function insynia_post_meta( $show_author = true, $show_cats = true, $show_comments = false ) {
	?>
	<div class="entry-meta">
		<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
			<?php echo esc_html( get_the_date() ); ?>
		</time>

		<?php if ( $show_author ) : ?>
			<span class="byline">
				<span class="sep" aria-hidden="true">&bull;</span>
				<?php
				printf(
					/* translators: %s: post author link */
					esc_html__( 'By %s', 'insynia' ),
					'<a class="author-link" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
				);
				?>
			</span>
		<?php endif; ?>

		<?php if ( $show_cats && has_category() ) : ?>
			<span class="cat-links">
				<span class="sep" aria-hidden="true">&bull;</span>
				<?php the_category( ', ' ); ?>
			</span>
		<?php endif; ?>

		<?php if ( $show_comments && ! post_password_required() && ( comments_open() || get_comments_number() ) ) : ?>
			<span class="comments-link">
				<span class="sep" aria-hidden="true">&bull;</span>
				<?php comments_popup_link(); ?>
			</span>
		<?php endif; ?>

		<?php edit_post_link( esc_html__( 'Edit', 'insynia' ), '<span class="edit-link">&bull; ', '</span>' ); ?>
	</div>
	<?php
}

/**
 * Output post tag list.
 */
function insynia_entry_tags() {
	$tags = get_the_tags();
	if ( ! $tags ) {
		return;
	}
	?>
	<div class="entry-tags">
		<span class="entry-tags__label"><?php esc_html_e( 'Tags:', 'insynia' ); ?></span>
		<?php
		$tag_links = array_map(
			function ( $tag ) {
				return '<a href="' . esc_url( get_tag_link( $tag ) ) . '" class="tag-link" rel="tag">' . esc_html( $tag->name ) . '</a>';
			},
			$tags
		);
		echo implode( '', $tag_links ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</div>
	<?php
}

/**
 * Output a "Continue reading" link for archive/blog excerpts.
 *
 * @param string $more_string Unused default WordPress string.
 * @return string The custom more link markup.
 */
function insynia_excerpt_more( $more_string ) {
	if ( ! is_single() ) {
		return sprintf(
			' <a class="read-more" href="%s">%s<span class="screen-reader-text"> %s</span></a>',
			esc_url( get_permalink() ),
			esc_html__( 'Continue reading', 'insynia' ),
			esc_html( get_the_title() )
		);
	}
	return '';
}
add_filter( 'excerpt_more', 'insynia_excerpt_more' );

/**
 * Output post navigation links for singular posts.
 */
function insynia_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span class="nav-direction">' . esc_html__( 'Previous', 'insynia' ) . '</span><span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-direction">' . esc_html__( 'Next', 'insynia' ) . '</span><span class="nav-title">%title</span>',
		)
	);
}

/**
 * Output archive/blog pagination.
 */
function insynia_posts_pagination() {
	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_text'          => esc_html__( '&larr; Previous', 'insynia' ),
			'next_text'          => esc_html__( 'Next &rarr;', 'insynia' ),
			'screen_reader_text' => esc_html__( 'Posts navigation', 'insynia' ),
		)
	);
}

/**
 * Output the post thumbnail with a link wrapper on archive pages.
 *
 * @param string $size Image size. Default 'insynia-card'.
 */
function insynia_post_thumbnail( $size = 'insynia-card' ) {
	if ( ! has_post_thumbnail() || post_password_required() ) {
		return;
	}
	?>
	<div class="post-thumbnail">
		<?php if ( ! is_singular() ) : ?>
			<a href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
				<?php the_post_thumbnail( $size, array( 'class' => 'post-thumbnail__img' ) ); ?>
			</a>
		<?php else : ?>
			<?php the_post_thumbnail( $size, array( 'class' => 'post-thumbnail__img' ) ); ?>
		<?php endif; ?>
	</div>
	<?php
}

/**
 * Output the site logo or site name.
 */
function insynia_site_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-name-link" rel="home">
			<?php bloginfo( 'name' ); ?>
		</a>
		<?php
	}
}

/**
 * Trim excerpt to a specific word count.
 *
 * @param int $limit Word count limit.
 * @return string Trimmed excerpt.
 */
function insynia_trim_excerpt( $limit = 30 ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . '&hellip;';
	} else {
		$excerpt = implode( ' ', $excerpt );
	}
	return wp_kses_post( $excerpt );
}
