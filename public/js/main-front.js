$(function() {
  var $mainMenuState, $menu;
  $menu = $('#main-menu');
  $menu.smartmenus({
    subMenusSubOffsetX: 1,
    subMenusSubOffsetY: -8
  });
  $('.bxslider').bxSlider({
    auto: true,
    mode: 'fade',
    controls: false,
    infiniteLoop: true
  });
  $('.ware-slider').bxSlider({
    mode: 'fade'
  });
  $mainMenuState = $('#main-menu-state');
  if ($mainMenuState.length) {
    $mainMenuState.change(function(e) {
      if (this.checked) {
        return $menu.hide().slideDown(250, function() {
          return $menu.css('display', '');
        });
      } else {
        return $menu.show().slideUp(250, function() {
          return $menu.css('display', 'none');
        });
      }
    });
    $(window).bind('beforeunload unload', function() {
      if ($mainMenuState[0].checked) {
        $mainMenuState[0].click();
      }
    });
  }
  $(window).on('load', function() {
    if ($(window).width() < 768) {
      console.log('eee');
      $menu.css('display', 'none');
      if ($mainMenuState.checked) {
        $menu.css('display', 'block');
      } else {
        $menu.css('display', 'none');
      }
    }
  });
});
