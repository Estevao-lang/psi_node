<?php
$hostname = 'localhost';
$database = 'karina';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Criação da tabela login
    $pdo->exec("CREATE TABLE login (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(255) NULL,
        email VARCHAR(255) NULL,
        senha VARCHAR(255) NULL
    )");

    // Criação da tabela artigo
    $pdo->exec("CREATE TABLE artigo (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NULL,
        conteudo VARCHAR(255) NULL,
        link VARCHAR(255) NULL
    )");

    // Criação da tabela servicos
    $pdo->exec("CREATE TABLE servicos (
        id INT UNSIGNED ZEROFILL AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NULL,
        conteudo VARCHAR(255) NULL,
        img LONGBLOB NULL
    )");

    // Criação da tabela ebook
    $pdo->exec("CREATE TABLE ebook (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(255) NULL,
        conteudo VARCHAR(255) NULL,
        img LONGBLOB NULL,
        pdf LONGBLOB NULL
    )");

    echo "Tabelas criadas com sucesso!";
    
    $pdo = null; // Fecha a conexão
} catch (PDOException $e) {
    echo "Erro na conexão ou criação das tabelas: " . $e->getMessage();
}
?>
