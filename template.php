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
