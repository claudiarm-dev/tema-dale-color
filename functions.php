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

///INICIO: ESTILOS Y SCRIPTS
// Con wp_enqueue el tema usa el mismo jQuery que WordPress (los widgets de video cargan el suyo
// y antes quedaban dos) y los archivos propios llevan versión: sin ella el navegador seguía
// usando la copia en caché después de un cambio.
function dalecolor_assets() {
    $uri     = get_template_directory_uri();
    $version = function ( $archivo ) {
        return filemtime( get_template_directory() . $archivo );
    };

    wp_enqueue_style( 'dalecolor-fuentes', 'https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,800;1,400&family=Oswald:wght@300;400;500;600&display=swap', array(), null );
    wp_enqueue_style( 'font-awesome', 'https://use.fontawesome.com/releases/v5.6.3/css/all.css', array(), null, 'print' );
    wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', array(), null );
    wp_enqueue_style( 'dalecolor', $uri . '/style.css', array( 'bootstrap' ), $version( '/style.css' ) );
    wp_enqueue_style( 'dalecolor-media', $uri . '/assets/css/media.css', array( 'dalecolor' ), $version( '/assets/css/media.css' ) );

    wp_enqueue_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), null, true );
    wp_enqueue_script( 'dalecolor', $uri . '/assets/js/app.js', array( 'jquery', 'bootstrap' ), $version( '/assets/js/app.js' ), true );
}
add_action( 'wp_enqueue_scripts', 'dalecolor_assets' );

// jQuery de WordPress al final de la página y sin jquery-migrate (el tema no lo necesita).
// WordPress lo carga en modo noConflict, así que se recupera el alias $ que usa app.js.
function dalecolor_jquery() {
    $scripts = wp_scripts();
    $scripts->registered['jquery']->deps = array( 'jquery-core' );
    $scripts->add_data( 'jquery', 'group', 1 );
    $scripts->add_data( 'jquery-core', 'group', 1 );
    wp_add_inline_script( 'jquery-core', 'window.$ = window.jQuery;' );
}
add_action( 'wp_enqueue_scripts', 'dalecolor_jquery', 1 );

// Integridad (SRI) de los archivos del CDN. Font Awesome se carga con media="print" y pasa a
// "all" al terminar: solo trae íconos, así que no bloquea el primer renderizado.
function dalecolor_estilos_cdn( $tag, $handle, $href ) {
    $integridad = array(
        'font-awesome' => 'sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/',
        'bootstrap'    => 'sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l',
    );
    if ( isset( $integridad[ $handle ] ) ) {
        $tag = str_replace( ' href=', ' integrity="' . $integridad[ $handle ] . '" crossorigin="anonymous" href=', $tag );
    }
    if ( 'font-awesome' === $handle ) {
        $tag  = preg_replace( '/ media=([\'"])print\1/', ' media=$1print$1 onload="this.media=\'all\'"', $tag );
        $tag .= '<noscript><link rel="stylesheet" href="' . esc_url( $href ) . '"></noscript>' . "\n";
    }
    return $tag;
}
add_filter( 'style_loader_tag', 'dalecolor_estilos_cdn', 10, 3 );

function dalecolor_scripts_cdn( $tag, $handle ) {
    if ( 'bootstrap' === $handle ) {
        $tag = str_replace( ' src=', ' integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous" src=', $tag );
    }
    return $tag;
}
add_filter( 'script_loader_tag', 'dalecolor_scripts_cdn', 10, 2 );

// Contact Form 7 carga sus archivos solo en la plantilla Contacto, la única con formulario.
function dalecolor_cf7_solo_en_contacto( $cargar ) {
    return $cargar && is_page_template( 'contacto.php' );
}
add_filter( 'wpcf7_load_js', 'dalecolor_cf7_solo_en_contacto' );
add_filter( 'wpcf7_load_css', 'dalecolor_cf7_solo_en_contacto' );

// Sin el script de emojis de WordPress: el tema no lo necesita.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_emoji_styles' );
///FIN: ESTILOS Y SCRIPTS

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