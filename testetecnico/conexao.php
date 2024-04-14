<?php
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "teste_tecnico";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
