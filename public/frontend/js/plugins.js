
// $(window).on('load', function (){
// var maxHeight = -1;
// jQuery('.fill_data').each(function() {
// maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
// });

// jQuery('.sidebar').each(function() {
// jQuery(this).height(maxHeight);
// });
// });
$(window).on('load', function (){
var maxHeight = -1;
jQuery('.height_shop').each(function() {
maxHeight = maxHeight > jQuery(this).height() ? maxHeight : jQuery(this).height();
});

jQuery('.sidebar').each(function() {
jQuery(this).height(maxHeight);
});
});

$=jQuery;
$(document).ready(function(){
$('.select_').select2();
$('#demo1').sharrre({
share: {
googlePlus: true,
facebook: true,
twitter: true
},
buttons: {
googlePlus: {size: 'tall', annotation:'bubble'},
facebook: {layout: 'box_count'},
twitter: {count: 'vertical', via: '_JulienH'}
},
hover: function(api, options){
$(api.element).find('.buttons').show();
},
hide: function(api, options){
$(api.element).find('.buttons').hide();
},
enableTracking: true
});
var $parent = $('.parent');
var $firefox = $('.parent').find('.mozilla');
var $chrome = $('.parent').find('.chrome');
var $ie = $('.parent').find('.ie');
var $items = $parent.find('li');
var tl = new TimelineMax();
var loop = new TimelineMax({repeat: -1});
var tween;
var dur = 2;
var target = $('ul.parent li');
target.each(function(index, element){
tween = new TimelineMax();
tween.fromTo(element, dur, { x: 200, autoAlpha: 0}, {x: 0, autoAlpha: 1})
.to(element, dur, {x: 200, autoAlpha: 0, delay: 3});
loop.add(tween);
})
tl.add(loop);
(function ($) { 
$('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
$('.tab ul.tabs li a').click(function (g) { 
var tab = $(this).closest('.tab'), 
index = $(this).closest('li').index();
tab.find('ul.tabs > li').removeClass('current');
$(this).closest('li').addClass('current');
tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
g.preventDefault();
} );
})(jQuery);
$('#product-slider').swiper({
autoplay: 2500,
slidesPerView: 4,
slidesPerColumn: 2,
breakpoints: {
580: {
slidesPerView: 3,
slidesPerColumn: 2,      },
768: {
slidesPerView: 3,
slidesPerColumn: 2,      },
1024: {
slidesPerView: 3,
slidesPerColumn: 2,      },
}
});

$('#shares-slider').swiper({
autoplay: false,
speed:4000,
mode: 'horizontal',
slidesPerView: 3,
nextButton: '.swiper-button-next',
prevButton: '.swiper-button-prev',
spaceBetween: 65,
autoplayDisableOnInteraction: true,
loop: true,
breakpoints: {
580: {
slidesPerView: 2,
spaceBetween: 25,

},
768: {
slidesPerView: 2,
spaceBetween: 35,

},
1024: {
slidesPerView: 3,
spaceBetween: 15,},
}
});

$('#choices-slider').swiper({
autoplay: true,
speed:4000,
mode: 'horizontal',
slidesPerView: 4,
nextButton: '.swiper-button-next',
prevButton: '.swiper-button-prev',
spaceBetween: 25,
autoplayDisableOnInteraction: true,
loop: true,
breakpoints: {
580: {
slidesPerView: 1,
},
768: {
slidesPerView: 2,
},
1024: {
slidesPerView: 3,
},
}
});
// if(document.querySelector('.swiper-container')){
// var mySwiper = document.querySelector('.swiper-container').swiper;
// mySwiper.slideNext();
// mySwiper.slidePrev();
// }
$('#media-slider').swiper({
autoplay: true,
speed:4000,
mode: 'horizontal',
slidesPerView: 4,
spaceBetween: 15,
loop: true,
nextButton: '.swiper-button-next',
prevButton: '.swiper-button-prev', 
paginationClickable: true,
pagination: '.swiper-pagination',
breakpoints: {
580: {
slidesPerView: 3,
},
768: {
slidesPerView: 3,
},
1024: {
slidesPerView: 4,
},
}
});
$('#partners-slider').swiper({
autoplay: true,
speed:4000,
mode: 'horizontal',
slidesPerView: 6,
spaceBetween: 15,
loop: true,
nextButton: '.swiper-button-next',
prevButton: '.swiper-button-prev', 
paginationClickable: true,
pagination: '.swiper-pagination',
breakpoints: {
580: {
slidesPerView:4,
},
768: {
slidesPerView: 4,
},
1024: {
slidesPerView: 6,
},
}
});
$('#customer-slider').swiper({
autoplay: false,
speed:4000,
mode: 'horizontal',
slidesPerView: 1,
spaceBetween: 0,
loop: false,
breakpoints: {
580: {
slidesPerView: 1,
},
768: {
slidesPerView: 1,
},
1024: {
slidesPerView: 1,
},
}
});
$(function () {
$('[data-toggle="tooltip"]').tooltip()
});
AOS.init();
$('#slider').swiper({
spaceBetween: 30,
centeredSlides: true,
autoplay: 2500,
mode: 'horizontal',
slidesPerView: 1,
});
$('#service-slider').swiper({
autoplay: 2500,
slidesPerView: 2,
slidesPerColumn: 2,
breakpoints: {
580: {
slidesPerView: 2,
slidesPerColumn: 2,      },
768: {
slidesPerView: 2,
slidesPerColumn: 2,      },
1024: {
slidesPerView: 2,
slidesPerColumn: 2,      },
}
});
$('#nav-slider').swiper({
spaceBetween: 10,
autoplay: false,
mode: 'horizontal',
slidesPerView: 4,
});
});
jQuery.browser = {};
(function () {
    jQuery.browser.msie = false;
    jQuery.browser.version = 0;
    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
        jQuery.browser.msie = true;
        jQuery.browser.version = RegExp.$1;
    }
})();