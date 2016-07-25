<?php get_header(); ?>

  <div class="container">


    <div class="page-header">
      <div class="row">

        <div class="col-xs-9">
          <h1>Portfolio</h1>
        </div>
        <div class="col-xs-3 prev-next">
          <?php next_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-left"></span>' ); ?>
          <a href="<?php bloginfo('url'); ?>/?p=46"><span class="glyphicon glyphicon-th"></span></a>
          <?php previous_post_link( '%link', '<span class="glyphicon glyphicon-circle-arrow-right"></span>' ); ?>
        </div>

      </div>

    </div>

    <div class="row">


      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

      <div class="col-md-8 portfolio-image">

        <p><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'large' ); ?></a></p>

      </div>

      <div class="col-md-4">

         <h1><?php the_title(); ?></h1>
         <?php the_content(); ?>
         <p><a class="btn btn-large btn-primary" href="<?php the_field( 'link' ); ?>">View Final Piece <span class="glyphicon glyphicon-arrow-right"></span></a></p>
      </div>

      <?php endwhile; else: ?>

        <div class="page-header">
          <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

      <?php endif; ?>


    </div>

<?php get_footer(); ?>
