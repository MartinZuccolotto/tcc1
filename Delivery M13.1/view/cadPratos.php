<?php

    include('../conect/protectedFuncionario.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Imagem</title>
    <link rel="stylesheet" href="../css/cadPratos.css">
</head>
<body>
    <form action="../crud/cad-pratos.php" method="post">
    <input type="file" name="img" id="imagem"><br>
    <input class="barras" type="text" name="nome" id="nome" placeholder="Nome"><br>
    <input class="barras" style="position: relative; top:50px" type="text" name="descricao" id="descricao" placeholder="descricao"><br>
    <input class="barras" style="position: relative; top:50px" type="text" name="valor" id="valor" placeholder="Valor"><br>
    <input class="barras" style="position: relative; top:50px" type="text" name="calorias" id="calorias" placeholder="calorias"><br>
    <input class="barras" style="position: relative; top:50px" type="text" name="carboidratos" id="carboidratos" placeholder="carboidratos"><br>
    <input class="barras" style="position: relative; top:50px"type="text" name="proteinas" id="proteinas" placeholder="proteinas"><br>
    <input class="barras" style="position: relative; top:50px"type="text" name="gordura" id="gordura" placeholder="gordura"><br>
    <input class="barras" style="position: relative; top:50px" type="text" name="sodio" id="sodio" placeholder="sodio"><br>
    <input class="barras" style="position: relative; top:50px" type="submit" value="Adicionar Produto">
    </form>
</body>
</html>