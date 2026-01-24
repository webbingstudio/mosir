<?php
/**
 * pager-single.php
 * ページネーション用テンプレート（クエリを上書きした場合）
 *
 * @package mosir
 */
?>
<?php
if( $mos_q->max_num_pages > 1) {
    // https://developer.wordpress.org/reference/functions/paginate_links/#comment-418
    $_big = 999999999; // need an unlikely integer

    echo '<nav class="wp-paginate">';
    echo paginate_links(
        array(
        'type' => 'plain',
        'base' => str_replace( $_big, '%#%', esc_url( get_pagenum_link( $_big ) ) ),
        'format' => 'page/%#%/',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $mos_q->max_num_pages,
        'mid_size' => 2,
        'end_size' => 0,
        'prev_next' => true,
        'prev_text' => '<span class="wp-paginate-label">前のページ</span>',
        'next_text' => '<span class="wp-paginate-label">次のページ</span>',
        )
    );
    echo '</nav>';
}
?>
