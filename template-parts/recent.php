<?php
/**
 * recent.php
 *
 * @package mosir
 *
 * @param array $args { group: '1' }
 *
 */

if( !isset( $args['group'] ) ) {
	$args = array( 'group' => '1' );
}

$mosi_options_home_posts_layout = get_theme_mod( 'mosi_options_home_posts_layout', 'two' );

if( $args['group'] !== '1' ) {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_02', 'none' );
} else {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_01', 'post' );
}
?>

<?php if( $mosi_options_home_posts_post_type !== 'none' ): ?>

    <?php
    $mosi_posts_type_obj = get_post_type_object( $mosi_options_home_posts_post_type );

    if( $args['group'] !== '1' ) {
        $mosi_options_home_posts_header = get_theme_mod( 'mosi_options_home_posts_header_02', 'top' );
        $mosi_posts_title = get_theme_mod( 'mosi_options_home_posts_title_02', '' );
        $mosi_posts_subtitle = get_theme_mod( 'mosi_options_home_posts_subtitle_02', '' );
        $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_02', 'card' );
        $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_02', 'DESC' );
        $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_02', '6' );
        $mosi_options_home_posts_link = get_theme_mod( 'mosi_options_home_posts_link_02', '' );
    } else {
        $mosi_options_home_posts_header = get_theme_mod( 'mosi_options_home_posts_header_01', 'top' );
        $mosi_posts_title = get_theme_mod( 'mosi_options_home_posts_title_01', '' );
        $mosi_posts_subtitle = get_theme_mod( 'mosi_options_home_posts_subtitle_01', '' );
        $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_01', 'card' );
        $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_01', 'DESC' );
        $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_01', '6' );
        $mosi_options_home_posts_link = get_theme_mod( 'mosi_options_home_posts_link_01', '' );
    }

    if( $mosi_options_home_posts_layout === 'two' && $mosi_options_home_posts_header === 'left' ) {
        $mosi_options_home_posts_header = 'top';
    }

    // Why do we do this?
    // In Japan and some other countries, the word "Post（投稿）" is a concept and is not used in conversation.
    // For this reason, we default to the common expression used on blogs, etc.
    if( $mosi_options_home_posts_post_type === 'post' ) {
        $mosi_posts_title = empty( $mosi_posts_title ) ? 'Latest Posts' : $mosi_posts_title;
        $mosi_posts_subtitle = empty( $mosi_posts_subtitle ) ? 'Blog' : $mosi_posts_subtitle;
    } else {
        $mosi_posts_title = empty( $mosi_posts_title ) ? esc_html( $mosi_posts_type_obj->label ) : $mosi_posts_title;
        $mosi_posts_subtitle = empty( $mosi_posts_subtitle ) ? esc_html( $mosi_posts_type_obj->name ) : $mosi_posts_subtitle;
    }

    $mosi_query_args = array(
        'post_type'  => $mosi_options_home_posts_post_type,
        'posts_per_page'  => $mosi_options_home_posts_post_limit,
        'orderby' => 'date',
        'order' => $mosi_options_home_posts_post_order
    );
    $mosi_query = new WP_Query( $mosi_query_args );
    ?>
    <?php if( $mosi_query->have_posts() ): ?>
    <div class="p-section<?php echo $mosi_options_home_posts_header === 'left' ? ' p-section--horizontal' : ''; ?>">

        <?php if( $mosi_options_home_posts_header !== 'none' ): ?>
        <div class="p-section__header">
            <p class="p-section__title c-title c-title--center c-title--lv2"><?php echo esc_attr($mosi_posts_title); ?></p>
            <p class="p-section__subTitle c-title c-title--center c-title--lv5"><?php echo esc_html($mosi_posts_subtitle); ?></p>
        </div>
        <?php endif; ?>
        <div class="p-section__contents">
            <div class="p-<?php echo esc_attr( str_replace( '-no-meta', '', $mosi_options_home_posts_post_loop ) )?>List">
                <div class="p-<?php echo esc_attr( str_replace( '-no-meta', '', $mosi_options_home_posts_post_loop ) )?>List__inner">
                    <?php while( $mosi_query->have_posts() ) : $mosi_query->the_post(); ?>
                    <?php get_template_part( 'template-parts/loop', $mosi_options_home_posts_post_loop ); ?>
                <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php if( $mosi_options_home_posts_link ): ?>
        <div class="p-section__footer">
            <p class="p-section__link"><a href="<?php echo esc_url($mosi_options_home_posts_link); ?>" aria-label="「<?php echo esc_attr($mosi_posts_title); ?>」の一覧ページへ">一覧ページへ</a></p>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; wp_reset_query(); unset( $mosi_query, $mosi_query_args ); ?>
<?php endif; ?>
