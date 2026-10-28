<?php
$productos = array(
    array("id" => 1, "nombre" => "Lápiz 2B", "categoria" => "Escritorio", "precio" => 2.50, "stock" => 50),
    array("id" => 2, "nombre" => "Goma de borrar", "categoria" => "Escritorio", "precio" => 1.50, "stock" => 30),
    array("id" => 3, "nombre" => "Cuaderno A4", "categoria" => "Papelería", "precio" => 8.00, "stock" => 20),
    array("id" => 4, "nombre" => "Tinta para sello", "categoria" => "Oficina", "precio" => 12.00, "stock" => 15),
    array("id" => 5, "nombre" => "Hojas Bond A4", "categoria" => "Papelería", "precio" => 18.50, "stock" => 40)
);

function obtenerTotalArticulos($inv) { return count($inv); }

function calcularValorTotalInventario($inv) {
    $total = 0;
    foreach ($inv as $p) $total += $p['precio'] * $p['stock'];
    return $total;
}

function filtrarProductos($inv, $b, $c) {
    if (empty($b) && empty($c)) return $inv;
    $res = array();
    foreach ($inv as $p) {
        $mN = empty($b) || strpos(strtolower($p['nombre']), strtolower($b)) !== false;
        $mC = empty($c) || $p['categoria'] === $c;
        if ($mN && $mC) $res[] = $p;
    }
    return $res;
}
?>