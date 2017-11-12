var LayerCommon = Class.create();

LayerCommon.getPageScroll = function() {
	var scrollLeft, scrollTop;
	
	if (document.documentElement && document.documentElement.scrollTop){	// Explorer 6 Strict
		scrollLeft = document.documentElement.scrollLeft;
		scrollTop = document.documentElement.scrollTop;
	} else {	// all other Explorers
		scrollLeft = document.body.scrollLeft;
		scrollTop = document.body.scrollTop;
	}
	
	return [scrollLeft, scrollTop];
};


LayerCommon.getScrollSize = function() {
	var scrollWidth, scrollHeight;
	
	if (document.body && document.body.scrollWidth) {
		scrollWidth = document.body.scrollWidth;
		scrollHeight = document.body.scrollHeight;
	} else {
		scrollWidth = document.body.offsetWidth;
		scrollHeight = document.body.offsetHeight;
	}
	
	return [scrollWidth, scrollHeight];
};

LayerCommon.getWindowSize = function() {
	var windowWidth, windowHeight;
	
	if (navigator.userAgent.indexOf("Safari") >= 0) {
		windowWidth = window.innerWidth;
		windowHeight = window.innerHeight;
	} else {
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}
	
	return [windowWidth, windowHeight];
};

LayerCommon.correctLayerPostion = function(layerLeft, layerTop, layerWidth, layerHeight) {
	var pageScroll = LayerCommon.getPageScroll();
	var windowSize = LayerCommon.getWindowSize();
	
	var delta = 2;
	
	if (layerLeft + layerWidth > pageScroll[0] + windowSize[0]) {
		layerLeft = pageScroll[0] + windowSize[0] - layerWidth - delta;
		if (layerLeft < pageScroll[0]) {
			layerLeft = pageScroll[0];
		}
	}
	if (layerTop + layerHeight > pageScroll[1] + windowSize[1]) {
		layerTop = pageScroll[1] + windowSize[1] - layerHeight - delta;
		if (layerTop < pageScroll[1]) {
			layerTop = pageScroll[1];
		}
	}
	
	return [layerLeft, layerTop];
};
