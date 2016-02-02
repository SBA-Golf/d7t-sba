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

  // Google Map
  /*
  if (theme_get_setting('google_map_js', 'sba')) {
    drupal_add_js('jQuery(document).ready(function($) {
      var map;
      var myLatLon;
      var myZoom;
      var marker;
    });', array('type' => 'inline', 'scope' => 'header'));

    drupal_add_js('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('type' => 'external', 'scope' => 'header', 'group' => 'JS_THEME'));
    $google_map_latitude = theme_get_setting('google_map_latitude','sba');
    drupal_add_js(array('sba' => array('google_map_latitude' => $google_map_latitude)), 'setting');
    $google_map_longitude = theme_get_setting('google_map_longitude','sba');
    drupal_add_js(array('sba' => array('google_map_longitude' => $google_map_longitude)), 'setting');
    $google_map_zoom = (int) theme_get_setting('google_map_zoom','sba');
    $google_map_canvas = theme_get_setting('google_map_canvas','sba');
    drupal_add_js(array('sba' => array('google_map_canvas' => $google_map_canvas)), 'setting');

    drupal_add_js('jQuery(document).ready(function($) {
      if ($("#'.$google_map_canvas.'").length) {
        myLatLon = new google.maps.LatLng(Drupal.settings.sba[\'google_map_latitude\'],Drupal.settings.sba[\'google_map_longitude\']);
        myZoom = '.$google_map_zoom.';

        function initialize() {
          var mapOptions = {
            zoom: myZoom,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            center: myLatLon,
            scrollwheel: false
          };

          map = new google.maps.Map(document.getElementById(Drupal.settings.sba[\'google_map_canvas\']),mapOptions);

          marker = new google.maps.Marker({
            map: map,
            draggable: true,
            position: myLatLon
          });
 
          google.maps.event.addDomListener(window, "resize", function() {
            map.setCenter(myLatLon);
          });

        }

        google.maps.event.addDomListener(window, "load", initialize);

      }
      });',array('type' => 'inline', 'scope' => 'header'));
  }
   */
}

function sba_preprocess_page(&$variables) {
  // Primary nav
  $variables['primary_nav'] = FALSE;
  if ($variables['main_menu']) {
    $variables['primary_nav'] = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary');
  }
  $variables['secondary_nav'] = FALSE;
  if ($variables['secondary_menu']) {
    $variables['secondary_nav'] = menu_tree(variable_get('menu_user_links_source', 'user-menu'));
    $variables['secondary_nav']['#theme_wrappers'] = array('menu_tree__secondary');
  }

  // Page suggestions
  if (isset($variables['node'])) {
    $node = $variables['node'];
    $suggestion = 'page__' . str_replace('-', '--', $node->type);
    $variables['theme_hook_suggestions'][] = $suggestion;
  }
}

function sba_preprocess_node(&$variables) {
}

function sba_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav">' .$variables['tree'] . '</ul>';
}
function sba_menu_tree__secondary(&$variables) {
  return '<ul id="user-menu" class="list-inline text-right">' .$variables['tree'] . '</ul>';
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

  if ($variables['is_front'] && $block->delta == 'main') {
    $variables['content'] = '<div class="row">' . $variables['content'] . '</div>';
  }

}

function sba_pager($variables) {
  //
}

function sba_preprocess_views_view(&$variables) {
  if ($variables['view']->name == 'calendario_de_torneos' && $variables['view']->current_display == 'block_1') {
    $variables['mini_calendar_month'] = strtolower(t(date('F', $variables['view']->date_info->month)));
  }
}

function sba_field__field_imagen_intro__nosotros($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item ['#item']['uri'];
    //$src = image_style_url('large', $uri);
    $src = file_create_url($uri);
    $output = '<img src="' . $src . '" class="img-responsive center-block" typeof="foaf:Image">';
  }

  return $output;
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

function sba_field__field_imagen_torneo__torneo($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item ['#item']['uri'];
    $src = image_style_url('panoramica_media', $uri);
    $output = '<img src="' . $src . '" class="img-responsive" typeof="foaf:Image">';
  }
  return $output;
}

