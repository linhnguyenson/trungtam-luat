<?php

/**
 * Initialize the meta boxes before anything else.
 */

add_action( 'admin_init', '_custom_meta_boxes' );

/**
 * Builds the Meta Boxes.
 */

function _custom_meta_boxes() {

  $meta_args_array = array(

  
    //Rooms
    array(

      'id'          => 'Reviews_settings',

      'title'       => __('Review Settings', 'thememe' ),

      'pages' => array('reviews'),

      'context'     => 'normal',

      'priority'    => 'high',

      'fields'      => array(

        array(
          'id'          => 'reviews_email',
          'label'       => __( 'Email', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'reviews_fb',
          'label'       => __( 'Facebook', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'reviews_linkedin',
          'label'       => __( 'Linkedin', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'reviews_google_plus',
          'label'       => __( 'Google +', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'reviews_youtube',
          'label'       => __( 'Youtube', 'thememe' ),
          'type'        => 'text',
        )

      )

    )

  );


  

  /* load each metabox */

  foreach( $meta_args_array as $meta_args ) {

    ot_register_meta_box( $meta_args );


  }



}

?>