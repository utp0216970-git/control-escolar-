<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $conn->prepare("UPDATE alumnos SET matricula=?, nombre=?, grupo=?, calificacion=? WHERE id=?");
    $stmt->bind_param("sssdi", $_POST["matricula"], $_POST["nombre"], $_POST["grupo"], $_POST["calificacion"], $_POST["id"]);
    $stmt->execute();
    header("Location: index.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM alumnos WHERE id=?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
$a = $stmt->get_result()->fetch_assoc();
if (!$a) die("Alumno no encontrado");
?>
<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar alumno</title></head>
<body style="font-family:Arial;margin:30px">
  <h1>Editar alumno</h1>
  <form method="post">
    <input type="hidden" name="id" value="<?= $a["id"] ?>">
    <input name="matricula" value="<?= htmlspecialchars($a["matricula"]) ?>" required>
    <input name="nombre" value="<?= htmlspecialchars($a["nombre"]) ?>" required>
    <input name="grupo" value="<?= htmlspecialchars($a["grupo"]) ?>" required>
    <input name="calificacion" type="number" step="0.01" min="0" max="10" value="<?= $a["calificacion"] ?>" required>
    <button type="submit">Guardar cambios</button>
    <a href="index.php">Cancelar</a>
  </form>
</body>
</html>
