<?php
/**
 * loop-card-no-meta.php
 * Repeated sections of a post, with featured image on the top and content on the bottom.
 * The entire loop is enclosed in a link.
 * Post meta information such as date, term, etc. is not displayed.
 * Show an excerpt of the content.
 *
 * @package mosir
 */
?>
<article class="p-posts__item p-card">
	<a class="p-card__inner" href="<?php the_permalink(); ?>">
		<figure class="p-card__image c-picture c-picture--16to9">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="p-card__contents">
			<p class="p-card__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(No title)'; ?></p>
			<p class="c-summary"><?php echo esc_html( get_the_excerpt() ); ?></p>
		</div>
	</a>
</article>
