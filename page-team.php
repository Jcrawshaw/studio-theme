<?php
/*
  Template Name: Team Template
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
            'post_type' => 'team'
          );
          $the_query = new WP_Query( $args );

      ?>

      <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="col-sm-3 team-member">

        <?php the_post_thumbnail('large'); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <h4><?php the_field( 'team_title' ); ?></h4>
        <p><?php the_field( 'team_bio' ); ?></p>
        <img src="<?php the_field('team_photo'); ?>">




      </div>

      <?php $team_count = $the_query->current_post + 1; ?>
      <?php if ( $team_count % 4 == 0): ?>

        </div><div class="row">

      <?php endif; ?>

      <?php endwhile; endif; ?>

    </div>

<?php get_footer(); ?>
