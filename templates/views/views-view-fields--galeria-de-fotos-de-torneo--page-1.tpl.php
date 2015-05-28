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
?>
<div class="portfolio-item">
  <div class="portfolio-item-preview">
    <a href="#">
      <?php
        $uri = $variables['row']->field_field_galeria_foto[0]['raw']['uri'];
        $src = image_style_url('square_300x300', $uri);
      ?>
      <img src="<?php print $src; ?>" class="img-responsive" typeof="foaf:Image">
    </a>
    <div class="portfolio-item-overlay">
      <div class="portfolio-item-overlay-actions">
        <a class="magnificPopup-gallery portfolio-item-zoom">
          <i class="glyphicon glyphicon-search"> </i>
        </a>
        <a class="portfolio-item-link">
          <i class="glyphicon glyphicon-link"> </i>
        </a>
      </div>
      <div class="portfolio-item-description">
        <h4><?php print $fields['title']->content; ?></h4>
      </div>
    </div>
  </div>
</div>
