<?php
/**
 * loop-card-no-meta.php
 * Repeated sections of a post, with featured image on the top and content on the bottom.
 * The entire loop is enclosed in a link.
 * Post meta information such as date, term, etc. is not displayed.
 * Show an excerpt of the content.
 *
 * @package ws-minimalism
 */
?>
<article class="mi-p-posts__item mi-p-card">
	<a class="mi-p-card__inner" href="<?php the_permalink(); ?>">
		<figure class="mi-p-card__image mi-c-picture mi-c-picture--3to2">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="mi-p-card__contents">
			<p class="mi-p-card__title mi-c-title"><?php the_title(); ?></p>
			<p class="mi-p-card__summary mi-c-summary"><?php echo esc_html( get_the_excerpt() ); ?></p>
		</div>
	</a>
</article>
