<?php
/**
 * loop-media.php
 * Repeated sections of a post, with featured image on the left and content on the right.
 * The entire loop is enclosed in a link.
 *
 * @package mosir
 */
?>
<article class="p-posts__item p-media">
	<a class="p-media__inner" href="<?php the_permalink(); ?>">
		<figure class="p-media__image c-picture c-picture--1to1">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'medium' ); ?>
			<?php else : ?>
				<img src="<?php echo esc_url( get_theme_file_uri( 'assets/images/common/noimage.jpg' ) ); ?>" alt="">
			<?php endif; ?>
		</figure>
		<div class="p-media__contents">
			<div class="p-media__meta">
				<time class="c-date" datetime="<?php the_time('c'); ?>"><?php the_time( get_option( 'date_format' ) ); ?></time>

				<?php
				if ( $post->post_type === 'post' ) :
					$mo_term = 'category';
					$mo_post_terms = get_the_terms( $post->ID, $mo_term );
				?>
					<?php if ( $mo_post_terms ) : ?>
					<ul class="p-labels">
						<?php
							$mo_post_terms = array_slice( $mo_post_terms, 0, 3 );
							foreach ( $mo_post_terms as $taxonomy ) :
						?>
							<li><span class="c-label c-label--primary c-label--term-<?php esc_html_e( $taxonomy->slug ); ?>"><?php esc_html_e( $taxonomy->name ); ?></span></li>
						<?php endforeach; ?>
					</ul>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<p class="p-media__title c-title"><?php echo get_the_title() ? esc_html( get_the_title() ) : '(タイトルなし)'; ?></p>
		</div>
	</a>
</article>
