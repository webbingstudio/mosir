<?php
/**
 * recent-card-2col.php
 *
 * @package mosir
 */
?>
<div class="u-p--t-xl u-p--b-xl l-columns">

    <?php
    $mo_args = array(
        'post_type'  => 'post',
        'posts_per_page'  => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $mo_q = new WP_Query( $mo_args );
    ?>
    <?php if( $mo_q->have_posts() ): ?>
    <section class="p-section">
        <div class="p-section__header">
            <p class="p-section__title c-title c-title--center c-title--lv2 <?php language_attributes(); ?>">カード</p>
            <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
                <p class="p-section__subTitle c-title c-title--center c-title--lv5 u-color--primary" lang="en-US">Card</p>
            <?php endif; ?>
        </div>
        <div class="p-cardList">
        <?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'card' ); ?>
        <?php endwhile; ?>
        </div>
    </section>
    <?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

    <?php
    $mo_args = array(
        'post_type'  => 'post',
        'posts_per_page'  => 3,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $mo_q = new WP_Query( $mo_args );
    ?>
    <?php if( $mo_q->have_posts() ): ?>
    <section class="p-section">
        <div class="p-section__header">
            <p class="p-section__title c-title c-title--center c-title--lv2 <?php language_attributes(); ?>">カード</p>
            <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
                <p class="p-section__subTitle c-title c-title--center c-title--lv5 u-color--primary" lang="en-US">Card</p>
            <?php endif; ?>
        </div>
        <div class="p-cardList">
        <?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'card' ); ?>
        <?php endwhile; ?>
        </div>
    </section>
    <?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

</div>
