<?php
/**
 * Vista del Menu Principal
 *
 * @var string $menu
 * @var string $menu_idiomas
 */
?>
<div class="Menu">
    <?= $menu_idiomas ?>
    <div class="contenedor">
        <img src="<?php assets() ?>/images/logo.png" alt="Logo Ilse Jara">
        <nav class="Menu--nav">
            <?= $menu ?>
        </nav>
    </div>
</div>