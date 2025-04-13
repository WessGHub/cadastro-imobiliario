<?php
include '../src/config.php';

if (!isset($_GET['id'])) {
    header("Location: listar_pessoa.php");
    exit;
}

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM pessoas WHERE id = ?");
$stmt->execute([$id]);
$pessoa = $stmt->fetch();

if (!$pessoa) {
    echo "Pessoa não encontrada.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE pessoas SET nome = ?, data_nascimento = ?, cpf = ?, sexo = ?, telefone = ?, email = ? WHERE id = ?");
    $stmt->execute([
        $_POST['nome'], $_POST['data_nascimento'], $_POST['cpf'], $_POST['sexo'],
        $_POST['telefone'] ?? null, $_POST['email'] ?? null, $id
    ]);
    header("Location: listar_pessoa.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Pessoa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<a href="../src/index.html" class="btn btn-outline-dark position-absolute top-0 end-0 m-3">
  <i class="bi bi-house-door-fill"></i> Início
</a>

<div class="container py-5">
    <h1 class="text-center mb-4">Editar Pessoa</h1>

    <form method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Nome*</label>
            <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($pessoa['nome']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Data de Nascimento*</label>
            <input type="date" name="data_nascimento" class="form-control" value="<?= htmlspecialchars($pessoa['data_nascimento']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CPF*</label>
            <input type="text" name="cpf" class="form-control" value="<?= htmlspecialchars($pessoa['cpf']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Sexo*</label>
            <select name="sexo" class="form-select" required>
    <option value="" disabled <?= empty($pessoa['sexo']) ? 'selected' : '' ?>>Selecione</option>
    <option value="M" <?= $pessoa['sexo'] === 'M' ? 'selected' : '' ?>>Masculino</option>
    <option value="F" <?= $pessoa['sexo'] === 'F' ? 'selected' : '' ?>>Feminino</option>
    <option value="Outro" <?= $pessoa['sexo'] === 'Outro' ? 'selected' : '' ?>>Outro</option>
</select>
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="<?= htmlspecialchars($pessoa['telefone']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($pessoa['email']) ?>">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>

</body>
</html>