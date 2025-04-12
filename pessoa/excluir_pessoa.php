<?php
include '../src/config.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("DELETE FROM pessoas WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}

header('Location: listar_pessoa.php');
exit;
?>