<?php

/**
 * @file
 * Displays a forum.
 *
 * May contain forum containers as well as forum topics.
 *
 * Available variables:
 * - $forums: The forums to display (as processed by forum-list.tpl.php).
 * - $topics: The topics to display (as processed by forum-topic-list.tpl.php).
 * - $forums_defined: A flag to indicate that the forums are configured.
 *
 * @see template_preprocess_forums()
 *
 * @ingroup themeable
 */
 //dsm($variables);
?>
<p class="padd-bottom-20"><small><a href="/node/add/forum" title="Añadir tema nuevo"><i class="glyphicon glyphicon-plus inverted-round"> </i>Añadir tema nuevo</a></small></p>
<?php if ($forums_defined): ?>
<div id="forum">
  <p class="lead"><?php print end($parents)->description; ?></p>
  <?php print $forums; ?>
  <?php print $topics; ?>
</div>
<?php endif; ?>
