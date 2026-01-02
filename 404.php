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
<section class="mi-p-error404-contents mi-p-post mi-p-post--page">
	<div class="mi-u-p--t-lg mi-u-p--b-lg mi-p-post__content <?php mi_wp_block_class(); ?>">
        <h2 class="c-title c-title--lv3">ページが見つかりません</h2>
        <p>お探しのURLには、コンテンツがありません。<br>
        コンテンツが移動したか、削除された可能性があります。</p>
        <p>お手数ですが、<a href="<?php echo esc_url( home_url() ); ?>">トップページ</a>から目的のコンテンツをお探しください。</p>

        <div class="mi-u-p--t-sm">
            <a class="mi-c-button mi-c-button--primary" href="<?php echo esc_url( home_url() ); ?>">トップページへもどる</a>
        </div>
    </div>
</section>
<?php
get_footer();
