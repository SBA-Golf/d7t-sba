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
<article class="node-partido full">
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
  <section id="avisos" class="bg-info">
    <?php print render($content['field_partido_ultima_hora']); ?>
  </section>
  <?php endif; ?>

  <main class="content">
    <?php print render($content); ?>
  </main>

  <section id="patrocinios" class="clearfix">
    <?php print render($content['field_partido_patrocinadores']); ?>
  </section>

  <?php if (user_is_logged_in()): ?>
  <div class="panel-group" id="private-content" rol="tablist" aria-multiselectable="true">

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#private-content" href="#documentos" aria-expanded="true" aria-controls="collapseOne"><?php print t('Documentos'); ?></a>
        </h4>
      </div>
      <div id="documentos" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <?php print render($content['field_partido_cronica']); ?>
          <?php print render($content['field_partido_clasificaciones']); ?>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingTwo">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#private-content" href="#comida" aria-expanded="true" aria-controls="collapseTwo"><?php print t('Comida'); ?></a>
        </h4>
      </div>
      <div id="comida" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <div class="panel-body">
          <?php print render($content['field_partido_menu_comida']); ?>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingThree">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#private-content" href="#charla" aria-expanded="true" aria-controls="collapseThree"><?php print t('Charla'); ?></a>
        </h4>
      </div>
      <div id="charla" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
        <div class="panel-body">
          <?php print render($content['field_partido_titulo_charla']); ?>
          <?php print render($content['field_partido_charla_ponente']); ?>
          <?php print render($content['field_partido_resumen_charla']); ?>
          <?php print render($content['field_partido_adjuntos_charla']); ?>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingiFour">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#private-content" href="#galeria" aria-expanded="true" aria-controls="collapseFour"><?php print t('Galería de fotos'); ?></a>
        <?php global $user; if (in_array('editor', $user->roles)|| $user->uid == 1): ?>
          <small><a href="/node/add/galeria?field_galeria_partido=<?php print $nid; ?>" title="Añadir galería"><i class="glyphicon glyphicon-plus inverted-round"> </i></a></small>
          <?php endif; ?>
        </h4>
      </div>
      <div id="galeria" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="panel-body">
          <?php print render($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

</article>

<?php endif; ?>
