<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thememe
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<div id="sidebar-footer">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
</div><!-- #secondary -->
