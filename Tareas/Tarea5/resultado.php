<?php
// Apelidos: Costa Rojo
// Nome: Borja
// Ciclo: ASIR
// Módulo: IAW

// Verificar si se ha pasado la nota final en la URL
if (isset($_GET['nota'])) {
    $nota_final = $_GET['nota'];
} else {
    // Si no se ha pasado la nota, mostrar mensaje de error
    echo "Error: No se ha recibido la nota final.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Nota</title>
</head>
<body>
    <h2>Resultado de la Nota Final</h2>
    <p>La nota final del alumno es: <?php echo htmlspecialchars($nota_final); ?></p>
</body>
</html>
