(function($){

    const api = {
        path: 'https://sistema.cartaoamigo.com.br/api/',
        especialidade: 'tipoespecialidades/combo',
        uf: 'endereco/estados',
        cidade: 'endereco/bairros/'
    };

    getEspecialidades();
    getUFs();

    /**
     * Recupera lista de especialidades
     */
    function getEspecialidades() {
        let listaDeEspecialidades = '';
        $.getJSON(
            api.path + api.especialidade,
            data => {
                data.forEach(elm => {
                    listaDeEspecialidades += `<option value="${elm.id}">${elm.nome}</option>`;
                });
                $('#lista-de-especialidades').append(listaDeEspecialidades);
            }
        )
    }
    
    /**
     * Recupera lista de UFs
     */
    function getUFs() {
        let listaDeUFs = '';
        $.getJSON(
            api.path + api.uf,
            data => {
                data.forEach(elm => {
                    listaDeUFs += `<option value="${elm}">${elm}</option>`;
                });
                $('#lista-de-ufs').append(listaDeUFs);
            }
        )
    }
    
    /**
     * Recupera lista de Cidades
     */
    function getCidades(uf) {
        let listaDeCidades = '';
        $.getJSON(
            api.path + api.cidade + uf,
            data => {
                console.log(data);
                data.forEach(elm => {
                    listaDeCidades += `<option value="${elm.id}">${elm.descricao}</option>`;
                });
                $('#lista-de-cidades').append(listaDeCidades);
            }
        )
    }

    $('#lista-de-ufs').on('change', () => {
        getCidades($('#lista-de-ufs').val());
    })
    

})(jQuery)