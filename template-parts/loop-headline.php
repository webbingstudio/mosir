<?php
/**
 * loop-headline.php
 * Repeated sections of a posts without featured image.
 * The entire loop is enclosed in a link.
 * Only the first term label in a post is displayed.
 * Post meta will be aligned in a single line if the window width is wide.
 *
 * @package mosir
 */
?>
<article class="mi-p-posts__item mi-p-headline">
	<a href="<?php the_permalink(); ?>" class="mi-p-headline__inner">
		<div class="mi-p-headline__header">
            <time class="mi-p-headline__date mi-c-date" datetime="<?php the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

            <?php
            if ( $post->post_type === 'post' ) :
                $mi_term = 'category';
                $mi_post_terms = get_the_terms( $post->ID, $mi_term );
            ?>
                <?php if ( $mi_post_terms ) : ?>
                <ul class="mi-p-headline__category mi-p-labels">
                    <?php
                        $mi_post_terms = array_slice( $mi_post_terms, 0, 1 );
                        foreach ( $mi_post_terms as $taxonomy ) :
                    ?>
                        <li><span class="mi-c-label mi-c-label--primary mi-c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>"><?php esc_html_e( $taxonomy->name ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
		<div class="mi-p-headline__contents">
			<p class="mi-p-headline__title mi-c-title"><?php the_title(); ?></p>
		</div>
    </a>
</article>
