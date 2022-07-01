$('.cards-carousel').slick({
	slidesToShow: 3,
	slidesToScroll: 1,
	autoplay: true,
	autoplaySpeed: 2000,
	speed: 1600,
	arrows: false,
	adaptiveHeight: true,
	centerMode: true,
	centerPadding: '0',
	draggable: false,
	vertical: false,
	responsive: [
		{
			breakpoint: 768,
			settings: {
				vertical: true,
			},
		},
	],
})
