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
<?php
$ed = array_shift($field_partido_edicion);
$ed = node_load($ed['target_id']);
$tor = field_get_items('node',$ed,'field_edicion_torneo');
$tor = array_shift($tor);
$tor = node_load($tor['target_id']);
 ?>
<?php
 $edicion = field_get_items('node', $node, 'field_partido_edicion');
 $torneo_nid = field_get_items('node',$edicion[0]['entity'],'field_edicion_torneo');
 $torneo = node_load($torneo_nid[0]['target_id']);
 $color = field_get_items('node',$torneo,'field_torneo_color')[0]['rgb'];
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
  <?php hide($content['field_partido_foto_ponente']); ?>
  <?php hide($content['field_partido_resumen_charla']); ?>
  <?php hide($content['field_partido_adjuntos_charla']); ?>

  <?php hide($content['field_partido_titulo_charla_2']); ?>
  <?php hide($content['field_partido_charla_ponente_2']); ?>
  <?php hide($content['field_partido_foto_ponente_2']); ?>
  <?php hide($content['field_partido_resumen_charla_2']); ?>
  <?php hide($content['field_partido_adjuntos_charla_2']); ?>

  <?php hide($content['field_partido_titulo_charla_3']); ?>
  <?php hide($content['field_partido_charla_ponente_3']); ?>
  <?php hide($content['field_partido_foto_ponente_3']); ?>
  <?php hide($content['field_partido_resumen_charla_3']); ?>
  <?php hide($content['field_partido_adjuntos_charla_3']); ?>

  <?php hide($content['field_partido_patrocinadores']); ?>
  <?php hide($content['field_partido_juegos']); ?>
  <?php hide($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>
  <?php hide($content['field_galerias_externas']); ?>

  <?php if (isset($content['field_partido_ultima_hora'])): ?>
  <section id="avisos" class="alert alert-info">
    <?php print render($content['field_partido_ultima_hora']); ?>
  </section>
  <?php endif; ?>

  <?php
    $menu = $cronica = $horarios = $resultados = '#';
    if (isset($variables['field_partido_menu_comida']) && !empty($variables['field_partido_menu_comida'])) {
      $menu = file_create_url($variables['field_partido_menu_comida'][0]['uri']);
    }
    if (isset($variables['field_partido_cronica']) && !empty($variables['field_partido_cronica'])) {
      $cronica = file_create_url($variables['field_partido_cronica'][0]['uri']);
    }
    if (isset($variables['field_partido_horarios']) && !empty($variables['field_partido_horarios'])) {
      $horarios = file_create_url($variables['field_partido_horarios'][0]['uri']);
    }
    if (isset($variables['field_partido_clasificaciones']) && !empty($variables['field_partido_clasificaciones'])) {
      $resultados = file_create_url($variables['field_partido_clasificaciones'][0]['uri']);
    }
    $foto  = null;
    $foto2 = null;
    $foto3 = null;
    if (isset($variables['field_partido_foto_ponente']) && !empty($variables['field_partido_foto_ponente'])) {
      $foto = image_style_url('medium',$variables['field_partido_foto_ponente'][0]['uri']);
    }
    if (isset($variables['field_partido_foto_ponente_2']) && !empty($variables['field_partido_foto_ponente_2'])) {
      $foto2 = image_style_url('medium',$variables['field_partido_foto_ponente_2'][0]['uri']);
    }
    if (isset($variables['field_partido_foto_ponente_3']) && !empty($variables['field_partido_foto_ponente_3'])) {
      $foto3 = image_style_url('medium',$variables['field_partido_foto_ponente_3'][0]['uri']);
    }
  ?>

  <main class="content">
  <p class="lead">
    <a href="/<?php global $language; print $language->language; ?>/torneos">TORNEOS</a> &raquo;&raquo;
    <a href="/<?php print $language->language . '/' . drupal_get_path_alias('node/' . $tor->nid,$language->language); ?>"><?php print $tor->title; ?></a> &raquo;&raquo;
    <a href="/<?php print $language->language . '/' . drupal_get_path_alias('node/' . $ed->nid, $language->language); ?>"><?php print $ed->title; ?></a>
  </p>

    <div class="col-sm-4">
      <p class="h3"><?php print $content['field_partido_fecha'][0]['#markup']; ?></p>
      <p class="h4"><?php print render($content['field_partido_tipo'][0]['#markup']); ?> &mdash; <?php print render($content['field_partido_modalidad'][0]['#markup']); ?></p>
      <p class="h4"><?php print render($content['field_partido_campo'][0]['#markup']); ?></p>
    </div>
    <div class="col-sm-8">
      <?php if ($variables['field_partido_patrocinadores']): ?>
      <p class="text-uppercase h3">Patrocinadores</p>
      <?php endif; ?>
      <div class="padd-vertical-20">
        <div class="row">
        <?php print render($content['field_partido_patrocinadores']); ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>

    <?php if (user_is_logged_in()): ?>
    <section class="padd-vertical-20">
      <!-- Nav tabs -->
<style>
.nav.nav-pills li.active > a,
.nav.nav-pills li.active > a:hover,
.partido-date .day {
  background-color: <?php print $color; ?>
}
</style>
      <ul class="nav nav-pills nav-justified" role="tablist">
        <li role="presentation" class="active"><a href="<?php print $horarios; ?>" aria-controls="horarios" role="tab">Horarios</a></li>
        <li role="presentation"><a href="<?php print $menu; ?>" aria-controls="menu" role="tab">Menú</a></li>
        <?php if ($torneo->nid == 1): ?>
        <li role="presentation"><a href="#charlas" aria-controls="charlas" role="tab" data-toggle="tab">Charlas</a></li>
        <?php endif; ?>
        <li role="presentation"><a href="<?php print $resultados; ?>" aria-controls="resultados" role="tab">Resultados</a></li>
        <?php if ($torneo->nid != 152 && $torneo->nid != 11): ?>
        <li role="presentation"><a href="<?php print $cronica; ?>" aria-controls="cronica" role="tab">Crónica</a></li>
        <?php endif; ?>
        <?php if ($torneo->nid != 152 && $torneo->nid != 11 && $torneo->nid != 245): ?>
        <li role="presentation"><a href="#juegos" aria-controls="juegos" role="tab" data-toggle="tab">Juegos</a></li>
        <?php endif; ?>
        <li role="presentation"><a href="#galeria" aria-controls="galeria" role="tab" data-toggle="tab">Galería</a></li>
      </ul>
<hr/>
      <!-- Tabs panes -->
      <div class="tab-content">

        <div role="tabpanel" class="tab-pane padd-vertical-20" id="charlas">

          <div class="panel panel-primary">
            <div class="panel-heading">
              <p class="h3">Charla 1: <?php print render($content['field_partido_titulo_charla'][0]['#markup']); ?></p>
            </div>
            <div class="panel-body">
              <p class="h5 text-center">
                <?php if ($foto): ?>
                <img src="<?php print $foto; ?>" class="img-responsive" style="margin: 0 auto;">
                <?php endif; ?>
                <?php print render($content['field_partido_charla_ponente'][0]['#markup']); ?>
              </p>
              <?php print render($content['field_partido_resumen_charla']); ?>
              <div class="padd-vertical-20"><?php print render($content['field_partido_adjuntos_charla']); ?></div>
            </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <p class="h3">Charla 2: <?php print render($content['field_partido_titulo_charla_2'][0]['#markup']); ?></p>
            </div>
            <div class="panel-body">
              <p class="h5 text-center">
                <?php if ($foto2): ?>
                <img src="<?php print $foto2; ?>" class="img-responsive" style="margin: 0 auto;">
                <?php endif; ?>
                <?php print render($content['field_partido_charla_ponente_2'][0]['#markup']); ?>
              </p>
              <?php print render($content['field_partido_resumen_charla_2']); ?>
              <div class="padd-vertical-20"><?php print render($content['field_partido_adjuntos_charla_2']); ?></div>
            </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <p class="h3">Charla 3: <?php print render($content['field_partido_titulo_charla_3'][0]['#markup']); ?></p>
            </div>
            <div class="panel-body">
              <p class="h5 text-center">
                <?php if ($foto3): ?>
                <img src="<?php print $foto3; ?>" class="img-responsive" style="margin: 0 auto;">
                <?php endif; ?>
                <?php print render($content['field_partido_charla_ponente_3'][0]['#markup']); ?>
              </p>
              <?php print render($content['field_partido_resumen_charla_3']); ?>
              <div class="padd-vertical-20"><?php print render($content['field_partido_adjuntos_charla_3']); ?></div>
            </div>
          </div>

        </div>

        <div role="tabpanel" class="tab-pane padd-vertical-20" id="juegos">
          <?php print render($content['field_partido_juegos']); ?>
        </div>
        <div role="tabpanel" class="tab-pane padd-vertical-20" id="galeria">
          <?php global $user; if (in_array('editor', $user->roles)|| $user->uid == 1): ?>
          <p><small><a href="/node/add/galeria?field_galeria_partido=<?php print $nid; ?>" title="Añadir galería"><i class="glyphicon glyphicon-plus inverted-round"> </i>Añadir galería</a></small></p>
          <?php endif; ?>
          <div class="padd-vertical-20"><?php print render($content['galeria_de_fotos_de_torneo_entity_view_1']); ?></div>

          <?php if (isset($variables['field_galerias_externas']) && !empty($variables['field_galerias_externas'])): ?>
          <div class="padd-vertical-20">
            <header class="page-title">
              <h1><span>Galerías externas</span></h1>
            </header>
            <?php print render($content['field_galerias_externas']); ?>
          </div>
        <?php endif; ?>
        </div>
      </div>
    </section>
    <?php endif; ?>
  </main>

</article>

<?php endif; ?>
