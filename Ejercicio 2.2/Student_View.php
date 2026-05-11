<?php /** @var array $estudiantes */ ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Estudiantes</title>
</head>
<body>
    <h1>Estudiantes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php foreach ($estudiantes as $est): ?>
            <tr>
                <td><?= htmlspecialchars($est['id']) ?></td>
                <td><?= htmlspecialchars($est['nombre']) ?></td>
                <td><?= htmlspecialchars($est['email']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
