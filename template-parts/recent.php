<?php
/**
 * recent.php
 *
 * @package mosir
 *
 * @param array $args { group: '1' }
 *
 */

$mosi_options_home_posts_layout = get_theme_mod( 'mosi_options_home_posts_layout', 'one' );

if( !isset( $args['group'] ) ) {
	$args = array( 'group' => '1' );
}

if( $args['group'] === '2' ) {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_02', 'post' );
    $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_02', 'headline' );
    $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_02', 'DESC' );
    $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_02', '5' );
} else {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_01', 'post' );
    $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_01', 'headline' );
    $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_01', 'DESC' );
    $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_01', '5' );
}

$mosi_posts_type_obj = get_post_type_object( $mosi_options_home_posts_post_type );

// If post type is "post", the name of the "post" content will be "blog."
// This is because in Japan, the Japanese translation of "投稿" is not generally used in content titles, so "ブログ" is used instead.
$mosi_posts_slug = $mosi_options_home_posts_post_type === 'post' ? 'blog' : $mosi_options_home_posts_post_type;
$mosi_posts_title = $mosi_options_home_posts_post_type === 'post' ? 'ブログ' : $mosi_posts_type_obj->label;

$mosi_query_args = array(
    'post_type'  => $mosi_options_home_posts_post_type,
    'posts_per_page'  => $mosi_options_home_posts_post_limit,
    'orderby' => 'date',
    'order' => $mosi_options_home_posts_post_order
);
$mosi_query = new WP_Query( $mosi_query_args );
?>
<?php if( $mosi_query->have_posts() ): ?>
<div class="p-section<?php echo $mosi_options_home_posts_layout === 'one' ? ' p-section--horizontal' : ''; ?>">
    <div class="p-section__header">
        <p class="p-section__title c-title c-title--center c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_posts_title); ?></p>
        <?php
            // In Japan, it is customary to include the English translation (here, the slug) at the bottom of the main heading.
            // This is not necessary in English-speaking languages, so it is hidden.
            if( !preg_match('/^en_/', get_locale() ) ):
        ?>
            <p class="p-section__subTitle c-title c-title--center c-title--lv5" lang="en-US"><?php echo ucfirst( esc_html($mosi_posts_slug) ); ?></p>
        <?php endif; ?>
    </div>
    <div class="p-section__contents">
        <div class="p-<?php echo esc_attr( str_replace( '-no-meta', '', $mosi_options_home_posts_post_loop ) )?>List">
        <?php while( $mosi_query->have_posts() ) : $mosi_query->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', $mosi_options_home_posts_post_loop ); ?>
        <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; wp_reset_query(); unset( $mosi_query, $mosi_query_args ); ?>
