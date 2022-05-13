<?php

// $Id: config.inc.php 2799 2014-01-09 12:44:22Z cimorrison $

/**************************************************************************
 *   MRBS Configuration File
 *   Configure this file for your site.
 *   You shouldn't have to modify anything outside this file.
 *
 *   This file has already been populated with the minimum set of configuration
 *   variables that you will need to change to get your system up and running.
 *   If you want to change any of the other settings in systemdefaults.inc.php
 *   or areadefaults.inc.php, then copy the relevant lines into this file
 *   and edit them here.   This file will override the default settings and
 *   when you upgrade to a new version of MRBS the config file is preserved.
 **************************************************************************/

/**********
 * Timezone
 **********/

// The timezone your meeting rooms run in. It is especially important
// to set this if you're using PHP 5 on Linux. In this configuration
// if you don't, meetings in a different DST than you are currently
// in are offset by the DST offset incorrectly.
//
// Note that timezones can be set on a per-area basis, so strictly speaking this
// setting should be in areadefaults.inc.php, but as it is so important to set
// the right timezone it is included here.
//
// When upgrading an existing installation, this should be set to the
// timezone the web server runs in.  See the INSTALL document for more information.
//
// A list of valid timezones can be found at http://php.net/manual/timezones.php
// The following line must be uncommented by removing the '//' at the beginning
$timezone = "America/Costa_Rica";


/*******************
 * Database settings
 ******************/
// Which database system: "pgsql"=PostgreSQL, "mysql"=MySQL,
// "mysqli"=MySQL via the mysqli PHP extension
$dbsys = "mysqli";
// Hostname of database server. For pgsql, can use "" instead of localhost
// to use Unix Domain Sockets instead of TCP/IP. For mysql/mysqli "localhost"
// tells the system to use Unix Domain Sockets, and $db_port will be ignored;
// if you want to force TCP connection you can use "127.0.0.1".
$db_host = "mysqlp.siua.ac.cr";
// If you need to use a non standard port for the database connection you
// can uncomment the following line and specify the port number
// $db_port = 1234;
// Database name:
$db_database = "bd_sis_mrbs_control_estudiante_siua";
// Schema name.  This only applies to PostgreSQL and is only necessary if you have more
// than one schema in your database and also you are using the same MRBS table names in
// multiple schemas.
//$db_schema = "public";
// Database login user name:
$db_login = "remoto";
// Database login password:
$db_password = 'Remoto_BAS_0';
// Prefix for table names.  This will allow multiple installations where only
// one database is available
$db_tbl_prefix = "mrbs_";
// Uncomment this to NOT use PHP persistent (pooled) database connections:
// $db_nopersist = 1;


/* Add lines from systemdefaults.inc.php and areadefaults.inc.php below here
   to change the default configuration. Do _NOT_ modify systemdefaults.inc.php
   or areadefaults.inc.php.  */


$vocab_override["es"]["type.A"] = "Ausente";
$vocab_override["es"]["type.B"] = "Cumplio";
$vocab_override["es"]["type.C"] = "Permiso";
$vocab_override["es"]["type.D"] = "Menos Horas";
$vocab_override["es"]["type.E"] = "Otro";


//Fecha de la Reserva
$vocab_override["es"]["entry.Telefono"] = "Teléfono Estudiante";
$is_mandatory_field['entry.Telefono'] = true;



//justificacion
$vocab_override["es"]["entry.Correo"] = "Correo Estudiante";
$is_mandatory_field['entry.Correo'] = true;

