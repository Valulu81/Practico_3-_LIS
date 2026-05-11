<!-- controller para gestionar las operaciones con estudiantes -->
<?php
require_once 'Student_Model.php';

class EstudianteController {
    public function listar() { 

        $model = new EstudianteModel();
        $estudiantes = $model->getAll();

        require 'Student_View.php';
    }
}
?>
