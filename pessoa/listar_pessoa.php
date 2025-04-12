<?php
include '../src/config.php';

$stmt = $pdo->query("SELECT * FROM pessoas");
$pessoas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pessoas Cadastradas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Pessoas Cadastradas</h1>

    <?php if (count($pessoas) > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de Nascimento</th>
                        <th>CPF</th>
                        <th>Sexo</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Ações</th> <!-- NOVO -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pessoas as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['nome']) ?></td>
                            <td><?= htmlspecialchars($p['data_nascimento']) ?></td>
                            <td><?= htmlspecialchars($p['cpf']) ?></td>
                            <td><?= htmlspecialchars($p['sexo']) ?></td>
                            <td><?= htmlspecialchars($p['telefone']) ?></td>
                            <td><?= htmlspecialchars($p['email']) ?></td>
                            <td>
                                <a href="editar_pessoa.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning me-1">Editar</a>
                                <a href="excluir_pessoa.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Deseja realmente excluir esta pessoa?')">Excluir</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">
            Nenhuma pessoa cadastrada.
        </div>
    <?php endif; ?>
</div>

</body>
</html>
