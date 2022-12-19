<?php

$fecha_busqueda_diario = date("Y-m-d", strtotime('- 1 day', strtotime($fecha)));

$fecha_inicio_dia = date("Y-m-d", strtotime($fecha_busqueda_diario));
$numero_dia=date("d-m-Y",strtotime($fecha_inicio_dia));


$fecha_inicio_dia_1 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia)));
$numero_dia_1=date("d-m-Y",strtotime($fecha_inicio_dia_1));

$fecha_inicio_dia_2 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia_1)));
$numero_dia_2=date("d-m-Y",strtotime($fecha_inicio_dia_2));

$fecha_inicio_dia_3 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia_2)));
$numero_dia_3=date("d-m-Y",strtotime($fecha_inicio_dia_3));

$fecha_inicio_dia_4 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia_3)));
$numero_dia_4=date("d-m-Y",strtotime($fecha_inicio_dia_4));

$fecha_inicio_dia_5 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia_4)));
$numero_dia_5=date("d-m-Y",strtotime($fecha_inicio_dia_5));

$fecha_inicio_dia_6 = date("Y-m-d", strtotime('- 1 day', strtotime($fecha_inicio_dia_5)));
$numero_dia_6=date("d-m-Y",strtotime($fecha_inicio_dia_6));


$fechas_siete_ultimos_dias=array(
    $fecha_inicio_dia_6,
    $fecha_inicio_dia_5,
    $fecha_inicio_dia_4,
    $fecha_inicio_dia_3,
    $fecha_inicio_dia_2,
    $fecha_inicio_dia_1,
    $fecha_inicio_dia
);


