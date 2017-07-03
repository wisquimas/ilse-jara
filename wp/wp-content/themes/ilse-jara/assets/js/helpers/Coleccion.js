import $ from 'jquery'

const Coleccion = {
    elementos: $('.Coleccion--galeria--foto'),
    flechas: $('.Coleccion--fancy--arrow--left,.Coleccion--fancy--arrow--right'),
    cerrar: $('.Coleccion--fancys--cerrar'),
    indiceActual: null,
    init(){
        if (this.elementos.length) {
            this.Listeners();
        }
    },
    Listeners(){
        let componente = this;
        //Desplegar
        componente.elementos.on('click', function (e) {
            let $target = $(e.delegateTarget);
            let id = $target.data('indice');

            componente.mostrarIndice(id);
        });
        //Cerrar
        componente.cerrar.on('click', function () {
            $('.Coleccion--fancys').stop().fadeOut(500);
        });
        //Siguiente anterior
        componente.flechas.on('click', function (e) {
            console.log(e, componente);
            let $target = $(e.delegateTarget);
            let indiceActual = parseInt(componente.indiceActual);
            let maximo = parseInt($('.Coleccion--fancy').last().data('indice'));

            if ($target.is('.Coleccion--fancy--arrow--right')) {
                //Siguiente
                indiceActual += 1;
                if (indiceActual > maximo) {
                    indiceActual = 0;
                }
            } else {
                //Anterior
                indiceActual -= 1;
                if (indiceActual < 0) {
                    indiceActual = maximo;
                }
            }
            //Guardamos nuevo y desplegamos
            componente.mostrarIndice(indiceActual);
        })
    },
    mostrarIndice(id){
        /*
         Reset
         */
        $('.Coleccion--fancy').stop().hide(0);
        /*
         Visualizar
         */
        $(`.Coleccion--fancy[data-indice="${id}"]`).stop().show(0);
        $('.Coleccion--fancys').stop().fadeIn(500);
        //Salvar
        this.indiceActual = id;
    }
};

export default Coleccion;