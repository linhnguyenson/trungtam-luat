<?php

/**

 * Initialize the custom Theme Options.

 */

add_action( 'admin_init', 'custom_theme_options' );



/**

 * Build the custom settings & update OptionTree.

 *

 * @return    void

 * @since     2.0

 */

function custom_theme_options() {
  
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array( 
      'content'       => array( 
        array(
          'id'        => 'option_types_help',
          'title'     => __( 'Option Types', 'thememe' ),
          'content'   => '<p>' . __( 'Help content goes here!', 'thememe' ) . '</p>'
        )
      ),
      'sidebar'       => '<p>' . __( 'Sidebar content goes here!', 'thememe' ) . '</p>'
    ),
    'sections'        => array( 
    
       array(
        'id'          => 'general',
        'title'       => __( 'General', 'thememe' )
      ),
        array(
        'id'          => 'home',
        'title'       => __( 'Home', 'thememe' )
      )
    ),
    'settings'        => array(

      //General
      array(
        'id'          => 'logo',
        'label'       => __( 'Logo', 'thememe' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',      
      ),
      array(
        'id'          => 'banner',
        'label'       => __( 'Banner', 'thememe' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general',      
      ),
      array(
        'id'          => 'footer',
        'label'       => __( 'Footer Text', 'thememe' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general',  
      ),

      array(
        'id'          => 'socials',
        'label'       => 'Socials',
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'general',
        'settings'    => array( 
          array(
            'id'          => 'link',
            'label'       => 'Link',
            'type'        => 'text',
          ),
          array(
            'id'          => 'icon',
            'label'       => 'Icon',
            'type'        => 'upload',
          )
        )
      ),

      //Home
      array(
        'id'          => 'home_slider',
        'label'       => __( 'Slider', 'thememe' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'list-item',
        'section'     => 'home',
        'settings'    => array( 
          array(
            'id'          => 'slider_des',
            'label'       => __( 'Description', 'thememe' ),
            'type'        => 'textarea',
          ),
          array(
            'id'          => 'slider_img',
            'label'       => __( 'Image', 'thememe' ),
            'type'        => 'upload',
          )
        )
      ),
      

      //end options
    )
  );
  
  /* allow settings to be filtered before saving */
  $custom_settings = apply_filters( 'option_tree_settings_args', $custom_settings );
  
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}