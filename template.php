<?php

/**
 * @file
 * template.php
 */

function sba_preprocess_html(&$variables) {
  if ($variables['head_title_array'] && !empty($variables['head_title_array']) && drupal_is_front_page()) {
    $variables['head_title_array']['title'] = t('Home');
    $variables['head_title'] = join(' | ', $variables['head_title_array']);
  }
}

function sba_preprocess_page(&$variables) {
  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
}

function sba_preprocess_node(&$variables) {
}

function sba_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav">' .$variables['tree'] . '</ul>';
}

function sba_preprocess_block(&$variables) {
  $block = $variables['block'];
  if ($block->region == 'top_header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
  $regiones = array(
    "sidebar_first",
    "footer_first_col",
    "footer_second_col",
    "footer_third_col",
    "footer_fourth_col",
  );

  if (in_array($block->region, $regiones) && !empty($block->subject))  {
    $block->subject = '<span>' . $block->subject . '</span>';
  }
}

function sba_preprocess_views_view(&$variables) {
  if ($variables['view']->name == 'calendario_de_torneos' && $variables['view']->current_display == 'block_1') {
    $variables['mini_calendar_month'] = strtolower(t(date('F', $variables['view']->date_info->month)));
  }
}

function sba_field__field_noticia_foto__noticia($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item ['#item']['uri'];
    $src = image_style_url('large', $uri);
    $output = '<img src="' . $src . '" class="img-responsive" typeof="foaf:Image">';
  }

  return $output;
}

function sba_field__field_galeria_foto__galeria($variables) {
  if ($variables['element']['#formatter'] == 'magnific_popup_file_field_formatter') {
    $output = '';

    // Render the label, if it's not hidden.
    if (!$variables ['label_hidden']) {
      $output .= '<div class="field-label"' . $variables ['title_attributes'] . '>' . $variables ['label'] . ':&nbsp;</div>';
    }

    // Render the items.
    foreach ($variables ['items'] as $delta => $item) {
      for ($i = 0; $i < count($variables['element']['#items']); $i++) {
        $item['item-' . $i]['#options']['attributes']['class'][] = 'col-md-4';
      }
      $output .= drupal_render($item);
    }

    return $output;
  }
}
