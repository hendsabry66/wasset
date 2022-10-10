/*!
Author:     Wady
Author URI: https://wady.sa
*/

$('.carousel-p').owlCarousel({
    rtl:true,
    loop:true,
    margin:20,
    nav:true,
    responsive:{
        0:{
            items:2
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})


$('.carousel-g').owlCarousel({
    rtl:true,
    items:1,
    loop:false,
    center:true,
    margin:10,
    URLhashListener:true,
    autoplayHoverPause:true,
    startPosition: 'URLHash'
})