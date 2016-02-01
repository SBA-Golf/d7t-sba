<?php
/**
 * Teaser
 */
?>
<?php if ($teaser): ?>
<article class="node-actividad teaser">
  <a href="<?php print $node_url; ?>" class="thumb-info">
    <?php print render($content['field_imagen']); ?>
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

<?php if ($iview_mode == "full"): ?>
<article class="node-actividad">
<?php print render($content); ?>
</article>
<?php endif; ?>
