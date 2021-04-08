(function($){

    const larguraLocation = $('.hestia-location .container').width();
    const alturaLocation = $('.hestia-location .container').height();
    let intervalo = null;

    $(window).on('scroll', pins);

    function pins() {
        let visivel = $('#location').visible(true, false, 'vertical');
        console.log('visivel: ', visivel);
        // Verifica se a div #location está visível na viewport
        if( visivel ){
            /* Insere diversos PINs na sessão Location */
            if (!intervalo) intervalo = setInterval(inserePin, 10);
        } else {
            // Cancela a inserção de pin e remove os existentes 
            clearInterval(intervalo);
            intervalo = null;
            removePins();
        };
    }
    
    function inserePin(){
        const y = Math.floor((Math.random() * ($(window).height() - 100)) + 1);
        const x = Math.floor((Math.random() * ($(window).width() - 100)) + 1);
        $('.hestia-location .container').prepend('<div class="pin" style="left: ' + x + 'px; top: ' + y + 'px"></div>');
    }

    function removePins() {
        $('.pin').remove();
    }

})(jQuery)

