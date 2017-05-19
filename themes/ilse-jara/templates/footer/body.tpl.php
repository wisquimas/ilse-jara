<?php
/**
 * Vista del footer
 *
 * @var string $direccion
 * @var string $telefono
 * @var string $redes
 * @var string $menu
 */
?>
<div id="Footer">
    <div class="contenedor">
        <div class="Footer--izquierdo">
            <?= $direccion ?><br>
            <?= $telefono ?>
        </div>
        <div class="Footer--centro"><?= $redes ?></div>
        <div class="Footer--derecho"><?= $menu ?></div>
    </div>
</div>