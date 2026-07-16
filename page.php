<!-------INICIO: HEADER------>
<?php 
/*Template Name: Plantilla Page*/
include("header.php"); 
?>
<!-------INICIO: HEADER------>

<!--SECCIÓN CONTENIDO PÁGINA-->
<section class="container py-5 px-4 px-md-3 mt-5 mt-md-0 pageContenido">
    <h2 class="mt-md-5 pt-md-2 text-center h1"><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
</section>

<!-------INICIO: FOOTER------>
<?php include("footer.php"); ?>
<!-------FIN: FOOTER----->