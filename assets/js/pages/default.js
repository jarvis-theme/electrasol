define(['jquery','fancybox','bootstrap','scroll'], function($,fancybox)
{
	return new function(){
		var self = this;
		self.run = function(){
			/*scroll to top*/
			$(document).ready(function(){
				$(function () {
					$.scrollUp({
				        scrollName: 'scrollUp', // Element ID
				        scrollDistance: 300, // Distance from top/bottom before showing element (px)
				        scrollFrom: 'top', // 'top' or 'bottom'
				        scrollSpeed: 300, // Speed back to top (ms)
				        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
				        animation: 'fade', // Fade, slide, none
				        animationSpeed: 200, // Animation in speed (ms)
				        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
						//scrollTarget: false, // Set a custom target element for scrolling to the top
				        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
				        scrollTitle: false, // Set a custom <a> title if required.
				        scrollImg: false, // Set true to use image
				        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
				        zIndex: 2147483647 // Z-Index for the overlay
					});
				});
			});

			// Qty produk
			$('.qty-block a').click(function(e){
				e.preventDefault();
				var currentQty= $(this).parent().parent().find('input').val();
				if( $(this).hasClass('product_quantity_down') && currentQty>1){
					$(this).parent().parent().find('input').val(parseInt(currentQty, 10) - 1);
				}else{
					if( $(this).hasClass('product_quantity_up')){
						$(this).parent().parent().find('input').val(parseInt(currentQty, 10) + 1);
					}
				}
			});

			$("a.fancybox").fancybox({
				'transitionIn'	:	'elastic',
				'transitionOut'	:	'elastic',
				'speedIn'		:	600, 
				'speedOut'		:	200, 
				'overlayShow'	:	false
			});
		};
	}
});