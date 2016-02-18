var vdj = jQuery;
vdj.noConflict();
var $masonry_container;

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
      $('#main-menu').css('border-bottom', '1px solid #efefef');
    } else {
      vdj('.back-to-top').fadeOut(duration);
      $('#main-menu').css('border-bottom', 'none');
    }
  });
    
  vdj('.back-to-top').click(function(event) {
    event.preventDefault();
    vdj('html, body').animate({scrollTop: 0}, duration);
    return false;
  });

  // Masonry
  $masonry_container = vdj(".region-content .row");
  $masonry_container.imagesLoaded(function() {
    $masonry_container.masonry({
      columnWidth: ".noticia",
      itemSelector: ".noticia",
      percentPosition: "true",
      gutter: 0
    });
    $masonry_container.masonry("bindResize");
  });

  // OWL Carousel 2
  vdj('.owl-carousel').owlCarousel({
    items:4,
    nav:true,
    dots:false,
    loop:true,
    margin:10,
    autoplay: true,
    autoplayTimeout:2000,
    autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:3,
        },
        1000:{
            items:6,
        }
    }
  });
});
