<?php
/**
 * @var \IlseJara\HomeOptions $opciones
 */
?>
<div class="Menu--idiomas">
    <span class="Menu--idiomas_active"><?= $opciones->idiomas_nombre_actual ?></span>
    <span class="Menu--idiomas--separador"></span>
    <a href="<?= $opciones->idiomas_link_otra ?>"><?= $opciones->idiomas_nombre_otra ?></a>
</div>
