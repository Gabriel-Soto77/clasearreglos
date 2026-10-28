<?php
require_once 'config/app.php';
require_once 'lib/ejercicios.php';
require_once 'lib/inventario.php';
require_once 'lib/planilla.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
if (!isset($CASOS[$id])) $id = 1;
$caso = $CASOS[$id];

$anterior = ($id > 1) ? $id - 1 : 3;
$siguiente = ($id < 3) ? $id + 1 : 1;

require_once 'includes/header.php';
?>

<div class="card card-sand shadow-sm mb-4">
    <div class="card-header card-header-sand d-flex justify-content-between align-items-center">
        <h4 class="m-0 fw-bold"><?= $caso['titulo'] ?> (Ejecución Interactiva)</h4>
        <a href="ver_caso.php?id=<?= $id ?>" class="btn btn-outline-dark btn-sm">← Volver al Visor</a>
    </div>
    <div class="card-body bg-white p-4">

        <?php if ($id === 1): ?>
            <h5 class="fw-bold mb-3">Resultados completados de los Ejercicios de Clase:</h5>
            <div class="p-3 bg-light border rounded">
                <?php ejecutarTodosLosEjercicios(); ?>
            </div>

        <?php elseif ($id === 2): ?>
            <?php
            $b = $_GET['b'] ?? '';
            $c = $_GET['c'] ?? '';
            $pFiltrados = filtrarProductos($productos, $b, $c);
            ?>
            <div class="row mb-3 text-center">
                <div class="col-6"><div class="alert alert-info m-0">Total Tipos: <?= obtenerTotalArticulos($productos) ?></div></div>
                <div class="col-6"><div class="alert alert-success m-0">Valor Total: <?= MONEDA . ' ' . number_format(calcularValorTotalInventario($productos), 2) ?></div></div>
            </div>
            <form method="GET" class="row g-2 mb-3">
                <input type="hidden" name="id" value="2">
                <div class="col-5"><input type="text" name="b" class="form-control" placeholder="Buscar producto..." value="<?= htmlspecialchars($b) ?>"></div>
                <div class="col-5">
                    <select name="c" class="form-select">
                        <option value="">Todas las categorías</option>
                        <option value="Escritorio" <?= $c==='Escritorio'?'selected':'' ?>>Escritorio</option>
                        <option value="Papelería" <?= $c==='Papelería'?'selected':'' ?>>Papelería</option>
                        <option value="Oficina" <?= $c==='Oficina'?'selected':'' ?>>Oficina</option>
                    </select>
                </div>
                <div class="col-2"><button class="btn btn-sand fw-bold w-100">Filtrar</button></div>
            </form>
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-dark">
                    <tr><th>ID</th><th>Nombre</th><th>Categoría</th><th>Precio</th><th>Stock</th><th>Subtotal</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($pFiltrados as $p): ?>
                    <tr>
                        <td><strong><?= $p['id'] ?></strong></td>
                        <td><?= $p['nombre'] ?></td>
                        <td><span class="badge bg-secondary"><?= $p['categoria'] ?></span></td>
                        <td><?= MONEDA . ' ' . number_format($p['precio'], 2) ?></td>
                        <td><?= $p['stock'] ?></td>
                        <td class="text-success fw-bold"><?= MONEDA . ' ' . number_format($p['precio'] * $p['stock'], 2) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        <?php elseif ($id === 3): ?>
            <?php
            $b2 = $_GET['b2'] ?? '';
            $eFiltrados = filtrarEmpleados($empleados, $b2);
            ?>
            <form method="GET" class="row g-2 mb-3">
                <input type="hidden" name="id" value="3">
                <div class="col-10"><input type="text" name="b2" class="form-control" placeholder="Buscar por legajo, nombre o profesión..." value="<?= htmlspecialchars($b2) ?>"></div>
                <div class="col-2"><button class="btn btn-sand fw-bold w-100">Buscar</button></div>
            </form>
            <table class="table table-bordered table-hover bg-white align-middle">
                <thead class="table-dark">
                    <tr><th>Legajo</th><th>Nombre</th><th>DNI</th><th>Profesión</th><th>Sueldo Base</th><th>AFP</th><th>Bono</th><th>Sueldo Neto</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($eFiltrados as $e): 
                        $afp = calcularAFP($e['sueldo_base']);
                        $bono = calcularBonificacion($e['sueldo_base'], $e['profesion']);
                        $neto = calcularSueldoNeto($e['sueldo_base'], $afp, $bono);
                    ?>
                    <tr>
                        <td><strong><?= $e['legajo'] ?></strong></td>
                        <td><?= $e['nombre'] ?></td>
                        <td><?= $e['dni'] ?></td>
                        <td><span class="badge bg-secondary"><?= $e['profesion'] ?></span></td>
                        <td><?= MONEDA . ' ' . number_format($e['sueldo_base'], 2) ?></td>
                        <td class="text-danger">- <?= MONEDA . ' ' . number_format($afp, 2) ?></td>
                        <td class="text-success">+ <?= MONEDA . ' ' . number_format($bono, 2) ?></td>
                        <th class="table-warning text-dark"><?= MONEDA . ' ' . number_format($neto, 2) ?></th>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

    </div>
</div>

<div class="d-flex justify-content-between mt-3">
    <a href="app_caso.php?id=<?= $anterior ?>" class="btn btn-outline-secondary">« VOLVER A PÁG. ANTERIOR (MÓDULO <?= $anterior ?>)</a>
    <a href="index.php" class="btn btn-secondary">IR A PÁGINA PRINCIPAL (MENÚ)</a>
    <a href="app_caso.php?id=<?= $siguiente ?>" class="btn btn-outline-secondary">IR A PÁG. SIGUIENTE (MÓDULO <?= $siguiente ?>) »</a>
</div>

<?php require_once 'includes/footer.php'; ?>