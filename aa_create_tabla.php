<?php

include('conexion.php');

  

// $sql1 =  "CREATE TABLE `risks_assesments_support` (`id` int(5) NOT NULL,`num_personal_expuesto` int(5) DEFAULT NULL,`personal_expuesto` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,`num_circustancias` int(5) DEFAULT NULL,`circustancias` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,`num_motivo_evaluacion` int(5) DEFAULT NULL,`motivo_evaluacion` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,`num_peligros_potenciales` int(5) DEFAULT NULL,`peligros_potenciales` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,`num_medidas_preventivas` int(5) DEFAULT NULL,`medidas_preventivas` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL,`num_circustancias_preventivas` int(5) DEFAULT NULL,`circustancias_preventivas` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci DEFAULT NULL  )";
// $consulta1 = mysqli_query($conexion, $sql1);

// echo '<br> PRUEBA'

$sql2 =  "INSERT INTO `risks_assesments_support` (`id`, `num_personal_expuesto`, `personal_expuesto`, `num_circustancias`, `circustancias`, `num_motivo_evaluacion`, `motivo_evaluacion`, `num_peligros_potenciales`, `peligros_potenciales`, `num_medidas_preventivas`, `medidas_preventivas`, `num_circustancias_preventivas`, `circustancias_preventivas`) VALUES
    (1,7,'Operario',8,'Normal/Rutinario',6,'Evaluación incial',39,'Caidas personas al mismo nivel,resbalon,tropezo.',15,'Medidas de control jerarquizadas ERICDP',6,'E Eliminar (Eliminar procesos o sustancias peligrosas)'),
    (2,7,'Empresa externa',8,'No rutinario',6,'Revisión periódica',39,'Caidas de Objetos (derrumbe, etc...)',15,'Procedimientos, instrucciones, FOS con ptos claves de seguridad',6,'R Reducir o sustituir (Producto o sustancia más segura)'),
    (3,7,'Persona especialmente sensible',8,'Mantenimiento',6,'Modificación del proceso',39,'Manipulación Manual',15,'Formación y competencias del operario/Aptitud médica',6,'I Aislar (Separar, proteger, encerrar, mando a distancia)'),
    (4,7,'Joven / Sin experiencia',8,'Avería',6,'Tras un accidente',39,'Equipos de Elevación Mecánica',15,'Protección/aislamiento (resguardos, cerramiento eléctrico...)',6,'C Controlar (Diseño puesto/proceso, control exposición)'),
    (5,7,'Otro empleado',8,'Parada',6,'Tras un incidente',39,'Almacenamiento, Apilamiento',15,'Separación/aislamiento de máquinas y personas (distancia)',6,'D Disciplina / Rigor (Respeto de procedimientos, normas, señalización)'),
    (6,7,'Publico',8,'Proyecto',6,'Tras una condición / Acto inseguro',39,'Acceso Peligroso:ent-sal segura',15,'Control de la exposición (tiempo, dosis, controles médicos)',6,'P Equipo de protección individual (Cuando las medidas anteriores no son suficientes)'),
    (7,7,'Visita de trabajo',8,'Emergencia',6,NULL,39,'Estrés /Carga Mental',15,'Protección colectiva contra caídas (barreras, vallas)',6,NULL),
    (8,7,NULL,8,'Otros',6,NULL,39,'Irritación de la Piel',15,'Ventilación adecuada',6,NULL),
    (9,7,NULL,8,NULL,6,NULL,39,'Heridas en Ojos - Laser',15,'Señalización de Seguridad',6,NULL),
    (10,7,NULL,8,NULL,6,NULL,39,'Heridas en Ojos - No Laser',15,'Detección/Protección incendios (detectores, extintores, bies)',6,NULL),
    (11,7,NULL,8,NULL,6,NULL,39,'Exposición al Ruido',15,'Medidas de control ergonómicas (diseños, rotación, ...)',6,NULL),
    (12,7,NULL,8,NULL,6,NULL,39,'Vibraciones',15,'Ayudas para la manipulación manual (asistencias, carros)',6,NULL),
    (13,7,NULL,8,NULL,6,NULL,39,'Humos, Vapores, Polvos',15,'Ayudas para la manipulación de máquinas/equipos (grúa, ...)',6,NULL),
    (14,7,NULL,8,NULL,6,NULL,39,'Rayos Laser',15,'Trabajador autorizado / Recurso Preventivo',6,NULL),
    (15,7,NULL,8,NULL,6,NULL,39,'Sustancias Peligrosas',15,'Equipo de protección individual (EPI)',6,NULL),
    (16,7,NULL,8,NULL,6,NULL,39,'Gases Inflamables',15,NULL,6,NULL),
    (17,7,NULL,8,NULL,6,NULL,39,'Materiales Combustibles',15,NULL,6,NULL),
    (18,7,NULL,8,NULL,6,NULL,39,'Energía Residual Eléctrica',15,NULL,6,NULL),
    (19,7,NULL,8,NULL,6,NULL,39,'Otras Energías Residuales',15,NULL,6,NULL),
    (20,7,NULL,8,NULL,6,NULL,39,'Carga/Descarga de Vehículos',15,NULL,6,NULL),
    (21,7,NULL,8,NULL,6,NULL,39,'Atropello/Golpe Vehículos',15,NULL,6,NULL),
    (22,7,NULL,8,NULL,6,NULL,39,'Vehículos Marcha Atrás',15,NULL,6,NULL),
    (23,7,NULL,8,NULL,6,NULL,39,'Cortes por Objetos/Herramientas',15,NULL,6,NULL),
    (24,7,NULL,8,NULL,6,NULL,39,'Luz Ultravioleta (No Laser)',15,NULL,6,NULL),
    (25,7,NULL,8,NULL,6,NULL,39,'Máquinas Rotativas, Giratorias',15,NULL,6,NULL),
    (26,7,NULL,8,NULL,6,NULL,39,'Atrapamiento Parte Móvil Máquinas',15,NULL,6,NULL),
    (27,7,NULL,8,NULL,6,NULL,39,'Espacios Confinados',15,NULL,6,NULL),
    (28,7,NULL,8,NULL,6,NULL,39,'Exp. Altas/Bajas Temperaturas',15,NULL,6,NULL),
    (29,7,NULL,8,NULL,6,NULL,39,'Contactos Térmicos',15,NULL,6,NULL),
    (30,7,NULL,8,NULL,6,NULL,39,'Equipos y Herramientas Eléctricas',15,NULL,6,NULL),
    (31,7,NULL,8,NULL,6,NULL,39,'Instalación Eléctrica/Armarios',15,NULL,6,NULL),
    (32,7,NULL,8,NULL,6,NULL,39,'Aire Comprimido',15,NULL,6,NULL),
    (33,7,NULL,8,NULL,6,NULL,39,'Recipientes/Conductos a Presión',15,NULL,6,NULL),
    (34,7,NULL,8,NULL,6,NULL,39,'Iluminación inadecuada',15,NULL,6,NULL),
    (35,7,NULL,8,NULL,6,NULL,39,'Caidas desde Altura',15,NULL,6,NULL),
    (36,7,NULL,8,NULL,6,NULL,39,'Ergonomía, Esfuerzos, Posturas',15,NULL,6,NULL),
    (37,7,NULL,8,NULL,6,NULL,39,null,15,NULL,6,NULL),
    (38,7,NULL,8,NULL,6,NULL,39,null,15,NULL,6,NULL),
    (39,7,NULL,8,NULL,6,NULL,39,null,15,NULL,6,NULL)";

