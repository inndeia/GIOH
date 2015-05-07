var image_field;
jQuery(function($){
  $(document).on('click', 'input.select-img', function(evt){
    image_field = $(this).siblings('.img');
    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
    return false;
  });
  window.send_to_editor = function(html) {
	    imgurl = $('img', html).attr('src');
	    image_field.val(imgurl);
	    tb_remove();

  }
  
  $(document).on('click', 'input.select-img-1', function(evt){
	    image_field = $(this).siblings('.img1');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	  });
	  window.send_to_editor = function(html) {
		    imgurl = $('img', html).attr('src');
		    image_field.val(imgurl);
		    tb_remove();

	  }
  $(document).on('click', 'input.select-img-2', function(evt){
	    image_field = $(this).siblings('.img2');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	  });
	  window.send_to_editor = function(html) {
		    imgurl = $('img', html).attr('src');
		    image_field.val(imgurl);
		    tb_remove();

	  }
  $(document).on('click', 'input.select-img-3', function(evt){
	    image_field = $(this).siblings('.img3');
	    tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
	    return false;
	  });
	  window.send_to_editor = function(html) {
		    imgurl = $('img', html).attr('src');
		    image_field.val(imgurl);
		    tb_remove();

	  }
});