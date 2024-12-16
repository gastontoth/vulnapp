<?php 
  session_start(); 
  if (isset($_REQUEST["allow_access"])) {
    if ($_REQUEST["allow_access"] == "PROTECTED_FROM_EXTERNAL_USERS") {
	    $_SESSION["allowed_browser"] = true;
    }
  }
  if (!isset($_SESSION["allowed_browser"])) {
    header('Location: 403.html');
    flush();
    exit();
  }
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <style>
        .blink {
            animation: blinker 1s step-start infinite;
        }
        @keyframes blinker {
            50% { opacity: 0; }
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 24rem;">
        <h1 class="text-center mb-4">Iniciar Sesión</h1>
        <form action="login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Ingresa tu usuario">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa tu contraseña">
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
            </div>
        </form>
        <div id="blinking-text" class="text-center text-danger mt-3 blink">
          <?php if (isset($_REQUEST['mensaje'])) { echo($_REQUEST['mensaje']); } ?>
        </div>             
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        setTimeout(() => {
            const blinkText = document.getElementById('blinking-text');
            if (blinkText) {
                blinkText.style.visibility = 'hidden';
            }
        }, 3000);
    </script>
</body>
</html>


