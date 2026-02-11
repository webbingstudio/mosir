<?php
/**
 * loop-headline.php
 * Repeated posts without featured images.
 * The entire loop is surrounded by a link.
 * If the post type is "Post", the first term label related to the post is displayed.
 * If the window width is wider, post meta information is displayed aligned to a single line.
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
                $mosi_term = 'category';
                $mosi_post_terms = get_the_terms( $post->ID, $mosi_term );
            ?>
                <?php if ( $mosi_post_terms ) : ?>
                <ul class="p-headline__category p-labels">
                    <?php
                        // If you want to get multiple or all terms, change the second argument of array_slice.
                        $mosi_post_terms = array_slice( $mosi_post_terms, 0, 1 );
                        foreach ( $mosi_post_terms as $taxonomy ) :
                    ?>
                        <li><span class="c-label c-label--term-<?php echo esc_html( $taxonomy->slug ); ?>"><?php echo esc_html( $taxonomy->name ); ?></span></li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            <?php endif; ?>
        </div>
		<div class="p-headline__contents">
			<p class="p-headline__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(No title)'; ?></p>
		</div>
    </a>
</article>
