<?php
/**
 * main-bottom.php
 *
 * @package mosir
 */
?>
<?php if ( is_active_sidebar( 'widget-main' ) ) : ?>
<div class="p-widgetArea p-widgetArea--main">
	<div class="p-widgetArea__inner">
		<?php dynamic_sidebar( 'widget-main' ); ?>
	</div>
</div>
<?php endif; ?>
