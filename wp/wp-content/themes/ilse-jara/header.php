<!doctype html>
<html lang="es">
<!--
 __    __  ____  _____  ___   __ __  ____  ___ ___   ____  _____
|  T__T  Tl    j/ ___/ /   \ |  T  Tl    j|   T   T /    T/ ___/
|  |  |  | |  T(   \_ Y     Y|  |  | |  T | _   _ |Y  o  (   \_
|  |  |  | |  | \__  T|  Q  ||  |  | |  | |  \_/  ||     |\__  T
l  `  '  ! |  | /  \ ||     ||  :  | |  | |   |   ||  _  |/  \ |
 \      /  j  l \    |l     |l     | j  l |   |   ||  |  |\    |
  \_/\_/  |____j \___j \__,_j \__,_j|____jl___j___jl__j__j \___j
 Desarrollado por: wisquimas@gmail.com
-->
<head>
    <meta charset="utf-8"/>
    <title><?php wp_title(); ?></title>
    <link rel="icon" href=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Meta SEO -->
    <!-- Meta Facebook -->
    <?php
    etiquetas_og();
    ?>
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,200i,300,400,800" rel="stylesheet">
    <!--suppress HtmlUnknownTarget -->
    <link type="text/css" rel="stylesheet" href="<?php plantilla(); ?>/style.css"/>
    <!--suppress HtmlUnknownTarget -->
    <link type="text/css" rel="stylesheet" href="<?php assets(); ?>/css/dev.css"/>
    <!--suppress HtmlUnknownTarget -->
    <link type="text/css" rel="stylesheet" href="<?php assets(); ?>/css/template.css"/>
    <!--suppress HtmlUnknownTarget -->
    <link type="text/css" rel="stylesheet" href="<?php assets(); ?>/css/templateResponsive.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <?php require_once("assets/js/gafaCore.php"); ?>

    <!--Slider COlecciones CSS-->
    <link rel="stylesheet" type="text/css" href="<?php assets(); ?>/js/vendor/slick/slick.css"/>

    <!--suppress HtmlUnknownTarget -->
    <link rel="stylesheet" href="<?php assets(); ?>/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css"
          media="screen"/>
    <!--suppress HtmlUnknownTarget -->
    <script type="text/javascript" src="<?php assets(); ?>/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script type="text/javascript" src="<?php assets(); ?>/js/vendor/jquery.inview-master/jquery.inview.js"></script>
    <!-- Slider COlecciones JS-->
    <script type="text/javascript" src="<?php assets(); ?>/js/vendor/slick/slick.min.js"></script>
    <!--Zoom-->
    <script type="text/javascript" src="<?php assets(); ?>/js/vendor/zoom/jquery.elevatezoom.js"></script>
    <!-- Comienza WP Head -->
    <?php wp_head(); ?>
    <!-- Google Analytics -->
    <script type='text/javascript'
            src='//platform-api.sharethis.com/js/sharethis.js#property=5914db8b8415370011847de9&product=custom-share-buttons'
            async='async'></script>
    <!-- Begin Cookie Consent script https://cookiescript.info/ -->
    <link rel="stylesheet" type="text/css" href="//cookiescriptcdn.pro/libs/cookieconsent.6.min.css"/>
    <script>
        var cookieconsent_ts = 1499044872718;
    </script>
    <script src="//cookiescriptcdn.pro/libs/cookieconsent.6.min.js"></script>
    <script>
        window.addEventListener("load", function () {
            window.cookieconsent.initialise({
                "palette": {
                    "popup": {
                        "background": "#efefef",
                        "text": "#404040"
                    },
                    "button": {
                        "background": "#8ec760",
                        "text": "#ffffff"
                    }
                },
                "theme": "edgeless",
                "content": {
                    "message": "Este sitio usa coockies para asegurar una mejor experiencia.",
                    "dismiss": "Acepto",
                    "link": "Aprenda más"
                }
            })
        });
    </script>
    <!-- End Cookie Consent script -->
</head>
<body <?php body_class("normal"); ?> onbeforeunload="window.Cargando.iniciar()">
<?= \Gafa\GafaTemplate::Imprimir('cargando/inicia') ?>
<?= \IlseJara\Menu::ImprimirMenuNormal() ?>