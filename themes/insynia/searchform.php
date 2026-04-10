<?php
/**
 * Search form template
 *
 * @package Insynia
 */

$unique_id = wp_unique_id( 'search-form-' );
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $unique_id ); ?>" class="screen-reader-text">
		<?php esc_html_e( 'Search for:', 'insynia' ); ?>
	</label>
	<div class="search-form__inner">
		<input
			type="search"
			id="<?php echo esc_attr( $unique_id ); ?>"
			class="search-field"
			placeholder="<?php esc_attr_e( 'Search&hellip;', 'insynia' ); ?>"
			value="<?php echo esc_attr( get_search_query() ); ?>"
			name="s"
		>
		<button type="submit" class="search-submit btn btn--primary">
			<span class="search-submit__icon" aria-hidden="true">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
					<circle cx="11" cy="11" r="8"></circle>
					<line x1="21" y1="21" x2="16.65" y2="16.65"></line>
				</svg>
			</span>
			<span class="screen-reader-text"><?php esc_html_e( 'Search', 'insynia' ); ?></span>
		</button>
	</div><!-- .search-form__inner -->
</form>
