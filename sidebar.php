<?php
/**
 * sidebar.php
 * Sidebar template
 *
 * @package mosir
 */
?>
<div class="l-sidebar">
    <?php if ( is_active_sidebar( 'widget-sidebar-post' ) ) : ?>
    <div class="p-widgetArea p-widgetArea--sidebar p-widgetArea--sidebar-post">
        <div class="p-widgetArea__inner">
            <?php dynamic_sidebar( 'widget-sidebar-post' ); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
