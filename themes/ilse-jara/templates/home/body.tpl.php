<?php
/**
 * Vista del cuerpo del home
 *
 * @var \IlseJara\HomeOptions $opciones
 * @var string                $menuHome
 * @var string                $htmlSliders
 * @var string                $htmlColecciones
 */
?>
<div class="Home">
    <div class="Home--Sliders">
        <?= $menuHome ?>
        <?= $htmlSliders ?>
    </div>
    <div class="Home--Colecciones">
        <div class="Home--titulo">Colecciones</div>
        <?= $htmlColecciones ?>
    </div>
</div>