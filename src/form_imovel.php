<!DOCTYPE html>
<html lang="pt-br"><head><meta charset="UTF-8"><title>Cadastro de Imóvel</title></head>
<body><h1>Cadastro de Imóvel</h1>
<form action="cadastrar_imovel.php" method="post">
<label>Logradouro*: <input type="text" name="logradouro" required></label><br>
<label>Número*: <input type="text" name="numero" required></label><br>
<label>Bairro*: <input type="text" name="bairro" required></label><br>
<label>Complemento: <input type="text" name="complemento"></label><br>
<label>Contribuinte*:<select name="pessoa_id" required>
<?php
include 'config.php';
$stmt = $pdo->query("SELECT id, nome FROM pessoas ORDER BY nome");
while ($row = $stmt->fetch()) {
    echo "<option value='{$row['id']}'>{$row['nome']}</option>";
}
?></select></label><br>
<button type="submit">Cadastrar Imóvel</button>
</form></body></html>