<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO imoveis (logradouro, numero, bairro, complemento, pessoa_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['logradouro'], $_POST['numero'], $_POST['bairro'],
        $_POST['complemento'] ?? null, $_POST['pessoa_id']
    ]);
    echo "Imóvel cadastrado com sucesso!";
}
?>