<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Imóvel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<a href="../src/index.html" class="btn btn-outline-dark position-absolute top-0 end-0 m-3">
  <i class="bi bi-house-door-fill"></i> Início
</a>

<div class="container py-5">
    <h1 class="text-center mb-4">Cadastro de Imóvel</h1>

    <form action="cadastrar_imovel.php" method="post" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label class="form-label">Logradouro*</label>
            <input type="text" name="logradouro" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Número*</label>
            <input type="text" name="numero" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Bairro*</label>
            <input type="text" name="bairro" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Complemento</label>
            <input type="text" name="complemento" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contribuinte (Proprietário)*</label>
            <select name="pessoa_id" class="form-select" required>
               <?php
            include '../src/config.php'; // ou o caminho correto

             $stmt = $pdo->query("SELECT id, nome FROM pessoas ORDER BY nome");

            while ($row = $stmt->fetch()) {
                 echo "<option value='{$row['id']}'>{$row['nome']}</option>";
               }
              ?>
         </select>
            </select>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-success">Cadastrar Imóvel</button>
        </div>
    </form>
</div>

</body>
</html>