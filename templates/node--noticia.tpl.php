<?php
/**
 * Teaser
 */
if ($teaser):
?>
<div class="noticia col-xs-12 col-sm-4">
<article class="node-noticia teaser">
<header>
  <?php print render($title_prefix); ?>
  <a href="<?php print $node_url; ?>">
    <h1 class="h4"><?php print $title; ?></h1>
  </a>
  <?php print render($title_sufix); ?>
  <p class="meta">
    <time class="pubdate" datetime="<?php print date(DATE_ATOM, $created); ?>"><?php print format_date($created,'custom','j M Y'); ?></time>
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

<?php
if ($view_mode == "full"):
?>
<article class="node-noticia teaser">
  <p class="meta">
    <time class="pubdate" datetime="<?php print date(DATE_ATOM, $created); ?>"><?php print format_date($created,'custom','j  M  Y'); ?></time>
  <p>
  <div class="content">
    <?php print render($content['field_noticia_foto']); ?>
    <?php hide($content['links']); ?>
    <?php print render($content); ?>
    <?php print render($content['links']); ?>
  </div>
</article>
<?php endif; ?>
