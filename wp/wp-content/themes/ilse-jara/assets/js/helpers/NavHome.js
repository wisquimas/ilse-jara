import $ from 'jquery'
import Cargando from './Cargando'

const NavHome = {
    menuFlat: $('.MenuFlat'),
    init(){
        //Integramos Listeners
        this.Listeners();
    },
    CheckIrASeccion(hash){
        let seccion = $(hash);

        if (seccion.length && seccion.is('.Parallax--secciones')) {
            //Sistema parallax
            NavHome.IrASeccion(seccion);
        } else if (seccion.length) {
            //Responsivo
            let altura = seccion.offset().top;
            $('body,html').stop().animate({
                'scrollTop': altura
            }, 500);
        }
    },
    Listeners(){
        //Clicks Menu
        $('.Menu--nav a[href],.Footer--derecho a[href]').on('click', function (e) {
            let hash = $(this).attr("href");
            hash = NavHome.ClearHash(hash);
            if (hash) {
                NavHome.CheckIrASeccion(hash);
            }
        });
        //Clicks para subir a la seccion anterior
        $('.ParallaxEspecial').on('click', '.Parallax--secciones_activa', function (e) {
            let $target = $(e.target);
            if ($target.is('.Parallax--secciones_activa')) {
                $target.stop().animate({
                    'scrollTop': 0
                }, 500, function () {
                    let anterior = $target.prev('.Parallax--secciones');
                    if (anterior.length) {
                        ParallaxObject.activarSeccion(anterior);
                    }
                })
            }
        })
        //Click abrir menu flat
        this.menuFlat.on('click', function () {
            $('body').toggleClass('movilAbierto');
        });
    },
    IrASeccion(seccionTarget){
        let hija = seccionTarget.find('>div');

        let secciones = $('.Parallax--secciones');
        let seccionActual = $('.Parallax--secciones_activa');

        let posicionParaIr = secciones.index(seccionTarget);
        let posicionActual = secciones.index(seccionActual);
        let direccion = null;//1 baja , -1 sube, 0 misma seccion

        /*
         Comprobamos la direccion
         */
        if (posicionActual > posicionParaIr) {
            //Sube
            direccion = -1;
        } else if (posicionActual < posicionParaIr) {
            //Baja
            direccion = 1;
        } else {
            //Mismo
            direccion = 0;
        }

        if (direccion === 0) {
            //Misma seccion
            let altura = hija.offset().top;//Altura que debemos saltarnos para llegar al lugar indicado
            altura += seccionTarget.scrollTop();
            NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura);
        } else if (direccion === 1) {
            //Baja
            Cargando.iniciar();
            for (posicionActual; posicionActual < posicionParaIr; posicionActual++) {
                let $seccionActual = $(secciones[posicionActual]);
                $seccionActual.stop().scrollTop(99999999999);
            }
            ParallaxObject.activarSeccion(seccionTarget);
            let altura = seccionTarget.find('>div').position().top;//Altura que debemos saltarnos para llegar al lugar indicado

            NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura, function () {
                Cargando.borrar();
            });
        } else {
            //Sube
            Cargando.iniciar();
            for (posicionActual; posicionActual >= posicionParaIr; posicionActual--) {
                let $seccionActual = $(secciones[posicionActual]);
                $seccionActual.stop().scrollTop(0);
            }
            ParallaxObject.activarSeccion(seccionTarget);
            let altura = hija.offset().top;//Altura que debemos saltarnos para llegar al lugar indicado
            console.log(seccionTarget, posicionActual, posicionParaIr, direccion, altura);

            NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura, function () {
                Cargando.borrar();
            });
        }
    },
    ScrollAEstaMismaSeccion(seccion, altura, cb){
        seccion.stop().animate({
            'scrollTop': altura
        }, 500, function () {
            if (cb) {
                cb()
            }
        })
    },
    ClearHash(string){
        if (string.indexOf('#') >= 0) {
            let data = string.split('#');
            if (data.length) {
                string = data[1];
                return '#' + string;
            }
        }
    }
};

export default NavHome;