<?php
/**
 * pageHeader.php
 * ページヘッダ
 *
 * @package mosir
 */
$mos_post_type = get_post_type() ? get_post_type() : get_query_var( 'post_type' );
$mos_post_type_obj = $mos_post_type ? get_post_type_object( $mos_post_type ) : (bool)false;

// If "Posts page" is set, the information will be retrieved and reflected in the page header.
// If not set, the name of the "post" content will be "blog."
// (Reading Settings > Your homepage displays > Posts page)
$mos_p4p_slug = 'page';
$mos_p4p_title = 'ブログ';

$mos_p4p_id = get_option('page_for_posts') ? get_option('page_for_posts') : (bool)false;
$mos_p4p = $mos_p4p_id ? get_post($mos_p4p_id) : (bool)false;
if( $mos_p4p && $mos_p4p->post_status === 'publish' ){
    $mos_p4p_slug = $mos_p4p->post_name;
    $mos_p4p_title = $mos_p4p->post_title;
}
?>
<?php if ( $mos_post_type_obj && is_single() && $mos_post_type_obj->name === 'post' ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mos_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mos_p4p_title); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mos_p4p_slug) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( $mos_post_type_obj && !is_page() && is_single() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mos_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mos_post_type_obj->labels->name); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mos_post_type_obj->name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif (
    $mos_post_type_obj
    && ( is_home() || ( is_archive() && $mos_post_type_obj->name === 'post' ) )
): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mos_p4p_slug); ?>">
    <div class="p-pageHeader__contents l-container">
        <p class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php echo esc_attr($mos_p4p_title); ?></p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mos_p4p_slug) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( $mos_post_type_obj && is_archive() ): ?>
<div class="p-pageHeader p-pageHeader--<?php echo esc_attr($mos_post_type_obj->name) ?>">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>><?php esc_html_e($mos_post_type_obj->labels->name); ?></h1>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($mos_post_type_obj->name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php elseif ( is_search() ): ?>
<div class="p-pageHeader p-pageHeader--search">
    <div class="p-pageHeader__contents l-container">
        <h1 class="p-pageHeader__title c-title c-title--lv2" <?php language_attributes(); ?>>検索結果</h1>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-pageHeader__caption u-color--primary" lang="en-US">Search result</p>
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
            <p class="p-pageHeader__caption u-color--primary" lang="en-US"><?php echo ucfirst( esc_html($post->post_name) ); ?></p>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
