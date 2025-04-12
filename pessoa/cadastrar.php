<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $telefone = $_POST['telefone'] ?? null;
    $email = $_POST['email'] ?? null;

    if (!$nome || !$data_nascimento || !$cpf || !$sexo) {
        die('Campos obrigatórios não preenchidos.');
    }

    $stmt = $pdo->prepare("INSERT INTO pessoas (nome, data_nascimento, cpf, sexo, telefone, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$nome, $data_nascimento, $cpf, $sexo, $telefone, $email]);
    
    echo '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=index.html">
        <title>Cadastro</title>
    </head>
    <body>
        <h2>Pessoa cadastrada com sucesso!</h2>
    </body>
    </html>
    ';
    exit;
}
?>