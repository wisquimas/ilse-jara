<?php
/**
 * Vista de un elemento de galeria de coleccion
 *
 * @var \IlseJara\GaleriaColeccion $galeria
 * @var int                        $indice
 */
?>
<div class="Coleccion--galeria--foto" data-indice="<?= $indice ?>">
    <img src="<?= $galeria->foto ?>" alt="">
</div>