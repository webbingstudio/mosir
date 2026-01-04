<?php
/**
 * pager-single.php
 * ページネーション用テンプレート（固定ページ・フロントページ）
 *
 * @package mosir
 */
?>
<p>ページネーション =============</p>
<?php
global $q;
if( $q->max_num_pages > 1) {
    $_big = 999999999; // need an unlikely integer

    echo '<nav class="wp-paginate">';
    echo paginate_links(
        array(
        'type' => 'plain',
        'base' => str_replace( $_big, '%#%', esc_url( get_pagenum_link( $_big ) ) ),
        'format' => 'page/%#%/',
        'current' => max( 1, get_query_var('page') ),
        'total' => $q->max_num_pages,
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
