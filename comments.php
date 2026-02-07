<?php
/**
 * comments.php
 *
 * Referencing the _s theme
 * https://github.com/Automattic/_s/blob/master/comments.php
 *
 * @package mosir
 */

// If the current post is protected by a password and
// the visitor has not yet entered the password we will
// return early without loading the comments.

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="p-comments l-container l-container--sm">

	<?php
	if ( have_comments() ) :
		?>
		<p class="p-comments__title c-title c-title--lv3">
		<?php
			$mosi_comment_count = get_comments_number();
			// translators: 1: comment count number, 2: title.
			$mosi_comment_title = (int)$mosi_comment_count === 1 ? __( '%1$s thought on &ldquo;%2$s&rdquo;', 'mosir' ) : __( '%1$s thoughts on &ldquo;%2$s&rdquo;', 'mosir' );

			printf( 
				esc_html( $mosi_comment_title ),
				number_format_i18n( $mosi_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				'<span class="p-comments__title__label">' . wp_kses_post( get_the_title() ) . '</span>'
			);
		?>
		</p>

		<?php the_comments_navigation(); ?>

		<div class="p-comments__list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'div',
					'short_ping' => true,
				)
			);
			?>
		</div>

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="p-comments__notice"><?php echo __( 'Comments are closed.', 'mosir' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div>