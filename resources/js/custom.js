/*
 * Custom code goes here.
 * A template should always ship with an empty custom.js
 */


/*=========== image slider =========== */
 $(window).load(function() {
    if ($('.flexslider').length > 0) {
        $('.flexslider').flexslider({
            slideshowSpeed: $('.flexslider').data('interval'),
            pauseOnHover: $('.flexslider').data('pause'),
            animation: "fade"
        });
    }
});
 

/*========== loader =========== */
$(window).load(function() {
    $(".loadingdiv").removeClass("spinner");
});
  

/*============ Examples of how to assign the Colorbox event to elements =================*/
/*$(".aei-service-item-inner").colorbox({inline:true});*/


/*=========== customer sign in dropdown =========== */ 
$(".user-info").on("click", function(event) {
  event.stopPropagation();
});


/*===========Search dropdown=========== 
  $(".ax-search-icon").on("click", function(event) {
      $(this).toggleClass('active');
  });
*/


/*=========== language/currancy in dropdown =========== */ 
$(document).ready(function(){
 $('.language-selector-wrapper').click(function(event){
		$(this).toggleClass('active');
		event.stopPropagation();
		$(".langauge-dropdown").slideToggle("fast");
	});				   
});

$(document).ready(function(){
	$('.currency-selector').click(function(event){
		$(this).toggleClass('active');
		event.stopPropagation();
		$(".currency-dropdown").slideToggle("fast");
	});
}); 



/*============ add to cart toggle ===============*/
$(".cart-hover-content").on("click", function(event) {
    event.stopPropagation();
});


