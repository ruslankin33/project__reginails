$(document).ready(function(){

	$(".owl-carousel").owlCarousel({
	  	autoWidth: true,
	  });


	$('.main_block').slick({
		asNavFor: '.blocks',
		autoplay: true,
		autoplaySpeed: 2000,
		speed: 2000,
		draggable: false,
		infinite: true,
	});

	$('.blocks').slick({
		speed: 2000,
	  	slidesToShow: 6,
	  	asNavFor: '.main_block',
	  	centerMode: true,
	  	centerPadding: '40px',
	  	draggable: false,
	  	focusOnSelect: true,
	  	infinite: true,
	  	responsive: [
	    {
	      breakpoint: 1024,
	      settings: {
	        slidesToShow: 5,
	      }
	    },
	    {
	      breakpoint: 600,
	      settings: {
	        slidesToShow: 4,
	      }
	    },
	    {
	      breakpoint: 480,
	      settings: {
	        slidesToShow: 3,
	      }
	    }
	  ]
	});

});