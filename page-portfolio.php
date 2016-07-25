<?php
/*
  Template Name: Portfolio Grid Template
*/

?>
<?php get_header(); ?>

  <div class="container">
    <div class="row">

      <div class="col-md-12">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="page-header">
            <h1><?php the_title(); ?></h1>
          </div>

          <?php the_content(); ?>

        <?php endwhile; else: ?>

          <div class="page-header">
            <h1>Oh no!</h1>
          </div>

          <p>No content is appearing for this page!</p>

        <?php endif; ?>

      </div>

    </div>

    <div class="row">

      <?php
        $args = array(
            'post_type' => 'portfolio'
          );
          $the_query = new WP_Query( $args );

      ?>

      <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="col-sm-3 portfolio-piece">

        <?php
         $thumbnail_id = get_post_thumbnail_id();
         $thumbnail_url = wp_get_attachment_imgage_src( '$thumbnail_id', 'thumbnail-size', true );
        ?>


        <p><?php the_post_thumbnail( 'medium' ); ?></p>
        <h3><?php the_title(); ?></h3>

      </div>

      <?php endwhile; endif; ?>

    </div>

<?php get_footer(); ?>
