<div class="page-content-wrapper">
  <div class="page-content">
    <div class="page-content-bg"></div>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php the_content(); ?>
          <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
        </div>
      </div>
    </div>
  </div>
</div>
