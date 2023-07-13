<?php

include('../conect/protectedFuncionario.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Sucos</title>
    <link rel="stylesheet" href="../css/cadSucos.css">
</head>
<script src="../JS/hotbar.js"></script>
<body>
    <div id="hotbar">
        <script>
            exibirTrechoHTMLCAD()
        </script>
    </div>
    <form action="../crud/cad-sucos.php" method="post">
    <input class="barras" type="file" name="img" id="imagem"><br>
    <input class="barras lugar" type="text" name="nome" id="nome" placeholder="Nome"><br>
    <input class="barras lugar" type="text" name="valor" id="valor" placeholder="Valor"><br>
    <input class="barras lugar" type="text" name="carboidratos" id="carboidratos" placeholder="carboidratos"><br>
    <input class="barras lugar" type="text" name="vitaminas" id="vitaminas" placeholder="vitaminas"><br>
    <input class="barras lugar" type="text" name="minerais" id="minerais" placeholder="minerais"><br>
    <input class="barras lugar" type="submit" value="Adicionar Produto">
    </form>
</body>
</html>