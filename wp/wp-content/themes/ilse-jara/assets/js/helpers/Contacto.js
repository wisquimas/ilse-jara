import $ from 'jquery';
import AjaxHelpers from './AjaxHelpers'
import FormsHelper from './FormsHelper'

const Contacto = {
    selectores: $('.Contacto--selector--select'),
    ventana: $('.Contacto--ventana--body'),
    form: $('.Contacto--form'),
    boton: $('.Contacto--form--enviar'),
    cerrar: $('.Contacto--ventana--cerrar'),
    tipo: $('#Contacto--form--tipo'),
    init(){
        if (this.form.length) {
            //Iniciamos Helper
            AjaxHelpers.init();
            this.Listeners();
        }
    },
    SetTipoContacto(valor, elemento){
        $('.Contacto--ventana--title').text(valor);
        this.tipo.val(valor);
        if (elemento.is("[data-trabaje]")) {
            //Habilitamos los campos de trabaje
            $('.Contacto--form--trabaje').stop().show(0)
        } else {
            //Deshabilitamos los campos de trabaje
            $('.Contacto--form--trabaje').stop().hide(0)
        }
    },
    Abrir(){
        this.ventana.stop().fadeIn(200);
    },
    Cerrar(){
        this.ventana.stop().fadeOut(200);
    },
    Listeners(){
        /*
         Selectores
         */
        this.selectores.on('click', function () {
            let valor = $(this).text();
            Contacto.SetTipoContacto(valor, $(this));
            Contacto.Abrir();
        });
        /*
         Cierre
         */
        this.cerrar.on('click', function () {
            Contacto.Cerrar();
        });
        /*
         Envio
         */
        this.boton.on('click', function (e) {
            e.preventDefault();
            let $form = Contacto.form;
            if (!FormsHelper.check_formularios($form)) {
                return null;
            }
            $form.submit();
            // AjaxHelpers.RequestAjax({
            //     funcion: "EnviarFormularioContacto",
            //     attr: $form.serialize()
            // }, function (data) {
            //     Contacto.Cerrar();
            // });
        })
    }
};

export default Contacto;