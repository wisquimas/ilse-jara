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
            <?= do_shortcode('[mc4wp_form]'); ?>
        </div>
        <div class="Footer--centro"><?= $redes ?></div>
        <div class="Footer--derecho"><?= $menu ?></div>
    </div>
</div>