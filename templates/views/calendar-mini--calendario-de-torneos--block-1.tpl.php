<?php
/**
  * @file
  * Template to display a view as a mini calendar month.
  * 
  * @see template_preprocess_calendar_mini.
  *
  * $day_names: An array of the day of week names for the table header.
  * $rows: An array of data for each day of the week.
  * $view: The view.
  * $min_date_formatted: The minimum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
  * $max_date_formatted: The maximum date for this calendar in the format YYYY-MM-DD HH:MM:SS.
  * 
  * $show_title: If the title should be displayed. Normally false since the title is incorporated
  *   into the navigation, but sometimes needed, like in the year view of mini calendars.
  * 
  */
//dsm('Display: '. $display_type .': '. $min_date_formatted .' to '. 
//$max_date_formatted);dsm($day_names);
$params = array(
  'view' => $view,
  'granularity' => 'month',
  'link' => FALSE,
);
//dsm($view);
$colores = array();
  foreach ($view->result as $id => $partido) {
    $node_partido = node_load($partido->nid);
    $partido_dia = date('j',strtotime(field_get_items('node',$node_partido,'field_partido_fecha')[0]['value']));
    $edicion_nid = field_get_items('node',$node_partido,'field_partido_edicion')[0]['target_id'];
    $node_edicion = node_load($edicion_nid);
    $torneo_nid = field_get_items('node',$node_edicion,'field_edicion_torneo')[0]['target_id'];
    $node_torneo = node_load($torneo_nid);
    $color = field_get_items('node',$node_torneo,'field_torneo_color')[0]['rgb'];
    $colores[$partido_dia] = $color;
  }
//dsm($colores);
?>
<div class="calendar-calendar"><div class="month-view kk">
  <?php if ($show_title): ?>
  <div class="date-nav-wrapper clear-block">
    <div class="date-nav">
      <div class="date-heading">
        <?php print theme('date_nav_title', $params) ?>
      </div>
    </div>
  </div> 
  <?php endif; ?> 
  <table class="mini">
    <thead>
      <tr>
      <?php foreach ($day_names as $cell): ?>
        <th class="<?php print $cell['class']; ?>">
          <?php print $cell['data']; ?>
        </th>
      <?php endforeach; ?>
      </tr>
    </thead>
    <tbody>
    <?php foreach ((array) $rows as $row): ?>
      <tr>
        <?php foreach ($row as $cell): ?>
          <td id="<?php print $cell['id']; ?>" class="<?php print $cell['class']; ?>">
            <?php if (in_array('has-events',split(' ',$cell['class']))): ?>
            <?php //dsm($cell['data']); ?>
            <?php
              $cal_dia = explode('-',$cell['id'])[3];
              $data = '<div class="month mini-day-on" style="background-color: ' . $colores[(int)$cal_dia] . '">';
              $cell['data'] = str_replace('<div class="month mini-day-on">', $data, $cell['data']);
            ?>
            <?php endif; ?>
            <?php print $cell['data']; ?>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div></div>
