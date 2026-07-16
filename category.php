<!-------INICIO: HEADER------>
<?php include("header.php");?>
<!-------INICIO: HEADER------>

<!--SECCIÓN CATEGORÍA-->
  <section class="container text-center px-5 py-3">
    <h2 class="mt-5 pt-5 pb-3 h1"><?php the_category(); ?></h2>
    <h4><?php echo category_description(); ?></h4>
  </section>
  <section class="container my-4 text-center">
    <div class="row">
      <div class="col category">
        <?php while(have_posts()): 
            the_post();
        ?> 
        <article class="col-12 col-md-6 mb-5">
          <div class="blogImagenCategory">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="blogContenidoCategory">
            <h2 class="textoContenido pt-4 px-3"><?php the_title(); ?></h2>
            <p><?php the_excerpt(); ?></p>
            <a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>" role="button">Leer más</a>
          </div>
        </article>
      <?php endwhile ?>
      </div>
    </div>
  </section>

<!-------INICIO: FOOTER------>
<?php include("footer.php"); ?>
<!-------FIN: FOOTER----->