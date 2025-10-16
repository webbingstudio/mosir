<?php
/**
 * front-page.php
 * Website home template
 *
 * @package ws-minimalism
 */

get_header();
?>





<?php
// ==============================
// Recent posts
// ==============================

$mi_query_args = array(
	'post_type'  => 'post',
	'posts_per_page'  => 3,
	'orderby' => 'date',
	'order' => 'DESC'
);
$mi_q = new WP_Query( $mi_query_args );
?>
<?php if( $mi_q->have_posts() ): ?>
<div class="mi-p-posts mi-p-posts--media mi-p-home-recent">
	<div class="mi-p-posts__container mi-l-container mi-l-container--sm">
		<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
			<?php get_template_part( 'template-parts/loop', 'media' ); ?>
		<?php endwhile; ?>
	</div>
</div>
<?php endif; wp_reset_query(); ?>





<?php
get_footer();
