<?php
/**
 * pageHeader.php
 * ページヘッダ
 *
 * @package mosir
 */

$mo_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$mo_post_type_obj = $mo_post_type ? get_post_type_object( $mo_post_type ) : (bool)false;

// If "Posts page" is set, the information will be retrieved and reflected in the page header.
// If not set, the name of the "post" content will be "blog."
// (Reading Settings > Your homepage displays > Posts page)
$mo_p4p_slug = 'page';
$mo_p4p_title = 'ブログ';

$mo_p4p_id = get_option('page_for_posts') ? get_option('page_for_posts') : (bool)false;
$mo_p4p = $mo_p4p_id ? get_post($mo_p4p_id) : (bool)false;
if( $mo_p4p && $mo_p4p->post_status === 'publish' ){
    $mo_p4p_slug = $mo_p4p->post_name;
    $mo_p4p_title = $mo_p4p->post_title;
}
?>
<?php if ( $mo_post_type_obj && is_single() && $mo_post_type_obj->name === 'post' ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mo_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mo_p4p_title); ?></p>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mo_p4p_slug) ); ?></p>
    </div>
</div>
<?php elseif ( $mo_post_type_obj && !is_page() && is_single() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mo_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mo_post_type_obj->labels->name); ?></p>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mo_post_type_obj->name) ); ?></p>
    </div>
</div>
<?php elseif (
    $mo_post_type_obj
    && ( is_home() || ( is_archive() && $mo_post_type_obj->name === 'post' ) )
): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mo_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mo_p4p_title); ?></p>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mo_p4p_slug) ); ?></p>
    </div>
</div>
<?php elseif ( $mo_post_type_obj && is_archive() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mo_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mo_post_type_obj->labels->name); ?></h1>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mo_post_type_obj->name) ); ?></p>
    </div>
</div>
<?php elseif ( is_search() ): ?>
<div class="p-pageHeader p-pageHeader--search">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>>検索結果</h1>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US">Search result</p>
    </div>
</div>
<?php elseif ( is_404() ): ?>
<div class="p-pageHeader p-pageHeader--error">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>>Not found</h1>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US">404 not found</p>
    </div>
</div>
<?php elseif ( !is_front_page() && is_page() ): ?>
<div class="p-pageHeader p-pageHeader--page">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php the_title(); ?></h1>
        <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($post->post_name) ); ?></p>
    </div>
</div>
<?php endif; ?>
