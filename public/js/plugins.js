$(window).on("load", function () {
    var tab = $('[role="tab"]');

    tab.each(function () {
        $(this).on("click", function () {
            $("li[aria-selected='false']").removeClass("done");
        });
    });
    var maxHeight = -1;
    jQuery(".height_shop").each(function () {
        maxHeight =
            maxHeight > jQuery(this).height()
                ? maxHeight
                : jQuery(this).height();
    });

    jQuery(".sidebar").each(function () {
        jQuery(this).height(maxHeight);
    });
});
$("#choices-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    spaceBetween: 25,
    autoplayDisableOnInteraction: true,
    loop: false,
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
    },
});
$("#albms-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#video-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#single-slider2").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});
$("#news-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#album-slider2").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#news-slider2").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#media-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
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
    },
});

$("#search-slider2").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    slidesPerColumn: 3,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
    breakpoints: {
        580: {
            slidesPerView: 4,
            slidesPerColumn: 3,
        },
        768: {
            slidesPerView: 3,
            slidesPerColumn: 3,
        },
        1024: {
            slidesPerView: 4,
            slidesPerColumn: 3,
        },
    },
});
$("#media-slider2").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 4,
    slidesPerColumn: 3,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
    breakpoints: {
        580: {
            slidesPerView: 4,
            slidesPerColumn: 3,
        },
        768: {
            slidesPerView: 3,
            slidesPerColumn: 3,
        },
        1024: {
            slidesPerView: 4,
            slidesPerColumn: 3,
        },
    },
});

