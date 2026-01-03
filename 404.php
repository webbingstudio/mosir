<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ws-minimalism
 */

get_header();
?>
<section class="mi-p-error mi-p-error--404">
    <div class="mi-p--error__header">
        <div class="mi-p--error__header__contents mi-l-container mi-l-container--sm">
            <h2 class="mi-p--error__title mi-c-title mi-c-title--lv3">ページが見つかりません</h2>
        </div>
    </div>
    <div class="mi-p-error__contents <?php mi_wp_block_class(); ?>">
        <p>お探しのURLには、コンテンツがありません。<br>
        コンテンツが移動したか、削除された可能性があります。</p>
        <p>お手数ですが、<a href="<?php echo esc_url( home_url() ); ?>">トップページ</a>から目的のコンテンツをお探しください。</p>
    </div>
    <div class="mi-p--error__footer">
        <div class="mi-p--error__footer__contents mi-l-container mi-l-container--sm">
            <div class="mi-p-buttons">
                <a class="mi-c-button" href="<?php echo esc_url( home_url() ); ?>">トップページへもどる</a>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
