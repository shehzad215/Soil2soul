(function($) {

  $( document ).ready(function() {
    searchToggle();
    searchButton();
    homeSliders();
    expandableCards();
    toggleModal();
    playVideo();
    // accordionMegaMenu();
    accordionInterior();
    testimonialSlider();
    ctasSlider();
    featuresSlider();
    infographicSection();
  });

  function searchToggle() {
    $('.search-icon').hover(function () {
      $('header .asl_w_container').show();
    });
    $(document).click(function (e) {
      if ($('.asl_w_container').is(':visible')) {
        if (!$(e.target).closest('.asl_w_container').length>0 && !$(e.target).closest('.wpdreams_asl_results').length>0 && !$(e.target).closest('.search-icon').length>0) {
          $('header .asl_w_container').hide();
        }
      }
    });
  }

  function searchButton() {
    $('.asl_w_container form input[type="submit"]').val('SEARCH');
    $('.asl_w_container form input[type="submit"]').hover(function (e) {
      e.preventDefault();
      $(this).parents('.asl_w_container').find('.promagnifier').click()
    });
  }

  function homeSliders() {
    $('.rotating-text').slick({
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
    });
    $('.hero-news-cards').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  }

  function expandableCards() {
    $('.expandable-card').hover(function () {
      $('.expandable-card.active').removeClass('active');
      $(this).addClass('active');
    });
  }
  
})(jQuery);