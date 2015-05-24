<!-- Header -->
<header id="header" class="clearfix">
  <div class="container">
    <?php print render($page['top_header']); ?>
    <?php print render($page['header']); ?>
  </div>
</header>
<!-- Fin Header -->

<!-- Menú principal -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="row">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main-menu">
        <span class="sr-only"<?php print t('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="<?php print base_path(); ?>">
        <img src="<?php print $logo; ?>" class="img-responsive">
      </a>
      <div class="collapse navbar-collapse" id="navbar-main-menu">
        <?php print render($primary_nav); ?>
      </div>
    </div>
  </div>
</nav>
<!-- Fin Menú principal -->

<!-- Mensajes del sistema -->
<?php if ($messages): ?>
<aside id="messages">
  <div class="container">
    <?php print $messages; ?>
  </div>
</aside>
<?php endif; ?>
<!-- Fin Mensajes -->

<!-- Slider -->
<aside id="slider"><?php print render($page['slider']); ?></aside>
<!-- Fin Slider -->

<!-- Slogan -->
<aside id="slogan">  <?php print render($page['slogan']); ?></aside>
<!-- Fin Slogan -->

<!-- MAIN CONTENT -->
<main>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h1><?php print $title; ?></h1>
        <aside id="tabs"><?php print render($tabs); ?></aside>
        <?php print render($page['content']); ?>
      </div>
      <div class="col-md-3">
        <aside>
          <?php print render($page['sidebar_first']); ?>
        </aside>
      </div>
    </div>
  </div>
</main>
<!-- Fin  MAIN CONTENT-->

<!-- Footer -->
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3"><?php print render($page['footer_first_col']); ?></div>
      <div class="col-md-3"><?php print render($page['footer_second_col']); ?></div>
      <div class="col-md-3"><?php print render($page['footer_third_col']); ?></div>
      <div class="col-md-3"><?php print render($page['footer_fourth_col']); ?></div>
    </div>
    <div class="row">
      <div class="col-xs-12"><?php print render($page['legal']); ?></div>
    </div>
  </div>
</footer>
<!-- Fin Footer -->
