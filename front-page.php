<?php
/**
 * front-page.php
 * Website home template
 *
 * @package mosir
 */

$mosi_options_mv_visible = get_theme_mod( 'mosi_options_mv_visible', 'show' );
$mosi_options_home_posts_position = get_theme_mod( 'mosi_options_home_posts_position', 'after' );
$mosi_options_home_posts_layout = get_theme_mod( 'mosi_options_home_posts_layout', 'two' );

$mosi_post_ex_class = 'p-post p-post--page p-post--frontPage';

get_header();
?>
<?php if( $mosi_options_mv_visible === 'show' ): ?>
<?php get_template_part( 'template-parts/mv' ); ?>
<?php endif; ?>

<?php if( $mosi_options_home_posts_position === 'both' ): ?>
<div class="p-sectionArea p-sectionArea--top">
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '1' ) ); ?>
</div>
<?php endif; ?>

<?php if( $mosi_options_home_posts_position === 'before' ): ?>
<div class="p-sectionArea p-sectionArea--top<?php echo $mosi_options_home_posts_layout === 'two' ? ' p-sectionArea--2col' : '' ?>">
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '1' ) ); ?>
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '2' ) ); ?>
</div>
<?php endif; ?>

<?php
// ==============================
// Contents of front page
// ==============================
if( have_posts() ) :
?>
<?php while( have_posts() ) : the_post(); ?>
	<section id="post-<?php the_ID(); ?>" <?php post_class( $mosi_post_ex_class ); ?>>
		<div class="p-post__contents <?php mosi_wp_block_class(); ?>">
			<?php the_content(); ?>
			<?php wp_link_pages( ); ?>
		</div>
	</section>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php if( $mosi_options_home_posts_position === 'both' ): ?>
<div class="p-sectionArea p-sectionArea--bottom">
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '2' ) ); ?>
</div>
<?php endif; ?>

<?php if( $mosi_options_home_posts_position === 'after' ): ?>
<div class="p-sectionArea p-sectionArea--bottom<?php echo $mosi_options_home_posts_layout === 'two' ? ' p-sectionArea--2col' : '' ?>">
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '1' ) ); ?>
	<?php get_template_part( 'template-parts/recent', '', array( 'group' => '2' ) ); ?>
</div>
<?php endif; ?>

<?php
get_footer();
