<?php

// $Id: styling.inc 2784 2013-11-21 10:48:22Z cimorrison $

// DEFAULT THEME

// ***** COLOURS ************************
// Colours used in MRBS.    All the colours are defined here as PHP variables

$body_background_color          = "#FFFFFF";    // color de fondo
$standard_font_color            = "#191919";    // color del texto
$header_font_color              = "#ffffff";    // color de texto del encabezado
$highlight_font_color           = "#008FDB";    // color link de abajo
$colour_key_font_color          = $standard_font_color;    // used in the colour key table
$error                          = "#a60000";    //ERROR
$warning                        = "#C8C73B";
$banner_calendario              = "#014FBE";


$banner_back_color              = "#014FBE";    // Color de fondo del banner
$banner_border_color            = "#014FBE";    // color del borde del banner
$banner_font_color              = "#FFFFFF";       // Color de texto la empresa en banner

$header_back_color              = "#014FBE";  //color de los encabezados del calendario

$admin_table_header_back_color  = "#014FBE";     // Encabezado de tablas en administracion de salas
$admin_table_header_sep_color   = $body_background_color; // vertical separator colour in header
$admin_table_header_font_color  = $header_font_color;     // font colour for header
$admin_table_border_color       = "#FFFFFF"; //color del borde
$admin_field_border_color       = "#014FBE";


$main_table_border_color        = "#d1d9de"; // border colour for day/week/month tables - outside
$main_table_header_border_color = $body_background_color; // border colour for day/week/month tables - header
$main_table_body_h_border_color = "#ffffff";              // border colour for day/week/month tables - body, horizontal
$main_table_body_v_border_color = $body_background_color; // border colour for day/week/month tables - body, vertical
$main_table_month_color         = "#ffffff";    // background colour for days in the month view
$main_table_month_invalid_color = "#d1d9de";    // background colour for invalid days in the month view
$main_table_slot_invalid_color  = "#d1d9de";    // background colour for invalid slots in the day and week views
$main_table_labels_back_color   = $header_back_color;     // background colour for the row labels column

// border colours for the main table when it is printed.     These are used by mrbs-print.css.php
$main_table_border_color_print        = "#879AA8";    // border colour for the main table (print view)
$main_table_header_border_color_print = "#879AA8";    // border colour for day/week/month tables - header (print view)
$main_table_body_h_border_color_print = "#879AA8";    // border colour for day/week/month tables - body, horizontal (print view)
$main_table_body_v_border_color_print = "#879AA8";    // border colour for day/week/month tables - body, vertical (print view)

// font colours for the main table when it is printed
$header_font_color_print        = "#0B263B";
$anchor_link_color_header_print = "#0B263B";

$report_table_border_color      = $standard_font_color;
$report_h2_border_color         = $banner_back_color;     // border colour for <h2> in report.php
$report_h3_border_color         = "#879AA8";              // border colour for <h2> in report.php

$search_table_border_color      = $standard_font_color;

$site_faq_entry_border_color    = "#C3CCD3";              // used to separate individual FAQ's in help.php

$trailer_border_color           = $standard_font_color;

$anchor_link_color              = $standard_font_color;        // link color
$Link_de_label_header_calendar  = "#FFFFFF";
$anchor_visited_color           = $anchor_link_color;          // link color (visited)
$anchor_hover_color             = $highlight_font_color;       // link color (hover)

$anchor_link_color_banner       = $header_font_color;          // link color
$anchor_visited_color_banner    = $anchor_link_color_banner;   // link color (visited)
$anchor_hover_color_banner      = "#FFFFFF";   // link color (hover)

$anchor_link_color_header       = $header_font_color;          // link color
$anchor_visited_color_header    = $anchor_link_color_header;   // link color (visited)
$anchor_hover_color_header      = $anchor_link_color_header;   // link color (hover)

$column_hidden_color            = $main_table_month_invalid_color;    // hidden days in the week and month views
$calendar_hidden_color          = "#dae0e4";                          // hidden days in the mini-cals
$row_even_color                 = "#ffffff";        // even rows in the day and week views
$row_odd_color                  = "#f2f4f6";        // even rows in the day and week views
$row_highlight_color            = "#a60000";        // used for highlighting a row

$help_highlight_color           = "#ffe6f0";        // highlighting text on the help page

$multiple_control_color         = "#ffff22";        // background colour for the multiple booking controls

// These are the colours used for distinguishing between the dfferent types of bookings in the main
// displays in the day, week and month views
$color_types = array(
    'A' => "#606B71", //Gris ausente
    'B' => "#0B7DD2", //AZUL cumplio
    'C' => "#EEBB2C", //amarillo Permiso
    'D' => "#E06311", //Anaranjado menos horas
    'E' => "#66FFFF", //anaranjado CONARE
    'F' => "#66FFFF", //Verde Otro
    'G' => "#FF6666",
    'H' => "#66FFFF",
    'I' => "#99CC66",
    'J' => "#CCCCCC"); 

// colours used for pending.php and bookings awaiting approval
$outstanding_color         = "#FFF36C"; // font colour for the outstanding reservations message in the header
$pending_header_back_color = $header_back_color;; // background colour for series headers
$series_entry_back_color   = "#FFFCDA"; // background colour for entries in a series
$pending_control_color     = "#FFF36C"; // background colour for the series +/- controls in pending.php
    
// ***** DIMENSIONS *******************
$banner_border_width          = '0';  // (px)  border width for the outside of the banner
$banner_border_cell_width     = '1';  // (px)  border width for the cells of the banner
$main_table_border_width      = '1';  // (px)  border width for the outside of the main day/week/month tables    
$main_table_cell_border_width = '1';  // (px)  border width for the cells of the main day/week/month tables
$main_cell_height             = '17'; // (px)  height of the cells in the main day/week tables
         
    
// ***** FONTS ************************    
$standard_font_family  = "Arial, 'Arial Unicode MS', Verdana, sans-serif";

