<?php
/**
 * front-page.php
 * Website home template
 *
 * @package ws-minimalism
 */

get_header();
?>
<div class="mi-p-home">

	<?php
	// ==============================
	// Contents of front page
	// ==============================
	if( have_posts() ) :
	?>
	<section class="mi-p-home-contents mi-p-post mi-p-post--page">
		<div class="mi-p-post__content <?php mi_wp_block_class(); ?>">
		<?php while( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
	</section>
	<?php endif; ?>


	<?php
	// ==============================
	// Feature pages
	// ==============================
	?>
	<section class="mi-p-home-feature">
		<div class="mi-p-home-feature__contents">
			<div class="mi-l-container">
				<div class="mi-p-posts mi-p-posts--card">

					<div class="mi-p-posts__item mi-p-card">
						<a href="#" class="mi-p-card__inner">
							<picture class="mi-p-card__image mi-c-picture mi-c-picture--3to2">
								<img src="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/feature_01.jpg' ) ); ?>" width="600" height="400" alt="">
							</picture>
							<div class="mi-p-card__contents">
								<p class="mi-p-card__title mi-c-title mi-c-title--lv4">サービス</p>
								<p class="mi-p-card__body">このサイトの素晴らしいサービスについて紹介しているページへ案内します。</p>
							</div>
						</a>
					</div>

					<div class="mi-p-posts__item mi-p-card">
						<a href="#" class="mi-p-card__inner">
							<picture class="mi-p-card__image mi-c-picture mi-c-picture--3to2">
								<img src="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/feature_02.jpg' ) ); ?>" width="600" height="400" alt="">
							</picture>
							<div class="mi-p-card__contents">
								<p class="mi-p-card__title mi-c-title mi-c-title--lv4">商品一覧</p>
								<p class="mi-p-card__body">このサイトで購入できる、美しい商品について紹介しているページへ案内します。</p>
							</div>
						</a>
					</div>

					<div class="mi-p-posts__item mi-p-card">
						<a href="#" class="mi-p-card__inner">
							<picture class="mi-p-card__image mi-c-picture mi-c-picture--3to2">
								<img src="<?php echo esc_attr( get_theme_file_uri( 'assets/images/home/feature_03.jpg' ) ); ?>" width="600" height="400" alt="">
							</picture>
							<div class="mi-p-card__contents">
								<p class="mi-p-card__title mi-c-title mi-c-title--lv4">会社概要</p>
								<p class="mi-p-card__body">このサイトを運営している企業や団体について紹介しているページへ案内します。</p>
							</div>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section>



	<?php
	// ==============================
	// Recent posts
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
	<section class="mi-p-home-recent">
		<div class="mi-p-home-recent__header mi-p-sectionHeader">
			<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2 mi-c-title--center">ブログ</p>
			<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5 mi-c-title--center">Blog</p>
		</div>
		<div class="mi-p-home-recent__contents">
			<div class="mi-l-container mi-l-container--sm">
				<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--media">
				<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'media' ); ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


</div>
<?php
get_footer();
