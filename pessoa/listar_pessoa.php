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

<script>
document.addEventListener("DOMContentLoaded", () => {
    const input = document.getElementById("pesquisarPessoa");
    input.addEventListener("keyup", () => {
        const termo = input.value.toLowerCase();
        const linhas = document.querySelectorAll("table tbody tr");

        linhas.forEach(linha => {
            const texto = linha.textContent.toLowerCase();
            linha.style.display = texto.includes(termo) ? "" : "none";
        });
    });
});
</script>

<body class="bg-light">

<a href="../src/index.html" class="btn btn-outline-dark position-absolute top-0 end-0 m-3">
  <i class="bi bi-house-door-fill"></i> Início
</a>

<div class="container py-5">
    <h1 class="text-center mb-4">Pessoas Cadastradas</h1>

    <?php if (count($pessoas) > 0): ?>
        <div class="table-responsive">
        <div class="mb-3">
    <input type="text" id="pesquisarPessoa" class="form-control" placeholder="🔍 Buscar por nome, CPF, ou email...">
</div>
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
