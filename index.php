<?php
/**
 * index.php
 * 一覧ページ用テンプレート
 *
 * @package ws-minimalism
 */

get_header();
?>

<?php if( have_posts() ): ?>
<div class="mi-p-posts">
    <?php if( get_the_archive_title() !== __( 'Archives' ) ): ?>
    <div class="mi-p-posts__header">
        <p class="mi-p-posts__title mi-c-title mi-c-title--lv3 mi-c-title--center"><?php echo esc_html(get_the_archive_title()); ?></p>
    </div>
    <?php endif; ?>
    <div class="mi-p-posts__contents mi-l-container mi-l-container--sm">
        <div class="mi-p-posts mi-p-posts--media">
        <?php while( have_posts() ) : the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'media' ); ?>
        <?php endwhile; ?>
        </div>
    </div>
</div>

<p>投稿一覧終了 =============</p>
<?php get_template_part( 'template-parts/pager' ); ?>

<?php else: ?>
<p>投稿がありません =============</p>
<?php endif; ?>
<?php
get_footer();
