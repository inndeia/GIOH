jQuery(function(){
jQuery( document ).ready(function() {
jQuery('#cssmenu > ul > li > a').click(function() {
  jQuery('#cssmenu li').removeClass('active');
  jQuery(this).closest('li').addClass('active');	
  var checkElement = jQuery(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    jQuery(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    jQuery('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if(jQuery(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});
});
});
