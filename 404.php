<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mosir
 */

get_header();
?>
<?php get_template_part( 'template-parts/pageHeader' ); ?>
<div class="l-content">
    <section class="p-error p-error--404">
        <div class="p-error__contents <?php mosi_wp_block_class(); ?>">
            <p><?php echo __( 'We couldn’t seem to find the page you’re looking for.<br>The content may have been moved or deleted. <br>Please take the time to search for the content from the Home.', 'mosir' ); ?></p>
        </div>
        <div class="p--error__footer">
            <div class="p--error__footer__contents l-container l-container--sm">
                <div class="p-buttons">
                    <a class="c-button" href="<?php echo esc_url( home_url() ); ?>"><?php echo __( 'Back to Home', 'mosir' ); ?></a>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
get_footer();
