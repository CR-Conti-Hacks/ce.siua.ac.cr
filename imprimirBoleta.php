<?php
    header('Content-Type: text/html; charset=UTF-8');
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Fecha en el pasado
    require "defaultincludes.inc";
    require_once "mrbs_sql.inc";
    $id_reserva = $_GET['id'];
    $sql = "SELECT
                start_time,
                end_time,
                fecha_reserva,
                name,
                encargado,
                room_id,
                justificacion,
                conductor,
                type,
                tipo_actividad,
                centro_costo,
                lugares,
                direccion_inicio,
                direccion_fin,
                usuarios_viaje,
                kilometraje_inicial,
                kilometraje_fin,
                kilometraje_diferencia,
                Horas_servicio_inicial_manana,
                Horas_servicio_fin_manana,
                Horas_servicio_diferencia_manana,
                Horas_servicio_inicial_tarde,
                Horas_servicio_fin_tarde,
                Horas_servicio_diferencia_tarde,
                tipo_costos,
                costo_viaje
                FROM mrbs_entry WHERE id=".$id_reserva;
    $res = sql_query($sql);
    $row = sql_row_keyed($res, 0);
    
    //Obtener los datos de la reserva
    $start_time = $row['start_time'];
    $end_time = $row['end_time'];
    $fecha_reserva = $row['fecha_reserva'];
    $name = $row['name'];
    $encargado = $row['encargado'];
    $id_vehiculo = $row['room_id'];
    $justificacion = $row['justificacion'];
    $conductor = $row['conductor'];
    $type = $row['type'];
    $tipo_actividad = $row['tipo_actividad']; 
    $centro_costo = $row['centro_costo']; 
    $lugares = $row['lugares'];
    $direccion_inicio = $row['direccion_inicio'];
    $direccion_fin = $row['direccion_fin'];
    
    
    $kilometraje_inicial = $row['kilometraje_inicial'];
    $kilometraje_fin = $row['kilometraje_fin'];
    $kilometraje_diferencia = $row['kilometraje_diferencia'];
    $Horas_servicio_inicial_manana = $row['Horas_servicio_inicial_manana'];
    $Horas_servicio_fin_manana = $row['Horas_servicio_fin_manana'];
    $Horas_servicio_diferencia_manana= $row['Horas_servicio_diferencia_manana'];
    $Horas_servicio_inicial_tarde = $row['Horas_servicio_inicial_tarde'];
    $Horas_servicio_fin_tarde = $row['Horas_servicio_fin_tarde'];
    $Horas_servicio_diferencia_tarde = $row['Horas_servicio_diferencia_tarde'];
    $tipo_costos = $row['tipo_costos'];
    $costo_viaje = $row['costo_viaje'];
    
            
                
    //usuarios de viaje
    $usuarios_viaje= $row['usuarios_viaje'];
     
    $usuarios = '';
    $array_usuarios = preg_split("/;/", $usuarios_viaje);
              
    //print_r($array_usuarios);
    for($i = 0; $i < count($array_usuarios); $i++){
        $array_usuarios2 = preg_split("/,/", $array_usuarios[$i]);
        if(($array_usuarios2[0]!='')&&($array_usuarios2[1]!='')){
           $usuarios[$i] .= $array_usuarios[$i];
        }
    }
    //print_r($usuarios);        
              
              
    //determinar la dependencia
    if($type=="A"){
        $dependencia = "Coordinación UCR";
    }elseif($type=="B"){
        $dependencia = "Coordinación TEC";
    }elseif($type=="C"){
        $dependencia = "Coordinación UNA";
    }elseif($type=="D"){
        $dependencia = "Coordinación UNED";
    }elseif($type=="E"){
        $dependencia = "Coordinación CONARE";
    }elseif($type=="F"){
        $dependencia = "Vida Estudiantil";
    }
    
    
     //determinar conductor
    if($conductor=="CI-206840768"){
        $nombre_conductor = "Ariel Rojas Jimémez";
    }
    
  
    
    
    $sql = "SELECT description,sort_key FROM mrbs_room WHERE id = ".$id_vehiculo;
    $res = sql_query($sql);
    $row = sql_row_keyed($res, 0);
     
    //Obtener los datos del vehiculo
    $placa = $row['description'];
    $tipo_vehiculo = $row['sort_key'];
