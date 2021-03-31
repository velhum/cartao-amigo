(function($){

    console.log('Simulador!'); 

    $('.dinheiro').val('0,00');
    $('#mensalidade').on('focus', () => {
        $('#mensalidade').val('');
    });

    $('button.dropdown-toggle').on('click', (e) => {
        // Kill click event:
        e.stopPropagation();
        if ($('.dropdown').find('.dropdown-menu').is(":hidden")){
            $('.dropdown-menu').fadeIn("fast");
        } else {
            $('.dropdown-menu').fadeOut("fast");
        }
    });

    $('.procedimentos .procedimento .quantidade, .hestia-simulator #mensalidade').change( elm =>  {
        const cartaoamigo = 149; // Anuidade do Cartão Amigo
        let mensalidade = $('.hestia-simulator #mensalidade').val();
        let totalDeServicos = 0;
        let diferenca = 0;
        let procedimentos = $('.procedimentos .procedimento');

        for (let item of procedimentos) {
            totalDeServicos += parseFloat($(item).find('.descricao').data('valor')) * $(item).find('.quantidade').val() ;
            diferenca = (parseFloat(mensalidade.replace('.', '')) * 12) - totalDeServicos + cartaoamigo;
        }

        $('.hestia-simulator #diferenca').val(
            formatReal((Math.round(diferenca * 100) / 100)
            .toFixed(2)
            .toString()
            .replace('.', ''))
        );

        $('.hestia-simulator .resultado .info-title').html(diferenca < 0 ? 'O Cartão Amigo não é para você' : 'Você gastou todo esse dinheiro à toa');
    })

    function formatReal( int ) {
            let tmp = int+'';
            tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
            if( tmp.length > 6 )
                    tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
            return tmp;
    }
      
})(jQuery)

