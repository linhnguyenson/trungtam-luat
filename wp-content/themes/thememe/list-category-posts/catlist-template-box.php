<?php
/*
Plugin Name: List Category Posts - Template "Default"
Plugin URI: http://picandocodigo.net/programacion/wordpress/list-category-posts-wordpress-plugin-english/
Description: Template file for List Category Post Plugin for Wordpress which is used by plugin by argument template=value.php
Version: 0.9
Author: Radek Uldrych & Fernando Briano
Author URI: http://picandocodigo.net http://radoviny.net
*/

$lcp_display_output = '';

$lcp_display_output .= "<div class='recents-box'>";

$lcp_display_output .= "<div class='box-content-header'><h2 class='widget-title heading-title'>";
$lcp_display_output .= $this->get_category_link();
$lcp_display_output .= "</h2></div>";

$lcp_display_output .= "<div class='carousel slide carousel-fade' data-ride='carousel'><div class=\"carousel-inner\" role=\"listbox\">";

$i = 0;
global $post;
while (have_posts()):
  the_post();

  $class = $i++ == 0 ? 'active' : '';
  $lcp_display_output .= "<div class='item $class'>";
//Show the title and link to the post:
  $lcp_display_output .= $this->get_post_title($post, '', 'lcp_post');
  $lcp_display_output .= "</div>";
endwhile;

$lcp_display_output .= "</div></div>";
$lcp_display_output .= "</div>";


$this->lcp_output = $lcp_display_output;