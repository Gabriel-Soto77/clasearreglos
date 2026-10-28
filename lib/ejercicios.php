<?php
function ejecutarTodosLosEjercicios() {
    $estacion[0]="Primavera";
    $estacion[1]="Verano";
    $estacion[2]="Otoño";
    $estacion[3]="Invierno";

    echo $estacion[0]."<br>";
    echo $estacion[3];

    echo "<hr>";

    $ciudad[] = "Sevilla";
    $ciudad[] = "Madrid";
    $ciudad[] = "Barcelona";
    $ciudad[] = "Valencia";

    echo $ciudad[3];
    echo "<hr>";

    $color=array("azul","verde","Negro","marron");
    echo $color[1];
    echo "<hr>";
    echo "El # de ciudades principales de España son: ".count($ciudad);

    echo "<hr>";

    for($i=0;$i<count($ciudad);$i++) {
        echo $ciudad[$i].'<br />';
    }

    echo "<hr>";

    $frutas = ['Mango', 'Piña', 'Uva'];
    foreach ($frutas as $valor) {
        echo $valor;
    }

    echo "<hr>";

    // Arrays asociativos
    $indice = 'coche';
    $colores_vehiculos = array(
        $indice => 'Rojo',
        'moto' => 'verde',
        'avion' => 'amarillo'
    );
    echo $colores_vehiculos[$indice];

    echo "<hr>";

    $colores_vehiculos['coche'] = 'Rojo';
    $colores_vehiculos['moto'] = 'verde';
    $colores_vehiculos['avion'] = 'amarillo';
    echo $colores_vehiculos['moto'];

    echo "<hr>";

    // CASO 1: Días de la semana recorridos con for y count
    $dias[0] = "Lunes";
    $dias[1] = "Martes";
    $dias[2] = "Miércoles";
    $dias[3] = "Jueves";
    $dias[4] = "Viernes";
    $dias[5] = "Sábado";
    $dias[6] = "Domingo";

    for ($i = 0; $i < count($dias); $i++) {
        echo $dias[$i] . "<br>";
    }

    echo "<hr>";

    // CASO 2: Países de Sudamérica sin índice y recorridos con foreach
    $paises[] = "Perú";
    $paises[] = "Argentina";
    $paises[] = "Brasil";
    $paises[] = "Colombia";
    $paises[] = "Chile";
    $paises[] = "Ecuador";
    $paises[] = "Bolivia";
    $paises[] = "Paraguay";
    $paises[] = "Uruguay";
    $paises[] = "Venezuela";

    foreach ($paises as $pais) {
        echo $pais . "<br>";
    }

    echo "<hr>";

    // CASO 3: Meses del año usando array() y recorridos con foreach
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

    foreach ($meses as $mes) {
        echo $mes . "<br>";
    }

    echo "<hr>";

    // CASO 4: Cargar artículos de librería con el constructor array e imprimir la cantidad
    $articulos = array("Lápiz", "Goma", "Hoja", "Tinta");
    echo "La cantidad de artículos de librería es: " . count($articulos);

    echo "<hr>";

    // CASO 5: Almacenar los datos personales de un empleado en un array asociativo y mostrarlos
    $empleado = array(
        "Legajo" => 4371,
        "Nombre" => "Martínez Leandro",
        "D.N.I" => "27643742",
        "Sueldo" => 1429.54,
        "Profesión" => "Arquitecto"
    );

    echo "--Datos del empleado--<br>";
    foreach ($empleado as $campo => $valor) {
        echo $campo . " = " . $valor . "<br>";
    }
}
?>
