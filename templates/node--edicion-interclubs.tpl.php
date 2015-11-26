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
//kpr($content);
  hide($content['field_edicion_torneo']);
  hide($content['field_edicion_caracter']);
  hide($content['field_edicion_reglamento']);
  hide($content['field_edicion_clasificacion']);
  hide($content['links']);
  hide($content['torneos_entity_view_2']);
?>
<!--
  <div class="padd-vertical-20">
    <div class="field field-label-inline clearfix">
      <div class="field-label">Torneo:&nbsp;</div>
      <div class="field-items"><?php //print render($content['field_edicion_torneo']); ?></div>
    </div>
    <div class="field field-label-inline clearfix">
      <div class="field-label">Clubs participartes:&nbsp;</div>
      <div class="field-items"><?php //print render($content['field_interclubs_clubs']); ?></div>
    </div>
    <div class="field field-label-inline clearfix">
      <div class="field-label">Carácter:&nbsp;</div>
      <div class="field-items"><?php //print render($content['field_edicion_caracter']); ?></div>
    </div>
  </div>
-->

<!-- Nav tabs -->
<ul class="nav nav-pills nav-justified" role="tablist">
  <li role="presentation" class="active"><a href="#jornadas" aria-controls="jornadas" role="tab" data-toggle="tab">Jornadas</a></li>
  <li role="presentation"><a href="#reglamento" aria-controls="reglamento" role="tab" data-toggle="tab">Reglamento</a></li>
  <li role="presentation"><a href="#clasificacion" aria-controls="clasificacion" role="tab" data-toggle="tab">Clasificación</a></li>
</ul>
<hr/>
<!-- Tabs panes -->
<div class="tab-content">
  <div role="tabpanel" class="tab-pane active" id="jornadas">
    <?php print render($content['torneos_entity_view_2']); ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="reglamento">
    <?php if ($variables['field_edicion_reglamento']): ?>
    <div class="padd-vertical-20"><a target="_blank" href="<?php print render($content['field_edicion_reglamento'][0]['#markup']); ?>"><span class="h4"><i class="glyphicon glyphicon-file"> </i><?php print t('Rules'); ?></span></a></div>
    <?php endif; ?>
  </div>
  <div role="tabpanel" class="tab-pane" id="clasificacion">
    <?php if ($variables['field_edicion_clasificacion']): ?>
    <div class="padd-vertical-20"><a target="_blank" href="<?php print render($content['field_edicion_clasificacion'][0]['#markup']); ?>"><span class="h4"><i class="glyphicon glyphicon-file"> </i><?php print t('Clasificación'); ?></span></a></div>
    <?php endif; ?>
  </div>
</div>
<?php endif; ?>
