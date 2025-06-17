<?php
// public/index.php — Página de entrada
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenid@s</title>
    <!-- Bootstrap vía CDN (con SRI y CORS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!--
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  -->
</head>

<body class="bg-light">
    <div class="container vh-100">
        <div class="row h-100 align-items-center">
            <!-- Columna izquierda: tarjeta y botón -->
            <div class="col-md-6 d-flex justify-content-center">
                <div class="card shadow-sm" style="width: 100%; max-width: 400px;">
                    <div class="card-body text-center">
                        <h1 class="card-title mb-4">¡Bienvenid@s!</h1>
                        <p class="card-text mb-4">
                            Gestión de usuarios con PHP y MySQL
                        </p>
                        <a href="users.php" class="btn btn-primary btn-lg">
                            Ingresar
                        </a>
                    </div>
                </div>
            </div>
            <!-- Columna derecha: imagen -->
            <div class="col-md-6 d-none d-md-flex justify-content-center">
                <img
                    src="assets/images/welcome.jpg"
                    alt="Bienvenida"
                    class="img-fluid rounded">
            </div>
        </div>
    </div>
    <!-- Bootstrap JS Bundle -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76A2z02r4/qEpA2+2FtfX2eI2c4zp+Q5Q5aKr5aX1pN0h+2R6v7rZaB4aF6IXPp"
        crossorigin="anonymous"></script>
</body>

</html>