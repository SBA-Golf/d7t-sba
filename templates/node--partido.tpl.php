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
  <div class="content">
  <?php hide($content['field_partido_patrocinadores']); ?>
  <?php hide($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>
  <?php print render($content); ?>
  </div>
  <section id="galeria">
    <?php print render($content['galeria_de_fotos_de_torneo_entity_view_1']); ?>
  </section>
  <section id="patrocinios">
    <h2><?php print t('Patrocinadores'); ?></h2>
    <?php print render($content['field_partido_patrocinadores']); ?>
  </section>
</article>

<?php endif; ?>
