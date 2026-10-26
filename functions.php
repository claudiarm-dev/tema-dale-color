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

///INICIO: SOPORTE SVG (reemplaza al plugin "SVG Support")
// Habilita subir archivos .svg desde la Biblioteca de medios.
function dalecolor_allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'dalecolor_allow_svg_upload' );

// WordPress no reconoce el mime real de un .svg (no es una imagen rasterizada),
// así que hay que confirmarlo explícitamente o el core lo rechaza igual.
function dalecolor_fix_svg_filetype( $data, $file, $filename, $mimes ) {
    if ( 'svg' === strtolower( pathinfo( $filename, PATHINFO_EXTENSION ) ) ) {
        $data['ext']             = 'svg';
        $data['type']            = 'image/svg+xml';
        $data['proper_filename'] = $filename;
    }
    return $data;
}
add_filter( 'wp_check_filetype_and_ext', 'dalecolor_fix_svg_filetype', 10, 4 );

// Un SVG es XML: puede traer <script>, atributos on* o enlaces "javascript:"
// que se ejecutan en el navegador (XSS). Se limpia antes de aceptar el archivo.
function dalecolor_sanitize_svg_file( $file_path ) {
    $content = file_get_contents( $file_path );

    if ( false === $content || '' === trim( $content ) ) {
        return false;
    }

    libxml_use_internal_errors( true );
    $dom    = new DOMDocument();
    $loaded = $dom->loadXML( $content, LIBXML_NONET );
    libxml_clear_errors();

    if ( ! $loaded || ! $dom->documentElement || 'svg' !== strtolower( $dom->documentElement->localName ) ) {
        return false;
    }

    // Elimina etiquetas que pueden ejecutar código o incrustar otros documentos.
    // getElementsByTagName() es sensible a mayúsculas en XML, por eso "foreignObject"
    // va con su grafía exacta del spec de SVG.
    foreach ( array( 'script', 'foreignObject', 'iframe', 'object', 'embed', 'link' ) as $tag ) {
        $nodes = $dom->getElementsByTagName( $tag );
        for ( $i = $nodes->length - 1; $i >= 0; $i-- ) {
            $node = $nodes->item( $i );
            $node->parentNode->removeChild( $node );
        }
    }

    // Elimina manejadores de eventos (onload, onclick, ...) y enlaces peligrosos
    // (javascript:, data:, vbscript:), dejando solo anclas internas (#id) o http(s).
    $xpath = new DOMXPath( $dom );
    foreach ( $xpath->query( '//*' ) as $element ) {
        foreach ( iterator_to_array( $element->attributes ) as $attr ) {
            $name = strtolower( $attr->nodeName );

            if ( 0 === strpos( $name, 'on' ) ) {
                $element->removeAttribute( $attr->nodeName );
                continue;
            }

            if ( in_array( $name, array( 'href', 'xlink:href' ), true ) ) {
                $value = strtolower( preg_replace( '/\s+/', '', $attr->nodeValue ) );
                if ( '' !== $value && '#' !== $value[0] && 0 !== strpos( $value, 'http://' ) && 0 !== strpos( $value, 'https://' ) ) {
                    $element->removeAttribute( $attr->nodeName );
                }
            }
        }
    }

    $clean = $dom->saveXML();

    return false !== $clean && false !== file_put_contents( $file_path, $clean );
}

function dalecolor_sanitize_svg_upload( $file ) {
    if ( 'svg' !== strtolower( pathinfo( $file['name'], PATHINFO_EXTENSION ) ) ) {
        return $file;
    }

    if ( ! dalecolor_sanitize_svg_file( $file['tmp_name'] ) ) {
        $file['error'] = 'El archivo SVG no es válido o contiene código no permitido, y fue rechazado por seguridad.';
    }

    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'dalecolor_sanitize_svg_upload' );
///FIN: SOPORTE SVG
?>