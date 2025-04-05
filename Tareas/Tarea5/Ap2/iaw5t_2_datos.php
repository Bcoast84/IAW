<?php
// Apelidos, Nome, ASIR, IAW

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $apelidos = htmlspecialchars($_POST["apelidos"]);
    $data_alta = $_POST["data_alta"];

    // Validar formato de la fecha (dd/mm/aaaa)
    if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $data_alta)) {
        die("Formato de data incorrecto. Usa dd/mm/aaaa.");
    }

    list($dia, $mes, $ano) = explode("/", $data_alta);

    // Convertir la fecha a formato UNIX timestamp
    $timestamp = strtotime("$ano-$mes-$dia");

    // Obtener día de la semana y mes en gallego
    setlocale(LC_TIME, 'gl_ES.UTF-8');
    $dia_semana = strftime("%A", $timestamp);
    $nome_mes = strftime("%B", $timestamp);

    // Calcular número máxico
    $suma_ano = array_sum(str_split($ano));
    $suma_dia = array_sum(str_split($dia));
    $num_maxico = max(0, $suma_ano - $suma_dia);
}
?>

<!DOCTYPE html>
<html lang="gl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos do Empregado - Empresa X</title>
</head>
<body>
    <h2>Datos do Empregado da Empresa Fernando Wirtz</h2>
    <table border="1">
        <tr>
            <th>Concepto</th>
            <th>Valor</th>
        </tr>
        <tr>
            <td>Título</td>
            <td>Datos do empregado da empresa Fernando Wirtz</td>
        </tr>
        <tr>
            <td>Nome e Apelidos</td>
            <td><?php echo "$nome $apelidos"; ?></td>
        </tr>
        <tr>
            <td>Día da Semana de Alta</td>
            <td><?php echo ucfirst($dia_semana); ?></td>
        </tr>
        <tr>
            <td>Nome do Mes de Alta</td>
            <td><?php echo ucfirst($nome_mes); ?></td>
        </tr>
        <tr>
            <td>Número Máxico</td>
            <td><?php echo $num_maxico; ?></td>
        </tr>
    </table>
    <br>
    <a href="iaw5t_2_empregado.html">Volver ao formulario</a>
</body>
</html>

