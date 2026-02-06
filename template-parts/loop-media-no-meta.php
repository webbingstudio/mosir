<?php
/**
 * loop-media-no-meta.php
 * Repeated sections of a post, with featured image on the left and content on the right.
 * The entire loop is enclosed in a link.
 * Post meta information such as date, term, etc. is not displayed.
 *
 * @package mosir
 */
?>
<article class="p-posts__item p-media">
	<a class="p-media__inner" href="<?php the_permalink(); ?>">
		<figure class="p-media__image c-picture c-picture--1to1">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="p-media__contents">
			<p class="p-media__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(No title)'; ?></p>
		</div>
	</a>
</article>
