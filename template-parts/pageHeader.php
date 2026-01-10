<?php
/**
 * pageHeader.php
 * ページヘッダ
 *
 * @package mosir
 */

$mi_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$mi_post_type_obj = $mi_post_type ? get_post_type_object( $mi_post_type ) : (bool)false;

// If "Posts page" is set, the information will be retrieved and reflected in the page header.
// If not set, the name of the "post" content will be "blog."
// (Reading Settings > Your homepage displays > Posts page)
$mi_p4p_slug = 'page';
$mi_p4p_title = 'ブログ';

$mi_p4p_id = get_option('page_for_posts') ? get_option('page_for_posts') : (bool)false;
$mi_p4p = $mi_p4p_id ? get_post($mi_p4p_id) : (bool)false;
if( $mi_p4p && $mi_p4p->post_status === 'publish' ){
    $mi_p4p_slug = $mi_p4p->post_name;
    $mi_p4p_title = $mi_p4p->post_title;
}
?>
<?php if ( $mi_post_type_obj && is_single() && $mi_post_type_obj->name === 'post' ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--<?php echo esc_attr($mi_p4p_slug) ?>">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <p class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2"><?php echo esc_attr($mi_p4p_title) ?></p>
    </div>
</div>
<?php elseif ( $mi_post_type_obj && is_single() ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--<?php echo esc_attr($mi_post_type_obj->name) ?>">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <p class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2"><?php esc_html_e($mi_post_type_obj->labels->name); ?></p>
    </div>
</div>
<?php elseif (
    $mi_post_type_obj
    && ( is_home() || ( is_archive() && $mi_post_type_obj->name === 'post' ) )
): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--<?php echo esc_attr($mi_p4p_slug) ?>">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <p class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2"><?php echo esc_attr($mi_p4p_title) ?></p>
    </div>
</div>
<?php elseif ( $mi_post_type_obj && is_archive() ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--<?php echo esc_attr($mi_post_type_obj->name) ?>">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <h1 class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2"><?php esc_html_e($mi_post_type_obj->labels->name); ?></h1>
    </div>
</div>
<?php elseif ( is_search() ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--search">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <h1 class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2">検索結果</h1>
    </div>
</div>
<?php elseif ( is_404() ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--error">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <h1 class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2">404 not found</h1>
    </div>
</div>
<?php elseif ( !is_front_page() && is_page() ): ?>
<div class="mi-p-pageHeader mi-p-pageHeader--page">
    <div class="mi-p-pageHeader__contents mi-l-container">
        <h1 class="mi-p-pageHeader__title mi-c-title mi-c-title--lv2"><?php the_title(); ?></h1>
    </div>
</div>
<?php endif; ?>
