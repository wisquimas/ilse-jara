<?php
/**
 * Vista del loop de fashion lab
 *
 * @var \IlseJara\FashionLab $fashion
 */
?>
<div class="FashionLab--loop" data-fashion="<?= $fashion->ID ?>">
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen1"
          style="background-image: url(<?= $fashion->imagenes_imagen1 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen2"
          style="background-image: url(<?= $fashion->imagenes_imagen2 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen3"
          style="background-image: url(<?= $fashion->imagenes_imagen3 ?>)"></span>
    <span class="FashionLab--loop--imagen FashionLab--loop--imagen4"
          style="background-image: url(<?= $fashion->imagenes_imagen4 ?>)"></span>
</div>
<div class="FashionLab--fancy" data-fashion="<?= $fashion->ID ?>">
    <div class="FashionLab--fancy--cerrar">x</div>
    <div class="Coleccion--contenedor">
        <div class="FashionLab--fancy--title">Fashion Lab</div>
        <div class="FashionLab--fancy--text"><?= $fashion->texto_texto ?></div>
    </div>
</div>