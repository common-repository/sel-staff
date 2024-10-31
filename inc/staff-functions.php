<?php
/**
* Sel Staff Helper Functions
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/


/**
 * Exit if accessed directly
 */
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}



/**
 * Get Staff Social Icons
 */
function selt_staff_social_links() {

  $get_social_icons =  get_post_meta( get_the_ID(), '_selthemes_staff_icon_group', true );

  if ( ! empty( $get_social_icons ) ) :

  ?>

  <div class="staff-social-links">

  <?php

  foreach ( (array) $get_social_icons as $entry ) {

    $icon = $icon_url = '';

    if ( isset( $entry['icon'] ) ) {
      $icon = esc_html( $entry['icon'] );
    }

    if ( isset( $entry['icon_url'] ) ) {
      $icon_url = esc_url( $entry['icon_url'] );
    }

    echo '<a href="'. esc_url( $icon_url ) .' "><i class="fa fa-'. esc_attr( $icon ) .'"></i></a>';

  }

  ?>

  </div>

  <?php

  endif;

}


/**
 * Get Title
 */
function selt_staff_title() {

  $get_staff_title  =  get_post_meta( get_the_ID(), '_selthemes_staff_title', true );

  if ( ! empty( $get_staff_title ) ) {

    echo sprintf('<p class="staff-title">%1$s</p>', $get_staff_title);

	}

}


/**
 * Get Staff Group
 */
function selt_staff_get_the_group() {

  $category_list = get_the_term_list( get_the_ID(), 'selt_staff_group', '', esc_html__( ', ', 'selthemes' ) );

  if ( ! empty( $category_list ) ) :

    echo sprintf('<p class="post-meta"><span class="tags-links">%1$s</span></p>', $category_list);

  endif;
}



/**
 * Prints  Pagination.
 */
function selt_staff_page_links() {
	// Show only more than one post.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>

	<nav class="navigation post-navigation" role="navigation">
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="nav-link-label">&larr; Previous</span>%title', '', 'selthemes_portfolio' ) );
				next_post_link( '<div class="nav-next">%link</div>',  _x( '<span class="nav-link-label">Next &rarr;</span>%title', '',     'selthemes' ) );
			?>
		</div>
	</nav>

	<?php
}



?>
