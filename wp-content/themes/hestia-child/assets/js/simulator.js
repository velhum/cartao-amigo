(function($){

    console.log('Simulador!'); 
    const anuidadeCartaoAmigo = 149; // Anuidade do Cartão Amigo
    $('.hestia-simulator #gasto-cartao-amigo').val(formatReal(parseFloat(anuidadeCartaoAmigo)));

    $('#mensalidade, #anuidade, #diferenca').val('0,00');
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

    $('.procedimentos .procedimento .quantidade, .hestia-simulator #mensalidade').on('change', elm =>  {
        let mensalidade = $('.hestia-simulator #mensalidade').val();
        let totalDeServicos = 0;
        let diferenca = 0;
        let procedimentos = $('.procedimentos .procedimento');
        let anuidadePlanoSaude = parseFloat(mensalidade) * 12;

        let gastoCartaoAmigo = anuidadeCartaoAmigo // Anuidade do CA + Total de serviços

        for (let item of procedimentos) {
            totalDeServicos += parseFloat($(item).find('.descricao').data('valor')) * $(item).find('.quantidade').val() ;
            gastoCartaoAmigo = anuidadeCartaoAmigo + totalDeServicos;
        }
        
        diferenca = anuidadePlanoSaude - totalDeServicos;

        console.log(
            'gastoCartaoAmigo', gastoCartaoAmigo,
            'diferenca', diferenca,
            'totalDeServicos', totalDeServicos
        );

        $('.hestia-simulator #gasto-cartao-amigo').val(formatReal(parseFloat(gastoCartaoAmigo)));

        if ( parseInt(mensalidade) !== 0){
            $('.hestia-simulator #anuidade').val(formatReal(anuidadePlanoSaude));
            $('.hestia-simulator #diferenca').val(
                diferenca > 0
                ? formatReal((Math.round(diferenca) / 100)
                    .toFixed(2)
                    .toString()
                    .replace('.', ''))
                : "0,00"
            );
        }

    })

    function formatReal( int ) {
        int = int * 100
        let tmp = int+'';
        tmp = tmp.replace(/([0-9]{2})$/g, ",$1");
        if( tmp.length > 6 )
                tmp = tmp.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        return tmp;
    }
      
})(jQuery)

