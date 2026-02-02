<?php
/**
 * pageHeader.php
 * header in all pages
 *
 * @package mosir
 */

$mosi_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$mosi_post_type_obj = $mosi_post_type ? get_post_type_object( $mosi_post_type ) : (bool)false;

// If you have set an "Alternative Post Name" in customization, that name will be reflected when displaying archives.
// If you have not set, it will remain "Blog".
$mosi_posts_page_label = get_theme_mod( 'mosi_options_post_alt_label', '' );
$mosi_posts_page_label = empty( $mosi_posts_page_label ) ? 'ブログ' : $mosi_posts_page_label;
$mosi_posts_page_slug = get_theme_mod( 'mosi_options_post_alt_slug', '' );
$mosi_posts_page_slug = empty( $mosi_posts_page_slug ) ? 'blog' : $mosi_posts_page_slug;

// If you have set "Page for posts", it will inherit the title and slug of that page.
$mosi_posts_page_id = get_option('page_for_posts') ? get_option('page_for_posts') : (bool)false;
$mosi_posts_page = $mosi_posts_page_id ? get_post($mosi_posts_page_id) : (bool)false;
if( $mosi_posts_page && $mosi_posts_page->post_status === 'publish' ){
    $mosi_posts_page_label = $mosi_posts_page->post_title;
    $mosi_posts_page_slug = $mosi_posts_page->post_name;
}
?>
<?php if ( $mosi_post_type_obj && is_single() && $mosi_post_type_obj->name === 'post' ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_posts_page_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_posts_page_label); ?></p>
        <?php
            // In Japan, it is customary to include the English translation (here, the slug) at the bottom of the main heading.
            // This is not necessary in English-speaking languages, so it is hidden.
            if( !preg_match('/^en_/', get_locale() ) ):
        ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_posts_page_slug) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( $mosi_post_type_obj && !is_page() && is_single() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mosi_post_type_obj->labels->name); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_post_type_obj->name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif (
    $mosi_post_type_obj
    && ( is_home() || ( is_archive() && $mosi_post_type_obj->name === 'post' ) )
): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_posts_page_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_posts_page_label); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_posts_page_slug) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( $mosi_post_type_obj && is_archive() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mosi_post_type_obj->labels->name); ?></h1>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_post_type_obj->name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( is_search() ): ?>
<div class="p-pageHeader p-pageHeader--search">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>>検索結果</h1>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US">Search result</p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( is_404() ): ?>
<div class="p-pageHeader p-pageHeader--error">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>>404 Not found</h1>
    </div>
</div>
<?php elseif ( !is_front_page() && is_page() ): ?>
<div class="p-pageHeader p-pageHeader--page">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php the_title(); ?></h1>
        <?php if( !preg_match('/^en/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($post->post_name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
