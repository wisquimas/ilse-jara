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
        return GafaTemplate::Imprimir('footer/body', array(
            'direccion' => 'Direccion',
            'telefono'  => 'telefono',
            'redes'     => '',
            'menu'      => wp_nav_menu(array(
                'echo' => false,
                'menu' => 'navegador-principal',
            )),
        ));
    }
}