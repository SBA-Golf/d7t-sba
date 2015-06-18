<?php
/**
 * Teaser
 */
if ($teaser):
?>
<div class="col-xs-12 col-sm-4">
<article class="node-noticia teaser">
<header>
  <?php print render($title_prefix); ?>
  <h1 class="h4"><?php print $title; ?></h1>
  <?php print render($title_sufix); ?>
  <p class="meta">
    <time class="pubdate" datetime="<?php print date(DATE_ATOM, $created); ?>"><?php print format_date($created,'custom','j/n/Y'); ?></time>
  <p>
  <?php print render($content['field_noticia_foto']); ?>
</header>
<div class="content">
<?php hide($content['links']); ?>
<?php print render($content); ?>
<?php print render($content['links']); ?>
</div>
</article>
</div>
<?php endif; ?>
