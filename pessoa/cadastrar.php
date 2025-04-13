<?php
include '../src/config.php';

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
        <meta http-equiv="refresh" content="2;url=../src/index.html">
        <title>Cadastro Concluído</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
        <div class="container py-5 text-center">
            <div id="mensagem-alerta" class="alert alert-success w-75 mx-auto" role="alert">
                Pessoa cadastrada com sucesso!
            </div>
        </div>

        <script src="../assets/js/alerta.js"></script>
    </body>
    </html>
    ';
    exit;
}
?>