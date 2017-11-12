/**
 * scrolllayer.js version 1.0.1
 *  (c) 2007 Sonicjam Inc.
 * 
 * scrolllayer.js is released under the MIT-style license.
 * 
 * v1.0.1 bug fix: delete remove queue logic.
 */

var ScrollLayerMoveDuration = 0.5;
var ScrollLayerCheckInterval = 0.3;
var ScrollLayerMargin = [0, 0];

var ScrollLayer = Class.create();
ScrollLayer.index = 0;
Object.extend(ScrollLayer.prototype, {
	initialize: function(scrollLayer, index) {
		this.scrollLayer = $(scrollLayer);
		this.startLayerPos = Position.cumulativeOffset(this.scrollLayer);
		this.interval = setInterval(this.scroll.bind(this), ScrollLayerCheckInterval * 1000);
		this.scopeName = this.getScopeName() + ScrollLayer.index;
		ScrollLayer.index++;
	},
	getScopeName: function() {
		return 'scrolllayer';
	},
	scroll: function() {
		this.setGoal();
		
		var position = Position.cumulativeOffset(this.scrollLayer);
		if (this.isGoal(position)) {
			return;
		}
		
		var delta = this.getDelta(position);
		this.moveLayer(delta);
	},
	setGoal: function() {
		var windowSize = LayerCommon.getWindowSize();
		var pageScroll = LayerCommon.getPageScroll();
		var layerSize = [this.scrollLayer.getWidth(), this.scrollLayer.getHeight()];
		
		this.goal = [this.startLayerPos[0], this.startLayerPos[1]];
		if (this.startLayerPos[0] < pageScroll[0] + ScrollLayerMargin[0]) {
			this.goal[0] = pageScroll[0] + ScrollLayerMargin[0];
		} else if (this.startLayerPos[0] + layerSize[0] > pageScroll[0] + windowSize[0] - ScrollLayerMargin[0]) {
			this.goal[0] = pageScroll[0] + windowSize[0] - ScrollLayerMargin[0] - layerSize[0];
		}
		if (this.startLayerPos[1] < pageScroll[1] + ScrollLayerMargin[1]) {
			this.goal[1] = pageScroll[1] + ScrollLayerMargin[1];
		} else if (this.startLayerPos[1] + layerSize[1] > pageScroll[1] + windowSize[1] - ScrollLayerMargin[1]) {
			this.goal[1] = pageScroll[1] + windowSize[1] - ScrollLayerMargin[1] - layerSize[1];
		}
	},
	getDelta: function(position) {
		var delta = [this.goal[0] - position[0], this.goal[1] - position[1]];
		return delta;
	},
	moveLayer: function(delta) {
		new Effect.Move(this.scrollLayer, {x: delta[0], y: delta[1], duration: ScrollLayerMoveDuration, mode: 'relative', queue: {limit: 1, position: 'end', scope: this.scopeName}});
	},
	isGoal: function(position) {
		if (position[0] == this.goal[0] && position[1] == this.goal[1]) {
			return true;
		}
		return false;
	}
});

var FixedScrollLayer = Class.create();
Object.extend(Object.extend(FixedScrollLayer.prototype, ScrollLayer.prototype), {
	getScopeName: function() {
		return 'fixedscrolllayer';
	},
	setGoal: function() {
		var pageScroll = LayerCommon.getPageScroll();
		
		this.goal = [pageScroll[0] + this.startLayerPos[0], pageScroll[1] + this.startLayerPos[1]];
	}
});

var ScrollLayers = Class.create();
Object.extend(ScrollLayers.prototype, {
	initialize: function() {
		var scrollLayers = document.getElementsByClassName('scrolllayer');
		scrollLayers.each(function(scrollLayer) {
			new ScrollLayer(scrollLayer);
		});
		var fixedScrollLayers = document.getElementsByClassName('scrolllayerfixed');
		fixedScrollLayers.each(function(scrollLayer) {
			new FixedScrollLayer(scrollLayer);
		});
	}
});

function initScrollLayers() {
	new ScrollLayers();
}
Event.observe(window, 'load', initScrollLayers, false);
