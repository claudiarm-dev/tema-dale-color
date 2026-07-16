<?php 
add_theme_support("custom-logo");
add_theme_support("post-thumbnails");

///INICIO: MENÚS
register_nav_menus( array(
    "menu-principal" => "Menu principal",
    "menu-footer" => "Menu footer",
    "menu-redesSocial" => "Menu redes sociales"
));

///INICIO: FOOTER
//FOOTER WIDGETS 1
$widget1=array("name"=>"Footer 1 - Logo Boton contacto",
              "before_widget"=>"<div class='col-12 col-md-6 mb-3 mb-md-0'>",
              "after_widget"=>"</div>");
register_sidebar($widget1);
//FOOTER WIDGETS 2
$widget2=array("name"=>"Footer 2 - Columna contacto",
              "before_widget"=>"<div class='col-12 widgetsCero'>",
              "after_widget"=>"</div>");
register_sidebar($widget2);
//FOOTER WIDGETS 3
$widget3=array("name"=>"Footer 3 - Más información",
              "before_widget"=>"<div class='col-12 mb-4'>",
              "after_widget"=>"</div>");
register_sidebar($widget3);
//FOOTER WIDGETS 4
$widget4=array("name"=>"Footer 4 - Más información",
              "before_widget"=>"<div class='col-12 mb-3 mb-md-0'>",
              "after_widget"=>"</div>");
register_sidebar($widget4);
//WIDGETS 5 - BLOG
$widget5=array("name"=>"Sidebar blog",
              "before_widget"=>"<div class='py-3'>",
              "after_widget"=>"</div>");
register_sidebar($widget5);
?>