//justificacion amplia
/*$is_mandatory_field['entry.description'] = true;


// encargado
$vocab_override["es"]["entry.encargado"] = "Encargado(a) de la gira";
$is_mandatory_field['entry.encargado'] = true;


//tipo de actividad
$vocab_override["es"]["entry.tipo_actividad"] = "Tipo de Actividad";
$is_mandatory_field['entry.tipo_actividad'] = true;
$select_options['entry.tipo_actividad'] = array('Administrativa' => 'Administrativa',
                                          'Académica' => 'Académica');



//lugares
$vocab_override["es"]["entry.lugares"] = "Lugares a visitar y ruta";
$is_mandatory_field['entry.lugares'] = true;


//direccion inicio
$vocab_override["es"]["entry.direccion_inicio"] = "Dirección donde serán recogidos(as)";
//$is_mandatory_field['entry.direccion_inicio'] = true;

//direccion inicio
$vocab_override["es"]["entry.direccion_fin"] = "Dirección donde serán dejados(as)";
//$is_mandatory_field['entry.direccion_fin'] = true;



//conductor
$vocab_override["es"]["entry.conductor"] = "Nombre del conductor";
$is_mandatory_field['entry.conductor'] = true;
$select_options['entry.conductor'] = array('CI-206840768' => 'Ariel Rojas Jimémez');


//Centro costo
$vocab_override["es"]["entry.centro_costo"] = "Centro de costo";
$is_mandatory_field['entry.centro_costo'] = true;
$select_options['entry.centro_costo'] = array('5201-1320-6005-9510' => '5201-1320-6005-9510');




//Kilometraje_inicial
$vocab_override["es"]["entry.Kilometraje_inicial"] = "Kilometraje Inicial";
//$is_mandatory_field['entry.Kilometraje_inicial'] = true;


//Kilometraje_fin
$vocab_override["es"]["entry.Kilometraje_fin"] = "Kilometraje Final";
//$is_mandatory_field['entry.Kilometraje_fin'] = true;

//Kilometraje_fin
$vocab_override["es"]["entry.Kilometraje_diferencia"] = "Kilometraje Diferencia";
//$is_mandatory_field['entry.Kilometraje_diferencia'] = true;


//Horas Servicio inicial mañana
$vocab_override["es"]["entry.Horas_servicio_inicial_manana"] = "Horas de servicio Inicial Mañana (HH:MM)";
$select_options['entry.Horas_servicio_inicial_manana'] = array(
                                                '05:00' => '05:00',
                                                '05:30' => '05:30',
                                                '06:00' => '06:00',
                                                '06:30' => '06:30',
                                                '07:00' => '07:00',
                                                '07:30' => '07:30',
                                                '08:00' => '08:00');


//$is_mandatory_field['entry.Horas_servicio_inicial'] = true;



//Horas Servicio fin mañana
$vocab_override["es"]["entry.Horas_servicio_fin_manana"] = "Horas de servicio Final Mañana (HH:MM)";
$select_options['entry.Horas_servicio_fin_manana'] = array(
                                                '05:00' => '05:00',
                                                '05:30' => '05:30',
                                                '06:00' => '06:00',
                                                '06:30' => '06:30',
                                                '07:00' => '07:00',
                                                '07:30' => '07:30',
                                                '08:00' => '08:00');
//$is_mandatory_field['entry.Horas_servicio_fin'] = true;

//Horas Servicio diferencia mañana
$vocab_override["es"]["entry.Horas_servicio_diferencia_manana"] = "Horas de servicio Diferencia Mañana";
//$is_mandatory_field['entry.Horas_servicio_diferencia'] = true;




//Horas Servicio inicial tarde
$vocab_override["es"]["entry.Horas_servicio_inicial_tarde"] = "Horas de servicio Inicial Tarde (HH:MM)";
$select_options['entry.Horas_servicio_inicial_tarde'] = array(
                                                '17:00' => '17:00',
                                                '17:30' => '17:30',
                                                '18:00' => '18:00',
                                                '18:30' => '18:30',
                                                '19:00' => '19:00',
                                                '19:30' => '19:30',
                                                '20:00' => '20:00',
                                                '20:30' => '20:30',
                                                '21:00' => '21:00',
                                                '21:30' => '21:30',
                                                '22:00' => '22:00',
                                                '22:30' => '22:30',
                                                '23:00' => '23:00');


//$is_mandatory_field['entry.Horas_servicio_inicial'] = true;



//Horas Servicio fin tarde
$vocab_override["es"]["entry.Horas_servicio_fin_tarde"] = "Horas de servicio Final Tarde (HH:MM)";
$select_options['entry.Horas_servicio_fin_tarde'] = array(
                                                '17:00' => '17:00',
                                                '17:30' => '17:30',
                                                '18:00' => '18:00',
                                                '18:30' => '18:30',
                                                '19:00' => '19:00',
                                                '19:30' => '19:30',
                                                '20:00' => '20:00',
                                                '20:30' => '20:30',
                                                '21:00' => '21:00',
                                                '21:30' => '21:30',
                                                '22:00' => '22:00',
                                                '22:30' => '22:30',
                                                '23:00' => '23:00');
//$is_mandatory_field['entry.Horas_servicio_fin'] = true;

//Horas Servicio diferencia tarde
$vocab_override["es"]["entry.Horas_servicio_diferencia_tarde"] = "Horas de servicio Diferencia tarde";
//$is_mandatory_field['entry.Horas_servicio_diferencia'] = true;


$vocab_override["es"]["entry.tipo_costos"] = "Tipos de Costos";
//$select_options['entry.tipo_costos'] = array('AAA297' => '297', '137' => 'Sin Chofer (₡137)','448' => 'De un día para otro (₡448)');
$select_options['entry.tipo_costos'] = array(
                                                '297.00' => '(₡297) Con chofer',
                                                '137.00' => '(₡137) Sin chofer',
                                                '448.00' => '(₡448) De un día para otro');

$vocab_override["es"]["entry.costo_viaje"] = "Costo del Viaje";
//$is_mandatory_field['entry.Horas_servicio_diferencia'] = true;

$vocab_override["es"]["entry.usuarios_viaje"] = "Nombre de usuario(s) o usuaria(s)";
//$is_mandatory_field['entry.Horas_servicio_diferencia'] = true;

*/
