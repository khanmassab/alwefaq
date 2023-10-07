
$('.slider .owl-carousel').owlCarousel({
	items:1,
	navigation: false,
	navigationText: [ '<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow-1"></i>'],  
	pagination:false,
    itemsMobile: [768,1],
    itemsTablet: [992,1],
    itemsDesktopSmall: [1199,1],

});

$('.superiors .owl-carousel').owlCarousel({
	items:1,
	navigation: false,
	navigationText: [ '<i class="flaticon-left-arrow"></i>', '<i class="flaticon-right-arrow-1"></i>'],  
	pagination:true,
    autoPlay : 3000,
    itemsMobile: [600,1],
    itemsTablet: [995,1],
    itemsDesktopSmall: [992,1],
  
});

$(document).ready(function() {

        $('.open_modal').on('click', function() {
            $('.items').fadeIn().addClass('actv');
        });
        
        $('.close_modal').on('click', function() {
             $('.items').removeClass('actv').fadeOut();
            
        });
    });

    $(document).ready(function() {
        $('.select_2').select2();
    });

(function() {
    	var $body = document.body
    	, $menu_trigger = $body.getElementsByClassName('menu-trigger')[0];
    
    	if ( typeof $menu_trigger !== 'undefined' ) {
    		$menu_trigger.addEventListener('click', function() {
                jQuery('body').addClass('menu-active');
    		});
    	}
    
    }).call(this);
    
    /* Close/hide the sidenav */
    function closeNav() {
       jQuery('body').removeClass('menu-active');
    }
    
new WOW().init();


$(".optionchecked input").change(
    function(){
    $('label:has(input:radio:checked)').parents('.optionchecked').addClass('activet');
    $('label:has(input:radio:checked)').addClass('active');
    $('label:has(input:radio:not(:checked))').removeClass('active');
    $('label:has(input:radio:not(:checked))').parents('.optionchecked').removeClass('activet');
    });