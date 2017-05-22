<?php
/**
 * Vista de un elemento de galeria de coleccion
 *
 * @var \IlseJara\GaleriaColeccion $galeria
 * @var int                        $indice
 */
?>
<div class="Coleccion--fancy" data-indice="<?= $indice ?>">
    <div class="Coleccion--contenedor">
        <div class="Coleccion--cabecera--left">
            <img class="Coleccion--cabecera--imagen" src="<?= $galeria->foto ?>" alt="">
        </div>
        <div class="Coleccion--cabecera--right">
            <div class="Coleccion--fancy--zoom"></div>
            <div class="Coleccion--fancy--texto"><?= $galeria->texto ?></div>
        </div>
    </div>
</div>