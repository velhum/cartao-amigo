(function($){

    /* Front Page */

        /* AOS Demo: http://michalsnik.github.io/aos/

        /* Simulator */
        $('.hestia-simulator-content .hestia-info').attr('data-aos', 'zoom-in-up');
        
        /* Location */
        // $('.hestia-location-content h2').attr('data-aos', 'flip-left');
        
        /* ? */
        $('.card.card-profile.card-plain').attr('data-aos', 'flip-right');

        /* Blog */
        $('.hestia-blog-content .card.card-plain.card-blog').attr('data-aos', 'fade-up');

        /* Rede credenciada */
        $('.hestia-testimonials-content .card.card-testimonial.card-plain').attr('data-aos', 'zoom-in');
    
    /* Blog */
    $('article.card.card-blog').attr('data-aos', 'fade-up');

    AOS.init({
        easing: 'ease-in-out-sine',
        once: false,
        startEvent: 'load'
    });
    
    console.log('Script Cartão Amigo carregado');

})(jQuery)

