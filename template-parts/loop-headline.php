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
<article class="p-posts__item p-headline">
	<a href="<?php the_permalink(); ?>" class="p-headline__inner">
		<div class="p-headline__header">
            <time class="p-headline__date c-date" datetime="<?php the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

            <?php
            if ( $post->post_type === 'post' ) :
                $mo_term = 'category';
                $mo_post_terms = get_the_terms( $post->ID, $mo_term );
            ?>
                <?php if ( $mo_post_terms ) : ?>
                <ul class="p-headline__category p-labels">
                    <?php
                        $mo_post_terms = array_slice( $mo_post_terms, 0, 1 );
                        foreach ( $mo_post_terms as $taxonomy ) :
                    ?>
                        <li><span class="c-label c-label--primary c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>"><?php esc_html_e( $taxonomy->name ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
		<div class="p-headline__contents">
			<p class="p-headline__title c-title"><?php the_title(); ?></p>
		</div>
    </a>
</article>
