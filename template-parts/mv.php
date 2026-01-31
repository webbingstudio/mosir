<?php
/**
 * mv.php
 * Site main visual (Hero, Key Visual)
 *
 * @package mosir
 */

$mosi_options_mv_catch = get_theme_mod( 'mosi_options_mv_catch', 'mosir' );
$mosi_options_mv_text = get_theme_mod( 'mosi_options_mv_text', 'Hybrid WordPress Theme for Website Developers' );

$mosi_options_mv_image_pc = get_theme_mod( 'mosi_options_mv_image_pc', (bool)false );
$mosi_options_mv_image_sp = get_theme_mod( 'mosi_options_mv_image_sp', (bool)false );

$mosi_options_mv_filter = get_theme_mod( 'mosi_options_mv_filter', 'none' );
?>
<div class="p-mv<?php echo $mosi_options_mv_filter ? ' p-mv--filter-' . esc_attr( $mosi_options_mv_filter ) : ''; ?>">
    <div class="p-mv__cover">
        <?php if( $mosi_options_mv_image_pc && $mosi_options_mv_image_sp ): ?>
        <picture>
            <source media="(max-width:767px)" srcset="<?php echo esc_url( $mosi_options_mv_image_sp ); ?> 767w" sizes="100vw">
            <img fetchpriority="high" class="p-mv__image" alt="" src="<?php echo esc_url( $mosi_options_mv_image_pc ); ?>">
        </picture>
        <?php elseif( $mosi_options_mv_image_pc ): ?>
            <img fetchpriority="high" class="p-mv__image u-hidden--sp" alt="" src="<?php echo esc_url( $mosi_options_mv_image_pc ); ?>">
        <?php elseif( $mosi_options_mv_image_sp ): ?>
            <img fetchpriority="high" class="p-mv__image u-hidden--default" alt="" src="<?php echo esc_url( $mosi_options_mv_image_sp ); ?>">
        <?php endif; ?>
    </div>
    <div class="p-mv__stage">
        <div class="p-mv__contents">
            <?php if( $mosi_options_mv_catch && $mosi_options_mv_text ): ?>
            <div class="p-mv__body">
                <?php if( $mosi_options_mv_catch ): ?>
                <p class="p-mv__catch">
                    <?php echo wp_unslash( wp_filter_post_kses( $mosi_options_mv_catch ) ); ?>
                </p>
                <?php endif; ?>
                <?php if( $mosi_options_mv_text ): ?>
                <p class="p-mv__text">
                    <?php echo wp_unslash( wp_filter_post_kses( $mosi_options_mv_text ) ); ?>
                </p>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>