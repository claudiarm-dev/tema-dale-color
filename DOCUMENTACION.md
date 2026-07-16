# Documentación técnica — Tema DaleColor

Guía de la estructura del tema, qué se administra desde WordPress y qué está definido en el código.

## Estructura de archivos

```
tema-dale-color/
├── style.css              → Hoja de estilos principal + cabecera del tema
├── functions.php          → Soportes del tema, menús y áreas de widgets
├── header.php             → <head>, logo, menú principal y redes sociales
├── footer.php             → Pie de página con áreas de widgets
├── banners.php            → Slider principal (carousel Bootstrap, 2 slides)
├── index.php              → Portada («Plantilla Inicio»): blog, servicios,
│                            cotizador, nosotros y popup promocional
├── page.php               → Plantilla de páginas estáticas
├── single.php             → Plantilla de entrada individual del blog
├── category.php           → Listado de entradas por categoría
├── contacto.php           → Plantilla «Contacto»: formulario CF7 + WhatsApp
├── comments.php           → Comentarios del blog
├── screenshot.png         → Miniatura del tema en Apariencia → Temas
├── assets/
│   ├── css/media.css      → Media queries (responsive)
│   ├── js/app.js          → Carousel, botón «volver arriba», lógica del
│   │                        cotizador (f2/f3/f4) y popup de inicio
│   └── imagenes/          → Slider, iconos y banners del diseño
└── docs/                  → Capturas para el README
```

## Qué se administra desde WordPress

| Elemento | Dónde se configura |
|---|---|
| Logo | Apariencia → Personalizar → Identidad del sitio (soporte `custom-logo`) |
| Descripción en «¡Hola! Somos dalecolor» | Ajustes → Generales → Descripción corta (`bloginfo("description")`) |
| Menús (3) | Apariencia → Menús: **Menu principal**, **Menu footer** y **Menu redes sociales** |
| Footer (4 áreas) y sidebar del blog | Apariencia → Widgets |
| Bloques de blog de la portada | Entradas con categorías **decoracion** y **estilo** (2 más recientes de cada una, con imagen destacada) |
| Formulario de contacto | Plugin Contact Form 7 — la plantilla Contacto usa el shortcode `[contact-form-7 id="5"]` |

> **Importante**: la portada muestra el blog solo si existen entradas en las categorías `decoracion` y `estilo`, con imagen destacada asignada (soporte `post-thumbnails`).

## Qué está definido en el código

- **Slider** (`banners.php`): imágenes en `assets/imagenes/slider-principal/` (versión desktop y mobile por slide) y textos escritos en el HTML. Para cambiar un slide se editan ahí la imagen y el texto.
- **Cotizador** (`index.php` + `assets/js/app.js`): el selector muestra el bloque de 1, 2 o 3 cuadros; los precios se calculan en las funciones `f2()`, `f3()` y `f4()` de `app.js` — ahí se ajustan los valores.
- **Popup promocional** (`index.php`, modal `#popupInicio`): la imagen vive en `assets/imagenes/banners/banner_popup_envio_gratis.jpg`; se dispara desde `app.js` al cargar la portada.
- **Sección servicios** (`index.php`): iconos y textos escritos en el HTML, imágenes en `assets/imagenes/iconos/`.
- **WhatsApp** (`contacto.php`): el número va en el enlace `api.whatsapp.com/send?phone=...`.

## Notas de mantenimiento

- Hay **URLs absolutas a `http://localhost/wpDaleColor/`** en `index.php` (botones «Cotizar ahora» y enlace «contáctanos») y el enlace de WhatsApp usa un número de ejemplo. Si el sitio se publica en otro dominio, reemplazarlas — idealmente por `get_permalink()` / `home_url()`.
- El slider asume exactamente 2 slides (los indicadores están escritos a mano en `banners.php`).
- Probado en WordPress 7.0.1 con PHP 8.2; Bootstrap 4.6 y Font Awesome se cargan desde `header.php`/`footer.php`.

## Historia del proyecto

Tema creado en 2021 como proyecto de cliente ficticio (DaleColor, tienda de cuadros y láminas). Actualizado en julio 2026: WordPress 6.3.1 → 7.0.1, PHP 8.0 → 8.2, plugins al día.
