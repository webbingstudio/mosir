<?php
/**
 * loop-headline-no-meta.php
 * Repeated sections of a posts only title.
 * The entire loop is enclosed in a link.
 *
 * @package mosir
 */
?>
<article class="p-posts__item p-headline">
	<a class="p-headline__inner" href="<?php the_permalink(); ?>">
		<div class="p-headline__contents">
			<p class="p-headline__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(タイトルなし)'; ?></p>
		</div>
	</a>
</article>
