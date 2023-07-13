<?php
    require('../conect/protected.php');
    require ("../conect/conn.php");

    if (isset($_GET['idpratos'])){
        $idpratos = $_GET['idpratos'];
    }
        else{
            header("Location: index.php");
    }

    $tabela = $pdo->prepare("SELECT * FROM pratos WHERE idpratos=:idpratos;");

    $tabela->execute(array(':idpratos'=>$idpratos));
    $rowTable = $tabela->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <div>
        <form action="../crud/update-prod.php" method="post">
            <input type="hidden" name='idpratos' value=<?php echo $rowTable[0]['idpratos']?>>
            <input type="file" name="img">
            <input type="text" name="nome" value=<?php echo $rowTable[0]['nome']?>>
            <input type="text" name="descricao" value=<?php echo $rowTable[0]['descricao']?>>
            <input type="text" name="valor" value=<?php echo $rowTable[0]['valor']?>>
            <input type="text" name="calorias" value=<?php echo $rowTable[0]['calorias']?>>
            <input type="text" name="carboidratos" value=<?php echo $rowTable[0]['carboidratos']?>>
            <input type="text" name="proteinas" value=<?php echo $rowTable[0]['proteinas']?>>
            <input type="text" name="gordura" value=<?php echo $rowTable[0]['gordura']?>>
            <input type="text" name="sodio" value=<?php echo $rowTable[0]['sodio']?>>
            <input type="submit" value="ENVIAR">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>
</html>