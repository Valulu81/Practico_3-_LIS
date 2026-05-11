<!-- model que usando un controller enlista estudiantes -->

<?php
class EstudianteModel {
    private $pdo;

    public function __construct() {
        $dsn = "mysql:host=localhost;dbname=students;charset=utf8mb4";
        $usuario = "root";
        $contraseña = "";

        try {
            $this->pdo = new PDO($dsn, $usuario, $contraseña);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    // Método para obtener todos los estudiantes
    public function getAll() {
        $sql = "SELECT * FROM estudiantes";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