$("#partners-slider").swiper({
    autoplay: true,
    speed: 4000,
    mode: "horizontal",
    slidesPerView: 6,
    spaceBetween: 15,
    loop: false,
    nextButton: ".swiper-button-next",
    prevButton: ".swiper-button-prev",
    paginationClickable: true,
    pagination: ".swiper-pagination",
    breakpoints: {
        580: {
            slidesPerView: 4,
        },
        768: {
            slidesPerView: 4,
        },
        1024: {
            slidesPerView: 6,
        },
    },
});
$("#customer-slider").swiper({
    autoplay: false,
    speed: 4000,
    mode: "horizontal",
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
    },
});
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
AOS.init();
$("#slider").swiper({
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: 2500,
    mode: "horizontal",
    slidesPerView: 1,
});
$("#service-slider").swiper({
    autoplay: 2500,
    slidesPerView: 2,
    slidesPerColumn: 2,
    breakpoints: {
        580: {
            slidesPerView: 2,
            slidesPerColumn: 2,
        },
        768: {
            slidesPerView: 2,
            slidesPerColumn: 2,
        },
        1024: {
            slidesPerView: 2,
            slidesPerColumn: 2,
        },
    },
});
$("#nav-slider").swiper({
    spaceBetween: 10,
    autoplay: false,
    mode: "horizontal",
    slidesPerView: 4,
});
$ = jQuery;
$(document).ready(function () {
    $(".media_page a").fancybox();
    $(".select_").select2();
    $("#demo1").sharrre({
        share: {
            googlePlus: true,
            facebook: true,
            twitter: true,
        },
        buttons: {
            googlePlus: { size: "tall", annotation: "bubble" },
            facebook: { layout: "box_count" },
            twitter: { count: "vertical", via: "_JulienH" },
        },
        hover: function (api, options) {
            $(api.element).find(".buttons").show();
        },
        hide: function (api, options) {
            $(api.element).find(".buttons").hide();
        },
        enableTracking: true,
    });
    var $parent = $(".parent");
    var $firefox = $(".parent").find(".mozilla");
    var $chrome = $(".parent").find(".chrome");
    var $ie = $(".parent").find(".ie");
    var $items = $parent.find("li");
    var tl = new TimelineMax();
    var loop = new TimelineMax({ repeat: -1 });
    var tween;
    var dur = 2;
    var target = $("ul.parent li");
    target.each(function (index, element) {
        tween = new TimelineMax();
        tween
            .fromTo(
                element,
                dur,
                { x: 200, autoAlpha: 0 },
                { x: 0, autoAlpha: 1 }
            )
            .to(element, dur, { x: 200, autoAlpha: 0, delay: 3 });
        loop.add(tween);
    });
    tl.add(loop);
    (function ($) {
        $(".tab ul.tabs")
            .addClass("active")
            .find("> li:eq(0)")
            .addClass("current");
        $(".tab ul.tabs li a").click(function (g) {
            var tab = $(this).closest(".tab"),
                index = $(this).closest("li").index();
            tab.find("ul.tabs > li").removeClass("current");
            $(this).closest("li").addClass("current");
            tab.find(".tab_content")
                .find("div.tabs_item")
                .not("div.tabs_item:eq(" + index + ")")
                .slideUp();
            tab.find(".tab_content")
                .find("div.tabs_item:eq(" + index + ")")
                .slideDown();
            g.preventDefault();
        });
    })(jQuery);

    $("#albm2-slider2").swiper({
        autoplay: 2500,
        slidesPerView: 4,
        slidesPerColumn: 2,
        breakpoints: {
            580: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
            1024: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
        },
    });

    $("#product-slider").swiper({
        autoplay: 2500,
        slidesPerView: 4,
        slidesPerColumn: 2,
        breakpoints: {
            580: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
            1024: {
                slidesPerView: 3,
                slidesPerColumn: 2,
            },
        },
    });

    $("#shares-slider").swiper({
        autoplay: false,
        speed: 4000,
        mode: "horizontal",
        slidesPerView: 3,
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev",
        spaceBetween: 65,
        autoplayDisableOnInteraction: true,
        loop: false,
        breakpoints: {
            580: {
                slidesPerView: 1,
                spaceBetween: 25,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 35,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 15,
            },
        },
    });

    $("#customer-slider").swiper({
        autoplay: false,
        speed: 4000,
        mode: "horizontal",
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
        },
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    AOS.init();
    $("#slider").swiper({
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: 2500,
        mode: "horizontal",
        slidesPerView: 1,
    });
    $("#service-slider").swiper({
        autoplay: 2500,
        slidesPerView: 2,
        slidesPerColumn: 2,
        breakpoints: {
            580: {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            768: {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
            1024: {
                slidesPerView: 2,
                slidesPerColumn: 2,
            },
        },
    });
    $("#nav-slider").swiper({
        spaceBetween: 10,
        autoplay: false,
        mode: "horizontal",
        slidesPerView: 4,
    });
    // Inline popups
    $("#inline-popups").magnificPopup({
        delegate: "a",
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function () {
                this.st.mainClass = this.st.el.attr("data-effect");
            },
        },
        midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    // Image popups
    $("#image-popups").magnificPopup({
        delegate: "a",
        type: "image",
        removalDelay: 500, //delay removal by X to allow out-animation
        callbacks: {
            beforeOpen: function () {
                // just a hack that adds mfp-anim class to markup
                this.st.image.markup = this.st.image.markup.replace(
                    "mfp-figure",
                    "mfp-figure mfp-with-anim"
                );
                this.st.mainClass = this.st.el.attr("data-effect");
            },
        },
        closeOnContentClick: true,
        midClick: true, // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
    });

    // Hinge effect popup
    $("a.hinge").magnificPopup({
        mainClass: "mfp-with-fade",
        removalDelay: 1000, //delay removal by X to allow out-animation
        callbacks: {
            beforeClose: function () {
                this.content.addClass("hinge");
            },
            close: function () {
                this.content.removeClass("hinge");
            },
        },
        midClick: true,
    });
    $(".package-period").select2();
    $("#book-details").steps({
        headerTag: "h3",
        bodyTag: "section",
        enableAllSteps: true,
        transitionEffect: "slideLeft",
        autoFocus: true,
        onInit: function (event, current) {
            $(".actions > ul > li:first-child").attr("style", "display:none");
            var height =
                $("#bookModal")
                    .find(".body:eq(" + current + ") .content_h")
                    .height() + 100;
            $(".wizard > .content").height(height);
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            if (newIndex == 2) {
                if (
                    document.getElementById("transfer_image").files.length == 0
                ) {
                    alert("برجاء اختيار صورة الحواله");
                } else {
                    //let transferImage = $("#transfer_image").val();
                    //let total = $("#total").val();
                    //let payment_method = $("#payment_method").val();
                    let url = $("#checkoutform").attr("action");

                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    let myForm = document.getElementById("checkoutform");
                    let formData = new FormData(myForm);
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            console.log(data);
                            $("#num").html(0);
                            $("#book-details-p-0").html(
                                '<div class="p-5 text-center"><h1>السلة فارغة</h1> </div>'
                            );
                            $("#book-details-p-1").html(
                                '<div class="p-5 text-center"><h1>السلة فارغة</h1> </div>'
                            );
                            return true;
                        },
                        error: function (data) {
                            alert("حدث خطأ ");
                            console.log(data);
                        },
                    });
                    return true;
                }
            } else {
                return true;
            }
        },
        onStepChanged: function (event, current, next) {
            console.log(current,next)
            if (current > 0) {
                $(".actions > ul > li:first-child").attr(
                    "style",
                    "display:none"
                );
                $(".actions > ul > li:last-child").remove()
            }
            var height =
                $("#bookModal")
                    .find(".body:eq(" + current + ") .content_h")
                    .height() + 60;

            $(".wizard > .content").height(height);

            if (current == 2) {
                $(".btn-details").click(function () {
                    $(this).next().addClass("show_");
                });
                $(".back").click(function () {
                    $(".meal_details").removeClass("show_");
                });
            }
        },
        labels: {
            // finish: "تنفيذ الطلب",
            next: "التالي",
        },
    });
});
/**mobile menu **/
var iconMenu = document.querySelector(".icon-menu"),
    menu = document.querySelector(".menu"),
    menuLink = document.querySelectorAll(".menu-link.sub");

iconMenu.addEventListener("click", openMenu);

menuLink.forEach(function (el) {
    el.addEventListener("click", openSubmenu);
});

function openMenu() {
    if (menu.classList.contains("open")) {
        menu.classList.add("close");
        iconMenu.classList.remove("icon-closed");

        setTimeout(function () {
            menu.classList.remove("open");
        }, 1300);
    } else {
        menu.classList.remove("close");
        menu.classList.add("open");
        iconMenu.classList.add("icon-closed");
    }
}

function openSubmenu(event) {
    if (event.currentTarget.classList.contains("active")) {
        event.currentTarget.classList.remove("active");
    } else {
        event.currentTarget.classList.add("active");
    }
}

// jQuery.browser = {};
// (function () {
//     jQuery.browser.msie = false;
//     jQuery.browser.version = 0;
//     if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
//         jQuery.browser.msie = true;
//         jQuery.browser.version = RegExp.$1;
//     }
// })();
$ = jQuery;
$(document).ready(function () {
    $(".table").basictable();
    $("#meals_slider").swiper({
        slidesPerView: 2,
        slidesPerColumn: 2,
        spaceBetween: 30,
        nextButton: ".swiper-button-next",
        prevButton: ".swiper-button-prev",
        breakpoints: {
            1199: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            991: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            680: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            464: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
        },
    });
});

//  $('#partners-slider').swiper({
// autoplay: true,
// speed:4000,
// mode: 'horizontal',
// slidesPerView: 6,
// spaceBetween: 15,
// loop: true,
// nextButton: '.swiper-button-next',
// prevButton: '.swiper-button-prev',
// paginationClickable: true,
// pagination: '.swiper-pagination',
// breakpoints: {
// 580: {
// slidesPerView:4,
// },
// 768: {
// slidesPerView: 4,
// },
// 1024: {
// slidesPerView: 6,
// },
// }
// });

// $('a.dropdown-item').on('click', function(e) {
//     e.preventDefault();
//     alert('hi');
//   var link =  $(this).attr("href");
// window.location.href = link;
   
//     // Do my commands
// });

/*



  */
  
  
  
  $('.dropdown-menu.test a.dropdown-toggle').on('click', function(e) {
    
    console.log($(this).next().next())
    if (!$(this).next().hasClass('show')) {
      $(this).parents('.dropdown-menu.test').first().find('.show').removeClass("show");
      $(this).next().next().find('.show').toggleClass("show");

    }
    if ($(this).next().hasClass('show')) {
        $(this).next().next().find('.show').removeClass("show");
  
      }
    var $subMenu = $(this).next(".dropdown-menu.test");
    $subMenu.toggleClass("show")

  
  
    $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
      $('.dropdown-submenu .show').removeClass("show");
    });
  
  
    return false;
  });
  