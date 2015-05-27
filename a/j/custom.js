var vdj = jQuery;
vdj.noConflict();

vdj(document).ready(function($) {
  // sticky: Inicio
  $('#main-menu').sticky({topSpacing:0});

  // sticky: Recalculo altura al cambiar de tamaño.
  $(window).resize(function() {
    var stickyElement = $('#main-menu');
    var stickyWrapper = stickyElement.parent();
    stickyWrapper.css('height', stickyElement.outerHeight());
  });

  // Back to top
  var offset = 50;
  var duration = 1500;
  jQuery(window).scroll(function() {
    if (vdj(this).scrollTop() > offset) {
      vdj('.back-to-top').fadeIn(duration);
    } else {
        vdj('.back-to-top').fadeOut(duration);
    }
  });
    
  vdj('.back-to-top').click(function(event) {
    event.preventDefault();
    vdj('html, body').animate({scrollTop: 0}, duration);
    return false;
  })
});

