import $ from 'jquery';

const BannerHome = {
    flechas: $('.YoutubeSlider--flechas'),
    slides: $('.YoutubeSlider--slides'),
    indiceActual: null,
    maximo: 0,
    init: () => {
        if (BannerHome.flechas.length) {
            BannerHome.configurar();
            BannerHome.eventListener();
            BannerHome.IniciarBannerHome();
        }
    },
    /**
     * Configura elementos de arranque del modulo
     */
    configurar(){
        this.maximo = BannerHome.slides.length - 1;
    },
    eventListener: () => {
        BannerHome.flechas.on('click', (e) => {
            let IndiceNuevo = BannerHome.indiceActual + 1;

            BannerHome.MostrarBannerPorIndice(IndiceNuevo);
        })
    },
    MostrarBannerPorIndice(index){
        let indiceLimpio = this.LimpiarIndice(index);

        let siguiente = $(BannerHome.slides[indiceLimpio]);//$('.Galeria--BannerHome--slide[data-indice="' + indiceLimpio + '"]');

        if (siguiente.length) {
            BannerHome.indiceActual = indiceLimpio;
            //RESET
            BannerHome.slides.stop().hide(0);
            //Mostrar
            siguiente.stop().fadeIn(200);
        }
    },
    /**
     * Recibe la siguiente amenidad a mostrar
     *
     * Si es menor a 0 el indice devolveremos la amenidad maxima
     * Si es mayor el indice al valor de la amenidad maxima enviaremos la 0
     * En cualquier otro caso enviaremos la amenidad con el indice solicitado
     *
     * @param index
     * @constructor
     */
    LimpiarIndice(index){
        let indiceLimpio = parseInt(index);
        if (indiceLimpio < 0) {
            indiceLimpio = this.maximo;
        } else if (indiceLimpio > this.maximo) {
            indiceLimpio = 0;
        }
        return indiceLimpio;
    },
    /**
     * Visualiza la amenidad seleccionada
     * @constructor
     */
    IniciarBannerHome: () => {
        BannerHome.MostrarBannerPorIndice(0);
    }
};

export default BannerHome;