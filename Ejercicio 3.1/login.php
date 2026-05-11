<?php
// iniciando sesion
session_start();

// validando los datos desde la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM estudiantes WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $estudiante = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($estudiante && password_verify($password, $estudiante['password'])) {
            $_SESSION['user_id'] = $estudiante['id'];
            $_SESSION['user_name'] = $estudiante['nombre'];
            echo "Login exitoso. Bienvenido, " . htmlspecialchars($estudiante['nombre']) . "!";
            // redireccionandolo a donde esta el logout
            header("Location: logout.php");
        } else {
            echo "Email o contraseña incorrectos.";
        }

    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- login sensillo que agarra datos desde la base de datos -->
    <form action="login.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>