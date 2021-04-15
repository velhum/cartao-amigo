(function($){

    const anuidadeCartaoAmigo = 199.9; // Anuidade do Cartão Amigo

    $('.hestia-simulator #gasto-cartao-amigo').val(formatReal(anuidadeCartaoAmigo));

    $('#mensalidade, #anuidade, #diferenca').val('R$ 0,00');
    
    $('#mensalidade').on('focus', () => {
        $('#mensalidade').val('');
        $('#diferenca, #anuidade, #gasto-cartao-amigo').val('R$ 0,00');
    });

    $('#mensalidade').on('keyup', executaCalculos);

    $('.procedimentos .procedimento .quantidade, .hestia-simulator #mensalidade').on('change', executaCalculos);

    /*
    ** Recebe um valor float
    ** Retorna o valor formatado 1.199,90
    */

    function formatReal( valor ) {
        return valor.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
    }

    function executaCalculos() {
        let mensalidade = $('.hestia-simulator #mensalidade').val();
        mensalidade = mensalidade ? parseFloat(mensalidade.replace('.', '').replace(',', '.')) : 0;
        let totalDeServicos = 0;
        let diferenca = 0;
        let procedimentos = $('.procedimentos .procedimento');
        let anuidadePlanoSaude = mensalidade * 12;
        
        let gastoCartaoAmigo = anuidadeCartaoAmigo // Anuidade do CA + Total de serviços
        
        for (let item of procedimentos) {
            totalDeServicos += parseFloat($(item).find('.descricao').data('valor')) * $(item).find('.quantidade').val() ;
        }
        
        gastoCartaoAmigo = anuidadeCartaoAmigo + totalDeServicos;
        
        diferenca = anuidadePlanoSaude - totalDeServicos;

        $('.hestia-simulator #gasto-cartao-amigo').val(formatReal(gastoCartaoAmigo));

        if ( mensalidade !== 0){
            $('.hestia-simulator #anuidade').val(formatReal(anuidadePlanoSaude));
            $('.hestia-simulator #diferenca').val(
                diferenca > 0 ? formatReal(diferenca) : "R$ 0,00"
            );
        }

    }

    $('.procedimento .mais-ou-menos').on('click', (ev) => {
        let quantidade = parseInt($(ev.target).siblings('.quantidade').val());
        const max = parseInt($(ev.target).siblings('.quantidade').attr('max'));
        const min = 0;
        if ( $(ev.target).hasClass('mais') ) {
            if ( quantidade < max ) quantidade++;
        } else {
            if ( quantidade > min ) quantidade--;
        }
        $(ev.target).siblings('.valor').text(quantidade);
        $(ev.target).siblings('.quantidade').val(quantidade);
        executaCalculos();
    })

})(jQuery)

