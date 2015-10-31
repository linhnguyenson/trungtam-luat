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

      'title'       => 'Review Settings',

      'pages' => array('reviews'),

      'context'     => 'normal',

      'priority'    => 'high',

      'fields'      => array(

        array(
          'id'          => 'reviews_rate',
          'label'       => __( 'Rated', 'nopoopstain' ),
          'type'        => 'numeric-slider',
          'section'     => 'your_section',
          'min_max_step'=> '1,5,1',
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