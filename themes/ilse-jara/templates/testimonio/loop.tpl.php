<?php
/**
 * Vista de testimonio en loop
 *
 * @var \IlseJara\Testimonio $testimonio
 */
?>
<a href="<?= $testimonio->link ?>" class="Testimonio--loop"
   style="background-image: url('<?= $testimonio->informacion_imagen_loop ?>')">
    <header class="Testimonio--loop--header">
        <div class="Testimonio--loop--header--title"><?= $testimonio->title ?></div>
        <div class="Testimonio--loop--header--cite"><?= $testimonio->informacion_nombre_en_loop_home ?></div>
    </header>
</a>