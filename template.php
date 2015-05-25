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

function sba_menu_tree__primary(&$variables) {
  return '<ul class="nav navbar-nav">' .$variables['tree'] . '</ul>';
}

function sba_preprocess_block(&$variables) {
  if ($variables['block']->region == 'top_header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }
}

function sba_preprocess_views_view(&$variables) {
  if ($variables['view']->name == 'calendario_de_torneos' && $variables['view']->current_display == 'block_1') {
    $variables['mini_calendar_month'] = strtolower(t(date('F', $variables['view']->date_info->month)));
  }
}
