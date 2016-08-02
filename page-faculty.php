<?php
/*
  Template Name: Faculty Template
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
            'post_type' => 'staff'
          );
          $the_query = new WP_Query( $args );

      ?>

      <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="col-sm-3 team-member">

        <?php the_post_thumbnail('large'); ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_field( 'name' ); ?></a></h2>
        <h4><?php the_field( 'title' ); ?></h4>

        <p>Education: <?php if(get_field('education')): ?>

            <ul>

            <?php while(has_sub_field('education')): ?>

              <li><?php the_sub_field('school'); ?></li>

            <?php endwhile; ?>

            </ul>

          <?php endif; ?></p>

        <p><?php the_field( 'from' ); ?></p>




      </div>

      <?php $team_count = $the_query->current_post + 1; ?>
      <?php if ( $team_count % 4 == 0): ?>

        </div><div class="row">

      <?php endif; ?>

      <?php endwhile; endif; ?>

    </div>

<?php get_footer(); ?>
