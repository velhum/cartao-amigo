(function($){

    console.log('rede-credenciada');

    $('#get-data').click(function () {
        const showData = $('#show-data');
    
        $.getJSON(
            'https://servicodados.ibge.gov.br/api/v1/localidades/estados/33/distritos',
            data => {
                console.log(data);
            
                let items = data.map(item => {
                    return item.nome + ': ' + item.municipio.microrregiao.nome;
                });
            
                showData.empty();
            
                if (items.length) {
                    let content = '<li>' + items.join('</li><li>') + '</li>';
                    let list = $('<ul />').html(content);
                    showData.append(list);
                };
            }
        );
    
        showData.text('Loading the JSON file.');
    });

})(jQuery)