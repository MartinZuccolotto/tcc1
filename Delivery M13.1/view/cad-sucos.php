<?php

include('../conect/protectedFuncionario.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Sucos</title>
</head>
<body>
    <form action="../crud/cad-sucos.php" method="post">
    <input type="file" name="img" id="imagem"><br>
    <input type="text" name="nome" id="nome" placeholder="Nome"><br>
    <input type="text" name="valor" id="valor" placeholder="Valor"><br>
    <input type="text" name="carboidratos" id="carboidratos" placeholder="carboidratos"><br>
    <input type="text" name="vitaminas" id="vitaminas" placeholder="vitaminas"><br>
    <input type="text" name="minerais" id="minerais" placeholder="minerais"><br>
    <input type="submit" value="Adicionar Produto">
    </form>
</body>
</html>