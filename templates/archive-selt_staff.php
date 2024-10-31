<?php
/**
* Staff Archive templates
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/


//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
   exit;
}

  get_header();

  if ( get_query_var( 'paged' ) ) :
		$paged = get_query_var( 'paged' );
	elseif ( get_query_var( 'page' ) ) :
		$paged = get_query_var( 'page' );
	else :
		$paged = 1;
	endif;


  $staff_query = new WP_Query( array(
    'post_type'   => 'selt_staff',
    'paged'       =>  $paged,
  ));

 ?>


<section class="sel-staff">

  <div class="container">

    <header class="page-header">
      <h1 class="page-title"><?php echo str_replace("Archives: ", "", get_the_archive_title()); ?></h1>
    </header>

    <div class="row">

    <?php if ( $staff_query->have_posts() ) : $i = 1; while ( $staff_query->have_posts() ) : $staff_query->the_post(); ?>

      <div class="col-md-3">
        <article class="sel-staff-item">
          <figure>
            <div class="staff-thumbnail">
              <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            </div>

            <figcaption>
              <a href="<?php the_permalink(); ?>"><h4 class="entry-title" rel="bookmark"><?php the_title(); ?></h4></a>

              <?php
                selt_staff_title();
                selt_staff_get_the_group();
                selt_staff_social_links();
              ?>

              <?php if ( ! empty( get_the_excerpt() ) ) : ?>
                <p class="excerpt">
                  <?php echo get_the_excerpt(); ?>
                </p>
              <?php endif; ?>

            </figcaption>

          </figure>
        </article>
      </div>

    <?php

    if ( $i % 4 === 0 ) {
      echo '</div><div class="row">';
    }

    $i++; endwhile; ?>

    </div>

    <?php

    the_posts_pagination( array(
  		'mid_size' => 2,
  		'prev_text' => __( 'Back', 'tsiyyon' ),
  		'next_text' => __( 'Next', 'tsiyyon' ),
  	) );

  	wp_reset_query();

    ?>



  <?php else : ?>

  	<section class="no-results not-found">
  		<header class="page-header">
  			<h1 class="page-title text-center"><?php esc_html_e( 'Staff Not Found', 'tsiyyon' ); ?></h1>
  		</header>
  	</section>

  <?php endif; ?>

  </div>

</section>

<?php get_footer();
