<?php $color = $view->result[$view->row_index]->field_field_torneo_color[0]['raw']['rgb']; ?>
<h2 class="large-title center" style="background-color: <?php print $color; ?>">
  <?php print $title; ?>
</h2>
<?php
foreach ($rows as $id => $row) {
  print $row;
}
?>
