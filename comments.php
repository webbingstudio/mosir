<?php
/**
 * comments.php
 * コメントリスト用テンプレート
 *
 * Referencing the _s theme
 * https://github.com/Automattic/_s/blob/master/comments.php
 *
 * @package mosir
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="u-p--t-lg u-p--b-lg p-comments l-container l-container--sm">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<p class="p-comments__title c-title c-title--lv3">
			<?php
			$_s_comment_count = get_comments_number();
			if ( '1' === $_s_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'mosir' ),
					'<span class="p-comments__title__label">' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $_s_comment_count, 'comments title', '_s' ) ),
					number_format_i18n( $_s_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span class="p-comments__title__label">' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
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
			<p class="p-comments__notice"><?php esc_html_e( 'Comments are closed.', '_s' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form();
	?>

</div>