var dirTema = document.querySelector("meta[name='theme_path']").getAttribute('content');

require.config({
	baseUrl: '/',
    urlArgs: "v=003",
	waitSeconds: 30,
	shim: {
		"bootstrap"	: {
			deps: ['jquery']
		},
		'jq_ui' : {
			deps : ['jquery']
		},
		"noty" : {
			deps : ['jquery']
		},
		"cart" : {
			deps : ['jquery']
		},
		'fancybox' : {
			deps : ['jquery']
		},
		"pretty_photo" : {
			deps : ['jquery']
		},
		"scroll" : {
			deps : ['jquery']
		}
	},

	paths: {
		// LIBRARY
		jquery 			: '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min',
		cart			: 'js/shop_cart',
		jq_ui			: 'js/jquery-ui',
		noty			: 'js/jquery.noty',
		bootstrap		: '//maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min',
		fancybox		: dirTema+'/assets/js/lib/jquery.fancybox.pack',
		pretty_photo	: dirTema+'/assets/js/lib/jquery.prettyPhoto',
		respond			: dirTema+'/assets/js/lib/respond.min',
		scroll			: dirTema+'/assets/js/lib/jquery.scrollUp.min',
		
		// ROUTE
		router          : 'js/router',

		// CONTROLLER
		main	        : dirTema+'/assets/js/pages/default',
	}
});
require([
	'jquery',
	'bootstrap',
	'router',
	'cart',
	'main'
], function($,b,router,cart,main)
{
	router.run();
	cart.run();
	main.run();
});