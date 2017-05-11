import $ from 'jquery';

const BannerHome = {
    //Valores configurables
    volumen: 70,
    volumenApagado: 0,
    volumenPrendido: 70,
    //valores para no tocar
    flechas: $('.YoutubeSlider--flechas'),
    slides: $('.YoutubeSlider--slides'),
    indiceActual: null,
    maximo: 0,
    iniciado: false,
    botonMute: $('.YoutubeSlider--slides--botones--mute'),
    muteado: false,
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
        });
        BannerHome.botonMute.on('click', (e) => {
            e.preventDefault();
            BannerHome.volumen = BannerHome.muteado ? BannerHome.volumenPrendido : BannerHome.volumenApagado;
            BannerHome.muteado = !BannerHome.muteado;
            BannerHome.SetearNuevoVolumen();
        })
    },
    SetearNuevoVolumen(){
        let sliders = BannerHome.slides;
        if (sliders.length) {
            sliders.each(function (i, e) {
                let idVideo = BannerHome.GetDataIdByObject($(e));
                BannerHome.SetVideoVolumeToStaticValue(idVideo);
            })
        }
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
            BannerHome.ReproducirVideoYPausarDemas(siguiente);
        }
    },
    /**
     * Pausar todos y reproducir este
     * @param elemento
     * @constructor
     */
    ReproducirVideoYPausarDemas(elemento){
        //Pausar
        let sliders = BannerHome.slides;
        if (sliders.length) {
            sliders.each(function (i, e) {
                let idVideo = BannerHome.GetDataIdByObject($(e));
                BannerHome.PausarVideo(idVideo);
            })
        }

        //Reproducir
        let idVideoActivado = BannerHome.GetDataIdByObject(elemento);
        BannerHome.ReproducirVideo(idVideoActivado);
    },
    ReproducirVideo(idDelVideo){
        eval(idDelVideo + '.unMute()');
        eval(idDelVideo + '.setVolume(' + BannerHome.volumen + ')');
        eval(idDelVideo + '.seekTo(0)');
        eval(idDelVideo + '.playVideo()');
    },
    PausarVideo(idDelVideo){
        eval(idDelVideo + '.pauseVideo()');
    },
    SetVideoVolumeToStaticValue(idDelVideo){
        eval(idDelVideo + '.setVolume(' + BannerHome.volumen + ')');
    },
    GetDataIdByObject(object){
        return object.data('id');
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
        try {
            BannerHome.MostrarBannerPorIndice(0);
        } catch (e) {
            setTimeout(function () {
                BannerHome.IniciarBannerHome();
            }, 1000);
        }
    }
};

export default BannerHome;