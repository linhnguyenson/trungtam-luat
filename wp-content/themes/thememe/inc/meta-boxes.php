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

  
    //Reviews
    array(

      'id'          => 'Reviews_settings',

      'title'       => __('Review Settings', 'thememe' ),

      'pages' => array('reviews'),

      'context'     => 'normal',

      'priority'    => 'high',

      'fields'      => array(
        array(
          'id'          => 'reviews_intro',
          'label'       => __( 'Giới thiệu vắn tắt', 'thememe' ),
          'type'        => 'textarea',
        ),
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

    ),

  //Reviews
    array(

      'id'          => 'calendar_settings',

      'title'       => __('Calendar Settings', 'thememe' ),

      'pages' => array('calendar'),

      'context'     => 'normal',

      'priority'    => 'high',

      'fields'      => array(
        
        array(
          'id'          => 'calendar_date_start',
          'label'       => __( 'Đăng kí từ ngày ', 'thememe' ),
          'type'        => 'date-picker',
        ),
        array(
          'id'          => 'calendar_date_end',
          'label'       => __( 'Đăng ký kết thúc', 'thememe' ),
          'type'        => 'date-picker',
        ),
        array(
          'id'          => 'calendar_date',
          'label'       => __( 'Ngày Khai giảng', 'thememe' ),
          'type'        => 'date-picker',
        ),
        array(
          'id'          => 'calendar_location',
          'label'       => __( 'Địa điểm', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_price',
          'label'       => __( 'Price', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_price_sell',
          'label'       => __( 'Sell off', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_contact_name',
          'label'       => __( 'Contact', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_contact_phone',
          'label'       => __( 'Phone', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_email',
          'label'       => __( 'Email', 'thememe' ),
          'type'        => 'text',
        ),
        array(
          'id'          => 'calendar_note',
          'label'       => __( 'Notes', 'thememe' ),
          'type'        => 'textarea',
        ),
        array(
          'id'          => 'calendar_attachment',
          'label'       => __( 'Attachment', 'thememe' ),
          'type'        => 'upload',
        ),

      )

    ),
    
    // gallery
     array(

      'id'          => 'listing_settings',

      'title'       => 'More Settings',

      'pages' => array('gallery'),

      'context'     => 'normal',

      'priority'    => 'high',

      'fields'      => array(

         array(

          'label'       => 'Gallery',

          'id'          => 'gallery',

          'type'        => 'gallery',

          'desc'        => '',

          'std'         => '',

        )

      )

    ),
  );


  

  /* load each metabox */

  foreach( $meta_args_array as $meta_args ) {

    ot_register_meta_box( $meta_args );


  }



}

?>