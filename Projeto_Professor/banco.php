<?php

// Configuração do banco de dados
$host = 'localhost'; // Endereço do servidor de banco de dados
$usuario = 'root'; // Nome de usuário do banco de dados
$senha = 'root'; // Senha do banco de dados
$bancoDeDados = 'teste'; // Nome do banco de dados
$tabela = 'produto'; // Nome da tabela

// Conectando ao banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $bancoDeDados);

// Verifica se houve um erro na conexão
if ($mysqli->connect_error) {
    die('Erro na conexão com o banco de dados: ' . $mysqli->connect_error);
}

// Consulta SQL para buscar os dados na tabela
$sql = "SELECT * FROM $tabela";

// Executa a consulta SQL
$resultado = $mysqli->query($sql);

// Verifica se houve um erro na consulta
if (!$resultado) {
    die('Erro na consulta: ' . $mysqli->error);
}

// Exibindo os dados na tela
echo '<table>';
echo '<tr><th>ID</th><th>Nome</th><th>Email</th></tr>';

while ($linha = $resultado->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $linha['id'] . '</td>';
    echo '<td>' . $linha['nome'] . '</td>';
    echo '<td>' . $linha['email'] . '</td>';
    echo '</tr>';
}

echo '</table>';
// Fechando a conexão com o banco de dados

$mysqli->close();

