<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .print-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h2>Lista de Pedidos</h2>
    <table>
        <thead>
            <tr>
                <th>ID do Pedido</th>
                <th>Data do Pedido</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <!-- Aqui serão exibidos os pedidos -->
        </tbody>
    </table>
    <button class="print-button" onclick="window.print()">Imprimir</button>
</body>
</html>

<?php
// Incluir o arquivo de conexão com o banco de dados
include 'conexao.php';

// Query para selecionar todos os pedidos
$query = "SELECT id, data_pedido, valor_total FROM pedidos";
$result = $conn->query($query);

// Verificar se há resultados
if ($result->num_rows > 0) {
    // Exibir os pedidos em uma tabela
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['data_pedido'] . "</td>";
        echo "<td>R$ " . number_format($row['valor_total'], 2, ',', '.') . "</td>"; // Formata o valor como moeda
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Nenhum pedido encontrado.</td></tr>";
}

// Fechar a conexão com o banco de dados
$conn->close();
?>
