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
  hide($content['field_cargos']);
  hide($content['field_funciones']);
  hide($content['field_instrucciones']);
  hide($content['field_inscripcion']);
  //kpr($variables);
  $estatutos = $cargos = $funciones = '#';
  if (isset($variables['field_estatutos']) && !empty($variables['field_estatutos'])) {
    $estatutos = file_create_url($variables['field_estatutos'][0]['uri']);
  }
  if (isset($variables['field_cargos']) && !empty($variables['field_cargos'])) {
    $cargos = file_create_url($variables['field_cargos'][0]['uri']);
  }
  if (isset($variables['field_funciones']) && !empty($variables['field_funciones'])) {
    $funciones = file_create_url($variables['field_funciones'][0]['uri']);
  }
?>

<article class="node-nosotros full">
<div class="padd-vertical-20">
  <ul class="nav nav-pills nav-justified" role="tablist">
     <li role="presentation" class="active"><a href="#intro" aria-controls="intro" role="tab" data-toggle="tab">Intro</a></li>
     <li role="presentation"><a href="<?php print $estatutos; ?>" aria-controls="estatutos" role="tab">Estatutos</a></li>
     <li role="presentation"><a href="<?php print $cargos; ?>" aria-controls="cargos" role="tab">Cargos</a></li>
     <li role="presentation"><a href="<?php print $funciones; ?>" aria-controls="funciones" role="tab">Funciones</a></li>
     <li role="presentation"><a href="#contacto" aria-controls="contacto" role="tab" data-toggle="tab">Contacto</a></li>
     <li role="presentation"><a href="#inscripcion" aria-controls="inscripcion" role="tab" data-toggle="tab">Inscripción</a></li>
     <?php if (user_has_role(5) || $user->uid == 1): ?>
     <li role="presentation"><a href="#direccion" aria-controls="inscripcion" role="tab" data-toggle="tab">Dirección</a></li>
     <?php endif; ?>
  </ul>
  <hr/>
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane padd-vertical-20 active" id="intro">
      <?php print render($content['field_intro']); ?>
      <?php print render($content['field_imagen_intro']); ?>
    </div>
    <div role="tabpanel" class="tab-pane padd-vertical-20" id="contacto">
      <?php print render($content['field_contacto']); ?>
    </div>
    <div role="tabpanel" class="tab-pane padd-vertical-20" id="inscripcion">
      <?php print render($content['field_instrucciones']); ?>
      <?php print render($content['field_inscripcion']); ?>
    </div>
    <div role="tabpanel" class="tab-pane padd-vertical-20" id="direccion">
      <ul class="list-inline">
        <li><a class="h4 bg-success padd-20" href="/reuniones">Reuniones de la directiva</a></li>
        <li><a class="h4 bg-success padd-20" href="/asambleas">Asambleas</a></li>
        <li><a class="h4 bg-success padd-20" href="/direccion-varios">Varios</a></li>
      </ul>
    </div>
  </div>
</div>
</article>

<?php endif; ?>
