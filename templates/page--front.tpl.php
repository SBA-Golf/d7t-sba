<!-- Header -->
<header id="header" class="clearfix">
    <?php print render($page['top_header']); ?>
    <?php print render($page['header']); ?>
</header>
<!-- Fin Header -->

<!-- Menú principal -->
<nav id="main-menu" class="navbar navbar-default">
  <div class="container">
    <div class="row">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-main-menu">
        <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand page-scroll" href="<?php print base_path(); ?>">
        <img src="<?php print $logo; ?>" class="img-responsive">
      </a>
      <div class="collapse navbar-collapse" id="navbar-main-menu">
        <?php print render($primary_nav); ?>
        <ul class="nav navbar-nav visible-xs">
          <?php if (!$logged_in): ?>
          <li><a href="/user">Área de socios</a></li>
          <?php else: ?>
          <li><a href="/user/logout">Cerrar sesión</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!-- Fin Menú principal -->

<!-- Slider -->
<?php if ($page['slider']): ?>
<aside id="slider" class="boxedcontainer"><?php print render($page['slider']); ?></aside>
<?php endif; ?>
<!-- Fin Slider -->

<!-- Slogan -->
<?php if ($site_slogan): ?>
<aside id="slogan"><?php print $site_slogan; ?></aside>
<?php endif; ?>
<!-- Fin Slogan -->

<!-- Back to top -->
<a href="#" class="back-to-top">up</a>
<!-- Fin Back to top -->

<!-- Mensajes del sistema -->
<?php if ($messages): ?>
<aside id="messages">
  <div class="container">
    <?php print $messages; ?>
  </div>
</aside>
<?php endif; ?>
<!-- Fin Mensajes -->

<?php if ($page['slogan']): ?>
<?php print render($page['slogan']); ?>
<?php endif; ?>

<?php if ($page['alertas']): ?>
<div class="container alert alert-danger">
<?php print render($page['alertas']); ?>
</div>
<?php endif; ?>

<?php if ($page['promos']): ?>
<div class="container alert alert-info">
<?php print render($page['promos']); ?>
</div>
<?php endif; ?>

<!-- MAIN CONTENT -->
<main class="front-page">
  <div class="container">
        <aside id="tabs"><?php print render($tabs); ?></aside>
        <?php //print render($page['content']); ?>
        <div class="row">
        <?php if ($page['front_first_col']): ?>
        <div class="col-sm-6 front-col">
        <span class="h1"><i class="glyphicon glyphicon-bullhorn"> </i></span>
        <?php print render($page['front_first_col']); ?>
        </div>
        <?php endif; ?>
        <?php if ($page['front_second_col']): ?>
        <div class="col-sm-4 front-col">
        <span class="h1"><i class="glyphicon glyphicon-calendar"> </i></span>
        <?php print render($page['front_second_col']); ?>
        </div>
        <?php endif; ?>
        <?php if ($page['front_third_col']): ?>
        <div class="col-sm-6 front-col">
        <span class="h1"><i class="glyphicon glyphicon-stats"> </i></span>
        <?php print render($page['front_third_col']); ?>
        </div>
        <?php endif; ?>
        </div>
        <?php if ($page['after_content']) print render($page['after_content']); ?>
  </div>
</main>
<!-- Fin  MAIN CONTENT-->

<?php if ($page['sponsors']): ?>
<!-- Sponsors -->
<aside id="sponsors">
<?php print render($page['sponsors']); ?>
</aside>
<!-- Fin Sponsors -->
<?php endif; ?>

<!-- Footer -->
<footer id="main-footer">
  <section id="footer-section-1">
  <div class="container">
    <div class="row">
      <div class="col-md-4"><?php print render($page['footer_first_col']); ?></div>
      <div class="col-md-4"><?php print render($page['footer_second_col']); ?></div>
      <div class="col-md-4"><?php print render($page['footer_third_col']); ?></div>
    </div>
  </section>
  <section id="footer-section-2">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 pull-right">
          <img src="<?php print $logo; ?>" class="img-responsive" typeof="foaf:Image">
          <br>
          <a href="http://golfbasozabal.com/" target="_blank"><img src="/<?php print drupal_get_path('theme','sba') . '/a/i/basozabal.png'; ?>" class="img-responsive center-block" typeof="foaf:Image"><p class="text-center">www.golfbasozabal.com</p></a>
          <?php print render($page['legal']); ?>
        </div>
      </div>
    </div>
  </section>
</footer>
<!-- Fin Footer -->
