<?php
/**
 * Vista de email de contacto para empleados
 *
 * @var array $informacionFormulario
 */
?>
<h1>Haz recibido un mensaje de contacto desde <?= get_home_url() ?></h1>
<?php
foreach ($informacionFormulario as $key => $value) {
    echo "<strong>{$key}:</strong>{$value} <br>";
}
?>
<small>Intenta responder a la brevedad</small>
