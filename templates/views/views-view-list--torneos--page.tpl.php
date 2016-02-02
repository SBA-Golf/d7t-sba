<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
    <?php foreach ($rows as $id => $row): ?>
      <li class="<?php print $classes_array[$id]; ?>">
      <?php 
        $node = node_load($view->result[$id]->nid);
        $color = field_get_items('node',$node,'field_torneo_color');
      ?>
        <div class="portfolio-item thumbnail">
          <?php print $row; ?>
        </div>
      </li>
    <?php endforeach; ?>
<?php if ($view->current_display == "page"): ?>
<li class="col-xs-12 col-sm-6">
<div class="portfolio-item thumbnail">
<article class="node-torneo teaser">
<?php
  $otros = node_load(223);
  $miniatura = field_get_items('node',$otros,'field_imagen_torneo');
  $src = file_create_url($miniatura[0]['uri']);
  $img_style = image_style_url('panoramica_media',$miniatura[0]['uri']);
?>
  <a href="/otros-torneos" class="thumb-info">
    <img class="img-responsive" typeof="foaf:Image" src="<?php print $img_style; ?>">
    <span class="thumb-info-title" style="background-color: #777">Otros Torneos</span>
    <span class="thumb-info-action">
      <span class="thumb-info-action-icon" href="#" style="background-color: #777">
        <i class="glyphicon glyphicon-search"> </i>
      </span>
    </span>
  </a>
</article>
</div>
</li>
<?php endif; ?>

  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
