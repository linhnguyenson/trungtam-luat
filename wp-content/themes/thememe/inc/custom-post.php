<?php

//----------------------------------------------
//----------register and label reviews post type
//----------------------------------------------
$reviews_labels = array(
    'name' => _x('Reviews', 'post type general name'),
    'singular_name' => _x('Reviews', 'post type singular name'),
    'add_new' => _x('Add New', 'reviews'),
    'add_new_item' => __("Add New Reviews"),
    'edit_item' => __("Edit Reviews"),
    'new_item' => __("New Reviews"),
    'view_item' => __("View Reviews"),
    'search_items' => __("Search Reviews"),
    'not_found' =>  __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'),
    'parent_item_colon' => ''
        
);
$reviews_args = array(
    'labels' => $reviews_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_icon' => 'dashicons-id-alt'
);
register_post_type('reviews', $reviews_args);



//----------------------------------------------
//--------------------------admin custom columns
//----------------------------------------------
//admin_init
add_action('manage_posts_custom_column', 'jss_custom_columns');
add_filter('manage_edit-reviews_columns', 'jss_add_new_reviews_columns');
 
function jss_add_new_reviews_columns( $columns ){
    $columns = array(
        'cb'                =>        '<input type="checkbox">',
        'jss_post_thumb'    =>        'Thumbnail',
        'title'                =>        'Reviews Title',
        'date'                =>        'Date'
        
    );
    return $columns;
}
 
function jss_custom_columns( $column ){
    global $post;
    
    switch ($column) {
        case 'jss_post_thumb' : echo the_post_thumbnail(array(64, 64)); break;
        case 'description' : the_excerpt(); break;
       
    }
}
 
//add thumbnail images to column
add_filter('manage_posts_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_pages_columns', 'jss_add_post_thumbnail_column', 5);
add_filter('manage_custom_post_columns', 'jss_add_post_thumbnail_column', 5);
 
// Add the column
function jss_add_post_thumbnail_column($cols){
    $cols['jss_post_thumb'] = __('Thumbnail');
    return $cols;
}
 
function jss_display_post_thumbnail_column($col, $id){
  switch($col){
    case 'jss_post_thumb':
      if( function_exists('the_post_thumbnail') )
        echo the_post_thumbnail( 'admin-list-thumb' );
      else
        echo 'Not supported in this theme';
      break;
  }
}



//----------------------------------------------
//----------register and label calendar post type
//----------------------------------------------
$calendar_labels = array(
    'name' => _x('Calendar', 'post type general name'),
    'singular_name' => _x('Calendar', 'post type singular name'),
    'add_new' => _x('Add New', 'calendar'),
    'add_new_item' => __("Add New Calendar"),
    'edit_item' => __("Edit Calendar"),
    'new_item' => __("New Calendar"),
    'view_item' => __("View Calendar"),
    'search_items' => __("Search Calendar"),
    'not_found' =>  __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'),
    'parent_item_colon' => ''
        
);
$calendar_args = array(
    'labels' => $calendar_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'editor', 'thumbnail'),
    'menu_icon' => 'dashicons-calendar'
);
register_post_type('calendar', $calendar_args);

add_action( 'init', 'jss_create_calendar_taxonomies', 0);
 
function jss_create_calendar_taxonomies(){
    register_taxonomy(
        'calendartype', 'calendar',
        array(
            'hierarchical'=> true,
            'label' => 'Calendar Types',
            'singular_label' => 'Calendar Type',
            'rewrite' => true
        )
    );    
}


//----------------------------------------------
//----------register and label gallery post type
//----------------------------------------------
$gallery_labels = array(
    'name' => _x('Gallery', 'post type general name'),
    'singular_name' => _x('Gallery', 'post type singular name'),
    'add_new' => _x('Add New', 'gallery'),
    'add_new_item' => __("Add New Gallery"),
    'edit_item' => __("Edit Gallery"),
    'new_item' => __("New Gallery"),
    'view_item' => __("View Gallery"),
    'search_items' => __("Search Gallery"),
    'not_found' =>  __('No galleries found'),
    'not_found_in_trash' => __('No galleries found in Trash'),
    'parent_item_colon' => ''
        
);
$gallery_args = array(
    'labels' => $gallery_labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'capability_type' => 'post',
    'supports' => array('title', 'thumbnail'),
    'menu_icon' => 'dashicons-format-gallery'
);
register_post_type('gallery', $gallery_args);

add_action( 'init', 'update_my_custom_type', 99 );
 
/**
 * update_my_custom_type
 *
 * @author  Joe Sexton <joe@webtipblog.com>
 */
function update_my_custom_type() {
    global $wp_post_types;
 
    if ( post_type_exists( 'gallery' ) ) {
 
        // exclude from search results
        $wp_post_types['gallery']->exclude_from_search = true;
    }

    if ( post_type_exists( 'reviews' ) ) {
 
        // exclude from search results
        $wp_post_types['reviews']->exclude_from_search = true;
    }
}