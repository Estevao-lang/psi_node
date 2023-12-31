<?php

// Parâmetros de conexão com o banco de dados
$hostname = 'localhost';
$database = 'karina';
$username = 'root';
$password = '';

try {
    // Conectando ao banco de dados MySQL
    $conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    
    // Definindo o modo de erro para exceção
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Obtendo os dados do formulário
    $nome = $_POST['name'];
    $senha = $_POST['senha'];
    
    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM login WHERE (nome = :nome OR email = :nome) AND senha = :senha";
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(':nome' => $nome, ':senha' => $senha));
    
    // Verificando o resultado da consulta
    if ($stmt->rowCount() == 1) {
        // Login bem-sucedido, redirecionar para a página de sucesso
        header("Location: ../pages/welcome.html");
        exit();
    } else {
        // Login falhou, redirecionar para a página de erro
        header("Location: ../pagina_de_erro.html");
        exit();
    }
} catch(PDOException $e) {
    // Tratamento de erro na conexão com o banco de dados
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}
?>
