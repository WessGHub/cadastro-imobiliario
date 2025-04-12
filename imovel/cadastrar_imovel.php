<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO imoveis (logradouro, numero, bairro, complemento, pessoa_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['logradouro'], $_POST['numero'], $_POST['bairro'],
        $_POST['complemento'] ?? null, $_POST['pessoa_id']
    ]);

    echo '
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="1;url=index.html">
        <title>Cadastro</title>
    </head>
    <body>
        <h2>Imóvel cadastrado com sucesso!</h2>
    </body>
    </html>
    ';
    exit;
}
?>