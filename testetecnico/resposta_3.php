<?php
include 'conexao.php';

// Recuperar a lista de países
$sql_paises = "SELECT DISTINCT user_country FROM `user`";
$result_paises = $conn->query($sql_paises);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pais_selecionado = $_POST["pais"];

    // Consulta para obter a soma dos totais de venda por país
    $sql_vendas_por_pais = "SELECT user_country, SUM(order_total) AS total_vendas FROM `user` JOIN orders ON `user`.user_id = orders.order_user_id WHERE user_country = '$pais_selecionado' GROUP BY user_country";
    $result_vendas_por_pais = $conn->query($sql_vendas_por_pais);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soma dos Totais de Venda por País</title>
</head>
<body>
    <h2>Soma dos Totais de Venda por País</h2>
    <form method="post">
        <label for="pais">Selecione um país:</label>
        <select name="pais" id="pais">
            <?php
            if ($result_paises->num_rows > 0) {
                while ($row = $result_paises->fetch_assoc()) {
                    echo "<option value='" . $row["user_country"] . "'>" . $row["user_country"] . "</option>";
                }
            }
            ?>
        </select>
        <input type="submit" value="Filtrar">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($result_vendas_por_pais->num_rows > 0) {
            while ($row = $result_vendas_por_pais->fetch_assoc()) {
                echo "<p>Total de vendas em " . $row["user_country"] . ": " . $row["total_vendas"] . "</p>";
            }
        } else {
            echo "<p>Nenhum resultado encontrado para o país selecionado.</p>";
        }
    }
    ?>
</body>
</html>
