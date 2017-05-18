import $ from 'jquery';

const NavHome = {
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
        $('.Menu--nav a[href]').on('click', function (e) {
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
    },
    IrASeccion(seccionTarget){
        let hija = seccionTarget.find('>div');
        let altura = hija.position().top;//Altura que debemos saltarnos para llegar al lugar indicado

        let secciones = $('.Parallax--secciones');
        let seccionActual = $('.Parallax--secciones_activa');

        let posicionParaIr = secciones.index(seccionTarget);
        let posicionActual = secciones.index(seccionActual);
        let direccion = null;//1 baja , -1 sube, 0 misma seccion

        /*
         Comprobamos la direccion
         */
        if (posicionActual > posicionParaIr) {
            //Mismo
            direccion = 0;
        } else if (posicionActual < posicionParaIr) {
            //Baja
            direccion = 1;
        } else {
            //Sube
            direccion = -1;
        }
        console.log(seccionTarget, posicionActual, posicionParaIr, direccion);

        if (direccion === 0) {
            //Misma seccion
            NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura);
        } else if (direccion === 1) {
            $('.Parallax--secciones').stop().fadeOut(200, function () {
                //Baja
                for (posicionActual; posicionActual < posicionParaIr; posicionActual++) {
                    let $seccionActual = $(secciones[posicionActual]);
                    $seccionActual.stop().scrollTop(99999999999);
                }
                ParallaxObject.activarSeccion(seccionTarget);
                let altura = seccionTarget.find('>div').position().top;

                NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura, function () {
                    $('.Parallax--secciones').stop().fadeIn(500);
                });
            });
        } else {
            //Sube
            //todo Probar
            $('.Parallax--secciones').stop().fadeOut(200, function () {
                //Baja
                for (posicionActual; posicionActual > posicionParaIr; posicionActual--) {
                    let $seccionActual = $(secciones[posicionActual]);
                    $seccionActual.stop().scrollTop(0);
                }
                ParallaxObject.activarSeccion(seccionTarget);
                NavHome.ScrollAEstaMismaSeccion(seccionTarget, altura, function () {
                    $('.Parallax--secciones').stop().fadeIn(500);
                });
            });
        }
    },
    ScrollAEstaMismaSeccion(seccion, altura, cb){
        seccion.stop().animate({
            'scrollTop': altura
        }, 500, function () {
            if (cb) {
                cb();
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