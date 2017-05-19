import $ from 'jquery';
import AjaxHelpers from './AjaxHelpers'
import FormsHelper from './FormsHelper'

const Contacto = {
    form: $('.Contacto--form'),
    boton: $('.Contacto--form--enviar'),
    init(){
        if (this.form.length) {
            //Iniciamos Helper
            AjaxHelpers.init();
            this.Listeners();
        }
    },
    Listeners(){
        this.boton.on('click', function (e) {
            e.preventDefault();
            let $form = Contacto.form;
            if (!FormsHelper.check_formularios($form)) {
                return null;
            }
            AjaxHelpers.RequestAjax({
                funcion: "EnviarFormularioContacto",
                attr: $form.serialize()
            }, function (data) {
                console.log(data);
            });
        })
    }
};

export default Contacto;