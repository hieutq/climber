$(function(){
	// ページトップ
		$('#content, #main, #nav').flatHeights();
	// ページトップ
		$(".pagetop a").click(function(){
      		var speed = 300;// ミリ秒
     		var href= $(this).attr("href");
     		var target = $(href == "#" || href == "" ? 'html' : href);
     		var position = target.offset().top;
      		$($.browser.safari ? 'body' : 'html').animate({scrollTop:position}, speed, 'swing');
     		return false;
		})
	// 外部リンク新規ウインドウ
		$("a[href^='http://']").attr("target","_blank");

	$(function(){
		fontsizeChange();
	});

	function fontsizeChange(){

		var changeArea = $("#content, #nav");
		var btnArea = $("#fontSize");
		var changeBtn = btnArea.find(".changeBtn");
		var fontSize = [100,116,131];
		var ovStr = "_ov";
		var activeClass = "active";
		var defaultSize = 0;
		var cookieExpires = 7;
		var sizeLen = fontSize.length;
		var useImg = ovStr!="" && changeBtn.is("[src]");

		//現在クッキー確認関数
		function nowCookie(){
			return $.cookie("fontsize");
		}

		//画像切替関数
		function imgChange(elm1,elm2,str1,str2){
			elm1.attr("src",elm2.attr("src").replace(new RegExp("^(\.+)"+str1+"(\\.[a-z]+)$"),"$1"+str2+"$2"));
		}

		//マウスアウト関数
		function mouseOut(){
			for(var i=0; i<sizeLen; i++){
				if(nowCookie()!=fontSize[i]){
					imgChange(changeBtn.eq(i),changeBtn.eq(i),ovStr,"");
				}
			}
		}

		//フォントサイズ設定関数
		function sizeChange(){
			changeArea.css({fontSize:nowCookie()+"%"});
		}

		//クッキー設定関数
		function cookieSet(index){
			$.cookie("fontsize",fontSize[index],{path:'/',expires:cookieExpires});
		}

		//初期表示
		if(nowCookie()){
			for(var i=0; i<sizeLen; i++){
				if(nowCookie()==fontSize[i]){
					sizeChange();
					var elm = changeBtn.eq(i);
					if(useImg){
						imgChange(elm,elm,"",ovStr);
					}
					elm.addClass(activeClass);
					break;
				}
			}
		}
		else {
			cookieSet(defaultSize);
			sizeChange();
			var elm = changeBtn.eq(defaultSize);
			if(useImg){
				imgChange(elm,elm,"",ovStr);
				imgChange($("<img>"),elm,"",ovStr);
			}
			elm.addClass(activeClass);
		}

		//ホバーイベント（画像タイプ）
		if(useImg){
			changeBtn.each(function(i){
				var self = $(this);
				self.hover(
				function(){
					if(nowCookie()!=fontSize[i]){
						imgChange(self,self,"",ovStr);
					}
				},
				function(){
					mouseOut();
				});
			});
		}

		//クリックイベント
		changeBtn.click(function(){
			var index = changeBtn.index(this);
			var self = $(this);
			cookieSet(index);
			sizeChange();
			if(useImg){
				mouseOut();
			}
			if(!self.hasClass(activeClass)){
				changeBtn.not(this).removeClass(activeClass);
				self.addClass(activeClass);
			}
		});

	}

})(jQuery);