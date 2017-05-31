<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-patrocinador teaser">
<?php if ($variables['field_patrocinador_web']): ?>
  <a class="text-hide" href="<?php print $variables['field_patrocinador_web']['und'][0]['url']; ?>" target="_blank">
    <?php print $title; ?>
    <?php print render($content['field_patrocinador_logo']); ?>
  </a>
<?php else: ?>
  <a class="text-hide" href="#">
    <?php print $title; ?>
    <?php print render($content['field_patrocinador_logo']); ?>
  </a>
<?php endif; ?>
</article>
<?php endif; ?>
