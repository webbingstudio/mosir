<?php
/**
 * loop-card.php
 * Repeated sections of a post, with featured image on the top and content on the bottom.
 * The entire loop is enclosed in a link.
 *
 * @package mosir
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
			<div class="mi-p-card__meta">
				<time class="mi-c-date" datetime="<?php the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

				<?php
				if ( $post->post_type === 'post' ) :
					$mi_term = 'category';
					$mi_post_terms = get_the_terms( $post->ID, $mi_term );
				?>
					<?php if ( $mi_post_terms ) : ?>
					<ul class="mi-p-labels">
						<?php
							$mi_post_terms = array_slice( $mi_post_terms, 0, 3 );
							foreach ( $mi_post_terms as $taxonomy ) :
						?>
							<li><span class="mi-c-label mi-c-label--primary mi-c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>"><?php esc_html_e( $taxonomy->name ); ?></span></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<p class="mi-p-card__title mi-c-title"><?php the_title(); ?></p>
		</div>
	</a>
</article>
