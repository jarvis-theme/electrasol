var dirTema = document.getElementsByTagName('link')[1].getAttribute('href');

require.config({
	baseUrl: '/',
    urlArgs: "v=001",
	waitSeconds: 120,
	shim: {
		"bootstrap"	: {
			deps: ['jquery'],
		},
		'jq_ui' : {
			deps : ['jquery'],
		},
		"noty_util" : {
			deps : ['jquery','noty'],
		},
		"noty" : {
			deps : ['jquery'],
		},
		"cart" : {
			deps : ['jquery'],
		},
		'fancybox' : {
			deps : ['jquery']
		},
		"pretty_photo" : {
			deps : ['jquery'],
		},
		"scroll" : {
			deps : ['jquery'],
		},
	},

	paths: {
		// LIBRARY
		jquery 			: ['//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min',dirTema+'assets/js/lib/jquery'],
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		noty_util		: 'js/utils/noty',
		bootstrap		: ['//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min',dirTema+'/assets/js/lib/bootstrap.min'],
		fancybox		: dirTema+'assets/js/lib/jquery.fancybox.pack',
		pretty_photo	: dirTema+'assets/js/lib/jquery.prettyPhoto',
		respond			: dirTema+'assets/js/lib/respond.min',
		scroll			: dirTema+'assets/js/lib/jquery.scrollUp.min',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		main	        : dirTema+'assets/js/pages/default',
	}
});
require([
	'jquery',
	'router',
	'cart',
	'noty_util',
	'main'
], function($,router,cart,noty,main)
{
	router.run();
	noty.run();
	cart.run();
	main.run();
});