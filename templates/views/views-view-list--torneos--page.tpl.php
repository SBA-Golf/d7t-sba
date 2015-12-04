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
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
