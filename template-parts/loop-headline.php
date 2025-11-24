<?php
/**
 * loop-headline.php
 * Repeated sections of a posts without featured image.
 * Titles and term label are given individual links.
 * Only the first term label in a post is displayed.
 * Post meta will be aligned in a single line if the window width is wide.
 *
 * @package ws-minimalism
 */
?>
<article class="mi-p-posts__item mi-p-headline">
	<div class="mi-p-headline__inner">
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
                        <li><a class="mi-c-label mi-c-label--primary mi-c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>" href="<?php echo esc_url( get_term_link( $taxonomy->slug, $mi_term ) ); ?>"><?php esc_html_e( $taxonomy->name ); ?></a></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
		<div class="mi-p-headline__contents">
			<p class="mi-p-headline__title mi-c-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
		</div>
    </div>
</article>