function sba_field__field_imagen__actividad($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item ['#item']['uri'];
    $src = image_style_url('panoramica_media', $uri);
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

function sba_field__field_patrocinador_logo__patrocinador($variables) {
  $output = '';

  foreach ($variables ['items'] as $delta => $item) {
    $uri = $item ['#item']['uri'];
    $src = image_style_url('large', $uri);
    $output = '<img src="' . $src . '" class="img-responsive" typeof="foaf:Image">';
  }

  return $output;
}

function sba_field__field_partido_patrocinadores__partido($variables) {
  //$output = '<div class="row">';
  $output = '';

  foreach ($variables['items'] as $delta => $item) {
    $output .= '<div class="col-md-4">';
    $output .= render($item['node']);
    $output .= '</div>';
  }

  //$output .= '</div>';

  return $output;
}

function sba_table($variables) {
  $variables['attributes']['class'][] = 'table';
  $variables['attributes']['class'][] = 'table-striped';

  $header = $variables['header'];
  $rows = $variables['rows'];
  $attributes = $variables['attributes'];
  $caption = $variables['caption'];
  $colgroups = $variables['colgroups'];
  $sticky = $variables['sticky'];
  $empty = $variables['empty'];

  // Add sticky headers, if applicable.
  if (count($header) && $sticky) {
    drupal_add_js('misc/tableheader.js');
    // Add 'sticky-enabled' class to the table to identify it for JS.
    // This is needed to target tables constructed by this function.
    $attributes['class'][] = 'sticky-enabled';
  }

  $output = '<table' . drupal_attributes($attributes) . ">\n";

  if (isset($caption)) {
    $output .= '<caption>' . $caption . "</caption>\n";
  }

  // Format the table columns:
  if (count($colgroups)) {
    foreach ($colgroups as $number => $colgroup) {
      $attributes = array();

      // Check if we're dealing with a simple or complex column
      if (isset($colgroup['data'])) {
        foreach ($colgroup as $key => $value) {
          if ($key == 'data') {
            $cols = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $cols = $colgroup;
      }

      // Build colgroup
      if (is_array($cols) && count($cols)) {
        $output .= ' <colgroup' . drupal_attributes($attributes) . '>';
        $i = 0;
        foreach ($cols as $col) {
          $output .= ' <col' . drupal_attributes($col) . ' />';
        }
        $output .= " </colgroup>\n";
      }
      else {
        $output .= ' <colgroup' . drupal_attributes($attributes) . " />\n";
      }
    }
  }

  // Add the 'empty' row message if available.
  if (!count($rows) && $empty) {
    $header_count = 0;
    foreach ($header as $header_cell) {
      if (is_array($header_cell)) {
        $header_count += isset($header_cell['colspan']) ? $header_cell['colspan'] : 1;
      }
      else {
        $header_count++;
      }
    }
    $rows[] = array(array('data' => $empty, 'colspan' => $header_count, 'class' => array('empty', 'message')));
  }

  // Format the table header:
  if (count($header)) {
    $ts = tablesort_init($header);
    // HTML requires that the thead tag has tr tags in it followed by tbody
    // tags. Using ternary operator to check and see if we have any rows.
    $output .= (count($rows) ? ' <thead><tr>' : ' <tr>');
    foreach ($header as $cell) {
      $cell = tablesort_header($cell, $header, $ts);
      $output .= _theme_table_cell($cell, TRUE);
    }
    // Using ternary operator to close the tags based on whether or not there are rows
    $output .= (count($rows) ? " </tr></thead>\n" : "</tr>\n");
  }
  else {
    $ts = array();
  }

  // Format the table rows:
  if (count($rows)) {
    $output .= "<tbody>\n";
    $flip = array('even' => 'odd', 'odd' => 'even');
    $class = 'even';
    foreach ($rows as $number => $row) {
      // Check if we're dealing with a simple or complex row
      if (isset($row['data'])) {
        $cells = $row['data'];
        $no_striping = isset($row['no_striping']) ? $row['no_striping'] : FALSE;

        // Set the attributes array and exclude 'data' and 'no_striping'.
        $attributes = $row;
        unset($attributes['data']);
        unset($attributes['no_striping']);
      }
      else {
        $cells = $row;
        $attributes = array();
        $no_striping = FALSE;
      }
      if (count($cells)) {
        // Add odd/even class
        if (!$no_striping) {
          $class = $flip[$class];
          $attributes['class'][] = $class;
        }

        // Build row
        $output .= ' <tr' . drupal_attributes($attributes) . '>';
        $i = 0;
        foreach ($cells as $cell) {
          $cell = tablesort_cell($cell, $header, $ts, $i++);
          $output .= _theme_table_cell($cell);
        }
        $output .= " </tr>\n";
      }
    }
    $output .= "</tbody>\n";
  }

  $output .= "</table>\n";
  return $output;
}

