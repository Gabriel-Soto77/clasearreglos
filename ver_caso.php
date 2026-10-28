<?php
require_once 'config/app.php';
require_once 'lib/ejercicios.php';
require_once 'lib/inventario.php';
require_once 'lib/planilla.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
if (!isset($CASOS[$id])) $id = 1;
$caso = $CASOS[$id];

require_once 'includes/header.php';

// Selección del código fuente
$codigo_mostrar = "";
if ($id === 1) {
    $codigo_mostrar = file_get_contents('lib/ejercicios.php');
} elseif ($id === 2) {
    $codigo_mostrar = file_get_contents('lib/inventario.php');
} else {
    $codigo_mostrar = file_get_contents('lib/planilla.php');
}
?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold" style="color: #5c4d32;"><?= $caso['titulo'] ?></h3>
    <a href="index.php" class="btn btn-secondary btn-sm">← VOLVER PÁG. PRINCIPAL</a>
</div>

<div class="card card-sand mb-4">
    <div class="card-header card-header-sand fw-bold">ENUNCIADO:</div>
    <div class="card-body bg-white"><?= $caso['descripcion'] ?></div>
</div>

<div class="row mb-4">
    <!-- Lado Izquierdo: Código Fuente -->
    <div class="col-md-6">
        <h5 class="fw-bold" style="color: #5c4d32;">VISUALIZACIÓN DE CÓDIGOS (PHP)</h5>
        <div class="vscode-editor">
            <pre class="m-0"><code><?= htmlspecialchars($codigo_mostrar) ?></code></pre>
        </div>
    </div>

    <!-- Lado Derecho: Área de Resultados -->
    <div class="col-md-6">
        <h5 class="fw-bold" style="color: #5c4d32;">ÁREA DE RESULTADOS (Ejecución)</h5>
        <div class="result-box-scroll shadow-sm">
            <?php if ($id === 1): ?>
                <?php ejecutarTodosLosEjercicios(); ?>
            <?php elseif ($id === 2): ?>
                <h5>Proyecto 1: Inventario</h5>
                <p>Total de Tipos: <strong><?= obtenerTotalArticulos($productos) ?></strong></p>
                <p>Valor Total: <strong><?= MONEDA . ' ' . number_format(calcularValorTotalInventario($productos), 2) ?></strong></p>
                <p class="text-muted small">Haz clic abajo para filtrar interactiva y ver la tabla completa.</p>
            <?php else: ?>
                <h5>Proyecto 2: Planilla</h5>
                <p>Total Empleados: <strong><?= count($empleados) ?></strong></p>
                <p>Porcentajes: AFP (10%) | Bono Prof. (5%)</p>
                <p class="text-muted small">Haz clic abajo para buscar interactiva y ver la boleta de pagos completa.</p>
            <?php endif; ?>
        </div>

        <div class="mt-3">
            <a href="app_caso.php?id=<?= $id ?>" class="btn btn-sand w-100 py-2 fw-bold text-center">ACCEDER A LA APLICACIÓN (PÁG. 3) →</a>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>