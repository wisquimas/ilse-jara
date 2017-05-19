<?php
/*FUNCIONES EXCLUSIVAS DE AJAX*/

if (!function_exists('add_newsletter')) {
    function add_newsletter($mail = false)
    {
        return NewsletterHelper::Add($mail);
    }
}

function EnviarFormularioContacto($data = '')
{
    global $mensaje;
    parse_str($data, $informacionFormulario);
    $htmlMensaje = '';

    $opcionesGenerales = \IlseJara\HomeOptions::InstanceCachedLast();
    $mailContacto = $opcionesGenerales->contacto_email;


    foreach ($informacionFormulario as $key => $value) {
        $htmlMensaje .= "<strong>{$key}:</strong>{$value} <br>";
    }
    $mails = $mailContacto;

    $headers = array('Content-Type: text/html; charset=UTF-8');
    $mail_Enviado = wp_mail($mails, 'Mensaje de Contacto', $htmlMensaje, $headers);

    if ($mail_Enviado) {
        $mensaje->add_mensaje('Muchas gracias por ponerse en contacto. En breves le responderemos.');
    } else {
        $mensaje->add_error('El formulario no se ha podido enviar. Si el problema persiste, puede enviarnos estos mismos datos por correo a: ' . $mails);
    }
}