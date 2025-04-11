<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO pessoas (nome, data_nascimento, cpf, sexo, telefone, email) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['nome'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['sexo'],
        $_POST['telefone'] ?? null, $_POST['email'] ?? null
    ]);
    echo "Pessoa cadastrada com sucesso!";
}
?>