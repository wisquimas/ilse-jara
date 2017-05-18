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
/*
 * Logica Colecciones
 */
$htmlColecciones = function () {
    $html = '';
    $colecciones = \IlseJara\Coleccion::Get(null, true);

    if ($colecciones) {
        foreach ($colecciones as $coleccion) {
            $html .= \Gafa\GafaTemplate::Imprimir('coleccion/loopHome', array(
                'coleccion' => $coleccion,
            ));
        }
    }

    return $html;
};
/*
 * Logica FashionLab
 */
$htmlFashionLab = function () {
    $html = '';
    $fashionLabs = \IlseJara\FashionLab::Get(array(
        'posts_per_page' => 3,
    ), true);

    if (count($fashionLabs)) {
        foreach ($fashionLabs as $lab) {
            $html .= \Gafa\GafaTemplate::Imprimir('fashion-lab/loop', array(
                'fashion' => $lab,
            ));
        }
    }

    return $html;
};
/*
 * Lógica Universo
 */
$htmlUniverso = function () {
    $html = '';

    return $html;
};
/*****************************************************
 * Impresion
 ****************************************************/
get_header();

echo \Gafa\GafaTemplate::Imprimir('home/body', array(
    'opciones'        => $opciones,
    'menuHome'        => \IlseJara\Menu::ImprimirMenuHome(),
    'htmlSliders'     => $htmlSliders(),
    'htmlColecciones' => $htmlColecciones(),
    'htmlFashionLab'  => $htmlFashionLab(),
    'htmlUniverso'    => $htmlUniverso(),
));

get_footer();