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

if( $args['group'] !== '1' ) {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_02', 'post' );
    $mosi_options_home_posts_header = get_theme_mod( 'mosi_options_home_posts_header_02', 'top' );
    $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_02', 'headline' );
    $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_02', 'DESC' );
    $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_02', '5' );
} else {
    $mosi_options_home_posts_post_type = get_theme_mod( 'mosi_options_home_posts_post_type_01', 'post' );
    $mosi_options_home_posts_header = get_theme_mod( 'mosi_options_home_posts_header_01', 'top' );
    $mosi_options_home_posts_post_loop = get_theme_mod( 'mosi_options_home_posts_post_loop_01', 'headline' );
    $mosi_options_home_posts_post_order = get_theme_mod( 'mosi_options_home_posts_post_order_01', 'DESC' );
    $mosi_options_home_posts_post_limit = get_theme_mod( 'mosi_options_home_posts_post_limit_01', '5' );
}

// If you have set an "Alternative Post Name" in customization, that name will be reflected when displaying archives.
// If you have not set, it will remain "Blog".
if( $mosi_options_home_posts_post_type === 'post' ) {
    $mosi_posts_label = get_theme_mod( 'mosi_options_post_alt_label', esc_html( get_post_type_object('post')->label ) );
    $mosi_posts_slug = get_theme_mod( 'mosi_options_post_alt_slug', esc_html( get_post_type_object('post')->name ) );
}
$mosi_posts_label = empty( $mosi_posts_label ) ? 'ブログ' : $mosi_posts_label;
$mosi_posts_slug = empty( $mosi_posts_slug ) ? 'blog' : $mosi_posts_slug;

if( $mosi_options_home_posts_layout === 'two' && $mosi_options_home_posts_header === 'left' ) {
    $mosi_options_home_posts_header = 'top';
}
?>

<?php if( $mosi_options_home_posts_post_type !== 'none' ): ?>

    <?php
    $mosi_posts_type_obj = get_post_type_object( $mosi_options_home_posts_post_type );

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
            <p class="p-section__title c-title c-title--center c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_posts_label); ?></p>
            <?php
                // In Japan, it is customary to include the English translation (here, the slug) at the bottom of the main heading.
                // This is not necessary in English-speaking languages, so it is hidden.
                if( !preg_match('/^en_/', get_locale() ) ):
            ?>
                <p class="p-section__subTitle c-title c-title--center c-title--lv5" lang="en-US"><?php echo ucfirst( esc_html($mosi_posts_slug) ); ?></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        <div class="p-section__contents">
            <div class="p-<?php echo esc_attr( str_replace( '-no-meta', '', $mosi_options_home_posts_post_loop ) )?>List">
            <?php while( $mosi_query->have_posts() ) : $mosi_query->the_post(); ?>
                <?php get_template_part( 'template-parts/loop', $mosi_options_home_posts_post_loop ); ?>
            <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php endif; wp_reset_query(); unset( $mosi_query, $mosi_query_args ); ?>
<?php endif; ?>
