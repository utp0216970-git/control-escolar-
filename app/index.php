<?php
require "db.php";
$alumnos = $conn->query("SELECT * FROM alumnos ORDER BY nombre");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Control Escolar</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f8; }
    h1 { color: #2c3e50; }
    form, table { background: #fff; padding: 15px; border-radius: 6px; }
    input { padding: 6px; margin: 4px; }
    button, .btn { padding: 6px 12px; background: #2980b9; color: #fff; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; }
    .del { background: #c0392b; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { padding: 8px; border-bottom: 1px solid #ddd; text-align: left; }
    th { background: #2c3e50; color: #fff; }
  </style>
</head>
<body>
  <h1>Control Escolar</h1>

  <form action="guardar.php" method="post">
    <input name="matricula" placeholder="Matrícula" required>
    <input name="nombre" placeholder="Nombre completo" required>
    <input name="grupo" placeholder="Grupo" required>
    <input name="calificacion" type="number" step="0.01" min="0" max="10" placeholder="Calificación" required>
    <button type="submit">Agregar alumno</button>
  </form>

  <table>
    <tr>
      <th>Matrícula</th><th>Nombre</th><th>Grupo</th><th>Calificación</th><th>Estado</th><th>Acciones</th>
    </tr>
    <?php while ($a = $alumnos->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($a["matricula"]) ?></td>
      <td><?= htmlspecialchars($a["nombre"]) ?></td>
      <td><?= htmlspecialchars($a["grupo"]) ?></td>
      <td><?= $a["calificacion"] ?></td>
      <td><?= $a["calificacion"] >= 6 ? "Aprobado" : "Reprobado" ?></td>
      <td>
        <a class="btn" href="editar.php?id=<?= $a["id"] ?>">Editar</a>
        <a class="btn del" href="eliminar.php?id=<?= $a["id"] ?>" onclick="return confirm('¿Eliminar alumno?')">Eliminar</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
