<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-nosotros teaser">
<p>Nosotros vista resumen.</p>
</article>
<?php endif; ?>

<?php if ($view_mode == 'full'): ?>
<?php
//kpr($content);
  hide($content['field_intro']);
  hide($content['field_imagen_intro']);
  hide($content['field_estatutos']);
  hide($content['field_cargos_funciones']);
  hide($content['field_reparto_de_tareas']);
  hide($content['field_instrucciones']);
  hide($content['field_inscripcion']);
?>

<article class="node-nosotros full">
<div class="padd-vertical-20">
  <h2 class="padd-bottom-20"><?php print t('Intro'); ?></h2>
  <?php print render($content['field_intro']); ?>
  <?php print render($content['field_imagen_intro']); ?>
</div>

<div class="padd-vertical-20">
  <h2 class="padd-bottom-20"><?php print t('Estatutos'); ?></h2>
  <?php print render($content['field_estatutos']); ?>
</div>

<div class="padd-vertical-20">
  <h2 class="padd-bottom-20"><?php print t('Cargos y funciones'); ?></h2>
  <?php print render($content['field_cargos_funciones']); ?>
  <?php print render($content['field_reparto_de_tareas']); ?>
</div>

<div class="padd-vertical-20">
  <h2 class="padd-bottom-20"><?php print t('Contacto'); ?></h2>
  <?php print render($content['field_contacto']); ?>
</div>

<div class="padd-vertical-20">
  <h2 class="padd-bottom-20"><?php print t('Inscripción'); ?></h2>
  <?php print render($content['field_instrucciones']); ?>
  <?php print render($content['field_inscripcion']); ?>
</div>
</article>

<?php endif; ?>
