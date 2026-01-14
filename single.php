<?php
/**
 * single.php
 * 投稿詳細ページ用テンプレート
 *
 * @package mosir
 */

get_header();
$mos_post_type = get_post_type();

$mos_categories = get_the_terms( $post->ID, 'category' );

$mos_tags = get_the_tags();

$mos_date_format = get_option('date_format');
$mos_time_format = get_option('time_format');

$mos_prev_link = get_previous_post_link( '%link', '前: %title' );
$mos_next_link = get_next_post_link( '%link', '次: %title' );
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">

<?php if( have_posts() ) : ?>
<?php while( have_posts() ) : the_post(); ?>
	<article class="p-<?php echo esc_attr($mos_post_type); ?>-contents p-post p-post--<?php echo esc_attr($mos_post_type); ?>">
		<div class="p-post__header">
			<div class="p-post__header__contents l-container l-container--sm">
				<div class="p-post__header__meta">
					<time class="c-date" datetime="<?php the_time('c'); ?>"><?php the_time( $mos_date_format . ' ' . $mos_time_format ); ?></time>
					<?php if($mos_categories) : ?>
					<p class="p-post__category">
						<?php foreach( $mos_categories as $category ): ?>
						<a href="<?php echo get_category_link($category->term_id); ?>" class="c-label c-label--primary">
							<?php echo esc_html($category->name); ?>
						</a>
						<?php endforeach; ?>
					</p>
					<?php endif; ?>
				</div>
				<h1 class="p-post__title c-title c-title--lv2"><?php echo get_the_title() ? get_the_title() : '(タイトルなし)'; ?></h1>
			</div>
		</div>
		<div class="p-post__contents <?php mos_wp_block_class(); ?>">
			<?php the_content(); ?>
		</div>
		<div class="p-post__footer">
			<div class="p-post__footer__contents l-container l-container--sm">
				<?php if( $mos_tags ): ?>
				<div class="p-post__footer__tags">
					<ul class="c-nav">
						<?php foreach( $mos_tags as $tag ): ?>
						<li class="c-nav__item">
							<a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<?php endif; ?>
				<?php if( $mos_prev_link || $mos_next_link ): ?>
				<div class="p-post__footer__link p-horizontalMenu">
					<ul class="p-horizontalMenu__nav c-nav">
						<li class="p-post__footer__prev c-nav__item">
							<?php if( $mos_prev_link ): ?>
								<?php echo $mos_prev_link; ?>
							<?php endif; ?>
						</li>
						<li class="p-post__footer__back c-nav__item">
							<a href="<?php echo esc_url( get_post_type_archive_link($mos_post_type) ); ?>">一覧へもどる</a>
						</li>
						<li class="p-post__footer__next c-nav__item">
							<?php if( $mos_next_link ): ?>
								<?php echo $mos_next_link; ?>
							<?php endif; ?>
						</li>
					</ul>
				</div>
				<?php endif; ?>
			</div>
		</div>
	</article>

	<?php if ( comments_open() || get_comments_number() ) : ?>
		<?php comments_template(); ?>
	<?php endif; ?>

<?php endwhile; ?>
<?php endif; ?>

<?php if ( is_active_sidebar( 'widget-main-post' ) ) : ?>
	<div class="u-p--b-xl p-widgetArea p-widgetArea--main p-widgetArea--main-post">
		<div class="p-widgetArea__inner">
			<?php dynamic_sidebar( 'widget-main-post' ); ?>
		</div>
	</div>
<?php endif; ?>

</div>
<?php get_sidebar(); ?>

<?php
get_footer();
