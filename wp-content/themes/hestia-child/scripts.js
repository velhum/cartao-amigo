(function($){

    /* Front Page */
        /* O que é */
        $('.hestia-features-content .hestia-info').attr('data-aos', 'flip-left');
        
        /* ? */
        $('.card.card-profile.card-plain').attr('data-aos', 'flip-right');

        /* Blog */
        $('.hestia-blog-content .card.card-plain.card-blog').attr('data-aos', 'fade-up');

        /* Rede credenciada */
        $('.hestia-testimonials-content .card.card-testimonial.card-plain').attr('data-aos', 'zoom-in');
    
    /* Blog */
    $('article.card.card-blog').attr('data-aos', 'fade-up');

})(jQuery)

AOS.init({
    easing: 'ease-in-out-sine',
    once: false,
    startEvent: 'load'
});

console.log('Script Cartão Amigo carregado');