foreach ($fechas_siete_ultimos_dias as $dia) {
    $consulta = "SELECT count(`num_conformidad`) as num_conformidades_dia FROM `comunicacion_jus_registro_datos` WHERE `fecha`='$dia'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));    
    while ($row = mysqli_fetch_array($resultado)) {
        $array_no_conformidades_dia[]=$row['num_conformidades_dia'];
    }

    $consulta = "SELECT COUNT(`a_revisar`) as `a_revisar_1`, COUNT(`estado_no_conformidad`) as estado_no_conformidad_1 FROM `comunicacion_jus_registro_datos` WHERE `fecha`='$dia' AND `turno`='Mañana'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));    
    while ($row = mysqli_fetch_array($resultado)) {
        $array_a_revisar_mañana[]=$row['a_revisar_1'];
        $estado_no_conformidad_mañana[]=$row['estado_no_conformidad_1'];

    }

    $consulta = "SELECT COUNT(`a_revisar`) as `a_revisar_2`, COUNT(`estado_no_conformidad`) as estado_no_conformidad_2 FROM `comunicacion_jus_registro_datos` WHERE `fecha`='$dia' AND `turno`='Tarde'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));    
    while ($row = mysqli_fetch_array($resultado)) {
        $array_a_revisar_tarde[]=$row['a_revisar_2'];
        $estado_no_conformidad_tarde[]=$row['estado_no_conformidad_2'];

    }

    $consulta = "SELECT COUNT(`a_revisar`) as `a_revisar_3`, COUNT(`estado_no_conformidad`) as estado_no_conformidad_3 FROM `comunicacion_jus_registro_datos` WHERE `fecha`='$dia' AND `turno`='Noche'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));    
    while ($row = mysqli_fetch_array($resultado)) {
        $array_a_revisar_noche[]=$row['a_revisar_3'];
        $estado_no_conformidad_noche[]=$row['estado_no_conformidad_3'];
    }

    
    $consulta = "SELECT COUNT(`a_revisar`) as `a_revisar_total`, COUNT(`estado_no_conformidad`) as estado_no_conformidad_total FROM `comunicacion_jus_registro_datos` WHERE `fecha`='$dia'";
    $resultado = mysqli_query($conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos:".mysqli_error($conexion));    
    while ($row = mysqli_fetch_array($resultado)) {
        $a_revisar_total[]=$row['a_revisar_total'];
        $estado_no_conformidad_total[]=$row['estado_no_conformidad_total'];

    }

}

$fechas_siete_ultimos_dias_json=json_encode($fechas_siete_ultimos_dias);

$array_no_conformidades_dia_json=json_encode($array_no_conformidades_dia);

$array_a_revisar_mañana_json=json_encode($array_a_revisar_mañana);
$estado_no_conformidad_mañana_json=json_encode($estado_no_conformidad_mañana);

$array_a_revisar_tarde_json=json_encode($array_a_revisar_tarde);
$estado_no_conformidad_tarde_json=json_encode($estado_no_conformidad_tarde);

$array_a_revisar_noche_json=json_encode($array_a_revisar_noche);
$estado_no_conformidad_noche_json=json_encode($estado_no_conformidad_noche);

$array_a_revisar_total_json=json_encode($a_revisar_total);
$estado_no_conformidad_total_json=json_encode($estado_no_conformidad_total);

?>


<script type="text/javascript" >
    function crear_array(json){
        var parsed = JSON.parse(json);
        var arr =[];
        for(var x in parsed){
            arr.push(parsed[x]);
        }
        return arr;
    }
    fechas_siete_ultimos_dias=crear_array('<?php echo $fechas_siete_ultimos_dias_json?>')
    array_no_conformidades_dia=crear_array('<?php echo $array_no_conformidades_dia_json?>')

    array_a_revisar_mañana=crear_array('<?php echo $array_a_revisar_mañana_json?>')
    estado_no_conformidad_mañana=crear_array('<?php echo $estado_no_conformidad_mañana_json?>')

    array_a_revisar_tarde=crear_array('<?php echo $array_a_revisar_tarde_json?>')
    estado_no_conformidad_tarde=crear_array('<?php echo $estado_no_conformidad_tarde_json?>')

    array_a_revisar_noche=crear_array('<?php echo $array_a_revisar_noche_json?>')
    estado_no_conformidad_noche=crear_array('<?php echo $estado_no_conformidad_noche_json?>')

    
    a_revisar_total=crear_array('<?php echo $array_a_revisar_total_json?>')
    estado_no_conformidad_total=crear_array('<?php echo $estado_no_conformidad_total_json?>')

</script>

<script>

    var trace_no_conformidades_diarias = {
        x: fechas_siete_ultimos_dias,
        y: array_no_conformidades_dia,
        name:'NO CONFORMIDADES DIARIAS',
        text:'No conformidades',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',

    };

    var trace_a_revisar_mañana = {
        x: fechas_siete_ultimos_dias,
        y: array_a_revisar_mañana,
        name:'A revisar mañana',
        text:'A revisar mañana',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',

    };

    var trace_a_revisar_tarde = {
        x: fechas_siete_ultimos_dias,
        y: array_a_revisar_tarde,
        name:'A REVISAR TARDE',
        text:'A revisar tarde',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',

    };
    var trace_a_revisar_noche = {
        x: fechas_siete_ultimos_dias,
        y: estado_no_conformidad_mañana,
        name:'A REVISAR NOCHE',
        text:'A revisar noche',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };

    var trace_a_revisar_total = {
        x: fechas_siete_ultimos_dias,
        y: a_revisar_total,
        name:'A REVISAR',
        text:'A revisar',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };

    var trace_estado_no_conformidad_mañana = {
        x: fechas_siete_ultimos_dias,
        y: array_a_revisar_noche,
        name:'REVISADAS MAÑANA',
        text:'Revisadas mañana',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };
    var trace_estado_no_conformidad_tarde = {
        x: fechas_siete_ultimos_dias,
        y: estado_no_conformidad_tarde,
        name:'REVISADAS TARDE',
        text:'Revisadas tarde',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };
    var trace_estado_no_conformidad_noche = {
        x: fechas_siete_ultimos_dias,
        y: estado_no_conformidad_noche,
        name:'REVISADAS NOCHE',
        text:'Revisadas noche',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };
    
    var trace_estado_no_conformidad_total = {
        x: fechas_siete_ultimos_dias,
        y: estado_no_conformidad_total,
        name:'REVISADAS',
        text:'Revisadas',
            textposition: 'top',
            textfont: {
                family: 'Arial',
                size: 10,
                color: '#000000'
            },
        type: 'bar',
    };

    //var data_comunicacion_jus = [trace_no_conformidades_diarias,trace_a_revisar_mañana, trace_a_revisar_tarde, trace_a_revisar_noche, trace_estado_no_conformidad_mañana,trace_estado_no_conformidad_tarde, trace_estado_no_conformidad_noche];
    var data_comunicacion_jus = [trace_no_conformidades_diarias, trace_a_revisar_total, trace_estado_no_conformidad_total];

    
    var layout_comunicacion_jus = { 
        showlegend: true,
        legend: {
            "orientation": "h"
        },
        autosize: false,
        width: '1200',
        hovermode:'closest',

        title: {
            text: '',
            font: {
                family: 'Arial, monospace',
                size: 24
            },
            xref: 'paper',
        },
        xaxis: {
            title: {
                text: '',
                font: {
                    family: 'Arial, monospace',
                    size: 18,
                    color: '#7f7f7f',
                }
            },
        },
        yaxis: {
            dtick: 5,
            title: {
                text: 'NO CONFORMIDADES',
                font: {
                    family: 'Arial, monospace',
                    size: 18,
                    color: '#7f7f7f',
                }
            }
        }
    };

    var config = {
        responsive: true,
        displayModeBar: false
    }

    Plotly.newPlot('div_grafica', data_comunicacion_jus, layout_comunicacion_jus, config);
</script>