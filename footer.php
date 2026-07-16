<!-------INICIO: FOOTER------>
<footer class="piePagina bg-dark py-2 text-white text-center text-md-left">
    <div class="container">
      <div class="row pt-5">
        <!---WIDGETS 1-->
        <?php dynamic_sidebar("Footer 1 - Logo Boton contacto"); ?>           
      </div>

      <div><hr></div>
      
      <div class="row"> 
        <div class="col-md-6">
          <!---WIDGETS 2-->
          <?php dynamic_sidebar("Footer 2 - Columna contacto"); ?>  
        </div>
        
        <div class="col-md-3 my-5 my-md-0">
          <!---WIDGETS 3-->
          <?php dynamic_sidebar("Footer 3 - Más información"); ?>
        </div>
        
        <div class="col-md-3 mx-4 mx-md-0 blogWidgets">
          <!---WIDGETS 4-->
          <?php dynamic_sidebar("Footer 4 - Más información"); ?>  
 
        </div>
      </div>
      
      <hr>
      
      <div class="row pb-5">
        <div class='col-sm-12 col-md-6'>
          <p class="copyright pt-1 text-center text-md-left">© 2021 <?php bloginfo("name"); ?>, Chile. Todos los derechos reservados.</p>
        </div>
        <div class='col-sm-12 col-md-6 mt-4 mt-md-0'>
          <?php wp_nav_menu( array("theme_location" => "menu-redesSocial")); ?>
        </div>
      </div>
    </div>
</footer>

<!-------FIN: FOOTER------>

<!--SCROOL-->
<div class="float-right fixed-bottom">
    <a href="#" class="scrollTop float-right text-center"><i class="fas fa-arrow-up"></i></a>
</div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

  <script src="<?php echo get_template_directory_uri() ?>/assets/js/app.js"></script>

  <?php wp_footer(); ?>
</body>
</html>