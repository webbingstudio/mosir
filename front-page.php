<?php
/**
 * front-page.php
 * Website home template
 *
 * @package mosir
 */

get_header();
?>
<?php
// ==============================
// Contents of front page
// ==============================
if( have_posts() ) :
?>
<section class="mi-p-home-contents mi-p-post mi-p-post--page">
	<div class="mi-p-post__contents <?php mi_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
</section>
<?php endif; ?>

<?php
// ==============================
// Recent posts(headline)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 5,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-headlineList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'headline' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>

<?php
// ==============================
// Recent posts(headline-no-meta)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 5,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-headlineList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'headline-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


<?php
// ==============================
// Recent posts(card)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'ignore_sticky_posts' => true
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-cardList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'card' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>

<?php
// ==============================
// Recent posts(card-no-meta)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'ignore_sticky_posts' => true
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-cardList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'card-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


<?php
// ==============================
// Recent posts(media)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-mediaList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'media' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


<?php
// ==============================
// Recent posts(media-no-meta)
// ==============================

$mi_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mi_q = new WP_Query( $mi_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-mediaList">
<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'media-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


<?php
get_footer();
