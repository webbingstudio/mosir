<?php
/**
 * recent-headline.php
 *
 * @package mosir
 */
?>
<div class="u-p--t-xl u-p--b-xl wp-block-group alignfull has-default-fade-background-color has-background has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
	<div class="wp-block-columns alignwide is-layout-flex wp-block-columns-is-layout-flex">

        <?php
        $mo_args = array(
            'post_type'  => 'post',
            'posts_per_page'  => 5,
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $mo_q = new WP_Query( $mo_args );
        ?>
        <?php if( $mo_q->have_posts() ): ?>
        <div class="p-headlineList">
        <?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
            <?php get_template_part( 'template-parts/loop', 'headline' ); ?>
        <?php endwhile; ?>
        </div>
        <?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

    </div>
</div>
