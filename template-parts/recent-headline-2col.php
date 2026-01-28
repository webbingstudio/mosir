<?php
/**
 * recent-media-2col.php
 *
 * @package mosir
 */
?>
<div class="u-p--t-xl u-p--b-xl l-columns">

    <?php
    $mosi_args = array(
        'post_type'  => 'post',
        'posts_per_page'  => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $mosi_q = new WP_Query( $mosi_args );
    ?>
    <?php if( $mosi_q->have_posts() ): ?>
    <section class="p-section">
        <div class="p-section__header">
            <p class="p-section__title c-title c-title--center c-title--lv2" <?php language_attributes(); ?>>日付とテキスト</p>
            <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
                <p class="p-section__subTitle c-title c-title--center c-title--lv5 u-color--primary" lang="en-US">Headline</p>
            <?php endif; ?>
        </div>
        <div class="p-headlineList">
        <?php while( $mosi_q->have_posts() ) : $mosi_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'headline' ); ?>
        <?php endwhile; ?>
        </div>
    </section>
    <?php endif; wp_reset_query(); unset( $mosi_q, $mosi_args ); ?>

    <?php
    $mosi_args = array(
        'post_type'  => 'post',
        'posts_per_page'  => 5,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $mosi_q = new WP_Query( $mosi_args );
    ?>
    <?php if( $mosi_q->have_posts() ): ?>
    <section class="p-section">
        <div class="p-section__header">
            <p class="p-section__title c-title c-title--center c-title--lv2" <?php language_attributes(); ?>>日付とテキスト</p>
            <?php if( !preg_match('/^en_/', get_locale() ) ): ?>
                <p class="p-section__subTitle c-title c-title--center c-title--lv5 u-color--primary" lang="en-US">Headline</p>
            <?php endif; ?>
        </div>
        <div class="p-headlineList">
        <?php while( $mosi_q->have_posts() ) : $mosi_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'headline' ); ?>
        <?php endwhile; ?>
        </div>
    </section>
    <?php endif; wp_reset_query(); unset( $mosi_q, $mosi_args ); ?>

</div>