/*=========== featured product slick slider =========== */
$('#aeifeature-slider').slick({
  appendArrows: $('#aeifeatured-arrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/*=========== new product slick slider =========== */
$('#aeinewproduct-slider').slick({
  appendArrows: $('#aeinewproduct-arrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/*===========Bestseller product slick slider=========== */
$('#aeibestseller-slider').slick({
  appendArrows: $('#aeibestsellerarrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
	
	
/*=========== accesories slick slider =========== */
$('#aeiaccessories-slider').slick({
  appendArrows: $('#aeiaccessories-arrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/*===========Special product slick slider=========== */
$('#aeispecial-slider').slick({
  appendArrows: $('#aeispecialarrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

/*=========== brand logo slick slider =========== */
$('#aeibrand-slider').slick({
  appendArrows: $('#aeibrand-arrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 5,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/*===========Testimony slick slider=========== */
$('#aeitestimony-slider').slick({
  appendArrows: $('#aeitestimonyarrows'),
  dots: true,
  fade: true,
  autoplay:false,
  infinite: true,
  speed: 300,
  slidesToShow: 1,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 899,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});

$('.slider-nav-thumbnails').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '#aeitestimony-slider',
  dots: false,
  arrows:false,
  focusOnSelect: true
 });

 // Remove active class from all thumbnail slides
 $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

 // Set active class to first thumbnail slides
 $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

 // On before slide change match active thumbnail to current slide
 $('#aeitestimony-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  var mySlideNumber = nextSlide;
  $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
  $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
  $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-current');
});


/*===========Blog slick slider=========== */
$('#psblog-slider').slick({
  appendArrows: $('#blog-arrows'),
  dots: false,
  infinite: false,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    },
    {
      breakpoint: 899,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
		rows: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});



/*===========Services slick slider=========== */
$('#aei-services').slick({
  arrows: false,
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 899,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});


/*=========== list grid view =========== */
$(document).ready(function(){
    
    $('.show_list').click(function(){   
    $('.show_grid.active').removeClass('active');
        $(this).toggleClass('active');  
        $('#js-product-list .product-miniature').addClass('product_show_list');
    });

    $('.show_grid').toggleClass('active');  
    $('.show_grid').click(function(){
        $('.show_list.active').removeClass('active');
        $(this).toggleClass('active');
        $('#js-product-list .product-miniature').removeClass('product_show_list');
    });
     
    prestashop.on('updateProductList', function (event) {
        $('.show_list').click(function(){
            $('#js-product-list .product-miniature').addClass('product_show_list');
        });
         
        $('.show_grid').click(function(){
            $('#js-product-list .product-miniature').removeClass('product_show_list');
        });
    }); 
})


/*=========== page top to bottom =========== */
$(window).scroll(function() {
    if ($(this).scrollTop() > 500) {
        $('.ax-back-to-top').fadeIn(500);
    } else {
        $('.ax-back-to-top').fadeOut(500);
    }
});
$('.ax-back-to-top').click(function(event) {
    event.preventDefault();
    $('html, body').animate({
        scrollTop: 0
    }, 800);
});


/*============== menu toggle ================*/
jQuery(document).ready(function() {
  $("#top-menu .sub-menu li:has(ul)").parent().parent().parent().addClass("menu-dropdown");
  $("#top-vertical-menu .sub-menu li:has(ul)").parent().parent().parent().addClass("menu-dropdown");
  $("#left-column #top-vertical-menu .sub-menu li:has(ul)").parent().parent().parent().addClass("menu-dropdown");
});


/*===========left column =========== */
function responsivecolumn() {
    if ($(document).width() <= 991) {
        $('.container #left-column').insertAfter('#content-wrapper');
    } else if ($(document).width() >= 992) {
        $('.container #left-column').insertBefore('#content-wrapper');
    }
}
$(document).ready(function() {
    responsivecolumn();
});
$(window).resize(function() {
    responsivecolumn();
});


/*===========active menu responsive =========== */ 
 $('#menu-icon').on('click', function() {
    $(this).toggleClass('active');
  $('#mobile_top_menu_wrapper').toggleClass('active');
});
 
 
 
/*============ responsive header fixed =================*/

function responsivecolumn() {

    if ($(document).width() <= 991) {
        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > 0) {
                $('.header-nav').addClass('fixed');
				$('#header').addClass('fixed');
            } else {
                $('.header-nav').removeClass('fixed');
                $('#header').removeClass('fixed');
            }
        });
    }

    if ($(document).width() <= 991) {
        $('.container #columns_inner #left-column').appendTo('.container #columns_inner');

    } else if ($(document).width() >= 992) {
        $('.container #columns_inner #left-column').prependTo('.container #columns_inner');

    }
}
$(document).ready(function() {
    responsivecolumn();
});
$(window).resize(function() {
    responsivecolumn();
});



/*============ header fixed =================*/

function HeadFixTop() {
	
    if ($(document).width() >= 1350) {
		var num = 228;
        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > num) {
                $('.header-navfullwidth').addClass('fixed');
				$('.header-top').addClass('fixed');
            } else {
                $('.header-navfullwidth').removeClass('fixed');
                $('.header-top').removeClass('fixed');
            }
        });
    } else if ($(document).width() >= 992 && $(document).width() <= 1349) {
		var num = 221;
        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > num) {
                $('.header-navfullwidth').addClass('fixed');
				$('.header-top').addClass('fixed');
            } else {
                $('.header-navfullwidth').removeClass('fixed');
                $('.header-top').removeClass('fixed');
            }
        });
    } else {
        $('.header-navfullwidth').removeClass('fixed');
		$('.header-top').removeClass('fixed');
    }
}
jQuery(document).ready(function() {
    "use strict";
    HeadFixTop();
    $("#top-menu .sub-menu li:has(ul)").parent().parent().parent().addClass("mega");
    $("#top-vertical-menu li:has(ul)").parent().parent().addClass("mega");
});
jQuery(window).resize(function() {
    "use strict";
    HeadFixTop()
});


/*============ VerticalCategory Menu =================*/
function verticalToggle() {
   
    if ($(document).width() >= 992) {
		$(' #header .vertical-menu .top-vertical-menu').css('display', 'block');
		$('#header .vertical-menu .block-title').click(function(event) {
			$('#header .vertical-menu .top-vertical-menu').toggleClass('active');
			event.stopPropagation();
			$('#header .vertical-menu .top-vertical-menu').slideToggle("medium");
		});				
	}
}
jQuery(document).ready(function() {
    "use strict";
    verticalToggle();   
});

