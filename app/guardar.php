<?php
require "db.php";

$stmt = $conn->prepare("INSERT INTO alumnos (matricula, nombre, grupo, calificacion) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssd", $_POST["matricula"], $_POST["nombre"], $_POST["grupo"], $_POST["calificacion"]);

try {
    $stmt->execute();
} catch (mysqli_sql_exception $e) {
    die("Error: la matrícula ya existe. <a href='index.php'>Volver</a>");
}
header("Location: index.php");
