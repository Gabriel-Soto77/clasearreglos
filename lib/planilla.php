<?php
$empleados = array(
    array("legajo" => 4371, "nombre" => "Martínez Leandro", "dni" => "27643742", "sueldo_base" => 1429.54, "profesion" => "Arquitecto"),
    array("legajo" => 4372, "nombre" => "Gómez Valeria", "dni" => "45891234", "sueldo_base" => 2500.00, "profesion" => "Ingeniero"),
    array("legajo" => 4373, "nombre" => "Pérez Carlos", "dni" => "38921456", "sueldo_base" => 1800.00, "profesion" => "Contador"),
    array("legajo" => 4374, "nombre" => "Rojas Sofia", "dni" => "71234567", "sueldo_base" => 3100.00, "profesion" => "Ingeniero"),
    array("legajo" => 4375, "nombre" => "López Daniel", "dni" => "19823471", "sueldo_base" => 1200.00, "profesion" => "Técnico")
);

function calcularAFP($s) { return $s * PORCENTAJE_AFP; }

function calcularBonificacion($s, $p) {
    $p = strtolower(trim($p));
    return ($p === 'arquitecto' || $p === 'ingeniero') ? $s * PORCENTAJE_BONO : 0;
}

function calcularSueldoNeto($s, $afp, $bono) { return $s - $afp + $bono; }

function filtrarEmpleados($lista, $b) {
    if (empty($b)) return $lista;
    $res = array();
    foreach ($lista as $e) {
        if (strpos(strtolower($e['nombre']), strtolower($b)) !== false || 
            strpos(strtolower($e['profesion']), strtolower($b)) !== false || 
            strpos((string)$e['legajo'], $b) !== false) $res[] = $e;
    }
    return $res;
}
?>