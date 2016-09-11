<?php get_header(); ?>

  <div class="container">


    <div class="page-header">
      <div class="row">

        <div class="col-xs-9 project-page">
          <h1>Projects</h1>
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
        <ul class="polaroids polaroids-large">
          <li>
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail( 'large' ); ?>
          <p><?php the_field( 'title' ); ?></p>
        </a>
        <li>
      </ul>
      </div>

      <div class="col-md-4 project-info">

         <h1><?php the_field( 'name' ); ?></h1>
         <?php the_field( 'description' ); ?>
         <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#contactForm">
  Contact Me <span class="glyphicon glyphicon-arrow-right"></span></button>
      </div>

      <?php endwhile; else: ?>

        <div class="page-header">
          <h1>Oh no!</h1>
        </div>

        <p>No content is appearing for this page!</p>

      <?php endif; ?>


    </div>

<?php get_footer(); ?>
