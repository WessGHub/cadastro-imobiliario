<?php
include '../src/config.php';

$stmt = $pdo->query("SELECT i.*, p.nome AS proprietario FROM imoveis i JOIN pessoas p ON i.pessoa_id = p.id");
$imoveis = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Imóveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h1 class="text-center mb-4">Imóveis Cadastrados</h1>

    <table class="table table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Complemento</th>
                <th>Proprietário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($imoveis as $imovel): ?>
            <tr>
                <td><?= $imovel['id'] ?></td>
                <td><?= $imovel['logradouro'] ?></td>
                <td><?= $imovel['numero'] ?></td>
                <td><?= $imovel['bairro'] ?></td>
                <td><?= $imovel['complemento'] ?></td>
                <td><?= $imovel['proprietario'] ?></td>
                <td>
                    <a href="editar_imovel.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-warning">Editar</a>
                    <a href="excluir_imovel.php?id=<?= $imovel['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir este imóvel?')">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>