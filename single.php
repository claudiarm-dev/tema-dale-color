<!-------INICIO: HEADER------>
<?php include("header.php");?>
<!-------INICIO: HEADER------>

<!--SECCIÓN DE CONTENIDO-->
<?php while(have_posts()): the_post(); ?>
    <section class="bg-gris blog-head"> 
        <?php the_post_thumbnail(); ?>
        <div class="col-3"></div>
        <div class="tituloBlog container pb-4 col-md-6">
            <article class="my-3"> 
                <div class="card">
                    <div class="card-body">
                        <h2 class="textoContenido text-center"><?php the_title(); ?></h1>
                    </div>
                </div>
            </article>
        </div> 
        <div class="col-3"></div>
    </section>
    <section class="container my-5 py-3 blogContenidoSingle">
        <div class="row d-flex">
            <div class="col-12 col-md-8 pr-md-5 pt-md-3 pb-5 pb-md-0 blogSingle">
                <?php the_content(); ?>
            </div>
<?php endwhile ?>
            <div class="col-12 col-md-4 p-3 p-md-5 widgetsSingle">
                <?php dynamic_sidebar("Sidebar blog"); ?>
            </div>
        </div>
    </section>

<!-------INICIO: FOOTER------>
<?php include("footer.php"); ?>
<!-------FIN: FOOTER----->