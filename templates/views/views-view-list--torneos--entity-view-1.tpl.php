<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php print $list_type_prefix; ?>
  <div class="row">
    <?php foreach ($rows as $id => $row): ?>
    <?php $color = $variables['view']->result[0]->field_field_torneo_color[0]['raw']['rgb']; ?>
      <li class="<?php print $classes_array[$id]; ?>">
        <div class="portfolio-item thumbnail" style="border: solid 3px <?php print $color; ?>;background-color: <?php print $color; ?>">
          <?php print $row; ?>
        </div>
      </li>
    <?php endforeach; ?>
  </div>
  <?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
