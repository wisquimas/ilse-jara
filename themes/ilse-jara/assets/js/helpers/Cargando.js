var Cargando = {
    iniciar: function (id) {
        if (id) {
            if ($('#' + id).length < 1) {
                $('body').append('<div id="' + id + '" class="cover" style="display:none;"></div>');
                $('#' + id).show(0);
            }
        } else {
            if ($('#cargando').length < 1) {
                $('body').append('<div id="cargando" class="cover" style="display:none;"></div>');
                $('#cargando').show(0);
            }
        }
    },
    borrar: function (id) {
        if (id) {
            if ($('#' + id).length >= 0) {
                $('#' + id).stop().fadeOut(500, function () {
                    $('#' + id).remove();
                });
            }
        } else {
            if ($('#cargando').length >= 0) {
                $('#cargando').stop().fadeOut(500, function () {
                    $('#cargando').remove();
                });
            }
        }
    }
};
export default Cargando;
