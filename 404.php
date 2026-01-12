<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mosir
 */

get_header();
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">
    <section class="p-error p-error--404">
        <div class="p--error__header">
            <div class="p--error__header__contents l-container l-container--sm">
                <h2 class="p--error__title c-title c-title--lv3">ページが見つかりません</h2>
            </div>
        </div>
        <div class="p-error__contents <?php mo_wp_block_class(); ?>">
            <p>お探しのURLには、コンテンツがありません。<br>
            コンテンツが移動したか、削除された可能性があります。</p>
            <p>お手数ですが、<a href="<?php echo esc_url( home_url() ); ?>">トップページ</a>から目的のコンテンツをお探しください。</p>
        </div>
        <div class="p--error__footer">
            <div class="p--error__footer__contents l-container l-container--sm">
                <div class="p-buttons">
                    <a class="c-button" href="<?php echo esc_url( home_url() ); ?>">トップページへもどる</a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