$consulta2 = mysqli_query($conexion, $sql2);


?>

<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">num_personal_expuesto</th>
            <th scope="col">personal_expuesto</th>
            <th scope="col">num_circustancias</th>
            <th scope="col">circustancias</th>
            <th scope="col">num_motivo_evaluacion</th>
            <th scope="col">motivo_evaluacion</th>
            <th scope="col">num_peligros_potenciales</th>
            <th scope="col">peligros_potenciales</th>
            <th scope="col">num_medidas_preventivas</th>
            <th scope="col">medidas_preventivas</th>
            <th scope="col">num_circustancias_preventivas</th>
            <th scope="col">circustancias_preventivas</th>
        </tr>
    </thead>
    <tbody>

<?php
$sql = "SELECT * FROM `risks_assesments_support`";
$consulta = mysqli_query($conexion, $sql);
while ($row = mysqli_fetch_array($consulta)) {
    echo'
        <tr>
            <td>'.$row['id'].'</td>
            <td>'.$row['num_personal_expuesto'].'</td>
            <td>'.$row['personal_expuesto'].'</td>
            <td>'.$row['num_circustancias'].'</td>
            <td>'.$row['circustancias'].'</td>
            <td>'.$row['num_motivo_evaluacion'].'</td>
            <td>'.$row['motivo_evaluacion'].'</td>
            <td>'.$row['num_peligros_potenciales'].'</td>
            <td>'.$row['peligros_potenciales'].'</td>
            <td>'.$row['num_medidas_preventivas'].'</td>
            <td>'.$row['medidas_preventivas'].'</td>
            <td>'.$row['num_circustancias_preventivas'].'</td>
            <td>'.$row['circustancias_preventivas'].'</td>
        </tr>
    ';
}
?>
    </tbody>
</table>

<?php
// $sql3 =  "ALTER TABLE `risks_assesments_support` ADD PRIMARY KEY (`id`)";
// $consulta3 = mysqli_query($conexion, $sql3);


?>