<?php
/**
 * recent-card.php
 *
 * @package mosir
 */
?>
<?php
$mos_args = array(
    'post_type'  => 'post',
    'posts_per_page'  => 6,
    'orderby' => 'date',
    'order' => 'DESC'
);
$mos_q = new WP_Query( $mos_args );
?>
<?php if( $mos_q->have_posts() ): ?>
<section class="u-p--t-xl u-p--b-xl p-section">
    <div class="p-section__header">
        <p class="p-section__title c-title c-title--center c-title--lv2" <?php language_attributes(); ?>>カード</p>
        <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
            <p class="p-section__subTitle c-title c-title--center c-title--lv5 u-color--primary" lang="en-US">Card</p>
        <?php endif; ?>
    </div>
    <div class="p-section__contents l-container">
        <div class="p-cardList">
        <?php while( $mos_q->have_posts() ) : $mos_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'card' ); ?>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; wp_reset_query(); unset( $mos_q, $mos_args ); ?>
