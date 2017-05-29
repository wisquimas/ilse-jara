<?php
/**
 * Vista del Menu Principal
 *
 * @var string $menu
 */
?>
<div class="MenuFlat">
    <div class="MenuFlat--abrirMenu">
        <span id="barra_1"></span>
        <span id="barra_2"></span>
        <span id="barra_3"></span>
    </div>
    <div class="MenuFlat--menu">
        <div class="contenedor">
            <nav class="Menu--nav">
                <?= $menu ?>
            </nav>
        </div>
    </div>
</div>