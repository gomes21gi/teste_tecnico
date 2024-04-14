<?php
include 'conexao.php';

$sql = "SELECT DATE(order_date) AS order_date, AVG(order_total) AS avg_total FROM orders GROUP BY DATE(order_date)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Média dos Pedidos por Dia</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .red {
            background-color: red;
        }

        .green {
            background-color: green;
        }

        .gray {
            background-color: gray;
        }
    </style>
</head>
<body>
    <h2>Média dos Pedidos por Dia</h2>
    <table>
        <tr>
            <th>Data</th>
            <th>Média do Total do Pedido</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $media = $row["avg_total"];
                $cor_linha = ($media < 3000) ? "red" : (($media > 3000) ? "green" : "gray");
                echo "<tr class='$cor_linha'>";
                echo "<td>" . $row["order_date"] . "</td>";
                echo "<td>" . number_format($row["avg_total"], 2) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Nenhum resultado encontrado</td></tr>";
        }
        ?>
    </table>
</body>
</html>
