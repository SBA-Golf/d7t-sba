<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-partido teaser">
  <a href="<?php print $node_url; ?>" class="thumb-info">
    <?php print render($content['field_imagen_torneo']); ?>
    <?php print render($title_prefix); ?>
    <span class="thumb-info-title"><?php print $title; ?></span>
    <?php print render($title_sufix); ?>
    <span class="thumb-info-action">
      <span class="thumb-info-action-icon" href="#">
        <i class="glyphicon glyphicon-search"> </i>
      </span>
    </span>
  </a>
</article>
<?php endif; ?>

<?php if ($view_mode == 'full'): ?>
<?php //kpr($variables); ?>
<?php 
 $edicion = field_get_items('node', $node, 'field_partido_edicion');
 $torneo_nid = field_get_items('node',$edicion[0]['entity'],'field_edicion_torneo');
 $torneo = node_load($torneo_nid[0]['target_id']);
 //$torneo_title = field_get_items('node',$torneo,'title_field');
?>
<article class="node-partido full">
  <?php hide($content['field_partido_edicion']); ?>
  <?php hide($content['field_partido_campo']); ?>
  <?php hide($content['field_partido_fecha']); ?>
  <?php hide($content['field_partido_horarios']); ?>
  <?php hide($content['field_partido_clasificaciones']); ?>
  <?php hide($content['field_partido_cronica']); ?>
  <?php hide($content['field_partido_menu_comida']); ?>
  <?php hide($content['field_partido_titulo_charla']); ?>
  <?php hide($content['field_partido_charla_ponente']); ?>
  <?php hide($content['field_partido_resumen_charla']); ?>
  <?php hide($content['field_partido_adjuntos_charla']); ?>
  <?php hide($content['field_partido_patrocinadores']); ?>
  <?php hide($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>

  <?php if (isset($content['field_partido_ultima_hora'])): ?>
  <section id="avisos" class="alert alert-info">
    <?php print render($content['field_partido_ultima_hora']); ?>
  </section>
  <?php endif; ?>

  <main class="content">
  <small><?php print render($content['field_partido_edicion']); ?></small>

    <div class="col-sm-4">
      <p class="h3"><?php print $content['field_partido_fecha'][0]['#markup']; ?></p>
      <p class="h4"><?php print render($content['field_partido_tipo'][0]['#markup']); ?> &mdash; <?php print render($content['field_partido_modalidad'][0]['#markup']); ?></p>
    </div>
    <div class="col-sm-8">
      <?php if ($variables['field_partido_patrocinadores']): ?>
      <h2 class="text-uppercase">Patrocinios</h2>
      <?php endif; ?>
      <div class="padd-vertical-20">
        <?php print render($content['field_partido_patrocinadores']); ?>
      </div>
    </div>
    <div class="clearfix"></div>

    <?php if (user_is_logged_in()): ?>
    <section class="padd-vertical-20">
      <!-- Nav tabs -->
      <ul class="nav nav-pills nav-justified" role="tablist">
        <li role="presentation" class="active"><a href="#horarios" aria-controls="horarios" role="tab" data-toggle="tab">Horarios</a></li>
        <li role="presentation"><a href="#menu" aria-controls="menu" role="tab" data-toggle="tab">Menú</a></li>
        <?php if ($torneo->nid == 1): ?>
        <li role="presentation"><a href="#charla" aria-controls="charla" role="tab" data-toggle="tab">Charla</a></li>
        <?php endif; ?>
        <li role="presentation"><a href="#resultados" aria-controls="resultados" role="tab" data-toggle="tab">Resultados</a></li>
        <li role="presentation"><a href="#cronica" aria-controls="cronica" role="tab" data-toggle="tab">Crónica</a></li>
        <li role="presentation"><a href="#juegos" aria-controls="juegos" role="tab" data-toggle="tab">Juegos</a></li>
        <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galería</a></li>
      </ul>
<hr/>
      <!-- Tabs panes -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane padd-vertical-20 active" id="horarios">
          <?php if ($variables['field_partido_horarios']): ?>
            <div class="padd-vertical-20"><a target="_blank" href="<?php print render($content['field_partido_horarios'][0]['#markup']); ?>"><span class="h4"><i class="glyphicon glyphicon-file"> </i><?php print t('Horarios'); ?></span></a></div>
          <?php endif; ?>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="menu">
        <?php //kpr($content); ?>
          <?php if ($variables['field_partido_menu_comida']): ?>
            <div class="padd-vertical-20"><?php print render($content['field_partido_menu_comida']); ?></div>
          <?php endif; ?>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="charla">
          <p class="h3 text-center"><?php print render($content['field_partido_titulo_charla'][0]['#markup']); ?></p>
          <p class="h5 text-center"><?php print render($content['field_partido_charla_ponente'][0]['#markup']); ?></p>
          <?php print render($content['field_partido_resumen_charla']); ?>
          <div class="padd-vertical-20"><?php print render($content['field_partido_adjuntos_charla']); ?></div>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="resultados">
          <?php if ($variables['field_partido_clasificaciones']): ?>
            <div class="padd-vertical-20"><a target="_blank" href="<?php print render($content['field_partido_clasificaciones'][0]['#markup']); ?>"><span class="h4"><i class="glyphicon glyphicon-file"> </i><?php print t('Clasificación'); ?></span></a></div>
          <?php endif; ?>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="cronica">
          <?php if ($variables['field_partido_cronica']): ?>
            <div class="padd-vertical-20"><a target="_blank" href="<?php print render($content['field_partido_cronica'][0]['#markup']); ?>"><span class="h4"><i class="glyphicon glyphicon-file"> </i><?php print t('Crónica'); ?></span></a></div>
          <?php endif; ?>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="juegos">
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="galeria">
        <?php global $user; if (in_array('editor', $user->roles)|| $user->uid == 1): ?>
          <p><small><a href="/node/add/galeria?field_galeria_partido=<?php print $nid; ?>" title="Añadir galería"><i class="glyphicon glyphicon-plus inverted-round"> </i>Añadir galería</a></small></p>
          <?php endif; ?>
          <div class="padd-vertical-20"><?php print render($content['galeria_de_fotos_de_torneo_entity_view_1']); ?></div>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>

</article>

<?php endif; ?>
