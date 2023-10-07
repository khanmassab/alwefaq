

     $(document).ready(function(){
        $(".angle").click(function(){
            $("header ul.menu").toggleClass("open");
        });
    });

     $(document).ready(function(){
        $(".no-of").click(function(){
            $(".no-of").toggleClass("on");
            $(".monthly").toggleClass("now");
            $(".yearly").toggleClass("now");
        });
    });

     $(document).ready(function(){
        $(".bars").click(function(){
            $(".dashboard .sidbar ul").toggleClass("ul-open");
        });
    });




// const elSelectCustom = document.getElementsByClassName("js-selectCustom")[0];
// const elSelectCustomValue = elSelectCustom.children[0];
// const elSelectCustomOptions = elSelectCustom.children[1];
// const defaultLabel = elSelectCustomValue.getAttribute("data-value");

// // Listen for each custom option click
// Array.from(elSelectCustomOptions.children).forEach(function (elOption) {
//   elOption.addEventListener("click", e => {
//     // Update custom select text too
//     elSelectCustomValue.textContent = e.target.textContent;
//     // Close select
//     elSelectCustom.classList.remove("isActive");
//   });
// });

// // Toggle select on label click
// elSelectCustomValue.addEventListener("click", e => {
//   elSelectCustom.classList.toggle("isActive");
// });

// // close the custom select when clicking outside.
// document.addEventListener("click", e => {
//   const didClickedOutside = !elSelectCustom.contains(event.target);
//   if (didClickedOutside) {
//     elSelectCustom.classList.remove("isActive");
//   }
// });




$(document).ready(function(){
    $(".fa-bars").click(function(){
        $(".menu").toggleClass("open");
    });
});







$(document).ready(function() {
      var owl = $(".sliders");
        owl.owlCarousel({
        navigation : true, 
        pagination :false,   
        autoPlay : true,
       // transitionStyle : "fade",
        singleItem : true
      });     
});


$(document).ready(function() {
      var owl = $(".slider-text");
        owl.owlCarousel({
        navigation : false, 
        pagination :true,   
        autoPlay : true,
       // transitionStyle : "fade",
        singleItem : true
      });     
});



$(document).ready(function() {
    $(".slider-logo").owlCarousel({
        items : 5,
        itemsDesktop : [1199,5],
        itemsMobile : [600,2],
        navigation : false, 
        pagination :true,   
        autoPlay : true
    });
});




/*
$(document).ready(function() {
      var owl = $(".slider-say");
        owl.owlCarousel({
        navigation : false, 
        pagination :true,   
        autoPlay : true,
       // transitionStyle : "fade",
        singleItem : true
      });     
});


$(document).ready(function() {
    $(".slider-service").owlCarousel({
        items : 5,
        itemsDesktop : [1199,5],
        itemsMobile : [600,2],
        navigation : true, 
        pagination :false,   
        autoPlay : true
    });
});





$(document).ready(function() {
    $(".clint-slider").owlCarousel({
        items : 1,
        itemsDesktop : [1199,1],
        itemsMobile : [600,1],
        navigation : false, 
        pagination :true,   
        autoPlay : true
    });
});
*/







   var a = 0;
    $(window).scroll(function() {
        var oTop = $('.num').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-number').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },
                    {
                        duration: 7000,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }
                    });
            });
            a = 1;
        }
    });