<?php

/**
* Staff Single templates
*
* @since 1.0.0
* @package Selthemes
* @subpackage Sel Staff
*/


get_header();

//Exit if accessed directly
if ( ! defined ( 'ABSPATH' ) ) {
    exit;
}

?>

<section class="sel-staff-single">

<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">

          <header class="entry-header">
        		<h1 class="entry-title"><?php the_title(); ?></h1>
        	</header>

          <article>
            <div class="staff-thumbnail">
              <?php the_post_thumbnail(); ?>
            </div>

            <div class="staff-details">


              <?php if ( ! empty( get_the_excerpt() ) ) : ?>
                <p class="excerpt">
                  <?php echo get_the_excerpt(); ?>
                </p>
              <?php endif; ?>

              <?php
                selt_staff_title();
                selt_staff_get_the_group();
                selt_staff_social_links();
              ?>

            </div>

            <div class="single-content">
              <?php the_content(); ?>
            </div>

            <?php

              // Next / Previouse Post Links
              selt_staff_page_links();

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                comments_template();
              endif;

              endwhile; endif;

            ?>


          </article>
        </div>
      </div>

    </div>

  </div><!--End Container-->
</section>

<?php get_footer (); ?>
