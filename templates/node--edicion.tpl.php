<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-edicion teaser">
<p>Edición vista resumen.</p>
</article>
<?php endif; ?>

<?php if ($view_mode == 'full'): ?>
<?php
  //kpr($variables);

  $reglamento = '#';

  hide($content['field_edicion_torneo']);
  hide($content['field_edicion_caracter']);
  hide($content['field_edicion_reglamento']);
  hide($content['field_edicion_clasificacion']);
  hide($content['links']);
  hide($content['torneos_entity_view_2']);

  if (isset($variables['field_edicion_reglamento']) && !empty($variables['field_edicion_reglamento'])) {
    $reglamento = file_create_url($variables['field_edicion_reglamento'][0]['uri']);
  }
  $torneo = node_load($variables['field_edicion_torneo'][0]['target_id']);
  $color = field_get_items('node',$torneo,'field_torneo_color')[0]['rgb'];
?>
<!--
  <div class="padd-vertical-20">
    <div class="field field-label-inline clearfix">
      <div class="field-label">Torneo:&nbsp;</div>
      <div class="field-items"><?php //print render($content['field_edicion_torneo']); ?></div>
    </div>
    <div class="field field-label-inline clearfix">
      <div class="field-label">Carácter:&nbsp;</div>
      <div class="field-items"><?php //print render($content['field_edicion_caracter']); ?></div>
    </div>
  </div>
-->

<!-- Nav tabs -->
<style>
.nav.nav-pills li.active > a,
.nav.nav-pills li.active > a:hover,
.partido-date .day {
  background-color: <?php print $color; ?>
}
</style>
<ul class="nav nav-pills nav-justified" role="tablist">
  <li role="presentation" class="active"><a href="#jornadas" aria-controls="jornadas" role="tab" data-toggle="tab">Jornadas</a></li>
  <li role="presentation"><a href="<?php print $reglamento; ?>" aria-controls="reglamento" role="tab">Reglamento</a></li>
  <li role="presentation"><a href="#clasificaciones" aria-controls="clasificacion" role="tab" data-toggle="tab">Clasificaciones</a></li>
</ul>
<hr/>
<!-- Tabs panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="jornadas">
    <?php print render($content['torneos_entity_view_2']); ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="clasificaciones">
    <div class="padd-vertical-20">
      <?php print render($content['field_edicion_clasificacion']); ?>
    </div>
  </div>
</div>
<?php endif; ?>
