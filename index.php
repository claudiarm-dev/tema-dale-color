<!-------INICIO: HEADER------>
<?php 
/*Template Name: Plantilla Inicio*/
include("header.php"); 
include("banners.php"); ?>
<!-------INICIO: HEADER------>

<body>
  <!-------INICIO: CUERPO------>
  <!---BLOG 1--->
  <div id="blog" class="d-md-flex my-3 w-100">
    <?php
      $parametros=array('post_type'=>'post',
                        'category_name'=>'decoracion',
                        'posts_per_page'=>2,
                        'ordevy'=>'date',
                        'order'=>'DESC'); 
      $blogHome=new WP_Query($parametros);
      while($blogHome->have_posts()):
            $blogHome->the_post();
    ?>
      <article class="col-12 col-sm-6">
        <div class="blogImagen">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="blogContenido">
          <h2 class="textoContenido py-2 px-3"><?php the_title(); ?></h2>
          <a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" role="button">Leer más</a>
        </div>
      </article>
    <?php endwhile ?>
  </div>

  <!---SECCIÓN INFORMACIÓN ICONOS--->
  <div class="row bg-secondary text-white mb-3 mx-3 p-4">
    <div class="d-block d-md-flex">
      <div class="col col-md-4 d-block d-md-flex">
          <div class="col col-md-4">
            <img class="float-md-right mx-auto d-block iconoInicio" src="<?php echo get_template_directory_uri() ?>/assets/imagenes/iconos/icono_cuadro.png" width="80%" height="auto">
          </div>
          <div class="col col-md-8 mt-4 mx-md-3 text-center text-md-left">
            <h5>Puedes personalizar <br>tu cuadro. Cotiza aquí</h5>
            <p>Contamos con servicio de personalizado.</p>
          </div>
      </div>

      <div class="col col-md-4 d-block d-md-flex">
        <div class="col col-md-4">
          <img class="float-md-right mx-auto d-block iconoInicio"  src="<?php echo get_template_directory_uri() ?>/assets/imagenes/iconos/framing_icon.png" width="80%" height="auto">
        </div>
        <div class="col col-md-8 mt-4 mx-md-3 text-center text-md-left">
          <h5>Contamos con una amplia <br>variedad de materiales</h5>
          <p>No dudes en asesorarte con nosotros.</p>
        </div>
      </div>

      <div class="col col-md-4 d-block d-md-flex pt-3">
          <div class="col col-md-4">
            <img class="float-mm-right mx-auto d-block iconoInicio" src="<?php echo get_template_directory_uri() ?>/assets/imagenes/iconos/shipping_icon.png" width="80%" height="auto">
          </div>
          <div class="col col-md-8 mt-4 mx-md-3 text-center text-md-left">
            <h5>No te pierdas el envío <br>a todo Chile</h5>
            <p>Por compra sobre <b><u>$20.000 envío gratis.</u></b></p>
          </div>
      </div>
    </div>
  </div>

  <!---SECCIÓN COTIZAR--->
  <div id="cotizar" class="row my-3">
    <div class="container-fluid d-md-flex">

      <!--BANNER IMAGEN-->
      <div class="col-md-6 bannerCotizar"></div>

      <!--SECCIÓN DEL FORMULARIO-->
      <div class="col-md-6 py-5 align-self-center">
        <div class="my-4 ml-md-3 pl-md-3 pl-lg-5 text-center text-md-left">
          <span class="h1">No dudes y empieza a <br>darle color a tu hogar!</span>
          <p class="py-2">Estas a un paso de dar color a tu hogar. Si dudas <a href="http://localhost/wpDaleColor/contactanos/"><b><u>contáctanos.</b></u></b></a></p>
          <h5 class="tituloCotizador">¿Cuántos quieres?</h5>

          <!--SELECTOR PARA MOSTRAR-->
          <select class="pt-2 selectroCantidad">
            <option>Selecciona cuantos quieres</option>
            <option value="unCuadro">1</option>
            <option value="dosCuadro">2</option>
            <option value="tresCuadro">3</option>
          </select>
        </div>

      <!---FORMULARIO 2ª PARTE OCULTAR-->
        <!---SELECCIONAR 1 CUADRO-->
        <div class="unCuadro cajaColor ml-md-5 pl-md-3 text-center text-md-left">
          <h5 class="tituloCotizador">¿Qué medidas tiene cada cuadro?</h5>
          <div>
            <input id="alturaCuadro" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro" class="medidasCotizar" type="number" name="largo" min="0">
            <p style="font-size: 11px;" class="mt-2"><em>alto x largo cm</em></p>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Qué color te tinca?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="colorBlancas" type="checkbox" name="colorCheckbox" value="blancas"><label class="pl-1 pr-3">Blancas</label>
            <input id="colorDoradas" type="checkbox" name="colorCheckbox" value="doradas"><label class="pl-1 pr-3">Doradas</label>
            <input id="colorNegra" type="checkbox" name="colorCheckbox" value="negra"><label class="pl-1 pr-3">Negra</label>
            <input id="colorPersonalizado" type="checkbox" name="colorCheckbox" value="personalizado"><label class="pl-1 pr-3">Personalizado</label>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Molduras?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="molAluminio" type="checkbox" name="moldurasCheckbox" value="aluminio"><label class="pl-1 pr-3">Aluminio</label>
            <input id="molRustica" type="checkbox" name="moldurasCheckbox" value="rusticas"><label class="pl-1 pr-3">Rústicas</label>
            <input id="molGrecas" type="checkbox" name="moldurasCheckbox" value="grecas"><label class="pl-1 pr-3">Grecas</label>
          </div>

          <div class="d-block">
            <button class="py-3 px-4 mr-2 btn btn-primary" type="button" onclick="f2()">¿Cuánto sale?</button>
            <a id="boton-cotizar" class="py-3 px-4 btn btn-primary" type="button" href="http://localhost/wpDaleColor/contactanos/">Cotizar ahora</a>
            <div id="total" class="h2 pt-2"></div>
          </div>
          
        </div>

        <!---SELECCIONAR 2 CUADROS-->  
        <div class="dosCuadro cajaColor ml-md-5 pl-md-3 text-center text-md-left">
          <h5 class="tituloCotizador">¿Qué medidas tiene cada cuadro?</h5>
          <div class="my-2">
            <input id="alturaCuadro1" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro1" class="medidasCotizar" type="number" name="largo" min="0">
          </div>
          <div class="my-2">
            <input id="alturaCuadro2" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro2" class="medidasCotizar" type="number" name="largo" min="0">
            <p style="font-size: 11px;" class="mt-2"><em>alto x largo cm</em></p>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Qué color te tinca?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="colorBlancas1" type="checkbox" name="colorCheckbox" value="blancas"><label class="pl-1 pr-3">Blancas</label>
            <input id="colorDoradas1" type="checkbox" name="colorCheckbox" value="doradas"><label class="pl-1 pr-3">Doradas</label>
            <input id="colorNegra1" type="checkbox" name="colorCheckbox" value="negra"><label class="pl-1 pr-3">Negra</label>
            <input id="colorPersonalizado1" type="checkbox" name="colorCheckbox" value="personalizado"><label class="pl-1 pr-3">Personalizado</label>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Molduras?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="molAluminio1" type="checkbox" name="moldurasCheckbox" value="aluminio"><label class="pl-1 pr-3">Aluminio</label>
            <input id="molRustica1" type="checkbox" name="moldurasCheckbox" value="rusticas"><label class="pl-1 pr-3">Rústicas</label>
            <input id="molGrecas1" type="checkbox" name="moldurasCheckbox" value="grecas"><label class="pl-1 pr-3">Grecas</label>
          </div>

          <div class="d-block">
            <button class="py-3 px-4 mr-2 btn btn-primary" type="button" onclick="f3()">¿Cuánto sale?</button>
            <a id="boton-cotizar" class="py-3 px-4 btn btn-primary" type="button" href="http://localhost/wpDaleColor/contactanos/">Cotizar ahora</a>
            <div id="totalDos" class="h2 pt-2"></div>
          </div>
          
        </div>

        <!---SELECCIONAR 3 CUADROS-->
        <div class="tresCuadro cajaColor ml-md-5 pl-md-3 text-center text-md-left">
          <h5 class="tituloCotizador">¿Qué medidas tiene cada cuadro?</h5>
          <div class="my-2">
            <input id="alturaCuadro3" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro3" class="medidasCotizar" type="number" name="largo" min="0">
          </div>
          <div class="my-2">
            <input id="alturaCuadro4" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro4" class="medidasCotizar" type="number" name="largo" min="0">
          </div>
          <div class="my-2">
            <input id="alturaCuadro5" class="medidasCotizar" type="number" name="alto" min="0"> x
            <input id="largoCuadro5" class="medidasCotizar" type="number" name="largo" min="0">
            <p style="font-size: 11px;" class="mt-2"><em>alto x largo cm</em></p>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Qué color te tinca?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="colorBlancas2" type="checkbox" name="colorCheckbox" value="blancas"><label class="pl-1 pr-3">Blancas</label>
            <input id="colorDoradas2" type="checkbox" name="colorCheckbox" value="doradas"><label class="pl-1 pr-3">Doradas</label>
            <input id="colorNegra2" type="checkbox" name="colorCheckbox" value="negra"><label class="pl-1 pr-3">Negra</label>
            <input id="colorPersonalizado2" type="checkbox" name="colorCheckbox" value="personalizado"><label class="pl-1 pr-3">Personalizado</label>
          </div>

          <div class="my-4">
            <h5 class="tituloCotizador">¿Molduras?</h5>
            <p style="font-size: 11px;" class="mt-2"><em>Selecciona solamente una*</em></p>
            <input id="molAluminio2" type="checkbox" name="moldurasCheckbox" value="aluminio"><label class="pl-1 pr-3">Aluminio</label>
            <input id="molRustica2" type="checkbox" name="moldurasCheckbox" value="rusticas"><label class="pl-1 pr-3">Rústicas</label>
            <input id="molGrecas2" type="checkbox" name="moldurasCheckbox" value="grecas"><label class="pl-1 pr-3">Grecas</label>
          </div>

          <div class="d-block">
            <button class="py-3 px-4 mr-2 btn btn-primary" type="button" onclick="f4()">¿Cuánto sale?</button>
            <a id="boton-cotizar" class="py-3 px-4 btn btn-primary" type="button" href="http://localhost/wpDaleColor/contactanos/">Cotizar ahora</a>
            <div id="totalTres" class="h2 pt-2"></div>
          </div>

        </div>

      </div>
    </div>
  </div>

  <!---BLOG 2--->
  <div id="blog" class="d-md-flex my-3 w-100">
    <?php
      $parametros=array('post_type'=>'post',
                        'category_name'=>'estilo',
                        'posts_per_page'=>2,
                        'ordevy'=>'date',
                        'order'=>'DESC'); 
      $blogHome=new WP_Query($parametros);
      while($blogHome->have_posts()):
            $blogHome->the_post();
    ?>
      <article class="col-12 col-sm-6">
        <div class="blogImagen">
          <?php the_post_thumbnail(); ?>
        </div>
        <div class="blogContenido">
          <h2 class="textoContenido py-2 px-3"><?php the_title(); ?></h2>
          <a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" role="button">Leer más</a>
        </div>
      </article>
    <?php endwhile ?>
  </div>

  <!---SECCION NOSOTROS-->
  <div id="conocenos" class="position-relative overflow-hidden py-5 px-3 px-md-5 m-md-3 text-center seccionNosotros">
    <div class="jumbotron col-md-6 p-5 mx-auto my-5">
      <h2 class="h1 mb-4">¡Hola! Somos dalecolor</h2>
      <p><?php bloginfo("description"); ?></p>
      <p>Si quieres comprar un cuadro, no dudes en contáctarnos te asesoramos, te ayudamos y te enviamos el catálogo al mejor precio.</p>
      <section class="d-md-flex justify-content-center">
        <a class="btn btn-primary btn-lg mx-md-1 my-1 my-md-0" href="https://www.instagram.com/" target="_blank" role="button">Siguenos en Instagram <i class="fab fa-instagram"></i></a>
        <a class="btn btn-primary btn-lg mx-md-1 my-1 my-md-0" href="https://www.instagram.com/" role="button">Contáctanos <i class="far fa-hand-pointer"></i></a>
      </section>
    </div>
  </div>
  
  <!----FIN: CUERPO---->

  <!-------INICIO: POP UP------>
  <!--PREGUNTAS FRECUENTES + TERMINOS Y CONDICIONES-->
  <div id="cajaPopup"></div>

  <!-- POP UP INICIO -->
  <div class="modal fade" id="popupInicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <img src="<?php echo get_template_directory_uri() ?>/assets/imagenes/banners/banner_popup_envio_gratis.jpg" alt="Envío gratis compra superior a $20.000" width="100%" height="auto">
        </div>
      </div>
    </div>
  </div>
  <!-------INICIO: POP UP------>

<!-------INICIO: FOOTER------>
<?php include("footer.php"); ?>
<!-------FIN: FOOTER----->