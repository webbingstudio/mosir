<?php
/**
 * pager.php
 * Pagination that supports custom query, voice reading and RTL languages.
 *
 * @package mosir
 *
 * @param array $args { query: $wp_query }
 *
 */

global $wp_query;
if( !isset( $args['query'] ) ) {
	$args = array( 'query' => $wp_query );
}

$mosi_max_num_pages = isset( $args['query']->max_num_pages ) ? $args['query']->max_num_pages : (int)0;

// https://developer.wordpress.org/reference/functions/paginate_links/#comment-418
$mosi_pager_big = 999999999; // need an unlikely integer

$mosi_pager_sr_label = '';
$mosi_pager_sr_label .= '<span class="wp-paginate-screen-reader-text">';
$mosi_pager_sr_label .= is_rtl() ? ' ' : '';
$mosi_pager_sr_label .= __( 'Page', 'mosir' );
$mosi_pager_sr_label .= !is_rtl() ? ' ' : '';
$mosi_pager_sr_label .= '</span>';

$mosi_pager_args = array(
	'type'               => 'plain',
	'base'               => str_replace( $mosi_pager_big, '%#%', esc_url( get_pagenum_link( $mosi_pager_big ) ) ),
	'total'              => $mosi_max_num_pages,
	'mid_size'           => 2,
	'end_size'           => 0,
	'prev_next'          => true,
	'prev_text'          => '<span class="wp-paginate-label">' . __( '&laquo; Previous', 'mosir' ) . '</span>',
	'next_text'          => '<span class="wp-paginate-label">' . __( 'Next &raquo;', 'mosir' ) . '</span>',
	'before_page_number' => $mosi_pager_sr_label,
);

if( is_rtl() ) {
	$mosi_pager_args['before_page_number'] = '';
	$mosi_pager_args['after_page_number'] = $mosi_pager_sr_label;
}

if( $mosi_max_num_pages > 1 ) {
	echo '<nav class="wp-paginate">';
	echo paginate_links( $mosi_pager_args );
	echo '</nav>';
}
