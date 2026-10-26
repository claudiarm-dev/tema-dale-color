<!--INICIO: BANNER SLIDER-->
<div class="container-fluid cuerpo-web px-0"> 
  <div id="sliderPrincipal" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#sliderPrincipal" data-slide-to="0" class="active"></li>
      <li data-target="#sliderPrincipal" data-slide-to="1"></li>
    </ol>

    <div class="carousel-inner">
      <div class="carousel-item active">
        <!-- Con <picture> se descarga solo la imagen del ancho actual; dos <img> ocultos con d-none se descargan igual -->
        <picture>
          <source media="(min-width: 576px)" srcset="<?php echo get_template_directory_uri() ?>/assets/imagenes/slider-principal/banner-principal-bienvenidos-desktop.webp" width="1905" height="800">
          <img class="d-block w-100 h-auto" src="<?php echo get_template_directory_uri() ?>/assets/imagenes/slider-principal/banner-principal-bienvenidos-mobile.webp" width="450" height="507" alt="Bienvenido DaleColor" fetchpriority="high">
        </picture>
        <div class="carousel-caption slideBajada">
          <span class="h1 px-2">Dale color hoy a tu hogar!</span>
          <p class="pt-2 px-2">Cotiza tu cuadro ensueño y a la medida que quieras.</p>
          <a class="btn btn-primary btn-lg" href="#cotizar" role="button">Cotizar marco</a>
        </div>
      </div>

      <div class="carousel-item">
        <picture>
          <source media="(min-width: 576px)" srcset="<?php echo get_template_directory_uri() ?>/assets/imagenes/slider-principal/banner-promocion-desktop.webp" width="1905" height="800">
          <img class="d-block w-100 h-auto" src="<?php echo get_template_directory_uri() ?>/assets/imagenes/slider-principal/banner-promocion-mobile.webp" width="450" height="507" alt="Conoce nuestra historia" fetchpriority="low">
        </picture>
        <div class="carousel-caption slideBajada">
          <span class="h1 px-2">Enmárcalo todo</span>
          <p class="pt-2 px-2"><b><u>Contactános</u></b> y tendrás tu cuadro del sueño.</p>
          <a class="btn btn-primary btn-lg" href="#conocenos" role="button">Conoce nuestra historia</a>
        </div>
      </div>

    <a class="carousel-control-prev control-flecha" href="#sliderPrincipal" role="button" data-slide="prev">
      <div class="p-2 bg-white flechaSlider"><i class="fas fa-chevron-left carousel-control-prev-icon mt-1" aria-hidden="true"></i></div>
      <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next control-flecha" href="#sliderPrincipal" role="button" data-slide="next">
      <div class="p-2 bg-white flechaSlider"><i class="fas fa-chevron-right carousel-control-next-icon mt-1"></i></div>
      <span class="sr-only">Siguiente</span>
    </a>

    </div>  
  </div>
    
</div>
<!--FIN: BANNER SLIDER-->

  
  
  
  
  
  