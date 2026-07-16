<!-------INICIO: HEADER------>
<?php 
/*Template Name: Contacto*/
include("header.php"); ?>
<!-------INICIO: HEADER------>
<div class="contacto container-fluid p-3 py-md-0 my-md-3 d-md-flex"> 
  <div class="col-md-6 py-md-5 align-self-center text-center text-md-left">
      <h2 class="h1"><?php the_title(); ?></h2>
      <p class="py-2">Nuestro equipo estará feliz :) por responderte. Si neceitas una consulta rápida nos puedes comunicar por nuestro <a href="https://api.whatsapp.com/send?phone=+56912345678&amp;text=%C2%A1Hola%20equipo%20DaleColor!%20Necesito%20ayuda..." target="black"><b>whatsapp</b></a></p>
      <?php echo do_shortcode( '[contact-form-7 id="5" title="Formulario de contacto 1"]' ); ?>
  </div>

  <div class="col-md-6 bannerContacto"></div>
</div>

<!-------INICIO: FOOTER------>
<?php include("footer.php"); ?>
<!-------FIN: FOOTER----->

