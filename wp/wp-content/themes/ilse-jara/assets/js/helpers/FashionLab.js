export default {
    elementos: $('.FashionLab--loop'),
    cerrar: $('.FashionLab--fancy--cerrar'),
    init(){
        if ($('.FashionLab--fancy').length) {
            this.Listeners();
        }
    },
    Listeners(){
        let componente = this;
        //Desplegar
        componente.elementos.on('click', function (e) {
            let $target = $(e.delegateTarget);
            let id = $target.data('fashion');

            componente.mostrarIndice(id);
        });
        //Cerrar
        componente.cerrar.on('click', function () {
            $('.FashionLab--fancy').stop().fadeOut(500);
        });
    },
    mostrarIndice(id){
        /*
         Reset
         */
        $('.FashionLab--fancy').stop().hide(0);
        /*
         Visualizar
         */
        $(`.FashionLab--fancy[data-fashion="${id}"]`).stop().show(0);
        //Salvar
        this.indiceActual = id;
    }
}