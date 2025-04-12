<?php
include '../src/config.php';

if (!isset($_GET['id'])) {
    header("Location: listar_imovel.php");
    exit;
}

$id = $_GET['id'];

// Busca o imóvel a ser editado
$stmt = $pdo->prepare("SELECT * FROM imoveis WHERE id = ?");
$stmt->execute([$id]);
$imovel = $stmt->fetch();

if (!$imovel) {
    echo "Imóvel não encontrado.";
    exit;
}

// Atualiza os dados se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE imoveis SET logradouro = ?, numero = ?, bairro = ?, complemento = ?, pessoa_id = ? WHERE id = ?");
    $stmt->execute([
        $_POST['logradouro'], $_POST['numero'], $_POST['bairro'],
        $_POST['complemento'] ?? null, $_POST['pessoa_id'], $id
    ]);

    header("Location: listar_imovel.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="text-center mb-4">Editar Imóvel</h1>

    <form method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Logradouro*</label>
            <input type="text" name="logradouro" class="form-control" value="<?= htmlspecialchars($imovel['logradouro']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número*</label>
            <input type="text" name="numero" class="form-control" value="<?= htmlspecialchars($imovel['numero']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro*</label>
            <input type="text" name="bairro" class="form-control" value="<?= htmlspecialchars($imovel['bairro']) ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control" value="<?= htmlspecialchars($imovel['complemento']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Contribuinte (Proprietário)*</label>
            <select name="pessoa_id" class="form-select" required>
                <?php
                $pessoas = $pdo->query("SELECT id, nome FROM pessoas ORDER BY nome")->fetchAll();
                foreach ($pessoas as $pessoa) {
                    $selected = $pessoa['id'] == $imovel['pessoa_id'] ? 'selected' : '';
                    echo "<option value='{$pessoa['id']}' $selected>{$pessoa['nome']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
    </form>
</div>

</body>
</html>