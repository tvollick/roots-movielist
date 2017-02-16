<?php use Roots\Sage\Titles; ?>

<div class="page-header_large">
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <?php $title = (get_field('subtitle')) ? get_field('subtitle') : Titles\title() ; ?>
        <h1><?= $title ?></h1>
      </div>
    </div>
  </div>
</div>
<?php if (has_post_thumbnail()) : ?>
  <?php $bg_src = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
  <div class="banner-bg" style="background-image: url('<?= $bg_src[0] ?>')">

  </div>
<?php endif ; ?>