?>
<!DOCTYPE html>
    <link href='css/estilo_boleta.css' rel='stylesheet' type='text/css'>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Reporte GIRA</title>
    </head>
    <body>
        <table class="principal">
            <tr>
                <td class="logo tam70" rowspan="2">
                    <img src="images/TEC.png"  alt="Tecnológico de Costa Rica" width="70px" >
                </td>
                <td  class="centrado fuente11 tam240 padding3" rowspan="2">
                    <strong>
                    DEPARTAMENTO DE SERVICIOS GENERALES
                    <br />
                    <span class="subrayado">UNIDAD DE TRANSPORTE -  SEDE</span>
                    <br />
                    <span class="subrayado">INTERUNIVERSITARIA DE ALAJUELA</span>
                    <br />
                    <span class="subrayado">SOLICITUD DE SERVICIO DE TRANSPORTE</span>
                    <br />
                    <span class="subrayado">(SST)</span>
                    </strong>
                </td>
                <td class="tam143 fuente12 padding3">
                    <strong>
                    ( X ) Original
                    <br />
                    ( X ) Copia N&deg;1
                    <br />
                    ( X ) Copia N&deg;2
                    <br />
                    </strong>
                </td>
                <td rowspan="2" class="centrado tam143 fuente12 padding3">
                    <strong>
                    Número de Solicitud
                    <br />
                    <?= $name ?>
                    </strong>                   
                </td>
            </tr>
            <tr>
                <td class="centrado fuente12">
                    <strong>Fecha</strong>
                    <br />
                    <?= $fecha_reserva ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="centrado fuente13" style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                    <strong>INFORMACIÓN GENERAL</strong>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="2">
                    <strong>Dependencia solicitante</strong>
                    <br />
                    <?= $dependencia ?>
                </td>
                <td>
                    <strong>Placa del vehículo</strong>
                    <br />
                    <?= $placa ?>
                </td>
                <td>
                    <strong>Tipo de vehículo</strong>
                    <br />
                    <?= $tipo_vehiculo ?>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="2">
                    <strong>Justificación del viaje</strong>
                    <br />
                    <?= $justificacion ?>
                </td>
                <td>
                    <strong>Con chofer</strong>
                    <br />
                    (X)SI ( )NO
                </td>
                <td>
                    <strong>Número de licencia</strong>
                    <br />
                    <?= $conductor ?>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="2">
                    <strong>Encargado(a) de la gira</strong>
                    <br />
                    <?= $encargado ?>
                </td>
                <td colspan="2">
                    <strong>Nombre del conductor</strong>
                    <br />
                    <?= $nombre_conductor ?>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="2">
                    <strong>Tipo de Actividad</strong>
                    <br />
                    <?= $tipo_actividad ?>
                </td>
                <td colspan="2">
                    <strong>Centro de costo</strong>
                    <br />
                    <?= $centro_costo ?>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="2" valign="top">
                    <strong>Lugares a visitar y ruta</strong>
                    <br />
                    <?= $lugares ?>
                </td>
                <td colspan="2" class=".secundaria">
                    <table class="secundaria">
                        <tr  class="centrado">
                            <td colspan="2">
                                <strong>Salida de garaje</strong>
                            </td>
                            <td colspan="2">
                                <strong>Entrada a garaje</strong>
                            </td>
                        </tr>
                        <tr  class="centrado">
                            <td><strong>Fecha</strong></td>
                            <td><strong>Hora</strong></td>
                            <td><strong>Fecha</strong></td>
                            <td><strong>Hora</strong></td>
                        </tr>
                        <tr class="centrado">
                            <td><?= utf8_strftime('%d/%m/%Y', $start_time) ?></td>
                            <td><?= utf8_strftime('%H:%M', $start_time) ?></td>
                            <td><?= utf8_strftime('%d/%m/%Y', $end_time) ?></td>
                            <td><?= utf8_strftime('%H:%M', $end_time) ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="centrado fuente13" style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                    <strong>INFORMACIÓN DE LOS USUARIOS(AS) DEL SERVICIO DE TRANSPORTE</strong>
                </td>
            </tr>
            <tr class="fuente11">
                <td colspan="4">
                    <table class="secundaria">
                        <tr >
                            <td rowspan="2" valign="top"><strong>Nombre de usuario(s) o usuaria(s)</strong></td>
                            <td rowspan="2" valign="top" class="centrado"><strong>Dirección donde serán recogidos(as)</strong></td>
                            <td  class="centrado"><strong>Hora</strong></td>
                        </tr>
                        <tr>
                            <td  class="centrado"><strong>Salida</strong></td>
                        </tr>
                        <tr>
                            <td><?= $usuarios[0]?></td>
                            <td class="centrado"><?= $direccion_inicio ?></td>
                            <td class="centrado"><?= utf8_strftime('%H:%M', $start_time) ?></td>
                        </tr>
                        <tr>
                            <td><?= $usuarios[1]?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?= $usuarios[2]?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><?= $usuarios[3]?></td>
                            <td valign="top" class="centrado"><strong>Dirección donde serán dejados(as)</strong></td>
                            <td  class="centrado"><strong>Hora</strong></td>
                        </tr>
                        <tr>
                            <td><?= $usuarios[4]?></td>
                            <td class="centrado"><?= $direccion_fin ?></td>
                            <td class="centrado"><?= utf8_strftime('%H:%M', $end_time) ?></td>
                        </tr>
                        <?php for($i=5; $i < count($usuarios); $i++){?>
                        <tr>
                            <td><?= $usuarios[$i]?></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="centrado fuente13" style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                    <strong>REPORTE OPERATIVO CONDUCTOR-USUARIO(A)</strong>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="secundaria">
                        <tr class="centrado fuente11">
                            <td><strong>Usuario(a)</strong></td>
                            <td><strong>Firma</strong></td>
                            <td><strong>Hora</strong></td>
                            <td><strong>Conductor (firma)</strong></td>
                            <td><strong>Hora</strong></td>
                            <td colspan="2"><strong>Oficial de Seguridad</strong></td>
                        </tr>
                        <tr class="centrado">
                            <td rowspan="2" class="alto50"></td>
                            <td rowspan="2"></td>
                            <td rowspan="2"></td>
                            <td rowspan="2"></td>
                            <td rowspan="2"></td>
                            <td class="fuente11"><strong>Clave</strong></td>
                            <td class="fuente11"><strong>hora</strong></td>
                        </tr>
                        <tr>
                            <td><br /></td>
                            <td><br /></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="secundaria">
                        <tr class="centrado fuente11">
                            <td colspan="3"><strong>Kilometraje</strong></td>
                            <td colspan="3"><strong>Horas de servicio</strong></td>
                            <td colspan="4" ><strong>OBSERVACIONES</strong></td>
                        </tr>
                        <tr class="centrado fuente11">
                            <td class="tam60"><strong>Inicial</strong></td>
                            <td class="tam60"><strong>Final</strong></td>
                            <td class="tam60"><strong>Difer.</strong></td>
                            <td class="tam60"><strong>Inicial</strong></td>
                            <td class="tam60"><strong>Final</strong></td>
                            <td class="tam60"><strong>H. Extra</strong></td>
                            <td rowspan="5" colspan="4"></td>
                        </tr>
                        <tr class="centrado fuente11">
                            <td><?php if($kilometraje_inicial!=0){ echo $kilometraje_inicial; }else{ echo '<br/>';}?></td>
                            <td><?php if($kilometraje_fin!=0){ echo $kilometraje_fin; }else{ echo '<br/>';}?></td>
                            <td><?php if($kilometraje_diferencia!=0){ echo $kilometraje_diferencia; }else{ echo '<br/>';}?></td>
                            <td><?php if($Horas_servicio_diferencia_manana!='00.00'){ echo $Horas_servicio_inicial_manana; }else{ echo '<br/>';}?></td>
                            <td><?php if($Horas_servicio_diferencia_manana!='00.00'){ echo $Horas_servicio_fin_manana; }else{ echo '<br/>';}?></td>
                            <td><?php if($Horas_servicio_diferencia_manana!='00.00'){ echo $Horas_servicio_diferencia_manana; }else{ echo '<br/>';}?></td>
                        </tr>
                        <tr class="centrado fuente11">
                            <td><br /></td>
                            <td><br /></td>
                            <td><br /></td>
                            <td><?php if($Horas_servicio_diferencia_tarde!='00.00'){ echo $Horas_servicio_inicial_tarde; }else{ echo '<br/>';}?></td>
                            <td><?php if($Horas_servicio_diferencia_tarde!='00.00'){ echo $Horas_servicio_fin_tarde; }else{ echo '<br/>';}?></td>
                            <td><?php if($Horas_servicio_diferencia_tarde!='00.00'){ echo $Horas_servicio_diferencia_tarde; }else{ echo '<br/>';}?></td>
                            
                        </tr>
                        <tr class="fuente11">
                            <td colspan="2" class="fuente11"><strong>Total de kilómetros</strong></td>
                            <td class="centrado"><?php if($kilometraje_diferencia!=0){ echo $kilometraje_diferencia; }else{ echo '<br/>';}?></td>
                            <td colspan="2" rowspan="2" class="fuente11"><strong>Total de horas extras</strong></td>
                            <td class="centrado"><?php if(($Horas_servicio_diferencia_manana!='00.00')||($Horas_servicio_diferencia_tarde!='00.00')){
                                echo $total_horas = $Horas_servicio_diferencia_tarde+$Horas_servicio_diferencia_manana;
                                
                                }else{ echo '<br/>';}?></td>
                        </tr>
                        <tr class="fuente11">
                            <td colspan="2" ><strong>Costo</strong></td>
                            <td class="centrado"><?php if($kilometraje_diferencia!=0){ echo '₡'.$costo_viaje; }else{ echo '<br/>';}?></td>
                            <td></td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
            <tr>
                <td colspan="4" class="centrado fuente13" style="border-top: 2px solid #000; border-bottom: 2px solid #000;">
                    <strong>FIRMAS DE AUTORIZACIÓN</strong>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="secundaria">
                        <tr class="centrado fuente11">
                            <td><strong>Autorizado Jefe Dependencia</strong></td>
                            <td><strong>V°B° Vicerrectoría</strong></td>
                            <td><strong>V°B° Rectoría</strong></td>
                            <td><strong>Encargado(a) de gira</strong></td>
                            <td><strong>Revisado Unidad de Transporte</strong></td>
                        </tr>
                        <tr class="alto50">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                    
                </td>
            </tr>
        </table>
        <span class="copia" >
            <strong>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Original: Conductor &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Copia N°1: Unidad de Transporte &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                Copia N°2: Dependencia solicitante
            </strong>
        </span>
        <br />
        <div class="disclamer" >
                El conductor de este vehículo, siempre y cuando no sea conductor oficial del ITCR, acepta las responsabilidades civiles, penales y
                administrativas derivadas de accidentes causados por su culpa o dolo en la conducción de vehículos propiedad del ITCR
        </div>
    </body>
</html>

