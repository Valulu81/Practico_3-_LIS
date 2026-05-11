<!-- pagina con poca info del estudiante y permite cerrar sesion -->
<?php
session_start();
// si no hay sesion activa, redirige al login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
// cerrando sesion
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <!-- muestra info del estudiante y un boton para cerrar sesion si lo desea-->
    <h1>Hola, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
    <p>Deseas cerrar sesion? <a href="logout.php?logout=1">Cerrar sesion</a></p>
</body>
</html>