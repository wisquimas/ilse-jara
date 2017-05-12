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

            //propiedades
            secciones: null,
            currentSeccion: null,
            iniciado: false,
            /**
             * Iniciado del elemento
             **/
            init() {
                var anchoVista = $(window).outerWidth();
                if (this.cuerpo.length && anchoVista >= this.anchoMinimo) {
                    //Iniciamos
                    this.configurarSecciones();

                    //Marcamos elemento como iniciado
                    this.iniciado = true;
                    console.log(this);
                }
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
                    this.secciones.addClass('Parallax--secciones');
                    this.activarSeccion(this.currentSeccion);
                }
            },
            activarSeccion(seccion){
                seccion.addClass('Parallax--secciones_activa');
            }
        };
        ParallaxObject.init();
    </script>
</div>
</body>
</html>