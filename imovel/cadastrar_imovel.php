<?php
include '../src/config.php';

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
        <meta http-equiv="refresh" content="2;url=../src/index.html">
        <title>Cadastro Concluído</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-light">
    
    <a href="../src/index.html" class="btn btn-outline-dark position-absolute top-0 end-0 m-3">
  <i class="bi bi-house-door-fill"></i> Início
</a>
        <div class="container py-5 text-center">
            <div id="mensagem-alerta" class="alert alert-success w-75 mx-auto" role="alert">
                Imóvel cadastrado com sucesso!
            </div>
        </div>

        <script src="../assets/js/alerta.js"></script>
    </body>
    </html>
    ';
    exit;
}
?>