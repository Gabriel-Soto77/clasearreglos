<?php
require_once 'config/app.php';
require_once 'includes/header.php';
?>

<div class="card card-sand shadow-sm mb-4">
    <div class="card-header card-header-sand text-center py-3">
        <h2 class="m-0 fw-bold">MENÚ PRINCIPAL</h2>
        <small class="text-muted">RESOLUCIÓN DE EJERCICIOS Y PROYECTOS</small>
    </div>
    <div class="card-body p-4">
        <?php foreach ($CASOS as $id => $c): ?>
            <div class="card mb-3 bg-white border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold" style="color: #8c6d3b;"><?= $c['titulo'] ?></h5>
                    <p class="card-text text-secondary"><?= $c['descripcion'] ?></p>
                    <a href="ver_caso.php?id=<?= $id ?>" class="btn btn-sand btn-sm fw-bold">Ver Detalle y Código →</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Pie de página editable -->
    <div class="card-footer card-header-sand p-3">
        <div class="row text-center g-2">
            <div class="col-md-4">
                <label class="fw-bold d-block small">APELLIDOS Y NOMBRES:</label>
                <input type="text" class="form-control form-control-sm text-center bg-white" placeholder="Escribir nombres...">
            </div>
            <div class="col-md-4">
                <label class="fw-bold d-block small">SEMESTRE:</label>
                <input type="text" class="form-control form-control-sm text-center bg-white" placeholder="Escribir semestre...">
            </div>
            <div class="col-md-4">
                <label class="fw-bold d-block small">TURNO:</label>
                <input type="text" class="form-control form-control-sm text-center bg-white" placeholder="Escribir turno...">
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>