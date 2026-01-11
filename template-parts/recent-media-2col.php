<?php
/**
 * recent-media-2col.php
 *
 * @package mosir
 */
?>
<div class="u-p--t-0 u-p--b-0 wp-block-group alignfull has-default-fade-background-color has-background has-global-padding is-layout-constrained wp-block-group-is-layout-constrained">
	<div class="wp-block-columns alignwide is-layout-flex wp-block-columns-is-layout-flex">
		<div class="u-p--t-xl u-p--b-xl-pc wp-block-column is-layout-flow wp-block-column-is-layout-flow">

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
            <div class="p-sectionHeader">
                <p class="p-sectionHeader__title c-title c-title--center c-title--lv2">画像とテキスト</p>
                <p lang="en" class="p-sectionHeader__subTitle c-title c-title--center c-title--lv5 u-color--primary">Media</p>
            </div>
            <div class="p-mediaList">
            <?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
                <?php get_template_part( 'template-parts/loop', 'media' ); ?>
            <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

        </div>

		<div class="u-p--t-xl u-p--b-xl wp-block-column is-layout-flow wp-block-column-is-layout-flow">

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
            <div class="p-sectionHeader">
                <p class="p-sectionHeader__title c-title c-title--center c-title--lv2">画像とテキスト</p>
                <p lang="en" class="p-sectionHeader__subTitle c-title c-title--center c-title--lv5 u-color--primary">Media</p>
            </div>
            <div class="p-mediaList">
            <?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
                <?php get_template_part( 'template-parts/loop', 'media' ); ?>
            <?php endwhile; ?>
            </div>
            <?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

        </div>
	</div>
</div>
