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

    /* Login form */
    $('li.menu-item a[title="Login"], .ca-modal-container').on('click', () => {
        const display = $('#ca-modal').css('display');
        if (display == 'none') {
            $('#ca-modal').css('display', 'block')
            $('#ca-login-form').slideDown();        
            // $('#ca-modal').show('fast', () => {
            //     $('#ca-login-form').slideDown();        
            // });
        } else {
            $('#ca-login-form').slideUp(() => {
                $('#ca-modal').css('display','none');
                // $('#ca-modal').hide('fast');
            });        
        }

        if ( $( '.navbar .navbar-collapse' ).hasClass( 'in' ) ) {
            $( '.navbar .navbar-collapse.in' ).removeClass( 'in' );
        }

        if ( $( 'body' ).hasClass( 'menu-open' ) ) {
            $( 'body' ).removeClass( 'menu-open' );
            $( '.navbar-collapse' ).css( 'height', '0' );
            $( '.navbar-toggle' ).attr( 'aria-expanded', 'false' );
        }

    })

    AOS.init({
        easing: 'ease-in-out-sine',
        once: false,
        startEvent: 'load'
    });
    
    console.log('Script Cartão Amigo carregado');

})(jQuery)

