<?php
/**
 * index.php
 * 一覧ページ用テンプレート
 *
 * @package mosir
 */

$mosi_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
get_header();
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">
    <?php if( have_posts() ): ?>
    <div class="p-posts">
        <?php
            if( is_search() ):
                $mosi_s = get_query_var('s') ? get_query_var('s') : '(なし)';
        ?>
        <div class="p-posts__header">
            <div class="p-posts__header__contents l-container l-container--sm">
                <p class="p-posts__title c-title c-title--lv3 c-title--center">キーワード: <?php esc_html_e($mosi_s); ?></p>
            </div>
        </div>
        <?php elseif( !is_home() && !is_post_type_archive() ): ?>
        <div class="p-posts__header">
            <div class="p-posts__header__contents l-container l-container--sm">
                <p class="p-posts__title c-title c-title--lv3 c-title--center"><?php echo get_the_archive_title(); ?></p>
            </div>
        </div>
        <?php endif; ?>
        <div class="p-posts__contents l-container l-container--sm">

            <?php if( is_search() ): ?>
                <?php get_search_form(); ?>
            <?php endif; ?>

            <div class="p-mediaList">
            <?php while( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'template-parts/loop', 'media' ); ?>
            <?php endwhile; ?>
            </div>
        </div>
        <div class="p-posts__footer">
            <div class="p-posts__footer__contents l-container l-container--sm">
                <?php get_template_part( 'template-parts/pager' ); ?>
            </div>
        </div>
    </div>
    <?php else: ?>
    <div class="p-posts">
        <?php
            if( is_search() ):
                $mosi_s = get_query_var('s') ? get_query_var('s') : '(なし)';
        ?>
        <div class="p-posts__header">
            <div class="p-posts__header__contents l-container l-container--sm">
                <p class="p-posts__title c-title c-title--lv3 c-title--center">キーワード: <?php esc_html_e($mosi_s); ?></p>
            </div>
        </div>
        <div class="p-posts__contents l-container l-container--sm u-p--t-lg u-p--b-lg">
            <?php get_search_form(); ?>

            <p>検索条件に一致する結果は見つかりませんでした。</p>
        </div>
        <?php elseif( !is_home() && !is_post_type_archive() ): ?>
        <div class="p-posts__header">
            <div class="p-posts__header__contents l-container l-container--sm">
                <p class="p-posts__title c-title c-title--lv3 c-title--center"><?php echo get_the_archive_title(); ?></p>
            </div>
        </div>
        <div class="p-posts__contents l-container l-container--sm u-p--t-lg u-p--b-lg">
            <p>コンテンツは準備中です。</p>
        </div>
        <?php endif; ?>
        <div class="p-posts__footer">
            <div class="u-p--posts__footer__contents l-container l-container--sm">
                <div class="p-buttons">
                    <a class="c-button" href="<?php echo esc_url( home_url() ); ?>">トップページへもどる</a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if ( $mosi_post_type === 'post' ) : ?>
        <?php if ( is_active_sidebar( 'widget-main-post' ) ) : ?>
            <div class="u-p--b-xl p-widgetArea p-widgetArea--main p-widgetArea--main-post">
                <div class="p-widgetArea__inner">
                    <?php dynamic_sidebar( 'widget-main-post' ); ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div>
<?php if ( $mosi_post_type === 'post' ) : ?>
<?php get_sidebar(); ?>
<?php endif; ?>

<?php
get_footer();
