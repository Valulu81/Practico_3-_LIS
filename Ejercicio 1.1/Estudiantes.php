<!-- creando funcion para estudiantes uqe lo inserte a la base de datos  -->
<?php

function insertarEstudiante($nombre, $email, $password) {


    try {

        $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO estudiantes (nombre, email, password) 
                VALUES (:nombre, :email, :password)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $passwordHash);

        $stmt->execute();

        return $pdo->lastInsertId();

    } catch (PDOException $e) {
        echo "Error al insertar estudiante: " . $e->getMessage();
        return false;
    }
}


$idNuevo = insertarEstudiante("Valeria", "valeria@example.com", "password123");

if ($idNuevo) {
    echo "Estudiante insertado correctamente con ID: " . $idNuevo;
} else {
    echo "Hubo un error al insertar.";
}

?>


