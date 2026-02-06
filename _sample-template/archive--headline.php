<?php
/**
 * archive--headline.php
 * Sample: List page template (headline)
 * This template is not used in the theme. Please refer to this as sample code when you want to customize it.
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
        <?php if( !is_home() && !is_post_type_archive() ): ?>
        <div class="p-posts__header">
            <div class="p-posts__header__contents l-container l-container--sm">
                <p class="p-posts__title c-title c-title--lv3 c-title--center"><?php echo get_the_archive_title(); ?></p>
            </div>
        </div>
        <?php endif; ?>
        <div class="p-posts__contents l-container l-container--sm">
            <div class="p-headlineList">
                <div class="p-headlineList__inner">
                <?php while( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/loop', 'headline' ); ?>
                <?php endwhile; ?>
                </div>
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
        <?php if( !is_home() && !is_post_type_archive() ): ?>
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

</div>
<?php
get_footer();
