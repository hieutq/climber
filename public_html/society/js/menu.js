function mainmenu(){
$(" #nav ul ").css({display: "none"}); // Opera Fix
$(" #nav li").hover(function(){
		$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(400);
		},function(){
		$(this).find('ul:first').css({visibility: "hidden"});
		});
}

 
 
 $(document).ready(function(){					
	mainmenu();
});

            
/* ================================================================ 
This copyright notice must be untouched at all times.
Stay Put!
Copyright (c) 2009 Stu Nicholls - stunicholls.com - all rights reserved.
=================================================================== */

$(function() {

  startPos = $("#contents_Left").position().top;
  divHeight = $("#contents_Left").outerHeight();
  if ($.browser.safari) {
    divHeight += 20;
  }  
  $("#placeHolder").css("height", divHeight + "px")

  $(window).scroll(function(e) {
    scrTop = $(window).scrollTop();

    if ((startPos - 5) < scrTop) {
      if ($.browser.msie && $.browser.version <= 6) {
        topPos = startPos + (scrTop - startPos) + 5;
        $("#contents_Left").css("position", "absolute")
	.css("top", topPos + "px")
	.css('zIndex', '500')
      }
      else {
        $("#contents_Left").css("position", "fixed")
	.css("top", "5px")
	.css("zIndex", "500")
      }
    }
    else {
      $("#contents_Left").css("position", "static")
    }

  });

});
          