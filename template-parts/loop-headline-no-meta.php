<?php
/**
 * loop-headline-no-meta.php
 * Repeated sections of a posts only title.
 * The entire loop is enclosed in a link.
 *
 * @package ws-minimalism
 */
?>
<article class="mi-p-posts__item mi-p-headline">
	<a class="mi-p-headline__inner" href="<?php the_permalink(); ?>">
		<div class="mi-p-headline__contents">
			<p class="mi-p-headline__title mi-c-title"><?php the_title(); ?></p>
		</div>
	</a>
</article>
