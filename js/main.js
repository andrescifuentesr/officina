jQuery(window).load(function() { 
	jQuery('.flexslider').flexslider({
		animation: "slide",
		slideshow: false,
		controlNav: false,
		start:function(){
			jQuery(".site-main").find(".flexslider-wrapper").removeClass("loading");
			jQuery(".spinner").hide();
		}
	}); 
});

jQuery(function($) {
	$('.item-home-equal').matchHeight();
});

/*
fx for the home slider
jQuery(function($) {
	$("#slider-index").responsiveSlides({
		auto: true,
		pager: false,
		nav: false,
		speed: 500,
		random: true,
		namespace: "callbacks"
	});
});

fx for the projects slider
jQuery(function($) {
	$(".rslides-proyects").responsiveSlides({
		auto: false,
		pager: false,
		nav: true,
		speed: 500,
		namespace: "callbacks"
	});
});
*/

//fx pour le fancybox de la home
jQuery(function($) {
	// Initialize the Lightbox for any links with the 'fancybox' class
	$(".fancybox").fancybox();
	// Initialize the Lightbox automatically for any links to images with extensions .jpg, .jpeg, .png or .gif
	$("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']").fancybox(
	{
	padding : 5
	});

	// Initialize the Lightbox and add rel="gallery" to all gallery images when the gallery is set up using  so that a Lightbox Gallery exists
	$(".gallery a[href$='.jpg'], .gallery a[href$='.png'], .gallery a[href$='.jpeg'], .gallery a[href$='.gif']").attr('rel','gallery').fancybox();
	// Initalize the Lightbox for any links with the 'video' class and provide improved video embed support
});

//function for Responsive menu proyectos
jQuery(function($) {
	$(".nav-responsive").tinyNav();
});

	
//We call Google Maps function	
function initialize() {

	// Create an array of styles.
	var styles = [
		{
			"elementType": "geometry",
			"stylers": [
				{ "gamma": 0.98 },
				{ "hue": "#00aaff" },
				{ "saturation": -96 },
				{ "lightness": 54 }
			]
		},{
			"elementType": "labels.text.fill",
			"stylers": [
				{ "visibility": "on" },
				{ "color": "#768480" },
				{ "saturation": -100 },
				{ "lightness": 37 }
			]
		},{
			"featureType": "road",
			"elementType": "labels.text.fill",
			"stylers": [
				{ "visibility": "off" },
				{ "hue": "#ff00b2" }
			]
		},{
			"elementType": "labels.text.stroke",
			"stylers": [
				{ "hue": "#0055ff" },
				{ "gamma": 0.20 },
				{ "lightness": 19 },
				{ "weight": 0.1 },
				{ "saturation": -100 }
			]
		}
	];

	var Officina = new google.maps.LatLng(48.861496, 2.382145);

	var styledMap = new google.maps.StyledMapType(styles,
	{name: "Styled Map"});

	var mapOptions = {
		center: Officina,
		zoom: 17,
		mapTypeControlOptions: {
			mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
		}
	};
	
	var map = new google.maps.Map(document.getElementById("map_canvas"),
		mapOptions);
	
	var marker = new google.maps.Marker({
		position: Officina,
		map: map,
		title: "Officina"
	});	
	
	
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');

}
//end function google maps