<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php bloginfo("description"); ?>">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,800;1,400&family=Oswald:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <?php wp_head(); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri() ?>/assets/css/media.css">
   
    <title><?php bloginfo("name"); ?></title>
</head>
<!-------INICIO: HEAD------>
<nav id="navigation" class="navbar navbar-light bg-white navbar-expand-md fixed-top"> 
<!--INICIO: LOGO-->
  <div class="container">
    <?php the_custom_logo(); ?>
<!--FIN: LOGO-->

    <!--INICIO: MENÚ-->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuPrincipal" aria-controls="menuPrincipal" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end">
      <?php wp_nav_menu( array("theme_location" => "menu-principal")); ?>

      <div class="redesSociales text-center text-center text-md-right">
        <?php wp_nav_menu( array("theme_location" => "menu-redesSocial")); ?>
      </div>
    </div>
    <!--FIN: MENÚ-->
</div>
</nav>
<!-------FIN: HEAD------>