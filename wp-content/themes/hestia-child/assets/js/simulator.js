(function($){

    console.log('Simulador!'); 

    $('.dinheiro').val('0,00').mask("#.##0,00", {reverse: true});
    $('#mensalidade').focus( elm => {
        $('#mensalidade').val('');
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

        $('.hestia-simulator #diferenca').val((Math.round(diferenca * 100) / 100).toFixed(2));

        $('.hestia-simulator .resultado .info-title').html(diferenca < 0 ? 'O Cartão Amigo não é para você' : 'Você gastou todo esse dinheiro à toa');
    })
      
})(jQuery)

