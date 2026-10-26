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

    // Un DTD interno puede declarar entidades que el navegador expande al abrir el archivo
    // (por ejemplo, un <script> escondido que esta limpieza no alcanza a ver). Illustrator
    // declara ahí sus namespaces como entidades de texto, así que se aceptan solo esas
    // (sin marcado, referencias ni archivos externos) y se expanden antes de limpiar.
    if ( $dom->doctype && '' !== trim( (string) $dom->doctype->internalSubset ) ) {
        $resto = preg_replace( '/<!ENTITY\s+[A-Za-z_][\w.-]*\s+("[^"<&%]*"|\'[^\'<&%]*\')\s*>/', '', $dom->doctype->internalSubset );
        if ( '' !== trim( $resto ) ) {
            return false;
        }

        $dom    = new DOMDocument();
        $loaded = $dom->loadXML( $content, LIBXML_NONET | LIBXML_NOENT );
        libxml_clear_errors();
        if ( ! $loaded ) {
            return false;
        }
    }
    if ( $dom->doctype ) {
        $dom->removeChild( $dom->doctype );
    }

    $xpath = new DOMXPath( $dom );

    // Instrucciones de procesamiento como xml-stylesheet pueden cargar hojas XSLT.
    foreach ( iterator_to_array( $xpath->query( '//processing-instruction()' ) ) as $node ) {
        $node->parentNode->removeChild( $node );
    }

    // Elimina etiquetas que pueden ejecutar código o incrustar otros documentos, y las
    // animaciones <set>/<animate> que cambian un href (pueden convertirlo en "javascript:").
    // Se compara el nombre local en minúsculas para cubrir prefijos (s:script) y mayúsculas.
    $bloqueadas = array( 'script', 'foreignobject', 'iframe', 'object', 'embed', 'link' );
    foreach ( iterator_to_array( $xpath->query( '//*' ) ) as $element ) {
        $tag        = strtolower( $element->localName );
        $anima_href = in_array( $tag, array( 'set', 'animate' ), true )
            && preg_match( '/(^|:)href$/i', trim( $element->getAttribute( 'attributeName' ) ) );

        if ( in_array( $tag, $bloqueadas, true ) || $anima_href ) {
            $element->parentNode->removeChild( $element );
        }
    }

    // Elimina manejadores de eventos (onload, onclick, ...), xml:base (cambia la URL contra
    // la que se resuelven los href) y enlaces peligrosos (javascript:, data:, vbscript:),
    // dejando solo anclas internas (#id) o http(s). El nombre local cubre cualquier prefijo
    // del namespace xlink.
    foreach ( $xpath->query( '//*' ) as $element ) {
        foreach ( iterator_to_array( $element->attributes, false ) as $attr ) {
            $name = strtolower( $attr->localName );

            if ( 0 === strpos( $name, 'on' ) || 'base' === $name ) {
                $element->removeAttributeNode( $attr );
                continue;
            }

            if ( 'href' === $name ) {
                $value = strtolower( preg_replace( '/\s+/', '', $attr->nodeValue ) );
                if ( '' !== $value && '#' !== $value[0] && 0 !== strpos( $value, 'http://' ) && 0 !== strpos( $value, 'https://' ) ) {
                    $element->removeAttributeNode( $attr );
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
// La API REST (subida con el archivo en el cuerpo) y media_handle_sideload() usan esta otra vía.
add_filter( 'wp_handle_sideload_prefilter', 'dalecolor_sanitize_svg_upload' );
///FIN: SOPORTE SVG
?>