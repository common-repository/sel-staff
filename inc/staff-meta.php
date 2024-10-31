<?php
/**
* Sel Staff custom metabox.
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
 exit;
}


add_action( 'cmb2_admin_init', 'selt_staff_meta' );

function selt_staff_meta() {

	$prefix = '_selthemes_staff_';

	/**
	 * Initiate the metabox
	 */
	$cmb = new_cmb2_box( array(
		'id'            => 'selthemes_staff_data',
		'title'         => esc_html__( 'Staff Details', 'selthemes' ),
		'object_types'  => array( 'selt_staff', ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

    /**
     * Staff Title
     */
    $cmb->add_field( array(
    	'name' => 'Staff Title',
    	'desc' => 'Position or Designations of Staff',
    	'id'   => $prefix . 'title',
    	'type' => 'text',
		  'column' => array(
  			'position' => 1,
  			'name'     => 'Title',
  		),
    ) );

    /**
     * Staff Social Follow Icons
     */
    $group_field_id = $cmb->add_field( array(
    	'id'           => $prefix . 'icon_group',
    	'type'        => 'group',
    	'options'     => array(
    		'group_title'   => __( 'Social Follow Icon {#}', 'selthemes' ), // since version 1.1.4, {#} gets replaced by row number
    		'add_button'    => __( 'Add New Icon', 'selthemes' ),
    		'remove_button' => __( 'Remove Icon', 'selthemes' ),
    	),
    ) );

      /**
       * ICON
       */
      $cmb->add_group_field( $group_field_id, array(
        'name'    => __( 'Social Follow Icon Name' ),
        'desc'    => 'Enter the icon name in lowercase letters. Example: "facebook-official". Find icons on fontawesome.io/icons',
      	'id'      => 'icon',
      	'type'    => 'text',
      ) );


      /**
       * ICON URL
       */
      $cmb->add_group_field( $group_field_id, array(
        'name'    => __( 'Social Follow Icon URL' ),
      	'id'      => 'icon_url',
      	'type'    => 'text_url',
      ) );

}

?>
