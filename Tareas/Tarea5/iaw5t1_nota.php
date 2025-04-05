<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Almacenar las notas en arrays asociativos
    $tarefas = [
        "Tarefa1" => $_POST["Tarefa1"],
        "Tarefa2" => $_POST["Tarefa2"],
        "Tarefa3" => $_POST["Tarefa3"],
        "Tarefa4" => $_POST["Tarefa4"],
        "Tarefa5" => $_POST["Tarefa5"],
        "Tarefa6" => $_POST["Tarefa6"],
        "Tarefa7" => $_POST["Tarefa7"]
    ];
    
    $exames = [
        "Exame1" => $_POST["Exame1"],
        "Exame2" => $_POST["Exame2"],
        "Exame3" => $_POST["Exame3"]
    ];
    
    // Calcular la media de las tareas
    $media_tarefas = array_sum($tarefas) / count($tarefas);
    
    // Calcular la media de los exámenes
    $media_exames = array_sum($exames) / count($exames);
    
    // Calcular la calificación final
    $nota_final = ($media_tarefas * 0.1) + ($media_exames * 0.9);
    
    // Redirigir a la página de resultados con la nota final como parámetro
    header("Location: resultado.php?nota=" . urlencode($nota_final));
    exit();
}
?>

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Notas</title>
</head>
<body>
    <h2>Formulario de Notas</h2>
    <form method="post" action="">
        <?php for ($i = 1; $i <= 7; $i++): ?>
            <label for="Tarefa<?php echo $i; ?>">Tarefa <?php echo $i; ?>:</label>
            <input type="number" name="Tarefa<?php echo $i; ?>" required step="0.1" min="0" max="10"><br>
        <?php endfor; ?>
        
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <label for="Exame<?php echo $i; ?>">Exame <?php echo $i; ?>:</label>
            <input type="number" name="Exame<?php echo $i; ?>" required step="0.1" min="0" max="10"><br>
        <?php endfor; ?>
        
        <button type="submit">Calcular Nota Final</button>
    </form>
</body>
</html>
