<div class="item col-xs-12 col-sm-6 col-md-4">
<a href="<?php print drupal_get_path_alias('node/' . $row->nid); ?>">
  <div><?php print render($row->field_field_patrocinador_logo[0]['rendered']); ?></div>
  <p class="lead text-center"><?php print $row->node_title; ?></p>
</a>
</div>
