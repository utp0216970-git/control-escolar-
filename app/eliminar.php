<?php
require "db.php";

$stmt = $conn->prepare("DELETE FROM alumnos WHERE id=?");
$stmt->bind_param("i", $_GET["id"]);
$stmt->execute();
header("Location: index.php");
