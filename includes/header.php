<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= NOMBRE_SISTEMA ?></title>
    <!-- Bootstrap 5.3.8 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        /* Estilo Arena Pastel Claro */
        body {
            background-color: #f7f4ed;
            color: #4a443b;
        }
        .card-sand {
            background-color: #f1ebd9;
            border: 1px solid #dcd3be;
        }
        .card-header-sand {
            background-color: #e4dac2;
            color: #3d372e;
            font-weight: bold;
        }
        .btn-sand {
            background-color: #cbb892;
            color: #2c2720;
            border: 1px solid #b8a379;
        }
        .btn-sand:hover {
            background-color: #bd3120;
            color: #fff;
        }

        /* Visores con Scroll estilo VS Code y Área de Resultados */
        .vscode-editor {
            background-color: #1e1e1e;
            color: #d4d4d4;
            font-family: 'Consolas', 'Courier New', monospace;
            padding: 15px;
            border-radius: 6px;
            max-height: 380px;
            overflow-y: auto;
            border: 1px solid #333;
            font-size: 0.88rem;
        }
        .result-box-scroll {
            background-color: #ffffff;
            color: #212529;
            font-family: 'Consolas', 'Courier New', monospace;
            padding: 15px;
            border-radius: 6px;
            max-height: 380px;
            overflow-y: auto;
            border: 1px solid #dcd3be;
            font-size: 0.88rem;
        }
    </style>
</head>
<body class="py-4">
<div class="container">