<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Saraswati_Blog
 */

global $saraswati_blog_theme_options;
$designlayout = $saraswati_blog_theme_options['saraswati-blog-layout'];

if ( ! is_active_sidebar( 'sidebar-1' ) || 'no-sidebar' == $designlayout ) 
{
	return;
}
?>


<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
