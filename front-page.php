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
<section class="mi-p-home-headline">
	<div class="mi-p-home-headline__inner mi-l-container">
		<div class="mi-p-home-headline__header mi-p-sectionHeader">
			<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2">投稿_一列</p>
			<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5">headline</p>
		</div>
		<div class="mi-p-home-headline__contents">
			<div class="mi-p-home-headline__posts mi-p-posts mi-p-posts--headline">
			<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
				<?php get_template_part( 'template-parts/loop', 'headline' ); ?>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
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
<section class="mi-p-home-headline">
	<div class="mi-p-home-headline__inner mi-l-container">
		<div class="mi-p-home-headline__header mi-p-sectionHeader">
			<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2">投稿_一列メタなし</p>
			<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5">headline-no-meta</p>
		</div>
		<div class="mi-p-home-headline__contents">
			<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--headline">
			<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
				<?php get_template_part( 'template-parts/loop', 'headline-no-meta' ); ?>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
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
<section class="mi-p-home-recent">
	<div class="mi-p-home-recent__header mi-p-sectionHeader">
		<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2 mi-c-title--center">投稿_カード</p>
		<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5 mi-c-title--center">card</p>
		<p class="mi-p-sectionHeader__lead">公開日が古い順に3件、先頭固定表示投稿は含まない</p>
	</div>
	<div class="mi-p-home-recent__contents">
		<div class="mi-l-container">
			<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--card">
			<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
				<?php get_template_part( 'template-parts/loop', 'card' ); ?>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
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
<section class="mi-p-home-recent">
	<div class="mi-p-home-recent__header mi-p-sectionHeader">
		<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2 mi-c-title--center">投稿_カードメタなし</p>
		<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5 mi-c-title--center">card-no-meta</p>
		<p class="mi-p-sectionHeader__lead">公開日が古い順に3件、先頭固定表示投稿は含まない</p>
	</div>
	<div class="mi-p-home-recent__contents">
		<div class="mi-l-container">
			<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--card">
			<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
				<?php get_template_part( 'template-parts/loop', 'card-no-meta' ); ?>
			<?php endwhile; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>


<div class="mi-p-home-group">
	<div class="mi-p-home-group__inner">

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
		<section class="mi-p-home-recent">
			<div class="mi-p-home-recent__header mi-p-sectionHeader">
				<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2 mi-c-title--center">投稿_メディア</p>
				<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5 mi-c-title--center">media</p>
			</div>
			<div class="mi-p-home-recent__contents">
				<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--media">
				<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'media' ); ?>
				<?php endwhile; ?>
				</div>
			</div>
		</section>
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
		<section class="mi-p-home-recent">
			<div class="mi-p-home-recent__header mi-p-sectionHeader">
				<p class="mi-p-sectionHeader__title mi-c-title mi-c-title--lv2 mi-c-title--center">投稿_メディアメタなし</p>
				<p lang="en" class="mi-p-sectionHeader__subTitle mi-c-title mi-c-title--lv5 mi-c-title--center">media-no-meta</p>
			</div>
			<div class="mi-p-home-recent__contents">
				<div class="mi-p-home-recent__posts mi-p-posts mi-p-posts--media">
				<?php while( $mi_q->have_posts() ) : $mi_q->the_post(); ?>
					<?php get_template_part( 'template-parts/loop', 'media-no-meta' ); ?>
				<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php endif; wp_reset_query(); unset( $mi_q, $mi_args ); ?>

	</div>
</div>
<?php
get_footer();
