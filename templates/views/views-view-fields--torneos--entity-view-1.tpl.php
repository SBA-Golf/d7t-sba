<?php

/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
$url = '/node/' . $row->nid;
$torneo = node_load($row->node_field_data_field_edicion_torneo_nid);
$nombre_torneo = (str_replace(' ', '', strtolower($torneo->title)));
$torneo_url = (isset($row->field_field_edicion_web_torneo) && !empty($row->field_field_edicion_web_torneo)) ? $row->field_field_edicion_web_torneo[0]['raw']['url'] : '#';
$url = ($nombre_torneo == 'otrostorneos') ? $torneo_url : '/node/' . $row->nid;
?>
<a href="<?php print $url; ?>" class="thumb-info">
<?php foreach ($fields as $id => $field): ?>
<?php if ($id == 'title' || $id == 'field_imagen_torneo'): ?>
  <?php if (!empty($field->separator)): ?>
    <?php print $field->separator; ?>
  <?php endif; ?>

  <?php print $field->wrapper_prefix; ?>
    <?php print $field->label_html; ?>
    <?php print $field->content; ?>
  <?php print $field->wrapper_suffix; ?>
<?php endif; ?>
<?php endforeach; ?>
</a>

