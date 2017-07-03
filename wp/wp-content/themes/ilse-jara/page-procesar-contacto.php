<?php

global $mensaje;
$posts = $_POST;
$files = $_FILES;

$attachments = array_map(function ($file) {
    $destino = ABSPATH . DIRECTORY_SEPARATOR . 'wp-content' . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'contacto' . DIRECTORY_SEPARATOR . "{$file['name']}";
    move_uploaded_file($file['tmp_name'], "{$destino}");

    return "{$destino}";
}, $files);


$opcionesGenerales = \IlseJara\HomeOptions::InstanceCachedLast();
$mailContacto = $opcionesGenerales->contacto_email;
$mails = $mailContacto;

$informacionFormulario = array(
    'Tipo'     => isset($posts['tipo']) ? $posts['tipo'] : '',
    'Nombre'   => isset($posts['Nombre']) ? $posts['Nombre'] : '',
    'Apellido' => isset($posts['Apellido']) ? $posts['Apellido'] : '',
    'País'     => isset($posts['Pais']) ? $posts['Pais'] : '',
    'Email'    => isset($posts['Email']) ? $posts['Email'] : '',
    'Teléfono' => isset($posts['Telefono']) ? $posts['Telefono'] : '',
    'Mensaje'  => isset($posts['texto']) ? $posts['texto'] : '',
);

$htmlMensaje = \Gafa\GafaTemplate::Imprimir('email/contacto', array(
    'informacionFormulario' => $informacionFormulario,
));

$headers = array('Content-Type: text/html; charset=UTF-8');
$mail_Enviado = wp_mail($mails, 'Mensaje de Contacto', $htmlMensaje, $headers, $attachments);

if ($mail_Enviado) {
    //ok
    wp_redirect('/?contacto=1');
} else {
    //false
    wp_redirect('/?contacto=0');
}