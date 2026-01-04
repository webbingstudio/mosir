<?php
/**
 * single.php
 * 投稿詳細ページ用テンプレート
 *
 * @package mosir
 */

get_header();
$mi_post_type = get_post_type();

$mi_categories = get_the_terms( $post->ID, 'category' );

$mi_tags = get_the_tags();

$mi_date_format = get_option('date_format');
$mi_time_format = get_option('time_format');

$mi_prev_link = get_previous_post_link( '%link', '前: %title' );
$mi_next_link = get_next_post_link( '%link', '次: %title' );
?>
<?php
// ==============================
// Contents of front page
// ==============================
if( have_posts() ) :
?>
<article class="mi-p-<?php echo esc_attr($mi_post_type); ?>-contents mi-p-post mi-p-post--<?php echo esc_attr($mi_post_type); ?>">
	<div class="mi-p-post__header">
		<div class="mi-p-post__header__contents mi-l-container mi-l-container--sm">
			<div class="mi-p-post__header__meta">
				<time class="mi-c-date" datetime="<?php the_time('c'); ?>"><?php the_time( $mi_date_format . ' ' . $mi_time_format ); ?></time>
				<?php if($mi_categories) : ?>
				<p class="mi-p-post__category">
					<?php foreach( $mi_categories as $category ): ?>
					<a href="<?php echo get_category_link($category->term_id); ?>" class="mi-c-label mi-c-label--primary">
						<?php echo esc_html($category->name); ?>
					</a>
					<?php endforeach; ?>
				</p>
				<?php endif; ?>
			</div>
			<h1 class="mi-p-post__title mi-c-title mi-c-title--lv3"><?php echo get_the_title() ? get_the_title() : '(タイトルなし)'; ?></h1>
		</div>
	</div>
	<div class="mi-p-post__contents <?php mi_wp_block_class(); ?>">
	<?php while( have_posts() ) : the_post(); ?>
		<?php the_content(); ?>
	<?php endwhile; ?>
	</div>
	<div class="mi-p-post__footer">
		<div class="mi-p-post__footer__contents mi-l-container mi-l-container--sm">
			<?php if( $mi_tags ): ?>
			<div class="mi-p-post__footer__tags">
				<ul class="mi-c-nav">
					<?php foreach( $mi_tags as $tag ): ?>
					<li class="mi-c-nav__item">
						<a href="<?php echo get_tag_link( $tag->term_id ); ?>"><?php echo $tag->name; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php endif; ?>
			<?php if( $mi_prev_link || $mi_next_link ): ?>
			<div class="mi-p-post__footer__link mi-p-horizontalMenu">
				<ul class="mi-p-horizontalMenu__nav mi-c-nav">
					<li class="mi-p-post__footer__prev mi-c-nav__item">
						<?php if( $mi_prev_link ): ?>
							<?php echo $mi_prev_link; ?>
						<?php endif; ?>
					</li>
					<li class="mi-p-post__footer__back mi-c-nav__item">
						<a href="<?php echo esc_url( get_post_type_archive_link($mi_post_type) ); ?>">一覧へもどる</a>
					</li>
					<li class="mi-p-post__footer__next mi-c-nav__item">
						<?php if( $mi_next_link ): ?>
							<?php echo $mi_next_link; ?>
						<?php endif; ?>
					</li>
				</ul>
			</div>
			<?php endif; ?>
		</div>
	</div>
</article>
<?php endif; ?>
<?php
get_footer();
