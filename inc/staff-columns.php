<?php

/**
* Create Admin Column for featured image
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
 exit;
}


add_filter('manage_selthemes_staff_posts_columns', 'selt_staff_columns_head');
add_action('manage_selthemes_staff_posts_custom_column', 'selt_staff_columns', 10, 2);

function selt_staff_columns_head($defaults){
    $defaults['staff_featured_image_preview'] = esc_html__('Thumbnail', 'selthemes'); //name of the column
    return $defaults;
}

function selt_staff_columns($column_name, $id){
        if($column_name === 'staff_featured_image_preview'){
        echo the_post_thumbnail( array(50,50) ); //size of the thumbnail
    }
}

?>
