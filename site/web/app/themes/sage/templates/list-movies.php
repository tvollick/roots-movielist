<?php
$args = array(
  'post_type' => 'listings',
  'posts_per_page' => 6
);
$wp_query = new WP_Query( $args );
if ($wp_query->have_posts()) :
?>
<div class="container">
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="movies-list">

        <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        <?php
          $bg_url = '';
          if (has_post_thumbnail()) :
            $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            $bg_url = $src[0];
          endif;

          $genres = wp_get_post_terms($post->ID, 'category' );

          // acf variables


        ?>
          <div class="card">
            <div class="card-block">
              <div class="movie-cover-wrapper" style="background-image: url('<?= $bg_url ?>')">

              </div>
              <div class="movie-content">
                <h2><?php the_title(); ?></h2>
                <?php if ( !empty($genres) ) : ?>
                  <div class="movie-genres">
                    <?php foreach($genres as $genre) {?>
                        <a href="#" class="btn btn-outline-secondary btn-sm">
                          <?= $genre->name ?>
                        </a>
                    <?php } ?>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>

      </div>
    </div>
  </div>
</div>
<?php endif; ?>
