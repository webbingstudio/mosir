<?php
/**
 * loop-card.php
 * Repeated sections of a post, with featured image on the top and content on the bottom.
 * The entire loop is enclosed in a link.
 *
 * @package mosir
 */
?>
<article class="p-posts__item p-card">
	<a class="p-card__inner" href="<?php the_permalink(); ?>">
		<figure class="p-card__image c-picture c-picture--16to9">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="p-card__contents">
			<div class="p-card__meta">
				<time class="c-date" datetime="<?php the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

				<?php
				if ( $post->post_type === 'post' ) :
					$mosi_term = 'category';
					$mosi_post_terms = get_the_terms( $post->ID, $mosi_term );
				?>
					<?php if ( $mosi_post_terms ) : ?>
					<ul class="p-card__terms p-labels">
						<?php
							// If you want to get multiple or all terms, change the second argument of array_slice.
							// (CSS needs to be modified)
							$mosi_post_terms = array_slice( $mosi_post_terms, 0, 1 );
							foreach ( $mosi_post_terms as $taxonomy ) :
						?>
							<li><span class="c-label c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>"><?php esc_html_e( $taxonomy->name ); ?></span></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<p class="p-card__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(タイトルなし)'; ?></p>
		</div>
	</a>
</article>
