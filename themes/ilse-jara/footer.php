</div>
<div id="w_f">
    <?php wp_footer(); ?>
    <!--suppress HtmlUnknownTarget -->
    <script src="<?php assets(); ?>/js/build.js"></script>
    <script>
        var ParallaxObject = {
            //configuracion
            cuerpo: $('.ParallaxEspecial'),//Elemento cuerpo del parallax
            anchoMinimo: 1100,//Ancho minimo para aplicar esto
            claseSecciones: 'Parallax--secciones',
            tiempoMinimoEntreSecciones: 2,//Esto es el tiempo minimo que puede transcurrir entre un movimiento entre zonas

            //propiedades
            secciones: null,
            currentSeccion: null,
            nextSeccion: null,
            prevSeccion: null,
            iniciado: false,
            timeParaImpedirError: 0,
            configurando: false,
            /**
             * Iniciado del elemento
             */
            init() {
                var anchoVista = $(window).outerWidth();
                $('body,html').scrollTop(0);//Posicionamos hasta arriba

                if (this.cuerpo.length && anchoVista >= this.anchoMinimo) {
                    //Iniciamos
                    this.configurarSecciones();
                    this.Listeners();
                    //Marcamos elemento como iniciado
                    this.iniciado = true;
                } else {
                    //Eliminamos
                    this.DeleteEffect();
                }
            },
            /**
             * Resetea el efecto
             *
             * ELIMINA CLASES Y ELIMINA LISTENERS
             */
            DeleteEffect(){
                var secciones = $('.' + this.claseSecciones);
                secciones.removeClass(this.claseSecciones);
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
                var ParallaxObject = this;
                $('.' + this.claseSecciones).bind('inview', function (event, visible, visiblePartX, visiblePartY) {
                    var fechaActual = new Date();
                    var diferencia = (fechaActual - ParallaxObject.timeParaImpedirError);

                    if (diferencia > ParallaxObject.tiempoMinimoEntreSecciones) {
                        ParallaxObject.timeParaImpedirError = fechaActual;

                        var target = $(event.currentTarget);
                        if (target.is('.Parallax--secciones_activa')) {
                            if (visiblePartY === 'bottom') {
                                //Funcionamiento en bajada
                                ParallaxObject.activarSeccion(ParallaxObject.nextSeccion);
                            } else if (visiblePartY === undefined) {
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
                        $(seccion).css('margin-top', (i * 100) + 'vh')
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

                //Activamos
                seccion.removeClass('Parallax--secciones_siguiente');
                seccion.removeClass('Parallax--secciones_anterior');
                seccion.addClass('Parallax--secciones_activa');

                //Posicionamos siguiente
                this.acomodarComoSiguiente(siguiente);
                //Posicionamos anterior
                this.acomodarComoAnterior(anterior);

                //Almacenamos en objeto
                this.currentSeccion = seccion;
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
        ParallaxObject.init();
    </script>
</div>
</body>
</html>