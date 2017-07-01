<?php

namespace IlseJara;

use Gafa\GafaTemplate;

abstract class Footer
{
    /**
     * Imprime el footer
     *
     * @return string
     */
    static public function Imprimir()
    {
        $htmlRedes = function () {
            $html = '';
            $opciones = HomeOptions::InstanceCachedLast();
            $redes = $opciones->redes;
            if (count($redes)) {
                foreach ($redes as $red) {
                    $link = isset($red['redes_link']) ? $red['redes_link'] : '';
                    $logo = isset($red['redes_logo']['original']) ? $red['redes_logo']['original'] : '';
                    if (!empty($link) && !empty($logo)) {
                        $html .= GafaTemplate::Imprimir('redes/red', array(
                            'red' => new Redes($logo, $link),
                        ));
                    }
                }
            }

            return $html;
        };

        return GafaTemplate::Imprimir('footer/body', array(
            'direccion' => 'Direccion',
            'telefono'  => 'telefono',
            'redes'     => $htmlRedes(),
            'menu'      => wp_nav_menu(array(
                'echo' => false,
                'menu' => 'navegador-principal',
            )),
        ));
    }
}