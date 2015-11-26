<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-torneo teaser">
  <a href="<?php print $node_url; ?>" class="thumb-info">
    <?php print render($content['field_imagen_torneo']); ?>
    <?php print render($title_prefix); ?>
    <span class="thumb-info-title" style="background-color: <?php print $content['field_torneo_color'][0]['#markup']; ?>"><?php print $title; ?></span>
    <?php print render($title_sufix); ?>
    <span class="thumb-info-action">
      <span class="thumb-info-action-icon" href="#" style="background-color: <?php print $content['field_torneo_color'][0]['#markup']; ?>">
        <i class="glyphicon glyphicon-search"> </i>
      </span>
    </span>
  </a>
</article>
<?php endif; ?>
