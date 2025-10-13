<?php
/**
 * front-page.php
 * トップページ用テンプレート
 *
 * @package ws-minimalism
 */

get_header();
?>

<p>front-page.php =============</p>

<p>固定ページ内に投稿の新着を表示するためクエリ（表示条件）を上書きします =============</p>
<?php
// 固定ページのページ数は paged ではなく page
$paged = get_query_var('page') ? get_query_var('page') : 1;
$args = array(
    'post_type'  => 'post',
    'posts_per_page'  => get_option('posts_per_page'),
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
);
$q = new WP_Query( $args );
?>

<?php if( $q->have_posts() ): ?>
<div class="mx-auto max-w-7xl px-4">
<p>ここから投稿一覧 =============</p>
<?php while( $q->have_posts() ) : $q->the_post(); ?>
    <?php get_template_part( 'template-parts/loop' ); ?>
<?php endwhile; ?>

<p>投稿一覧終了 =============</p>
<?php get_template_part( 'template-parts/pager', 'single' ); ?>

<?php else: ?>
<p>投稿がありません =============</p>
<?php endif; wp_reset_query(); ?>
<p>クエリの上書きを元に戻すためリセットしました =============</p>

<?php
get_footer();
