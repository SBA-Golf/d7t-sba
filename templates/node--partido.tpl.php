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

  <section id="avisos" class="bg-info">
  <?php print render($content['field_partido_ultima_hora']); ?>
  </section>

  <main class="content">
  <?php print render($content); ?>
  </main>

  <?php if (user_is_logged_in()): ?>
  <section id="documentos">
  <?php if (!empty($content['field_partido_cronica']['#items']) || !empty($content['field_partido_clasificaciones']['#items'])): ?>
    <h2><?php print t('Documentos'); ?></h2>
    <?php print render($content['field_partido_cronica']); ?>
    <?php print render($content['field_partido_clasificaciones']); ?>
  <?php endif; ?>
  </section>
  <?php endif; ?>

  <?php if (user_is_logged_in()): ?>
  <section id="comida">
    <h2><?php print t('Comida'); ?></h2>
    <?php print render($content['field_partido_menu_comida']); ?>
  </section>
  <?php endif; ?>

  <?php if (user_is_logged_in()): ?>
  <section id="charla">
    <h2><?php print t('Charla'); ?></h2>
    <?php print render($content['field_partido_titulo_charla']); ?>
    <?php print render($content['field_partido_charla_ponente']); ?>
    <?php print render($content['field_partido_resumen_charla']); ?>
    <?php print render($content['field_partido_adjuntos_charla']); ?>
  </section>
  <?php endif; ?>

  <?php if (user_is_logged_in()): ?>
  <section id="galeria">
    <?php print render($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>
  </section>
  <?php endif; ?>

  <section id="patrocinios">
    <h2><?php print t('Patrocinadores'); ?></h2>
    <?php print render($content['field_partido_patrocinadores']); ?>
  </section>
</article>

<?php endif; ?>
