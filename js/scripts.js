$(document).ready(function(){
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
    mainClass: 'mfp-with-zoom', 
    gallery:{
                enabled:true
            },
    zoom: {
        enabled: true, 
        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function
        opener: function(openerElement) {
        return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
    }
    });
    $('.client-says-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:2
            }
        }
    })
});
