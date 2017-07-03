var ParallaxObject = {
    //configuracion
    cuerpo: $('.ParallaxEspecial'),//Elemento cuerpo del parallax
    anchoMinimo: 1100,//Ancho minimo para aplicar esto
    claseSecciones: 'Parallax--secciones',
    tiempoMinimoEntreSecciones: 200,//Esto es el tiempo minimo que puede transcurrir entre un movimiento entre zonas

    //propiedades
    secciones: null,
    currentSeccion: null,
    nextSeccion: null,
    prevSeccion: null,
    iniciado: false,
    timeParaImpedirError: new Date(),
    configurando: false,
    /**
     * Iniciado del elemento
     */
    init() {
        var anchoVista = $(window).outerWidth();
        $('body,html').stop().scrollTop(0);//Posicionamos hasta arriba
        //Reset
        this.DeleteEffect();
        //Aplicamos los cambios
        if (this.cuerpo.length && anchoVista >= this.anchoMinimo) {
            //Iniciamos
            this.configurarSecciones();
            this.Listeners();
            //Marcamos elemento como iniciado
            this.iniciado = true;
        }
        this.ListenerEspecialMenuFlatHomeNoParallax();
        this.CheckIfHashInUrl();
    },
    CheckIfHashInUrl(){
        var hash = document.location.hash;
        hash = window.NavHome.ClearHash(hash);

        window.NavHome.CheckIrASeccion(hash);
    },
    ListenerEspecialMenuFlatHomeNoParallax(){
        if ($('body.home').length) {
            //Solo importa en home
            $(window).on('scroll', function () {
                var anchoVista = $(window).outerWidth();
                var alturaScroll = $(window).scrollTop();
                if (anchoVista < ParallaxObject.anchoMinimo) {
                    //Solo hacemos esto cuando estamos sin parallax
                    if (alturaScroll >= 600) {
                        ParallaxObject.ActivarMenuFlat();
                    } else {
                        ParallaxObject.DesActivarMenuFlat();
                    }
                }
            })
        }
    },
    ActivarMenuFlat(){
        $('.home .MenuFlat').addClass('menuHomeVisible')
    },
    DesActivarMenuFlat(){
        $('.home .MenuFlat').removeClass('menuHomeVisible')
    },
    /**
     * Resetea el efecto
     *
     * ELIMINA CLASES Y ELIMINA LISTENERS
     */
    DeleteEffect(){
        //todo en movil esta entrando siempre esto
        var secciones = $('.' + this.claseSecciones);
        secciones.stop();
        secciones.removeClass(this.claseSecciones);
        secciones.removeClass('Parallax--secciones_anterior');
        secciones.removeClass('Parallax--secciones_activa');
        secciones.removeClass('Parallax--secciones_siguiente');
        secciones.off('mousewheel DOMMouseScroll');
        secciones.removeAttr('style');
        console.log('EXIT SISTEMA PARALLAX');
    },
    /**
     * Listeners del plugin
     *
     * -Cuando llega hasta abajo de la seccion activa
     * -Cuando llega hasta arriba de la seccion activa
     * -Cuando hay un resize
     */
    Listeners(){
        var ParallaxObject = this,
            secciones = $('.' + this.claseSecciones),
            $window = $(window);

        secciones.on('mousewheel DOMMouseScroll', function (e) {
            var seccion = $(this),
                seccionHija = seccion.find('>div'),
                margenSuperior = parseInt(seccion.css('padding-top')),
                LlegamosAlSuperior = seccion.scrollTop() <= 0,
                LlegamosAlInferior = (seccion.scrollTop() + $window.outerHeight()) >= seccionHija.outerHeight() + margenSuperior,
                fechaActual = new Date(),
                diferencia = (fechaActual - ParallaxObject.timeParaImpedirError);

            if (diferencia > ParallaxObject.tiempoMinimoEntreSecciones) {
                ParallaxObject.timeParaImpedirError = fechaActual;

                if (seccion.is('.Parallax--secciones_activa')) {
                    if (LlegamosAlInferior) {
                        //Funcionamiento en bajada
                        //console.log('----------------------CAMBIO A INFERIOR----------------------');
                        ParallaxObject.activarSeccion(ParallaxObject.nextSeccion);
                    } else if (LlegamosAlSuperior) {
                        //console.log('----------------------CAMBIO A SUperior----------------------');
                        //Funcionamiento en subida
                        ParallaxObject.activarSeccion(ParallaxObject.prevSeccion);
                    }
                }
            }
        });
    },
    /**
     * Configura las secciones y la seccion actual inicial
     */
    configurarSecciones(){
        this.secciones = ParallaxObject.cuerpo.find('>section');
        if (this.secciones.length) {
            if (!this.iniciado) {
                //Si aun no inicio...
                this.currentSeccion = this.secciones.first();
            }
            this.secciones.each(function (i, seccion) {
                $(seccion).css('padding-top', (i * 100) + 'vh')
            });

            this.secciones.addClass(this.claseSecciones);
            this.activarSeccion(this.currentSeccion);
        }
    },
    activarSeccion(seccion){
        if (!seccion || !seccion.length) {
            return null;
        }
        this.timeParaImpedirError = new Date();
        var anterior = seccion.prev('.' + this.claseSecciones);
        var siguiente = seccion.next('.' + this.claseSecciones);

        //reseteamos
        this.secciones.removeClass('Parallax--secciones_activa');
        this.secciones.removeClass('Parallax--secciones_siguiente');
        this.secciones.removeClass('Parallax--secciones_anterior');

        //Activamos
        seccion.removeClass('Parallax--secciones_siguiente');
        seccion.removeClass('Parallax--secciones_anterior');
        seccion.addClass('Parallax--secciones_activa');
        seccion.css('padding-top', '100vh');

        //Posicionamos siguiente
        this.acomodarComoSiguiente(siguiente);
        //Posicionamos anterior
        this.acomodarComoAnterior(anterior);

        //Almacenamos en objeto
        this.currentSeccion = seccion;
        if (seccion.is(this.secciones.first())) {
            //Desactivamos menu
            this.DesActivarMenuFlat();
        } else {
            //Activamos menu
            this.ActivarMenuFlat();
        }
    },
    acomodarComoSiguiente(seccion){
        if (seccion.length) {
            //reseteamos
            this.secciones.removeClass('Parallax--secciones_siguiente');
            //Activamos
            seccion.addClass('Parallax--secciones_siguiente');
        } else {
            seccion = null;
        }

        //Almacenamos en objeto
        this.nextSeccion = seccion;
    },
    acomodarComoAnterior(seccion){
        if (seccion.length) {
            //Activamos
            seccion.addClass('Parallax--secciones_anterior');
        } else {
            seccion = null;
        }
        //Almacenamos en objeto
        this.prevSeccion = seccion;
    }
};
//Iniciamos Ocultando
$(document).ready(function () {
    //Inicio de la web
    var cargado = false;
    $('#Cargando--Mascara').one('load', function () {
        //Cargamos primero imagen
        $('.cargando--mascara').stop().show(0);
        //Cargamos el resto
        $('.cargando--bloque>div').stop().fadeIn(500, function () {
            //Checar el resto de imagenes
            function loadbar() {
                if (cargado) {
                    return;
                }
                var prog = $('.cargando--loader'),
                    img = document.images,
                    c = 0,
                    tot = img.length,
                    totCargadas = 0;
                if (tot === 0) return doneLoading();


                /**
                 * Finaliza la carga de imagenes
                 */
                function doneLoading() {
                    setTimeout(function () {
                        //INICIAMOS
                        ParallaxObject.init();
                        setTimeout(function () {
                            window.Cargando.borrar();
                        }, 500);
                    }, 1200);
                }

                function setPorcentaje(porcentaje) {
                    prog.height(porcentaje + '%');
                    if (porcentaje > 98) {
                        cargado = true;
                        doneLoading();
                    } else {
                        setTimeout(function () {
                            loadbar();
                        }, 100);
                    }
                }

                for (var i = 0; i < tot; i++) {
                    //Calculamos
                    if (img[i].complete) {
                        totCargadas++;
                    }
                }
                var porcentaje = (totCargadas * 100) / tot;
                setPorcentaje(porcentaje);
            }

            loadbar();
        });
    }).each(function () {
        if (this.complete) $(this).load();
    });

    //Accion en resize
    $(window).on('resize', function () {
        ParallaxObject.init();
        setTimeout(function () {
            window.Cargando.borrar();
        }, 1500)
    });
});
