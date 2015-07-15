<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-patrocinador teaser">
<?php if ($variables['field_patrocinador_web']): ?>
  <a href="<?php print $variables['field_patrocinador_web']['und'][0]['url']; ?>" target="_blank"><?php print render($content); ?></a>
<?php else: ?>
  <?php print render($content); ?>
<?php endif; ?>
</article>
<?php endif; ?>
