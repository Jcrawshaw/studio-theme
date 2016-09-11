<?php get_header(); ?>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php the_content(); ?>

        <?php endwhile; endif; ?>

      </div>
    </div>


    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
         <?php if ( dynamic_sidebar( 'front-left' ) ); ?>
        </div>
        <div class="col-md-4">
          <?php if ( dynamic_sidebar( 'front-middle' ) ); ?>
        </div>
        <div class="col-md-4">
          <?php if ( dynamic_sidebar( 'front-right' ) ); ?>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">

          <?php
        $args = array(
            'post_type' => 'project'
          );
          $the_query = new WP_Query( $args );

      ?>



        <div class="col-md-12" style="overflow: visible">
          <ul class="polaroids list-inline">
            <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
                <p><?php the_field( 'title' ); ?></p>
              </a>
            </li>
            <?php endwhile; endif; ?>
          </ul>
        </div>


      </div>


<?php get_footer(); ?>
