<?php
/**
 * index.php
 * 一覧ページ用テンプレート
 *
 * @package mosir
 */

get_header();
?>
<?php if( have_posts() ): ?>
<div class="mi-p-posts">
    <?php
        if( is_search() ):
            $mi_s = get_query_var('s') ? get_query_var('s') : '(なし)';
    ?>
    <div class="mi-p-posts__header">
        <div class="mi-p-posts__header__contents mi-l-container mi-l-container--sm">
            <p class="mi-p-posts__title mi-c-title mi-c-title--lv3 mi-c-title--center">キーワード: <?php esc_html_e($mi_s); ?></p>
        </div>
    </div>
    <?php elseif( !is_home() && !is_post_type_archive() ): ?>
    <div class="mi-p-posts__header">
        <div class="mi-p-posts__header__contents mi-l-container mi-l-container--sm">
            <p class="mi-p-posts__title mi-c-title mi-c-title--lv3 mi-c-title--center"><?php echo get_the_archive_title(); ?></p>
        </div>
    </div>
    <?php endif; ?>
    <div class="mi-p-posts__contents mi-l-container mi-l-container--sm">

        <?php if( is_search() ): ?>
            <?php get_search_form(); ?>
        <?php endif; ?>

        <div class="mi-p-posts mi-p-posts--media">
        <?php while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'media' ); ?>
        <?php endwhile; ?>
        </div>
    </div>
    <div class="mi-p-posts__footer">
        <div class="mi-p-posts__footer__contents mi-l-container mi-l-container--sm">
            <?php get_template_part( 'template-parts/pager' ); ?>
        </div>
    </div>
</div>
<?php else: ?>
<div class="mi-p-posts">
    <?php
        if( is_search() ):
            $mi_s = get_query_var('s') ? get_query_var('s') : '(なし)';
    ?>
    <div class="mi-p-posts__header">
        <div class="mi-p-posts__header__contents mi-l-container mi-l-container--sm">
            <p class="mi-p-posts__title mi-c-title mi-c-title--lv3 mi-c-title--center">キーワード: <?php esc_html_e($mi_s); ?></p>
        </div>
    </div>
    <div class="mi-p-posts__contents mi-l-container mi-l-container--sm mi-u-p--t-lg mi-u-p--b-lg">
        <?php get_search_form(); ?>

        <p>検索条件に一致する結果は見つかりませんでした。</p>
    </div>
    <?php elseif( !is_home() && !is_post_type_archive() ): ?>
    <div class="mi-p-posts__header">
        <div class="mi-p-posts__header__contents mi-l-container mi-l-container--sm">
            <p class="mi-p-posts__title mi-c-title mi-c-title--lv3 mi-c-title--center"><?php echo get_the_archive_title(); ?></p>
        </div>
    </div>
    <div class="mi-p-posts__contents mi-l-container mi-l-container--sm mi-u-p--t-lg mi-u-p--b-lg">
        <p>コンテンツは準備中です。</p>
    </div>
    <?php endif; ?>
    <div class="mi-p-posts__footer">
        <div class="mi-u-p--posts__footer__contents mi-l-container mi-l-container--sm">
            <div class="mi-p-buttons">
                <a class="mi-c-button" href="<?php echo esc_url( home_url() ); ?>">トップページへもどる</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php
get_footer();
