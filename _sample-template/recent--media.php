<?php
/**
 * recent--media.php
 * サンプル: カスタムクエリ用テンプレート（メディア）
 *
 * @package mosir
 */
?>
<?php
$mosi_query_args = array(
    'post_type'  => 'sample',
    'posts_per_page'  => 6,
    'orderby' => 'date',
    'order' => 'DESC'
);
$mosi_query = new WP_Query( $mosi_query_args );
?>
<?php if( $mosi_query->have_posts() ): ?>
<div class="p-section p-section--horizontal">
    <div class="p-section__header">
        <p class="p-section__title c-title c-title--center c-title--lv2">サンプル</p>
        <p class="p-section__subTitle c-title c-title--center c-title--lv5">Sample posts</p>
    </div>
    <div class="p-section__contents">
        <div class="p-mediaList">
            <div class="p-mediaList__inner">
                <?php while( $mosi_query->have_posts() ) : $mosi_query->the_post(); ?>
                <?php get_template_part( 'template-parts/loop', 'media' ); ?>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="p-section__footer">
        <p class="p-section__link"><a href="/sample/"><?php echo esc_html( __( 'View All', 'mosir' ) ); ?></a></p>
    </div>
</div>
<?php endif; wp_reset_query(); unset( $mosi_query, $mosi_query_args ); ?>
