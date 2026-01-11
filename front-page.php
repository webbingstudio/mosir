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
<section class="p-home-contents p-post p-post--page">
	<div class="p-post__contents <?php mo_wp_block_class(); ?>">
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

<?php
// ==============================
// Recent posts(headline-no-meta)
// ==============================

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
	<?php get_template_part( 'template-parts/loop', 'headline-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>


<?php
// ==============================
// Recent posts(card)
// ==============================

$mo_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'ignore_sticky_posts' => true
);
$mo_q = new WP_Query( $mo_args );
?>
<?php if( $mo_q->have_posts() ): ?>
<div class="p-cardList">
<?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'card' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>

<?php
// ==============================
// Recent posts(card-no-meta)
// ==============================

$mo_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'ASC',
	'ignore_sticky_posts' => true
);
$mo_q = new WP_Query( $mo_args );
?>
<?php if( $mo_q->have_posts() ): ?>
<div class="p-cardList">
<?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'card-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>


<?php
// ==============================
// Recent posts(media)
// ==============================

$mo_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mo_q = new WP_Query( $mo_args );
?>
<?php if( $mo_q->have_posts() ): ?>
<div class="p-mediaList">
<?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'media' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>


<?php
// ==============================
// Recent posts(media-no-meta)
// ==============================

$mo_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mo_q = new WP_Query( $mo_args );
?>
<?php if( $mo_q->have_posts() ): ?>
<div class="p-mediaList">
<?php while( $mo_q->have_posts() ) : $mo_q->the_post(); ?>
	<?php get_template_part( 'template-parts/loop', 'media-no-meta' ); ?>
<?php endwhile; ?>
</div>
<?php endif; wp_reset_query(); unset( $mo_q, $mo_args ); ?>


<?php
get_footer();
