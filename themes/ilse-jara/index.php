<?php
$opciones = \IlseJara\HomeOptions::InstanceCachedLast();


/*
 * Logica Sliders
 */
$htmlSliders = function () use ($opciones) {
    $respuesta = '';

    if (count($opciones->sliders)) {
        $variables = '';
        $elementos = '';
        $acciones = '';

        foreach ($opciones->sliders as $slider) {
            $uid = uniqid();

            $variables .= \Gafa\GafaTemplate::Imprimir('slider_youtube/variable', array(
                'uid' => $uid,
            ));
            $elementos .= \Gafa\GafaTemplate::Imprimir('slider_youtube/elemento', array(
                'uid'  => $uid,
                'link' => isset($slider['slider_coleccion']) ? \IlseJara\Coleccion::InstanceCached($slider['slider_coleccion'])->link : '',
            ));
            $acciones .= \Gafa\GafaTemplate::Imprimir('slider_youtube/accion', array(
                'id'   => isset($slider['slider_id_video_de_youtube']) ? $slider['slider_id_video_de_youtube'] : '',
                'uid'  => $uid,
                'link' => isset($slider['slider_coleccion']) ? \IlseJara\Coleccion::InstanceCached($slider['slider_coleccion'])->link : '',
            ));
        }

        $respuesta = \Gafa\GafaTemplate::Imprimir('slider_youtube/body', array(
            'variables' => $variables,
            'elementos' => $elementos,
            'acciones'  => $acciones,
        ));
    }

    return $respuesta;
};

/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('home/body', array(
    'opciones'    => $opciones,
    'htmlSliders' => $htmlSliders(),
));

get_footer();