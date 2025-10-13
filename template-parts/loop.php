<?php
/**
 * loop.php
 * 一覧投稿繰り返し用テンプレート
 *
 * @package ws-minimalism
 */
?>
<p>投稿繰り返し =============</p>
<a href="<?php the_permalink(); ?>">
	<figure>
		<?php if ( has_post_thumbnail() ) : ?>
		<?php the_post_thumbnail( 'thumbnail' ); ?>
		<?php else : ?>
		<img src="https://placehold.jp/cccccc/ffffff/150x150.png?text=no%20image" alt="">
		<?php endif; ?>
	</figure>
	<p>title: <?php the_title(); ?></p>
</a>
<br><br>