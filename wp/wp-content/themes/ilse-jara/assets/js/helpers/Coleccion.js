import $ from 'jquery'

const Coleccion = {
    elementos: $('.Coleccion--galeria--foto'),
    cerrar: $('.Coleccion--fancys--cerrar'),
    init(){
        if (this.elementos.length) {
            this.Listeners();
        }
    },
    Listeners(){
        this.elementos.on('click', function (e) {
            let $target = $(e.delegateTarget);
            let id = $target.data('indice');

            /*
             Reset
             */
            $('.Coleccion--fancy').stop().hide(0);
            /*
             Visualizar
             */
            $(`.Coleccion--fancy[data-indice="${id}"]`).stop().show(0);
            $('.Coleccion--fancys').stop().fadeIn(500);
        });
        this.cerrar.on('click', function () {
            $('.Coleccion--fancys').stop().fadeOut(500);
        })
    }
};

export default Coleccion;