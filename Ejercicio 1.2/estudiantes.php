<?php
// funcion de listar estudiane¿tes usando pdo
function listarEstudiantes() {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, nombre, email FROM estudiantes";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Error al listar estudiantes: " . $e->getMessage();
        return false;
    }
}

// funcion para actualizar el email de un estudiante por su id
function actualizarEmailEstudiante($id, $nuevoEmail) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=students', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE estudiantes SET email = :email WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $nuevoEmail);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;

    } catch (PDOException $e) {
        echo "Error al actualizar email: " . $e->getMessage();
        return false;
    }
}