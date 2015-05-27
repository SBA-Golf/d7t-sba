var vdj = jQuery;
vdj.noConflict();

// sticky: Inicio
vdj(document).ready(function($) {
  $('#main-menu').sticky({topSpacing:0});

  // sticky: Recalculo altura al cambiar de tamaño.
  $(window).resize(function() {
    var stickyElement = $('#main-menu');
    var stickyWrapper = stickyElement.parent();
    stickyWrapper.css('height', stickyElement.outerHeight());
  });
});


