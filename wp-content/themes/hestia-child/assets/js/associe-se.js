(function($){

    console.log('Associe-se');

    $('#formCadastro').hide();

    $('#formCadastro').load(function(){
        $(this).fadeIn('slow');
        $('.ca-loading').hide();
    });
    
})(jQuery)

