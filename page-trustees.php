<?php
/*
  Template Name: Trustees Template
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

    <div class="wrap">

      <?php
        $args = array(
            'post_type' => 'trustee'
          );
          $the_query = new WP_Query( $args );

      ?>

      <?php if ( have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

      <div class="one-fourth team-div">

        <?php the_post_thumbnail('large'); ?>
        <div class="people-header">
          <div class="people-banner">
            <h3><a href="<?php the_permalink(); ?>"><?php the_field( 'name' ); ?></a></h3>
          </div>
          <h4><em><?php the_field( 'title' ); ?></em></h4>
          <div class="people-content">
            <span class="dashicons dashicons-welcome-learn-more"></span><h6><strong>Education: <?php if(get_field('education')): ?></strong></h6>

            <ul>

            <?php while(has_sub_field('education')): ?>

              <li><?php the_sub_field('school'); ?></li>

            <?php endwhile; ?>

            </ul>

          <?php endif; ?></p>

        <span class="dashicons dashicons-groups"></span><h6><strong>Member Since:</strong></h6>
          <ul>
            <li><?php the_field( 'member_since' ); ?></li>
          </ul>
        </div>
      </div>



      </div>

      <?php $team_count = $the_query->current_post + 1; ?>
      <?php if ( $team_count % 4 == 0): ?>

        </div><div class="row">

      <?php endif; ?>

      <?php endwhile; endif; ?>

    </div>

<?php get_footer(); ?>
