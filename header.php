<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo("description"); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>

    <?php wp_head(); // Estilos y scripts: dalecolor_assets() en functions.php ?>

    <title><?php bloginfo("name"); ?></title>
</head>
<!-------INICIO: HEAD------>
<nav id="navigation" class="navbar navbar-light bg-white navbar-expand-lg fixed-top">
<!--INICIO: LOGO-->
  <div class="container">
    <?php the_custom_logo(); ?>
<!--FIN: LOGO-->

    <!--INICIO: MENÚ-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Abrir menú">
      <i class="fas fa-bars"></i>
    </button>

    <div id="menuPrincipal" class="collapse navbar-collapse justify-content-end">
      <?php wp_nav_menu( array("theme_location" => "menu-principal")); ?>

      <div class="redesSociales text-center text-lg-right">
        <?php wp_nav_menu( array("theme_location" => "menu-redesSocial")); ?>
      </div>
    </div>
    <!--FIN: MENÚ-->
</div>
</nav>
<!-------FIN: HEAD------>