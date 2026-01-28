<?php
/**
 * pageHeader.php
 * header in all pages
 *
 * @package mosir
 */

$mosi_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$mosi_post_type_obj = $mosi_post_type ? get_post_type_object( $mosi_post_type ) : (bool)false;

// If "Posts page" is set, the information will be retrieved and reflected in the page header.
// (Reading Settings > Your homepage displays > Posts page)
// If not set, the name of the "post" content will be "blog."
// This is because in Japan, the Japanese translation of "投稿" is not generally used in content titles, so "ブログ" is used instead.
$mosi_p4p_slug = 'page';
$mosi_p4p_title = 'ブログ';

$mosi_p4p_id = get_option('page_for_posts') ? get_option('page_for_posts') : (bool)false;
$mosi_p4p = $mosi_p4p_id ? get_post($mosi_p4p_id) : (bool)false;
if( $mosi_p4p && $mosi_p4p->post_status === 'publish' ){
    $mosi_p4p_slug = $mosi_p4p->post_name;
    $mosi_p4p_title = $mosi_p4p->post_title;
}
?>
<?php if ( $mosi_post_type_obj && is_single() && $mosi_post_type_obj->name === 'post' ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_p4p_title); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_p4p_slug) ); ?></p>
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
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mosi_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mosi_p4p_title); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption" lang="en-US"><?php echo ucfirst( esc_html($mosi_p4p_slug) ); ?></p>
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
