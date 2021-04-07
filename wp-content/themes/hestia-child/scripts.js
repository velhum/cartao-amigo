(function($){

    /* Front Page */

        /* AOS Demo: http://michalsnik.github.io/aos/

        /* Simulator */
        $('.hestia-simulator-content .hestia-info').attr('data-aos', 'zoom-in-up');
        
        /* Location */
        $('.hestia-location-content h2').attr('data-aos', 'flip-left');
        
        /* ? */
        $('.card.card-profile.card-plain').attr('data-aos', 'flip-right');

        /* Blog */
        $('.hestia-blog-content .card.card-plain.card-blog').attr('data-aos', 'fade-up');

        /* Rede credenciada */
        $('.hestia-testimonials-content .card.card-testimonial.card-plain').attr('data-aos', 'zoom-in');
    
    /* Blog */
    $('article.card.card-blog').attr('data-aos', 'fade-up');

    /* Aplica degrade no 'amigo' do título da home */
    // $('.carousel h1.hestia-title').html('cartão<span class="amigo-degrade">amigo</span>');

    /* Insere diversos PINs na sessão Location */
    const larguraLocation = $('.hestia-location .container').width();
    const alturaLocation = $('.hestia-location .container').height();
    for (let i = 1; i <= 30; i++){
        const y = Math.floor((Math.random() * ($(window).height() - 100)) + 1);
        const x = Math.floor((Math.random() * ($(window).width() - 100)) + 1);
        $('.hestia-location .container').prepend('<div class="pin" style="left: ' + x + 'px; top: ' + y + 'px"></div>');
    }
    
    $('.hestia-location .container .pin').attr('data-aos', 'fade-up');

    AOS.init({
        easing: 'ease-in-out-sine',
        once: false,
        startEvent: 'load'
    });
    
    console.log('Script Cartão Amigo carregado');

})(jQuery)

