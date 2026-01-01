<?php
/**
 * loop-media-no-meta.php
 * Repeated sections of a post, with featured image on the left and content on the right.
 * The entire loop is enclosed in a link.
 * Post meta information such as date, term, etc. is not displayed.
 *
 * @package ws-minimalism
 */
?>
<article class="mi-p-posts__item mi-p-media">
	<a class="mi-p-media__inner" href="<?php the_permalink(); ?>">
		<figure class="mi-p-media__image mi-c-picture mi-c-picture--1to1">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="mi-p-media__contents">
			<p class="mi-p-media__title mi-c-title"><?php the_title(); ?></p>
		</div>
	</a>
</article>
